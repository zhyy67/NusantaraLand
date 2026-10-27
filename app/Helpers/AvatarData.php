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
             'jakarta' => [
                'nama' => 'Betawi', 
                'warna' => '#3B82F6', 
                'emoji' => 'betawi.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
             ],
             'jakarta-cewek' => [
                'nama' => 'kebaya encim', 
                'warna' => '#EC4899', 
                'emoji' => 'kebaya encim.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-barat-cowok' => [
                'nama' => 'beskap sunday depo', 
                'warna' => '#EC4899', 
                'emoji' => 'beskap sunday depo.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-barat-cewek' => [
                'nama' => 'kebaya sunday depo', 
                'warna' => '#EC4899', 
                'emoji' => 'kebaya sunday depo-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-tengah-cowok' => [
                'nama' => 'beskap Jawa Tengah', 
                'warna' => '#EC4899', 
                'emoji' => 'beskap-jateng.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-tengah-cewek' => [
                'nama' => 'kebaya & ganduk mentul', 
                'warna' => '#EC4899', 
                'emoji' => 'kebaya & ganduk mentul.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-timur-cowok' => [
                'nama' => 'pesa an & udeng madura', 
                'warna' => '#EC4899', 
                'emoji' => 'pesa an & udeng madura.png', 
                'harga' => 100,
                'grup' => 'Pulau Jawa'
            ],
            'jawa-timur-cewek' => [
                'nama' => 'kebaya pesa an maduray', 
                'warna' => '#EC4899', 
                'emoji' => 'kebaya pesa an maduray.png', 
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
                'nama' => 'Dayak', 
                'warna' => '#F59E0B', 
                'emoji' => 'dayak-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-selatan-cowo' => [
                'nama' => 'Banjar', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-selatan.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-selatan-cewek' => [
                'nama' => 'Banjar', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-selatan-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
             'kalimantan-timur-cowo' => [
                'nama' => 'Kutai', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-timur.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-timur-cewek' => [
                'nama' => 'Kutai', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-timur-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-utara-cowo' => [
                'nama' => 'Tidung', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-barat.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-utarat-cewek' => [
                'nama' => 'Tidung', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-barat-cewek.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-utara-cowo' => [
                'nama' => 'Punan', 
                'warna' => '#6366F1', 
                'emoji' => 'kalimantan-utara.png', 
                'harga' => 100,
                'grup' => 'Pulau Kalimantan'
            ],
            'kalimantan-utarat-cewek' => [
                'nama' => 'Punan', 
                'warna' => '#8B5CF6', 
                'emoji' => 'kalimantan-utara-cewek.png', 
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