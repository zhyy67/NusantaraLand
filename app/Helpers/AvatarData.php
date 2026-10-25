<?php

namespace App\Helpers;

class AvatarData
{
    public static function getMasterData()
    {
        return [
            // ================= UMUM =================
            'default' => [
                'nama' => 'Baju Default', 
                'warna' => '#6B7280', 
                'emoji' => '', 
                'harga' => 0,
                'grup' => 'Umum'
            ],
            
            // ================= PULAU JAWA =================
            'Jawa-cowo' => [
                'nama' => 'Besjap', 
                'warna' => '#3B82F6', 
                'emoji' => 'surjan.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'Jawa-cewek' => [
                'nama' => 'Kebaya', 
                'warna' => '#EC4899', 
                'emoji' => 'kebaya.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            
            // ================= PULAU KALIMANTAN =================
            'dayak-cowo' => [
                'nama' => 'Dayak', 
                'warna' => '#10B981', 
                'emoji' => 'Dayak.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'dayak-cewek' => [
                'nama' => 'Deder', 
                'warna' => '#F59E0B', 
                'emoji' => 'dayak-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-selatan-cowo' => [
                'nama' => 'Teluk Belanga', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-selatan.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-selatan-cewek' => [
                'nama' => 'Kurung Basisit', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-selatan-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
             'kalimantan-timur-cowo' => [
                'nama' => 'Linto Baro', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-timur.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-timur-cewek' => [
                'nama' => 'Ta a', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-timur-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-barat-cowo' => [
                'nama' => 'Sapei Sapaq', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-barat.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-barat-cewek' => [
                'nama' => 'Ta a', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-barat-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            
            // ================= PULAU SULAWESI =================
            'sulawesi-selatan-cewek' => [
                'nama' => 'Bodo', 
                'warna' => '#EF4444', 
                'emoji' => 'bodo.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            
            // ================= BALI & NUSA TENGGARA =================
            'ntt-cewek' => [
                'nama' => 'Tenun Rote', 
                'warna' => '#14B8A6', 
                'emoji' => 'tenun-rote.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'bali-cowo' => [
                'nama' => 'Bali', 
                'warna' => '#F97316', 
                'emoji' => 'bali.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            
            // ================= PULAU SUMATERA =================
            'sumatra-cowo' => [
                'nama' => 'Sumatra', 
                'warna' => '#84CC16', 
                'emoji' => 'sumatra.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'aceh-cewek' => [
                'nama' => 'Ulee Balang', 
                'warna' => '#22C55E', 
                'emoji' => 'ulee-balang.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            
            // ================= PULAU PAPUA =================
            'papua-cowo' => [
                'nama' => 'Papua', 
                'warna' => '#8B5CF6', 
                'emoji' => 'papua.png', 
                'harga' => 100,
                'grup' => 'Pulau Papua'
            ],
        ];
    }

    public static function getActiveAvatar($user)
    {
        $activeId = session('active_avatar', 'default');
        $master = self::getMasterData();
        return $master[$activeId] ?? $master['default'];
    }
}