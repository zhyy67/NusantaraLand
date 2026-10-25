<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil user dari database
        $user = User::findOrFail(Auth::id());

        // 2. Hitung poin ke level berikutnya
        $pointsToNextLevel = (100 - ($user->points % 100)) % 100;
        if ($pointsToNextLevel === 0 && $user->points > 0) {
            $pointsToNextLevel = 100;
        }

        // 3. (Opsional) Tetap titipkan ke $user juga untuk jaga-jaga
        $user->points_to_next_level = $pointsToNextLevel;
        $user->streak               = $user->streak ?? 0;
        $user->provinces_visited    = $user->provinces_visited ?? 0;
        $user->total_provinces      = $user->total_provinces ?? 38;
        $user->badges_collected     = $user->badges_collected ?? 0;
        $user->total_badges         = $user->total_badges ?? 8;

        // 4. Leaderboard
        $leaderboard = User::orderByDesc('points')
            ->limit(9)
            ->get()
            ->map(function ($u, $index) use ($user) {
                return (object) [
                    'rank'    => $index + 1,
                    'name'    => $u->name,
                    'points'  => $u->points,
                    'is_user' => $u->id === $user->id,
                ];
            });

        // 5. Kirim ke view
        return view('dashboard', [
            'user'              => $user,
            'leaderboard'       => $leaderboard,
            'pointsToNextLevel' => $pointsToNextLevel, // <-- INI YANG BARU
        ]);
    }
}