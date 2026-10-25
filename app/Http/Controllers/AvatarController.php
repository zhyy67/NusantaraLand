<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AvatarData;

class AvatarController extends Controller
{
    /**
     * Menampilkan halaman "Karakter Kamu".
     */
    public function index()
    {
        $user = Auth::user();
        $masterAvatars = AvatarData::getMasterData();
        $activeAvatar = session('active_avatar', 'default');
        
        return view('avatar.index-body', compact('user', 'masterAvatars', 'activeAvatar'));
    }

    /**
     * Menampilkan halaman "Katalog Kostum" (dikelompokkan per pulau).
     */
    public function kostumisasi()
    {
        $user = Auth::user();
        $masterAvatars = AvatarData::getMasterData();

        $unlocked = explode(',', $user->avatar_style ?? 'default');
        if (!in_array('default', $unlocked)) {
            $unlocked[] = 'default';
        }

        $activeAvatar = session('active_avatar', 'default');

        // Logika untuk mengelompokkan kostum berdasarkan grup (pulau)
        $groupedAvatars = [];
        foreach ($masterAvatars as $key => $av) {
            $grup = $av['grup'] ?? 'Lainnya';
            $groupedAvatars[$grup][$key] = $av;
        }

        return view('avatar.kostumisasi', compact('user', 'masterAvatars', 'groupedAvatars', 'unlocked', 'activeAvatar'));
    }

    /**
     * Menyimpan kostum yang dipilih.
     */
    public function update(Request $request)
    {
        $request->validate(['avatar' => 'required|string']);
        $user = Auth::user();

        $unlocked = explode(',', $user->avatar_style ?? 'default');
        if ($request->avatar !== 'default' && !in_array($request->avatar, $unlocked)) {
            return redirect()->back()->with('error', 'Kamu belum membuka kostum ini.');
        }

        session(['active_avatar' => $request->avatar]);
        return redirect()->route('avatar.index')->with('success', 'Karakter berhasil diganti!');
    }

    /**
     * Membeli kostum menggunakan poin.
     */
    public function beli(Request $request)
    {
        $request->validate(['kostum_id' => 'required|string']);
        
        $user = Auth::user();
        $masterAvatars = AvatarData::getMasterData();
        $kostumId = $request->kostum_id;

        // 1. Cek apakah kostumnya valid
        if (!array_key_exists($kostumId, $masterAvatars)) {
            return redirect()->back()->with('error', 'Kostum tidak ditemukan.');
        }

        $kostum = $masterAvatars[$kostumId];
        $harga = $kostum['harga'] ?? 0;

        // 2. Cek apakah kostum ini bisa dibeli (harga > 0)
        if ($harga <= 0) {
            return redirect()->back()->with('error', 'Kostum ini tidak bisa dibeli dengan poin. Selesaikan kuisnya!');
        }

        // 3. Cek apakah user sudah punya kostum ini
        $unlocked = explode(',', $user->avatar_style ?? 'default');
        if (in_array($kostumId, $unlocked)) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki kostum ini.');
        }

        // 4. Cek apakah poin cukup
        if ($user->points < $harga) {
            return redirect()->back()->with('error', "Poin kamu tidak cukup. Butuh {$harga} poin, kamu hanya punya {$user->points} poin.");
        }

        // 5. Proses pembelian
        $user->points -= $harga;
        $unlocked[] = $kostumId;
        $user->avatar_style = implode(',', array_filter($unlocked));
        $user->save();

        return redirect()->back()->with('success', "Berhasil membeli {$kostum['nama']} dengan {$harga} poin!");
    }
}