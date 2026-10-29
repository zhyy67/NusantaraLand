<?php

namespace App\Services;

use App\Models\MisiHarian;
use App\Models\UserMisiProgress;
use App\Models\User;

class MisiService
{
    public static function tambahProgress(User $user, string $kodeMisi, int $tambah = 1): void
    {
        $misi = MisiHarian::where('kode', $kodeMisi)->first();
        if (!$misi) return;

        $today = now()->toDateString();

        // Cari atau buat progress hari ini
        $progress = UserMisiProgress::firstOrCreate(
            [
                'user_id' => $user->id,
                'misi_harian_id' => $misi->id,
                'tanggal' => $today,
            ],
            ['progress' => 0, 'selesai' => false]
        );

        if ($progress->selesai) return;

        $progress->progress = min($progress->progress + $tambah, $misi->target);

        // Jika mencapai target
        if ($progress->progress >= $misi->target) {
            $progress->selesai = true;
            
            // Beri reward poin (sesuai kolom 'points' di DB kamu)
            $user->increment('points', $misi->reward_poin); 
        }

        $progress->save();
    }

    public static function getMisiUntukUser(User $user)
    {
        $today = now()->toDateString();
        $misiList = MisiHarian::all();

        return $misiList->map(function ($misi) use ($user, $today) {
            $progress = UserMisiProgress::where('user_id', $user->id)
                ->where('misi_harian_id', $misi->id)
                ->where('tanggal', $today)
                ->first();

            return [
                'judul' => $misi->judul,
                'progress' => $progress->progress ?? 0,
                'target' => $misi->target,
                'selesai' => $progress->selesai ?? false,
                'reward_poin' => $misi->reward_poin,
            ];
        });
    }
}