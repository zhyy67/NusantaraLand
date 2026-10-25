<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Budaya - BudayaNusa</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 30px 18px;
            font-family: Arial, sans-serif;
            background: #fff7ed;
            color: #292524;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .hero {
            padding: 30px;
            border-radius: 20px;
            background: #b91c1c;
            color: white;
            margin-bottom: 24px;
        }

        .hero a {
            color: white;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
        }

        .card {
            padding: 22px;
            border-radius: 18px;
            background: white;
            box-shadow: 0 5px 18px #0000000d;
            transition: transform .2s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .emoji {
            font-size: 42px;
        }

        .card a {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 9px;
            background: #b91c1c;
            color: white;
            text-decoration: none;
        }

        .back {
            color: white;
        }
    </style>
</head>
<body>
<div class="container">

    <section class="hero">
        <h1>🗺️ Peta Budaya BudayaNusa</h1>
        <p>
            Jelajahi rumah adat, tarian, makanan, dan alat musik
            tradisional dari berbagai daerah Indonesia.
        </p>
        <a class="back" href="{{ route('dashboard') }}">
            ← Kembali ke Dashboard
        </a>
    </section>

    <div class="grid">
        @foreach ($provinsi as $item)
            <article class="card"
                style="border-top: 7px solid {{ $item['warna'] }}">

                <div class="emoji">{{ $item['emoji'] }}</div>
                <h2>{{ $item['nama'] }}</h2>
                <p>🏠 {{ $item['rumah'] }}</p>
                <p>💃 {{ $item['tari'] }}</p>
                <p>🍲 {{ $item['makanan'] }}</p>

                <!-- ========================================== -->
                <!-- BAGIAN YANG DIGANTI / DITAMBAHKAN            -->
                <!-- ========================================== -->
                
                <!-- 1. Menambahkan Info Pulau & Alat Musik (opsional, karena data di controller ada) -->
                <p style="font-size: 14px; color: #78716c; margin-top: -10px;">
                    Pulau {{ $item['pulau'] }} &bull; 🎵 {{ $item['musik'] }}
                </p>
                
                <!-- 2. Logika Route: Menggunakan Str::slug agar link sesuai dengan key di Controller show -->
                <a href="{{ route('budaya.show', ['nama' => \Illuminate\Support\Str::slug($item['nama'])]) }}" style="margin-top: 10px;">
                    Pelajari Budaya
                </a>
                
                <!-- ========================================== -->

            </article>
        @endforeach
    </div>

</div>
</body>
</html>