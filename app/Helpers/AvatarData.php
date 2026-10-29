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
             'gorontalo' => [
                'nama' => 'gorontalo paluwala & makuta', 
                'warna' => '#EF4444', 
                'emoji' => 'gorontalo paluwala & makuta.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'gorontalo-cewek' => [
                'nama' => 'gorontalo billiu & makuta', 
                'warna' => '#EF4444', 
                'emoji' => 'gorontalo billiu & makuta.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-tengah' => [
                'nama' => 'Koje & Puruka Pajana', 
                'warna' => '#EF4444', 
                'emoji' => 'Koje & Puruka Pajana.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-tengah-cewek' => [
                'nama' => 'Nggembe', 
                'warna' => '#EF4444', 
                'emoji' => 'Nggembe.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-utara' => [
                'nama' => 'Laku Tepu', 
                'warna' => '#EF4444', 
                'emoji' => 'Laku Tepu pria.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-utara-cewek' => [
                'nama' => 'Laku Tepu', 
                'warna' => '#EF4444', 
                'emoji' => 'Laku Tepu wanita.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-barat' => [
                'nama' => 'Jas Tutu dan Passapu.png', 
                'warna' => '#EF4444', 
                'emoji' => 'Jas Tutu dan Passapu.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-barat-cewek' => [
                'nama' => 'Bodo', 
                'warna' => '#EF4444', 
                'emoji' => 'bodo.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-selatan' => [
                'nama' => 'tpraja pasuki', 
                'warna' => '#EF4444', 
                'emoji' => 'tpraja pa suki.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-selatan-cewek' => [
                'nama' => 'toraja pa suki kandaure', 
                'warna' => '#EF4444', 
                'emoji' => 'toraja pa suki kandaure.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-tenggara' => [
                'nama' => 'Babu Nggawi Langga', 
                'warna' => '#EF4444', 
                'emoji' => 'Babu Nggawi Langga.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            'sulawesi-tenggara-cewek' => [
                'nama' => 'Babu Nggawi', 
                'warna' => '#EF4444', 
                'emoji' => 'Babu Nggawi.png', 
                'harga' => 100,
                'grup' => 'Pulau Sulawesi'
            ],
            
            // ================= BALI & NUSA TENGGARA =================
            'bali' => [
                'nama' => 'Bali', 
                'warna' => '#F97316', 
                'emoji' => 'Payas Agung pria.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'bali-cewek' => [
                'nama' => 'Payas Agung wanita', 
                'warna' => '#F97316', 
                'emoji' => 'Payas Agung wanita.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'ntb' => [
                'nama' => 'Pakaian adat Pegon ', 
                'warna' => '#14B8A6', 
                'emoji' => 'Pakaian adat Pegon.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'ntb-cewek' => [
                'nama' => 'Pakaian adat Lambung', 
                'warna' => '#14B8A6', 
                'emoji' => 'Pakaian adat Lambung.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'ntt' => [
                'nama' => 'Pakaian adat Rote dengan topi Ti i Langga', 
                'warna' => '#14B8A6', 
                'emoji' => 'Pakaian adat Rote dengan topi Ti i Langga.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            'ntt-cewek' => [
                'nama' => 'Tenun Rote', 
                'warna' => '#14B8A6', 
                'emoji' => 'tenun-rote.png', 
                'harga' => 100,
                'grup' => 'Bali & Nusa Tenggara'
            ],
            
            
            // ================= PULAU SUMATERA =================
            'aceh' => [
                'nama' => 'Meukasah', 
                'warna' => '#84CC16', 
                'emoji' => 'Meukasah.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'aceh-cewek' => [
                'nama' => 'Baju Kurung ', 
                'warna' => '#22C55E', 
                'emoji' => 'Baju Kurung.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-utara' => [
                'nama' => 'Kain Ulos & Tengkuluk', 
                'warna' => '#84CC16', 
                'emoji' => 'Kain Ulos & Tengkuluk.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-utara-cewek' => [
                'nama' => 'Kain Ulos ', 
                'warna' => '#22C55E', 
                'emoji' => 'Kain Ulos.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-barat' => [
                'nama' => 'Baju Penghulu', 
                'warna' => '#84CC16', 
                'emoji' => 'Baju Penghulu.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-barat-cewek' => [
                'nama' => 'Baju Batabue ', 
                'warna' => '#22C55E', 
                'emoji' => 'Baju Batabue.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'riau' => [
                'nama' => 'Teluk Belanga', 
                'warna' => '#84CC16', 
                'emoji' => 'Teluk Belanga.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'riau-cewek' => [
                'nama' => 'Kebaya Labuh', 
                'warna' => '#22C55E', 
                'emoji' => 'Kebaya Labuh.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'kepulawan-riau' => [
                'nama' => 'Baju Kurung Cekak Musang', 
                'warna' => '#84CC16', 
                'emoji' => 'Baju Kurung Cekak Musang.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'kepulauan-riau-cewek' => [
                'nama' => 'Kebaya Labuh & Mahkota', 
                'warna' => '#22C55E', 
                'emoji' => 'Kebaya Labuh & Mahkota.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'jambi' => [
                'nama' => 'Baju Kurung Suto', 
                'warna' => '#84CC16', 
                'emoji' => 'baju kurung suto.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'jambi-cewek' => [
                'nama' => 'Baju Kurung Tangguk', 
                'warna' => '#22C55E', 
                'emoji' => 'Baju Kurung Tangguk.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'bengkulu' => [
                'nama' => 'Kain Besurek', 
                'warna' => '#84CC16', 
                'emoji' => 'Kain Besurek.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'bengkulu-cewek' => [
                'nama' => 'Baju Kurung Besurek', 
                'warna' => '#22C55E', 
                'emoji' => 'Baju Kurung Besurek.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-selatan' => [
                'nama' => 'Kesan Pakcik', 
                'warna' => '#84CC16', 
                'emoji' => 'Kesan Pakcik.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'sumatra-selatan-cewek' => [
                'nama' => 'Aesan Gede ', 
                'warna' => '#22C55E', 
                'emoji' => 'Aesan Gede.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'bangka-belitung' => [
                'nama' => 'Kupiah Resam', 
                'warna' => '#84CC16', 
                'emoji' => 'Kupiah Resam.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'bangka-belitung-cewek' => [
                'nama' => 'Paksian ', 
                'warna' => '#22C55E', 
                'emoji' => 'Paksian.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'lampung' => [
                'nama' => 'Pakaian Adat Pengantin Pria Lampung ', 
                'warna' => '#84CC16', 
                'emoji' => 'Pakaian Adat Pengantin Pria Lampung.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            'lampung-cewek' => [
                'nama' => 'Siger Lampung', 
                'warna' => '#22C55E', 
                'emoji' => 'Siger Lampung.png', 
                'harga' => 100,
                'grup' => 'Pulau Sumatera'
            ],
            
            // ================= PULAU PAPUA & Maluku =================
            'maluku-utara' => [
                'nama' => 'Manteren Lamo maluku utara', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Manteren Lamo.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'maluku-utara-cewe' => [
                'nama' => 'Kimun Gia maluku utara', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Kimun Gia.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
             'maluku' => [
                'nama' => 'Manteren Lamo maluku', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Manteren Lamo 2.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'maluku-cewe' => [
                'nama' => 'Kimun Gia maluku', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Kimun Gia 2.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-barat-daya' => [
                'nama' => 'Rok Kain Rumput Pria', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Rok Kain Rumput Pria.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-barat-daya-cewek' => [
                'nama' => 'Rok Kain Rumput cewek', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Rok Kain Rumput cewek.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-barat' => [
                'nama' => 'Baju Serat Sagu', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Baju Serat Sagu.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],'papua-barat-cewek' => [
                'nama' => 'Baju Serat Sagu', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Baju Serat Sagu 2.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua' => [
                'nama' => 'Holim', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Holim.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-cewek' => [
                'nama' => 'Rok Rumbai & Tas Noken', 
                'warna' => '#8B5CF6', 
                'emoji' => 'Rok Rumbai & Tas Noken.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-tengah' => [
                'nama' => 'marrind headres & skirt', 
                'warna' => '#8B5CF6', 
                'emoji' => 'marrind headres & skirt.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-tengah-cewek' => [
                'nama' => 'marind kain & manik', 
                'warna' => '#8B5CF6', 
                'emoji' => 'marind kain & manik.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-pegunungan' => [
                'nama' => 'southeast mimika face', 
                'warna' => '#8B5CF6', 
                'emoji' => 'southeast mimika face.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-pegunungan-cewek' => [
                'nama' => 'mimika mask ', 
                'warna' => '#8B5CF6', 
                'emoji' => 'mimika mask.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-selatan' => [
                'nama' => 'asmat onde & kembung', 
                'warna' => '#8B5CF6', 
                'emoji' => 'asmat onde & kembung.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
            ],
            'papua-selatan-cewek' => [
                'nama' => 'asmat onde & kembung cewek', 
                'warna' => '#8B5CF6', 
                'emoji' => 'asmat onde & kembung cewek.png', 
                'harga' => 100,
                'grup' => 'Maluku & Papua'
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