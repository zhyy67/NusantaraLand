<!-- Card Container Peta -->
<div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col scroll-mt-24">
    
    <!-- Header Peta -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-4">
        <div class="flex items-center gap-3">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                <i class="fas fa-map-marked-alt text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800">Peta Budaya Nusantara</h2>
                <p class="text-xs text-gray-500">Klik provinsi pada peta untuk melihat informasi budaya.</p>
            </div>
        </div>
    </div>

    <!-- Container Peta -->
    <div id="map-dashboard" style="height: 450px; width: 100%; border-radius: 16px; z-index: 1;" class="bg-gray-100 border border-gray-200"></div>

    <!-- Info Box (Tersembunyi by default, muncul saat peta diklik) -->
    <div id="info-budaya" class="mt-4 p-5 bg-green-50 rounded-xl border border-green-200 hidden">
        <div class="flex justify-between items-start">
            <div>
                <span class="text-[10px] font-bold text-green-600 uppercase tracking-widest">Profil Budaya Daerah</span>
                <h4 class="font-bold text-green-900 text-xl mt-1" id="nama-provinsi">Pilih Provinsi</h4>
            </div>
            <button onclick="document.getElementById('info-budaya').classList.add('hidden')" class="text-green-600 hover:text-green-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div class="bg-white p-3 rounded-lg border border-green-100 shadow-sm">
                <span class="text-xs text-gray-500"><i class="fas fa-home text-orange-500 mr-1"></i> Rumah Adat</span>
                <p class="font-bold text-gray-800 text-sm mt-1" id="rumah-adat">-</p>
            </div>
            <div class="bg-white p-3 rounded-lg border border-green-100 shadow-sm">
                <span class="text-xs text-gray-500"><i class="fas fa-mask text-red-500 mr-1"></i> Tarian Daerah</span>
                <p class="font-bold text-gray-800 text-sm mt-1" id="tarian">-</p>
            </div>
            <div class="bg-white p-3 rounded-lg border border-green-100 shadow-sm">
                <span class="text-xs text-gray-500"><i class="fas fa-utensils text-yellow-500 mr-1"></i> Makanan Khas</span>
                <p class="font-bold text-gray-800 text-sm mt-1" id="makanan">-</p>
            </div>
            <div class="bg-white p-3 rounded-lg border border-green-100 shadow-sm">
                <span class="text-xs text-gray-500"><i class="fas fa-tshirt text-blue-500 mr-1"></i> Pakaian Adat</span>
                <p class="font-bold text-gray-800 text-sm mt-1" id="pakaian">-</p>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    /* Kustomisasi Popup Leaflet agar senada dengan Tailwind */
    .leaflet-popup-content-wrapper {
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .leaflet-popup-content {
        margin: 16px;
        font-family: inherit;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Inisialisasi Peta (Titik tengah Indonesia)
        var map = L.map('map-dashboard').setView([-2.548926, 118.0148634], 5);

        // 2. Gunakan Tile Layer tema terang agar menyatu dengan background putih card
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap &copy; CARTO',
            subdomains: 'abcd',
            maxZoom: 19
        }).addTo(map);

        // 3. SOLUSI PETA ABU-ABU DI DALAM GRID DASHBOARD
        setTimeout(function(){ map.invalidateSize(); }, 400);

        // 4. Data Dummy (Sebagai contoh interaksi)
        // Nanti kamu bisa menggantinya dengan memanggil data dari Controller Laravel via Fetch/AJAX atau GeoJSON
        var dataProvinsi = {
            "Kalimantan Utara": { lat: 3.0731, lng: 116.0414, rumah: "Rumah Baloy", tarian: "Tari Kancet Ledo", makanan: "Kue Cincin", pakaian: "Ta'a" },
            "Jawa Barat": { lat: -6.9147, lng: 107.6098, rumah: "Rumah Kasepuhan", tarian: "Tari Jaipong", makanan: "Batagor", pakaian: "Kebaya" },
            "Papua": { lat: -4.2699, lng: 138.0803, rumah: "Honai", tarian: "Tari Sajojo", makanan: "Papeda", pakaian: "Koteka" }
        };

        // 5. Looping Marker (Nanti ini bisa diganti GeoJSON Polygon jika ingin bentuk peta asli)
        Object.keys(dataProvinsi).forEach(function(namaProv) {
            var data = dataProvinsi[namaProv];
            
            // Buat marker
            var marker = L.circleMarker([data.lat, data.lng], {
                radius: 8,
                fillColor: "#16a34a", // Warna hijau Tailwind
                color: "#ffffff",
                weight: 2,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(map);

            // Event saat marker diklik
            marker.on('click', function() {
                // Tampilkan kotak info
                document.getElementById('info-budaya').classList.remove('hidden');
                
                // Isi data ke dalam kotak info
                document.getElementById('nama-provinsi').innerText = namaProv;
                document.getElementById('rumah-adat').innerText = data.rumah;
                document.getElementById('tarian').innerText = data.tarian;
                document.getElementById('makanan').innerText = data.makanan;
                document.getElementById('pakaian').innerText = data.pakaian;

                // Geser layar sedikit ke bawah agar kotak info terlihat
                document.getElementById('info-budaya').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
        });
    });
</script>
@endpush