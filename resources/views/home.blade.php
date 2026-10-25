
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudayaNusa - Jelajahi Budaya Indonesia</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffaf0;
            color: #24352b;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 8%;
            background: white;
        }

        .logo {
            color: #176b45;
            font-size: 25px;
            font-weight: bold;
        }

        nav a {
            text-decoration: none;
            color: #24352b;
            margin-left: 22px;
            font-weight: bold;
        }

        .hero {
            padding: 85px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            background: linear-gradient(135deg, #e4f5df, #fff1d1);
        }

        .hero-text {
            max-width: 600px;
        }

        .hero h1 {
            font-size: clamp(36px, 5vw, 58px);
            line-height: 1.15;
            margin: 18px 0;
        }

        .hero p {
            line-height: 1.8;
            color: #526157;
            margin-bottom: 28px;
        }

        .tag {
            display: inline-block;
            background: #d1ead1;
            color: #176b45;
            padding: 10px 16px;
            border-radius: 30px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #176b45;
            color: white;
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: bold;
        }

        .hero-art {
            font-size: 125px;
            text-align: center;
            min-width: 230px;
        }

        .features {
            padding: 60px 8%;
            text-align: center;
        }

        .features h2 {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .features > p {
            color: #68736b;
            line-height: 1.7;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 35px;
        }

        .card {
            background: white;
            border: 1px solid #eee9dc;
            border-radius: 18px;
            padding: 30px 22px;
            text-align: left;
        }

        .card .icon {
            font-size: 42px;
            margin-bottom: 18px;
        }

        .card h3 {
            margin-bottom: 12px;
        }

        .card p {
            color: #68736b;
            line-height: 1.7;
        }

        footer {
            padding: 25px;
            text-align: center;
            background: #173f30;
            color: white;
        }

        @media (max-width: 700px) {
            nav {
                padding: 20px 5%;
                flex-wrap: wrap;
                gap: 18px;
            }

            nav a {
                margin-left: 0;
                margin-right: 12px;
            }

            .hero {
                padding: 55px 6%;
                flex-direction: column;
                align-items: flex-start;
            }

            .hero-art {
                align-self: center;
                font-size: 90px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">🌿 BudayaNusa</div>

        <div>
            <a href="/">Beranda</a>
            <a href="#fitur">Fitur</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <span class="tag">🎮 Game Edukasi Indonesia</span>

            <h1>Jelajahi Nusantara, Kenali Budayanya!</h1>

            <p>
                Petualangan seru mengenal kebudayaan Indonesia.
                Jelajahi provinsi, pelajari tradisi daerah, jawab kuis,
                kumpulkan poin, dan buka kostum karakter favoritmu.
            </p>

            <a href="{{ route('register') }}" class="btn">
                Mulai Petualangan →
            </a>
        </div>

        <div class="hero-art" aria-label="Ilustrasi budaya Indonesia">
            🏝️ 🏯
        </div>
    </section>

    <section class="features" id="fitur">
        <h2>Petualanganmu Dimulai!</h2>

        <p>
            Belajar budaya Indonesia dengan cara yang menyenangkan.
        </p>

        <div class="cards">
            <div class="card">
                <div class="icon">🗺️</div>
                <h3>Jelajahi Provinsi</h3>
                <p>
                    Pilih daerah pada peta Indonesia dan temukan
                    keunikan kebudayaannya.
                </p>
            </div>

            <div class="card">
                <div class="icon">🧠</div>
                <h3>Jawab Kuis</h3>
                <p>
                    Uji pengetahuanmu melalui kuis dan mini game
                    bertema kebudayaan daerah.
                </p>
            </div>

            <div class="card">
                <div class="icon">👘</div>
                <h3>Kumpulkan Kostum</h3>
                <p>
                    Raih poin, naik level, dan buka kostum
                    karakter yang terinspirasi dari budaya Indonesia.
                </p>
            </div>
        </div>
    </section>

    <footer>
        © 2026 BudayaNusa | Belajar Budaya, Bertualang Bersama
    </footer>

</body>
</html>
