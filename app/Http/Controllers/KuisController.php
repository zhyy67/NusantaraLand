<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class KuisController extends Controller
{
    private function getAllQuestions(): array
    {
        return [
            'budaya-dasar' => [
                'title' => 'Kuis Budaya Nusantara (Umum)',
                'group' => 'Nusantara Umum',
                'questions' => [
                    1 => [
                        'question' => 'Apa rumah adat dari Sumatera Barat?',
                        'options' => ['Rumah Gadang', 'Joglo', 'Honai', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari Kecak berasal dari daerah mana?',
                        'options' => ['Jawa Barat', 'Bali', 'Aceh', 'Papua'],
                        'answer' => 1,
                    ],
                    3 => [
                        'question' => 'Apa nama rumah adat Papua yang terkenal?',
                        'options' => ['Tongkonan', 'Rumah Kebaya', 'Honai', 'Gadang'],
                        'answer' => 2,
                    ],
                    4 => [
                        'question' => 'Senjata tradisional khas suku Jawa yang memiliki lekukan sakral adalah?',
                        'options' => ['Keris', 'Mandau', 'Kujang', 'Rencong'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Alat musik tradisional petik dari Pulau Rote, NTT adalah?',
                        'options' => ['Sasando', 'Angklung', 'Sape', 'Tifa'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= PULAU SUMATERA =================
            'aceh' => [
                'title' => 'Kuis Budaya Aceh (Serambi Mekkah)',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional masyarakat Aceh?',
                        'options' => ['Rumah Krong Bade', 'Rumah Gadang', 'Joglo', 'Nuwo Sesat'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional Aceh yang menampilkan gerakan tepuk dada dan tangan secara cepat adalah?',
                        'options' => ['Tari Saman', 'Tari Piring', 'Tari Seudati', 'Tari Jaipong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Senjata tradisional khas masyarakat Aceh yang bentuknya menyerupai belati hias adalah?',
                        'options' => ['Rencong', 'Kujang', 'Mandau', 'Badik'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan tradisional khas Aceh yang terbuat dari mie kuning berempah kaya rasa adalah?',
                        'options' => ['Mie Aceh', 'Pempek', 'Gudeg', 'Lumpia'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kopiah tradisional khas yang biasa dikenakan kaum pria Aceh dinamakan?',
                        'options' => ['Kopiah Meukeutop', 'Blangkon', 'Songkok', 'Ikat Kepala'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sumatera-utara' => [
                'title' => 'Kuis Budaya Sumatera Utara (Batak & Melayu)',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Batak Toba di Sumatera Utara?',
                        'options' => ['Rumah Bolon', 'Rumah Gadang', 'Joglo', 'Honai'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Danau vulkanik terbesar di Asia Tenggara yang terletak di Sumatera Utara adalah Danau?',
                        'options' => ['Toba', 'Maninjau', 'Singkarak', 'Poso'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tenun tradisional khas suku Batak yang sarat makna filosofis dinamakan?',
                        'options' => ['Kain Ulos', 'Kain Tapis', 'Kain Songket', 'Kain Besurek'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Tari tradisional suku Batak Toba yang diiringi musik gondang dinamakan?',
                        'options' => ['Tari Tor-Tor', 'Tari Piring', 'Tari Kecak', 'Tari Zapin'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan khas Kota Medan yang terbuat dari olahan durian bertekstur lembut adalah?',
                        'options' => ['Bika Ambon', 'Rendang', 'Pempek', 'Lumpia'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sumatera-barat' => [
                'title' => 'Kuis Budaya Minangkabau (Sumatera Barat)',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional masyarakat Minangkabau beratap bagonjong?',
                        'options' => ['Rumah Gadang', 'Joglo', 'Honai', 'Nuwo Sesat'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kota di Sumatera Barat yang terkenal dengan ikon monumen Jam Gadang adalah?',
                        'options' => ['Bukittinggi', 'Padang', 'Payakumbuh', 'Solok'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tari tradisional Minangkabau yang penarinya menggunakan piring di tangan adalah?',
                        'options' => ['Tari Piring', 'Tari Serimpi', 'Tari Jaipong', 'Tari Kecak'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Alat musik tiup tradisional khas Minangkabau dari bambu tipis adalah?',
                        'options' => ['Saluang', 'Angklung', 'Sasando', 'Tifa'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan khas Minangkabau yang dinobatkan sebagai salah satu makanan terlezat dunia adalah?',
                        'options' => ['Rendang', 'Pempek', 'Gudeg', 'Sate Padang'],
                        'answer' => 0,
                    ],
                ]
            ],
            'riau' => [
                'title' => 'Kuis Budaya Riau (Melayu)',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional khas masyarakat Melayu Riau?',
                        'options' => ['Rumah Selaso Jatuh Timuran', 'Rumah Gadang', 'Joglo', 'Nuwo Sesat'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional penyambutan tamu terhormat di Riau yang sangat populer adalah?',
                        'options' => ['Tari Persembahan', 'Tari Piring', 'Tari Kecak', 'Tari Serimpi'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Pakaian tradisional khas Melayu Riau bagi kaum pria dinamakan?',
                        'options' => ['Baju Teluk Belanga / Cekak Musang', 'Baju Bodo', 'Baju Ulos', 'Baju Kurung'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan tradisional khas Riau berbahan dasar ikan patin berkuah kuning asam pedas adalah?',
                        'options' => ['Gulai Patin Asam Pedas', 'Pempek', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Alat musik pukul tradisional khas Melayu Riau yang biasa ditabuh dalam kesenian zapin adalah?',
                        'options' => ['Marwas dan Rebana', 'Tifa', 'Saluang', 'Sasando'],
                        'answer' => 0,
                    ],
                ]
            ],
            'kepulauan-riau' => [
                'title' => 'Kuis Budaya Kepulauan Riau',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Makanan khas Kepulauan Riau yang terbuat dari sagu bakar adalah?',
                        'options' => ['Lakse Mana / Batang Sadap', 'Pempek', 'Gudeg', 'Kerak Telor'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional khas Kepulauan Riau yang dipengaruhi budaya Melayu pesisir dinamakan?',
                        'options' => ['Tari Zapin', 'Tari Piring', 'Tari Kecak', 'Tari Serimpi'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Pulau bersejarah di Kepulauan Riau yang menjadi pusat kesusastraan Melayu klasik adalah pulau?',
                        'options' => ['Pulau Penyengat', 'Pulau Batam', 'Pulau Bintan', 'Pulau Karimun'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Kue tradisional khas Kepri yang terbuat dari tepung terigu dan gula merah dinamakan?',
                        'options' => ['Kue Batang Buruk', 'Lumpia', 'Bika Ambon', 'Getuk'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Alat musik petik tradisional Melayu Kepri yang mirip gitar kecil berdarah dua adalah?',
                        'options' => ['Gambus', 'Sasando', 'Sape', 'Saluang'],
                        'answer' => 0,
                    ],
                ]
            ],
            'jambi' => [
                'title' => 'Kuis Budaya Jambi',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Provinsi Jambi?',
                        'options' => ['Rumah Kajang Lako', 'Rumah Gadang', 'Joglo', 'Nuwo Sesat'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional penyambutan tamu agung di Jambi dinamakan?',
                        'options' => ['Tari Sekapur Sirih', 'Tari Piring', 'Tari Serimpi', 'Tari Tanggai'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tradisional khas Jambi yang memiliki motif flora dan fauna berlapis emas dinamakan?',
                        'options' => ['Kain Batik Jambi', 'Kain Ulos', 'Kain Tapis', 'Kain Songket'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Candi peninggalan sejarah Buddha terluas di Asia Tenggara yang terletak di Jambi adalah Kompleks Candi?',
                        'options' => ['Muaro Jambi', 'Borobudur', 'Prambanan', 'Plaosan'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan khas tradisional Jambi yang terbuat dari daging ikan dan santan kental berempah dinamakan?',
                        'options' => ['Gulai Terjun', 'Pempek', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                ]
            ],
            'bengkulu' => [
                'title' => 'Kuis Budaya Bengkulu',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Provinsi Bengkulu?',
                        'options' => ['Rumah Bubungan Lima', 'Rumah Gadang', 'Joglo', 'Nuwo Sesat'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kain tradisional khas Bengkulu yang ditenun dengan huruf Arab gundul (aksara Kaganga) disebut?',
                        'options' => ['Kain Besurek', 'Kain Tapis', 'Kain Ulos', 'Kain Lantung'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Bunga bangkai raksasa endemik yang pertama kali ditemukan di hutan Bengkulu dinamakan?',
                        'options' => ['Rafflesia Arnoldii', 'Amorphophallus', 'Edelweiss', 'Anggrek Hitam'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Alat musik tradisional pukul khas Bengkulu yang dimainkan saat upacara Tabut adalah?',
                        'options' => ['Dol dan Tasa', 'Tifa', 'Saluang', 'Gamelan'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan tradisional khas Bengkulu berbahan dasar ikan yang dibungkus daun talas dinamakan?',
                        'options' => ['Pendap', 'Tempoyak', 'Pempek', 'Gudeg'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sumatera-selatan' => [
                'title' => 'Kuis Budaya Sumatera Selatan (Palembang)',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional khas Sumatera Selatan berbentuk panggung?',
                        'options' => ['Rumah Limas', 'Rumah Gadang', 'Nuwo Sesat', 'Joglo'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Jembatan megah ikonik di Palembang yang melintasi Sungai Musi adalah?',
                        'options' => ['Jembatan Ampera', 'Jembatan Suramadu', 'Jembatan Barelang', 'Jembatan Pasupati'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kuliner legendaris Palembang berbahan dasar ikan dan sagu dengan kuah cuko adalah?',
                        'options' => ['Pempek', 'Rendang', 'Tempoyak', 'Tekwan'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Kain mewah tradisional asal Palembang yang ditenun dengan benang emas asli dinamakan?',
                        'options' => ['Kain Songket Palembang', 'Kain Tapis', 'Kain Ulos', 'Kain Besurek'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Tari tradisional penyambutan tamu agung di Palembang dinamakan?',
                        'options' => ['Tari Gending Sriwijaya', 'Tari Piring', 'Tari Kecak', 'Tari Jaipong'],
                        'answer' => 0,
                    ],
                ]
            ],
            'bangka-belitung' => [
                'title' => 'Kuis Budaya Bangka Belitung',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Provinsi Kepulauan Bangka Belitung?',
                        'options' => ['Rumah Rakit / Limas Mentok', 'Rumah Gadang', 'Nuwo Sesat', 'Joglo'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional Bangka Belitung untuk menyambut panen lada dinamakan?',
                        'options' => ['Tari Campak', 'Tari Piring', 'Tari Serimpi', 'Tari Tanggai'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Makanan tradisional mie kuning dengan kuah kaldu udang yang populer di Babel adalah?',
                        'options' => ['Mie Belitung', 'Lumpia', 'Pempek', 'Soto Betawi'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Kesenian musik tradisional perpaduan akordion dan pantun khas Babel dinamakan?',
                        'options' => ['Dambus', 'Gamelan', 'Tifa', 'Saluang'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Minuman khas tradisional racikan kopi unik di Bangka Belitung dinamakan?',
                        'options' => ['Kopi Phin Tiam / Kopi Tungku', 'Teh Tarik', 'Bandrek', 'Bajigur'],
                        'answer' => 0,
                    ],
                ]
            ],
            'lampung' => [
                'title' => 'Kuis Budaya Lampung',
                'group' => 'Pulau Sumatera',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional masyarakat Lampung yang berbentuk panggung?',
                        'options' => ['Nuwo Sesat', 'Rumah Gadang', 'Joglo', 'Honai'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kain tradisional khas Lampung yang ditenun dengan sulaman benang emas disebut?',
                        'options' => ['Kain Tapis', 'Ulos', 'Songket', 'Tenun Ikat'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Senjata tradisional khas masyarakat Lampung yang mirip badik hias adalah?',
                        'options' => ['Terapang / Keris Lampung', 'Chunduk', 'Kujang', 'Mandau'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Tari tradisional penyambutan tamu agung di Lampung yang sangat terkenal adalah?',
                        'options' => ['Tari Sigeh Pengunten', 'Tari Piring', 'Tari Kecak', 'Tari Jaipong'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Apa nama makanan tradisional khas Lampung dari durian yang difermentasikan?',
                        'options' => ['Tempoyak', 'Pempek', 'Gudeg', 'Kerak Telor'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= PULAU JAWA =================
            'dki-jakarta' => [
                'title' => 'Kuis Budaya DKI Jakarta (Betawi)',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama kesenian teater tradisional khas Betawi yang memadukan komedi dan musik?',
                        'options' => ['Lenong', 'Ludruk', 'Ketoprak', 'Wayang Orang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Boneka raksasa berangka kayu yang menjadi ikon perayaan HUT Kota Jakarta disebut?',
                        'options' => ['Ondel-ondel', 'Barong', 'Hudoq', 'Sigale Gale'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Apa nama makanan tradisional Betawi dari beras ketan, telur, dan ebi sangrai?',
                        'options' => ['Kerak Telor', 'Soto Betawi', 'Asinan Betawi', 'Gado-gado'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Pakaian adat pengantin pria Betawi memperlihatkan perpaduan budaya Tionghoa dan budaya?',
                        'options' => ['Arab', 'Eropa', 'India', 'Jepang'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Senjata tradisional masyarakat Betawi yang sering diselipkan di pinggang adalah?',
                        'options' => ['Golok', 'Badik', 'Kujang', 'Rencong'],
                        'answer' => 0,
                    ],
                ]
            ],
            'jawa-barat' => [
                'title' => 'Kuis Budaya Jawa Barat (Pasundan)',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Apa alat musik tradisional khas Jawa Barat yang terbuat dari tabung bambu dan digoyangkan?',
                        'options' => ['Angklung', 'Sasando', 'Tifa', 'Saluang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Apa nama senjata tradisional masyarakat Sunda di Jawa Barat yang bentuknya melengkung?',
                        'options' => ['Kujang', 'Keris', 'Mandau', 'Rencong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tari tradisional asal Jawa Barat yang menceritakan kegemasan menyambut panen padi adalah?',
                        'options' => ['Tari Jaipong', 'Tari Merak', 'Tari Topeng Cirebon', 'Tari Ketuk Tilu'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Rumah adat panggung Sunda tradisional di Jawa Barat dinamakan?',
                        'options' => ['Badak Heuay / Julang Ngapak', 'Joglo', 'Honai', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kesenian teater boneka kayu tradisional khas masyarakat Sunda dinamakan?',
                        'options' => ['Wayang Golek', 'Wayang Kulit', 'Lenong', 'Ketoprak'],
                        'answer' => 0,
                    ],
                ]
            ],
            'banten' => [
                'title' => 'Kuis Budaya Banten',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Kesenian ekstrem khas Banten yang mempertunjukkan kekebalan tubuh terhadap senjata tajam adalah?',
                        'options' => ['Debus', 'Reog', 'Kuda Lumping', 'Jaran Kepang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Apa nama rumah adat tradisional dari suku Baduy di Banten?',
                        'options' => ['Sulah Nyanda', 'Joglo', 'Rumah Gadang', 'Honai'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kesenian bela diri tradisional Banten yang menampilkan ketangkasan memukul dengan rotan adalah?',
                        'options' => ['Pencak Silat Bandrong', 'Tarung Derajat', 'Cimande', 'Merpati Putih'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan khas Banten yang terbuat dari bahan dasar emping melinjo berasal dari daerah?',
                        'options' => ['Menes (Pandeglang)', 'Serang', 'Cilegon', 'Rangkasbitung'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Senjata tradisional khas Banten berupa parang golok berukir indah dinamakan?',
                        'options' => ['Golok Ciomas', 'Kujang', 'Mandau', 'Badik'],
                        'answer' => 0,
                    ],
                ]
            ],
            'jawa-tengah' => [
                'title' => 'Kuis Budaya Jawa Tengah (Matraman)',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Jawa Tengah?',
                        'options' => ['Joglo', 'Rumah Gadang', 'Honai', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Alat musik tradisional berupa seperangkat instrumen perkusi gamelan Jawa disebut?',
                        'options' => ['Gamelan', 'Sasando', 'Angklung', 'Tifa'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tari tradisional asal Jawa Tengah yang menggambarkan kelembutan para putri keraton adalah?',
                        'options' => ['Tari Serimpi', 'Tari Kecak', 'Tari Piring', 'Tari Pakarena'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Senjata tradisional khas masyarakat Jawa berupa tikam berlekuk yang sakral adalah?',
                        'options' => ['Keris', 'Mandau', 'Rencong', 'Badik'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan khas Kota Semarang di Jawa Tengah yang terbuat dari rebung adalah?',
                        'options' => ['Lumpia', 'Gudeg', 'Rendang', 'Coto Makassar'],
                        'answer' => 0,
                    ],
                ]
            ],
            'daerah-istimewa-yogyakarta' => [
                'title' => 'Kuis Budaya Daerah Istimewa Yogyakarta',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama makanan khas Yogyakarta yang terbuat dari nangka muda?',
                        'options' => ['Gudeg', 'Lumpia', 'Rawon', 'Pempek'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional klasik asal Yogyakarta yang dibawakan oleh kaum pria bergerak gagah adalah?',
                        'options' => ['Tari Golek Menak', 'Tari Serimpi', 'Tari Bondan', 'Tari Wireng'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Apa nama bangunan istana tempat tinggal resmi Sultan Yogyakarta?',
                        'options' => ['Keraton Ngayogyakarta Hadiningrat', 'Istana Negara', 'Pura Mangkunegaran', 'Istana Bogor'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Alat musik tradisional tiup dari bambu yang khas dari daerah Yogyakarta dan sekitarnya adalah?',
                        'options' => ['Suling', 'Saluang', 'Angklung', 'Sasando'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kain tradisional khas Yogyakarta yang terkenal dengan pola Mataraman filosofis adalah?',
                        'options' => ['Batik Yogyakarta', 'Ulos', 'Tenun Ikat', 'Songket'],
                        'answer' => 0,
                    ],
                ]
            ],
            'jawa-timur' => [
                'title' => 'Kuis Budaya Jawa Timur (Arek & Madura)',
                'group' => 'Pulau Jawa',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama tarian tradisional topeng khas dari Malang, Jawa Timur?',
                        'options' => ['Tari Topeng Malangan', 'Tari Bali', 'Tari Jaipong', 'Tari Serimpi'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Makanan khas Surabaya berbahan daging sapi dengan kuah hitam kluwek adalah?',
                        'options' => ['Rawon', 'Soto Lamongan', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tradisi perlombaan pacuan sapi yang sangat terkenal di Pulau Madura, Jatim, dinamakan?',
                        'options' => ['Karapan Sapi', 'Sapi Sonok', 'Pacuan Kuda', 'Jaran Kepang'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Senjata tradisional khas masyarakat Madura yang berbentuk melengkung tajam adalah?',
                        'options' => ['Celurit', 'Kujang', 'Keris', 'Mandau'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Reog adalah kesenian tradisional megah bertopeng singa barong yang berasal dari kota?',
                        'options' => ['Ponorogo', 'Madiun', 'Kediri', 'Blitar'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= BALI & NUSA TENGGARA =================
            'bali' => [
                'title' => 'Kuis Budaya Bali (Pulau Dewata)',
                'group' => 'Bali & Nusa Tenggara',
                'questions' => [
                    1 => [
                        'question' => 'Apa bentuk arsitektur pintu gerbang tradisional khas dari Bali?',
                        'options' => ['Candi Bentar', 'Joglo', 'Rumah Gadang', 'Honai'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional Bali yang menceritakan kisah Ramayana dengan suara koor "cak" adalah?',
                        'options' => ['Tari Kecak', 'Tari Pendet', 'Tari Legong', 'Tari Barong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Senjata tradisional khas masyarakat Bali yang sakral dan bermata dua dinamakan?',
                        'options' => ['Tombak / Keris Bali', 'Kujang', 'Mandau', 'Badik'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan tradisional khas Bali berupa ayam atau bebek berbumbu rempah lengkap disebut?',
                        'options' => ['Ayam Betutu', 'Gudeg', 'Rendang', 'Pempek'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Pusat seni dan budaya tradisional terkemuka di Bali yang terkenal dengan monkey forest-nya adalah?',
                        'options' => ['Ubud', 'Kuta', 'Seminyak', 'Sanur'],
                        'answer' => 0,
                    ],
                ]
            ],
            'nusa-tenggara-barat' => [
                'title' => 'Kuis Budaya Nusa Tenggara Barat (Lombok & Sumbawa)',
                'group' => 'Bali & Nusa Tenggara',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Sasak di Lombok, NTB?',
                        'options' => ['Bale Tani / Bale Lombok', 'Joglo', 'Honai', 'Rumah Gadang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kesenian bela diri tradisional menggunakan rotan dan perisai kulit di Lombok dinamakan?',
                        'options' => ['Peresean', 'Debus', 'Pencak Silat', 'Tarung Derajat'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tenun tradisional khas buatan tangan wanita suku Sasak di Lombok dinamakan?',
                        'options' => ['Tenun Ikat Sasak / Songket Lombok', 'Kain Ulos', 'Kain Tapis', 'Kain Besurek'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan tradisional khas Lombok yang memiliki cita rasa sangat pedas dinamakan?',
                        'options' => ['Ayam Taliwang', 'Rendang', 'Gudeg', 'Pempek'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Gunung berapi tertinggi dan terkenal di Pulau Lombok, NTB, adalah Gunung?',
                        'options' => ['Rinjani', 'Agung', 'Semeru', 'Merapi'],
                        'answer' => 0,
                    ],
                ]
            ],
            'nusa-tenggara-timur' => [
                'title' => 'Kuis Budaya Nusa Tenggara Timur (Flores, Sumba, Timor)',
                'group' => 'Bali & Nusa Tenggara',
                'questions' => [
                    1 => [
                        'question' => 'Alat musik tradisional petik berdawai khas dari Pulau Rote, NTT, adalah?',
                        'options' => ['Sasando', 'Angklung', 'Sape', 'Tifa'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Apa nama rumah adat tradisional Manggarai di Flores, NTT, yang berbentuk kerucut besar?',
                        'options' => ['Mbaru Niang', 'Honai', 'Joglo', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tenun ikat tradisional khas masyarakat Sumba di NTT terkenal dengan motif?',
                        'options' => ['Kuda dan Hewan / Nyiur', 'Batik Mataraman', 'Ulos Batak', 'Songket Emas'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Pulau di NTT yang terkenal sebagai habitat asli hewan purba Komodo adalah Pulau?',
                        'options' => ['Komodo & Rinca', 'Bali', 'Lombok', 'Alor'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Tari tradisional perang massal khas masyarakat Manggarai di NTT dinamakan?',
                        'options' => ['Tari Caci', 'Tari Kecak', 'Tari Piring', 'Tari Saman'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= PULAU KALIMANTAN =================
            'kalimantan-barat' => [
                'title' => 'Kuis Budaya Kalimantan Barat',
                'group' => 'Pulau Kalimantan',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat panggung panjang khas suku Dayak di Kalimantan Barat?',
                        'options' => ['Rumah Radakng', 'Rumah Betang', 'Rumah Lamin', 'Rumah Banjar'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Alat musik tradisional petik khas suku Dayak Kalimantan Barat dinamakan?',
                        'options' => ['Sape', 'Tifa', 'Angklung', 'Sasando'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tari tradisional Kalimantan Barat yang menggambarkan kegembiraan menyambut tamu agung adalah?',
                        'options' => ['Tari Monong', 'Tari Mandau', 'Tari Gong', 'Tari Pingan'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Kota di Kalbar yang dilintasi garis khatulistiwa dan memiliki Monumen Tugu Khatulistiwa adalah?',
                        'options' => ['Pontianak', 'Singkawang', 'Ketapang', 'Sintang'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kain tenun khas suku Dayak di Kalimantan Barat dinamakan kain?',
                        'options' => ['Tenun Ikat Dayak', 'Kain Ulos', 'Kain Songket', 'Kain Tapis'],
                        'answer' => 0,
                    ],
                ]
            ],
            'kalimantan-tengah' => [
                'title' => 'Kuis Budaya Kalimantan Tengah',
                'group' => 'Pulau Kalimantan',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat panggung besar di Kalimantan Tengah tempat tinggal komunal suku Dayak?',
                        'options' => ['Rumah Betang', 'Rumah Lamin', 'Rumah Bubungan Tinggi', 'Rumah Honai'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Senjata tradisional tiup beracun yang digunakan masyarakat Dayak untuk berburu dinamakan?',
                        'options' => ['Sumpit / Sipet', 'Mandau', 'Celurit', 'Golok'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tenun tradisional khas masyarakat Dayak Ngaju di Kalteng dinamakan?',
                        'options' => ['Tenun Benang Bintik', 'Kain Sasirangan', 'Kain Tapis', 'Kain Ulos'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan khas Kalimantan Tengah berupa tumisan umbut rotan muda dinamakan?',
                        'options' => ['Juhu Singkah', 'Tempoyak', 'Pendap', 'Gudeg'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Ibu kota Provinsi Kalimantan Tengah saat ini adalah kota?',
                        'options' => ['Palangka Raya', 'Sampit', 'Pangkalan Bun', 'Buntok'],
                        'answer' => 0,
                    ],
                ]
            ],
            'kalimantan-selatan' => [
                'title' => 'Kuis Budaya Kalimantan Selatan (Banjar)',
                'group' => 'Pulau Kalimantan',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional masyarakat Banjar di Kalimantan Selatan?',
                        'options' => ['Rumah Bubungan Tinggi', 'Rumah Lamin', 'Rumah Radakng', 'Rumah Betang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Pasar tradisional unik di atas sungai dengan perahu di Kalimantan Selatan adalah?',
                        'options' => ['Pasar Terapung (Lok Baintan)', 'Pasar Kaget', 'Pasar Beringharjo', 'Pasar Gede'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Seni pertunjukan teater tradisional khas masyarakat Banjar Kalsel dinamakan?',
                        'options' => ['Mamanda', 'Lenong', 'Ludruk', 'Ketoprak'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan khas Banjarmasin berkuah gurih bersantan dan berisikan ketupat adalah?',
                        'options' => ['Soto Banjar', 'Soto Betawi', 'Soto Lamongan', 'Coto Makassar'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kain tradisional khas Banjar yang dibuat dengan teknik rintik jelujur dinamakan kain?',
                        'options' => ['Kain Sasirangan', 'Kain Batik', 'Kain Tenun Ikat', 'Kain Besurek'],
                        'answer' => 0,
                    ],
                ]
            ],
            'kalimantan-timur' => [
                'title' => 'Kuis Budaya Kalimantan Timur',
                'group' => 'Pulau Kalimantan',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional khas suku Dayak di Kalimantan Timur?',
                        'options' => ['Rumah Lamin', 'Rumah Bubungan Tinggi', 'Rumah Banjar', 'Rumah Gadang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Senjata tradisional khas suku Dayak berupa bilah besi berukir dan berbulu adalah?',
                        'options' => ['Mandau', 'Kujang', 'Keris', 'Rencong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Upacara adat besar tahunan suku Dayak di Kaltim sebagai tanda syukur panen adalah?',
                        'options' => ['Upacara Erau', 'Ngaben', 'Kasada', 'Sekaten'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Tari ritual tradisional suku Dayak di Kaltim yang menggunakan topeng kayu unik dinamakan?',
                        'options' => ['Tari Hudoq', 'Tari Reog', 'Tari Barong', 'Tari Kecak'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Kawasan Ibu Kota Nusantara (IKN) baru saat ini secara administratif terletak di wilayah Provinsi?',
                        'options' => ['Kalimantan Timur', 'Kalimantan Selatan', 'Kalimantan Tengah', 'Kalimantan Barat'],
                        'answer' => 0,
                    ],
                ]
            ],
            'kalimantan-utara' => [
                'title' => 'Kuis Budaya Kalimantan Utara',
                'group' => 'Pulau Kalimantan',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Tidung di Kalimantan Utara?',
                        'options' => ['Rumah Baloy', 'Rumah Lamin', 'Rumah Betang', 'Rumah Gadang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Ibu kota Provinsi Kalimantan Utara adalah kota?',
                        'options' => ['Tanjung Selor', 'Tarakan', 'Nunukan', 'Malinau'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Makanan khas tradisional masyarakat Kalimantan Utara yang terbuat dari sagu dinamakan?',
                        'options' => ['Sambucca / Nasi Udang', 'Gudeg', 'Pempek', 'Rendang'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Tari tradisional penyambutan tamu di wilayah pesisir Kaltara dinamakan?',
                        'options' => ['Tari Jepen', 'Tari Piring', 'Tari Kecak', 'Tari Saman'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Alat musik petik tradisional yang juga populer di kalangan masyarakat perbatasan Kaltara adalah?',
                        'options' => ['Sape', 'Sasando', 'Angklung', 'Tifa'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= PULAU SULAWESI =================
            'sulawesi-utara' => [
                'title' => 'Kuis Budaya Sulawesi Utara (Minahasa)',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Minahasa, Sulawesi Utara?',
                        'options' => ['Rumah Pewaris / Walewangko', 'Tongkonan', 'Dulohupa', 'Boyang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari perang tradisional khas masyarakat Minahasa, Sulut, dinamakan?',
                        'options' => ['Tari Kabasaran', 'Tari Kecak', 'Tari Piring', 'Tari Pakarena'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Makanan khas Manado di Sulawesi Utara yang terkenal sangat pedas berempah adalah?',
                        'options' => ['Bubur Manado (Tinutuan)', 'Gudeg', 'Pempek', 'Rendang'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Taman laut nasional di Sulawesi Utara yang menjadi surga penyelam dunia adalah?',
                        'options' => ['Taman Laut Bunaken', 'Raja Ampat', 'Wakatobi', 'Karimunjawa'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Alat musik pukul tradisional bambu khas Minahasa yang dimainkan beramai-ramai adalah?',
                        'options' => ['Kolintang', 'Angklung', 'Sasando', 'Tifa'],
                        'answer' => 0,
                    ],
                ]
            ],
            'gorontalo' => [
                'title' => 'Kuis Budaya Gorontalo',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Provinsi Gorontalo?',
                        'options' => ['Rumah Dulohupa', 'Rumah Pewaris', 'Tongkonan', 'Boyang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Makanan tradisional khas Gorontalo berbahan dasar jagung halus adalah?',
                        'options' => ['Binte Biluhuta / Milu Siram', 'Gudeg', 'Pempek', 'Rendang'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Kain tenun tradisional khas Gorontalo yang disulam benang emas dinamakan?',
                        'options' => ['Kain Karawo', 'Kain Ulos', 'Kain Tapis', 'Kain Songket'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Tari tradisional penyambutan adat di Gorontalo dinamakan?',
                        'options' => ['Tari Saronde', 'Tari Pakarena', 'Tari Piring', 'Tari Saman'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Provinsi Gorontalo merupakan pemekaran dari provinsi induk yaitu?',
                        'options' => ['Sulawesi Utara', 'Sulawesi Selatan', 'Sulawesi Tengah', 'Sulawesi Tenggara'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sulawesi-tengah' => [
                'title' => 'Kuis Budaya Sulawesi Tengah (Palu)',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Kaili di Sulawesi Tengah?',
                        'options' => ['Rumah Tambi', 'Tongkonan', 'Dulohupa', 'Boyang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional penyambutan di Sulawesi Tengah dinamakan?',
                        'options' => ['Tari Lumense', 'Tari Pakarena', 'Tari Piring', 'Tari Saman'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Lembah bersejarah di Sulawesi Tengah yang terkenal sebagai situs megalitikum purba adalah Lembah?',
                        'options' => ['Lembah Bada', 'Lembah Baliem', 'Lembah Harau', 'Lembah Anai'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan khas Palu yang terbuat dari olahan ikan dan mangga muda dinamakan?',
                        'options' => ['Kaledo / Sup Ikan Jantung Pisang', 'Pempek', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Ibu kota Provinsi Sulawesi Tengah adalah kota?',
                        'options' => ['Palu', 'Poso', 'Tolitoli', 'Luuk'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sulawesi-barat' => [
                'title' => 'Kuis Budaya Sulawesi Barat (Mandar)',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Mandar di Sulawesi Barat?',
                        'options' => ['Rumah Boyang', 'Tongkonan', 'Tambi', 'Dulohupa'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kain tenun tradisional khas suku Mandar di Sulbar dinamakan?',
                        'options' => ['Tenun SaBe Mandar', 'Ulos', 'Tapis', 'Songket'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Ibu kota Provinsi Sulawesi Barat adalah kota?',
                        'options' => ['Mamuju', 'Majene', 'Polewali', 'Mandar'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Perahu layar tradisional cepat khas pelaut suku Mandar dinamakan?',
                        'options' => ['Sandeq', 'Pinisi', 'Jong', 'Cadik'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan tradisional khas Mandar berbahan dasar ikan dan mangga parut adalah?',
                        'options' => ['Bau Peapi', 'Pempek', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sulawesi-selatan' => [
                'title' => 'Kuis Budaya Sulawesi Selatan (Bugis & Toraja)',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat suku Toraja di Sulawesi Selatan yang atapnya melengkung?',
                        'options' => ['Tongkonan', 'Rumah Boyang', 'Rumah Souraja', 'Rumah Dulohupa'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Kapal layar kayu tradisional megah buatan suku Bugis di Bulukumba adalah?',
                        'options' => ['Kapal Pinisi', 'Kapal Lancang Kuning', 'Kapal Jong', 'Kapal Cadik'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Makanan khas Kota Makassar berbahan daging sapi berkuah hitam kluwek adalah?',
                        'options' => ['Coto Makassar', 'Pallubasa', 'Sop Konro', 'Soto Banjar'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Benteng peninggalan kerajaan Gowa di Makassar yang berbentuk kura-kura adalah?',
                        'options' => ['Fort Rotterdam', 'Fort Marlborough', 'Benteng Du Bus', 'Benteng Vastenburg'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Tari tradisional Sulawesi Selatan yang penarinya membawakan kipas dengan lembut adalah?',
                        'options' => ['Tari Pakarena', 'Tari Magellu', 'Tari Paduppa', 'Tari Pagellu'],
                        'answer' => 0,
                    ],
                ]
            ],
            'sulawesi-tenggara' => [
                'title' => 'Kuis Budaya Sulawesi Tenggara',
                'group' => 'Pulau Sulawesi',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional suku Tolaki di Sulawesi Tenggara?',
                        'options' => ['Istana Malige / Laika', 'Tongkonan', 'Tambi', 'Boyang'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional massal penolak bala di Sulawesi Tenggara dinamakan?',
                        'options' => ['Tari Lulo', 'Tari Pakarena', 'Tari Piring', 'Tari Kecak'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Ibu kota Provinsi Sulawesi Tenggara adalah kota?',
                        'options' => ['Kendari', 'Baubau', 'Kolaka', 'Wakatobi'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Kawasan kepulauan konservasi taman nasional bawah laut terkenal di Sultra adalah?',
                        'options' => ['Wakatobi', 'Bunaken', 'Raja Ampat', 'Komodo'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan tradisional khas masyarakat Buton di Sultra dinamakan?',
                        'options' => ['Kasuami', 'Pempek', 'Gudeg', 'Rendang'],
                        'answer' => 0,
                    ],
                ]
            ],

            // ================= MALUKU & PAPUA =================
            'maluku' => [
                'title' => 'Kuis Budaya Maluku (Kepulauan Rempah)',
                'group' => 'Maluku & Papua',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional dari Provinsi Maluku?',
                        'options' => ['Rumah Baileo', 'Honai', 'Joglo', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Alat musik tradisional pukul dari Maluku dinamakan?',
                        'options' => ['Tifa', 'Saluang', 'Sasando', 'Angklung'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Tari perang tradisional energik khas masyarakat Maluku dinamakan?',
                        'options' => ['Tari Cakalele', 'Tari Kecak', 'Tari Piring', 'Tari Saman'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Makanan pokok tradisional Maluku yang terbuat dari olahan sagu adalah?',
                        'options' => ['Papeda', 'Nasi Goreng', 'Gudeg', 'Pempek'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Ibu kota Provinsi Maluku yang berada di Pulau Ambon adalah kota?',
                        'options' => ['Ambon', 'Tual', 'Masohi', 'Saumlaki'],
                        'answer' => 0,
                    ],
                ]
            ],
            'maluku-utara' => [
                'title' => 'Kuis Budaya Maluku Utara',
                'group' => 'Maluku & Papua',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional berbentuk segi delapan dari Maluku Utara?',
                        'options' => ['Rumah Sasadu', 'Baileo', 'Honai', 'Joglo'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional penyambutan kesultanan di Maluku Utara dinamakan?',
                        'options' => ['Tari Soya-Soya', 'Tari Cakalele', 'Tari Piring', 'Tari Lenso'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Ibu kota Provinsi Maluku Utara saat ini dipusatkan di kota?',
                        'options' => ['Sofifi / Ternate', 'Ambon', 'Tidore', 'Jailolo'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Rempa-rempah utama dunia penghasil pala dan cengkeh di Maluku Utara berada di Kepulauan?',
                        'options' => ['Kepulauan Banda / Halmahera', 'Raja Ampat', 'Mentawai', 'Natuna'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Makanan tradisional khas Maluku Utara berbahan dasar sagu dan ikan dinamakan?',
                        'options' => ['Gohu Ikan', 'Pempek', 'Rendang', 'Gudeg'],
                        'answer' => 0,
                    ],
                ]
            ],
            'papua' => [
                'title' => 'Kuis Budaya Papua',
                'group' => 'Maluku & Papua',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional bentuk bundar atap jerami di Papua?',
                        'options' => ['Honai', 'Rumah Gadang', 'Joglo', 'Tongkonan'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Senjata tradisional berburu berupa busur dan anak panah khas Papua dinamakan?',
                        'options' => ['Busur dan Panah', 'Mandau', 'Kujang', 'Rencong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Makanan pokok tradisional khas masyarakat adat Papua yang terbuat dari sagu adalah?',
                        'options' => ['Papeda', 'Nasi Merah', 'Gudeg', 'Pempek'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Noken adalah tas tradisional multifungsi khas Papua yang diakui UNESCO sebagai?',
                        'options' => ['Warisan Budaya Takbenda', 'Senjata Pusaka', 'Pakaian Adat', 'Alat Musik'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Tari tradisional perayaan gembira khas masyarakat adat di Papua dinamakan?',
                        'options' => ['Tari Sajojo', 'Tari Kecak', 'Tari Piring', 'Tari Jaipong'],
                        'answer' => 0,
                    ],
                ]
            ],
            'papua-barat' => [
                'title' => 'Kuis Budaya Papua Barat',
                'group' => 'Maluku & Papua',
                'questions' => [
                    1 => [
                        'question' => 'Apa nama rumah adat tradisional panggung di wilayah Papua Barat?',
                        'options' => ['Rumah Kaki Seribu', 'Honai', 'Baileo', 'Joglo'],
                        'answer' => 0,
                    ],
                    2 => [
                        'question' => 'Tari tradisional khas masyarakat adat di Papua Barat dinamakan?',
                        'options' => ['Tari Musyoh', 'Tari Kecak', 'Tari Piring', 'Tari Jaipong'],
                        'answer' => 0,
                    ],
                    3 => [
                        'question' => 'Ibu kota Provinsi Papua Barat adalah kota?',
                        'options' => ['Manokwari', 'Sorong', 'Fakfak', 'Kaimana'],
                        'answer' => 0,
                    ],
                    4 => [
                        'question' => 'Surga bawah laut dunia yang terkenal dengan keindahan gugusan pulau karangnya di Papua Barat adalah?',
                        'options' => ['Raja Ampat', 'Bunaken', 'Wakatobi', 'Anambas'],
                        'answer' => 0,
                    ],
                    5 => [
                        'question' => 'Burung endemik kebanggaan tanah Papua yang terkenal dengan bulunya indah memesona adalah?',
                        'options' => ['Burung Cendrawasih', 'Burung Merak', 'Burung Kasuari', 'Burung Nuri'],
                        'answer' => 0,
                    ],
                ]
            ]
        ];
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $allQuizzes = $this->getAllQuestions();

        $quizKey = $request->query('daerah', 'budaya-dasar');

        if (!array_key_exists($quizKey, $allQuizzes)) {
            $quizKey = 'budaya-dasar';
        }

        $currentQuiz = $allQuizzes[$quizKey];
        $safeQuestions = $currentQuiz['questions'] ?? [];

        $alreadyCompleted = DB::table('quiz_attempts')
            ->where('user_id', $user->id)
            ->where('quiz_key', $quizKey)
            ->exists();

        $groupedQuestions = [];
        foreach ($allQuizzes as $key => $quiz) {
            $group = $quiz['group'] ?? 'Lainnya';
            $groupedQuestions[$group][$key] = $quiz;
        }

        return view('kuis', compact(
            'safeQuestions',
            'alreadyCompleted',
            'user',
            'quizKey',
            'currentQuiz',
            'groupedQuestions'
        ));
    }

    public function submit(Request $request)
    {
        $quizKey = $request->input('quiz_key', 'budaya-dasar');
        $allQuizzes = $this->getAllQuestions();
        
        if (!array_key_exists($quizKey, $allQuizzes)) {
            return redirect()->route('kuis.index');
        }

        $questions = $allQuizzes[$quizKey]['questions'];
        $totalQuestions = count($questions);

        $request->validate([
            'answers'   => ['required', 'array', "size:{$totalQuestions}"],
            'answers.*' => ['required', 'integer', 'min:0', 'max:3'],
            'quiz_key'  => ['required', 'string'],
        ]);

        $answers = $request->input('answers');
        $user = Auth::user();

        $correct = 0;
        foreach ($questions as $id => $question) {
            if (!array_key_exists($id, $answers) || (int) $answers[$id] !== $question['answer']) {
                continue;
            }
            $correct++;
        }

        $earned = $correct * 10;

        try {
            DB::transaction(function () use ($user, $quizKey, $earned, $correct) {
                $alreadyCompleted = DB::table('quiz_attempts')
                    ->where('user_id', $user->id)
                    ->where('quiz_key', $quizKey)
                    ->exists();

                if ($alreadyCompleted) {
                    throw new \RuntimeException('Kamu sudah menyelesaikan kuis daerah ini.');
                }

                DB::table('quiz_attempts')->insert([
                    'user_id' => $user->id,
                    'quiz_key' => $quizKey,
                    'score' => $earned,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $player = User::where('id', $user->id)->lockForUpdate()->firstOrFail();
                $player->points += $earned;
                $player->level = intdiv($player->points, 100) + 1;

                // =======================================================
                // LOGIKA HADIAH KOSTUM
                // =======================================================
                $currentStyles = $player->avatar_style ?? 'default';
                $stylesArray = explode(',', $currentStyles);
                
                if (!in_array($quizKey, $stylesArray)) {
                    $stylesArray[] = $quizKey;
                    $player->avatar_style = implode(',', array_filter($stylesArray));
                }
                // =======================================================

                $player->save();
            });
        } catch (\RuntimeException $e) {
            return redirect()->route('kuis.index', ['daerah' => $quizKey])->with('info', $e->getMessage());
        }

        // =======================================================
        // REDIRECT DENGAN NOTIFIKASI HADIAH
        // =======================================================
        return redirect()->route('kuis.index', ['daerah' => $quizKey])->with('result', [
            'correct' => $correct,
            'earned' => $earned,
            'reward' => $allQuizzes[$quizKey]['title'] ?? 'Kostum Budaya', // <-- TAMBAHAN HADIAH
        ]);
    }
}