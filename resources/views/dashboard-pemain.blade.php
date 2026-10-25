<style>
    :root{--teal:#0a6b5e;--teal2:#14a08c;--gold:#e8b53f;--ink:#1f2d2b;--soft:#e8f3f0}
body{background:linear-gradient(160deg,#eaf5f2,#fbf3df);color:var(--ink)}

/* Hero */
.hero{background:linear-gradient(135deg,var(--teal),var(--teal2));color:#fff;
  border-radius:28px;padding:40px;margin-bottom:28px;box-shadow:0 20px 40px rgba(10,107,94,.25)}
.hero h1{font-size:2.2rem;margin:10px 0}
.hero-badge{background:rgba(255,255,255,.18);padding:6px 14px;border-radius:99px;font-weight:600}
.level-box{background:rgba(255,255,255,.14);border-radius:18px;padding:16px 20px;margin:20px 0;max-width:520px}
.level-top{display:flex;justify-content:space-between;font-weight:700;margin-bottom:8px}
.bar{height:12px;background:rgba(255,255,255,.25);border-radius:99px;overflow:hidden}
.bar-fill{height:100%;background:linear-gradient(90deg,var(--gold),#ffd873);border-radius:99px;
  transition:width 1s ease;min-width:8px}
.btn-main{display:inline-block;background:var(--gold);color:#3a2a00;font-weight:800;
  padding:14px 28px;border-radius:99px;text-decoration:none;transition:.2s}
.btn-main:hover{transform:translateY(-3px);box-shadow:0 10px 20px rgba(0,0,0,.2)}

/* Panel & misi */
.panel{background:#fff;border-radius:24px;padding:26px;margin-bottom:28px;box-shadow:0 8px 24px rgba(0,0,0,.06)}
.panel-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.chip{background:#fff4d6;color:#8a6200;padding:6px 14px;border-radius:99px;font-size:.85rem;font-weight:700}
.missions{display:grid;gap:12px}
.mission{display:flex;align-items:center;gap:14px;background:var(--soft);padding:14px 18px;border-radius:16px}
.m-icon{font-size:1.6rem}
.m-info{flex:1;display:flex;flex-direction:column}
.m-check{width:28px;height:28px;border-radius:50%;border:2px solid #b8cfca;
  display:grid;place-items:center;color:#fff;font-weight:800}
.mission.done{opacity:.7}
.mission.done .m-check{background:var(--teal);border-color:var(--teal)}

/* Menu */
.menu-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:22px;margin-bottom:28px}
.menu-card{background:#fff;border-radius:24px;padding:26px;text-decoration:none;color:inherit;
  border-top:6px solid var(--c);box-shadow:0 8px 24px rgba(0,0,0,.06);transition:.25s}
.menu-card:hover{transform:translateY(-8px);box-shadow:0 18px 36px rgba(0,0,0,.12)}
.menu-icon{width:60px;height:60px;border-radius:18px;display:grid;place-items:center;
  font-size:1.9rem;background:color-mix(in srgb,var(--c) 15%,white);margin-bottom:14px}
.menu-card p{color:#667;min-height:70px}
.go{font-weight:800;color:var(--c)}
.c-blue{--c:#2a86c9}.c-pink{--c:#d63d7a}.c-gold{--c:#e0a100}.c-green{--c:#0a8a6e}

/* Fakta */
.fact{display:flex;gap:16px;align-items:center;background:#fff8e1;border:2px dashed var(--gold);
  border-radius:20px;padding:20px 24px}
.fact-icon{font-size:2.2rem}
</style>
<section class="hero">
  <div class="hero-text">
    <span class="hero-badge">🔥 Streak {{ $streak }} hari</span>
    <h1>Halo, {{ $user->name }}! 👋</h1>
    <p>Hari ini ada <b>{{ count($missions) }} misi</b> menunggumu. Selesaikan semuanya dan raih bonus poin!</p>

    <div class="level-box">
      <div class="level-top">
        <span>🏆 Level {{ $level }}</span>
        <span>{{ $points }} / {{ $nextLevel }} poin</span>
      </div>
      <div class="bar"><div class="bar-fill" style="width: {{ $progress }}%"></div></div>
      <small>{{ $nextLevel - $points }} poin lagi menuju Level {{ $level + 1 }}</small>
    </div>

    <a href="{{ route('kuis.index') }}" class="btn-main">▶ Lanjutkan Petualangan</a>
  </div>
</section>

<section class="panel">
  <div class="panel-head">
    <h2>🎯 Misi Harian</h2>
    <span class="chip">Selesaikan semua: +20 bonus</span>
  </div>
  <div class="missions">
    @foreach($missions as $m)
      <div class="mission {{ $m['done'] ? 'done' : '' }}">
        <div class="m-icon">{{ $m['icon'] }}</div>
        <div class="m-info">
          <b>{{ $m['title'] }}</b>
          <small>+{{ $m['reward'] }} poin</small>
        </div>
        <div class="m-check">{{ $m['done'] ? '✔' : '' }}</div>
      </div>
    @endforeach
  </div>
</section>

<section class="menu-grid">
  <a href="{{ route('peta') }}" class="menu-card c-blue">
    <div class="menu-icon">🗺️</div>
    <h3>Peta Nusantara</h3>
    <p>Klik provinsi, temukan rumah adat, pakaian, dan makanan khasnya.</p>
    <span class="go">Jelajahi →</span>
  </a>

  <a href="{{ route('kuis.index') }}" class="menu-card c-pink">
    <div class="menu-icon">🧠</div>
    <h3>Kuis Budaya</h3>
    <p>Jawab benar, dapat poin. Makin tinggi level, makin seru!</p>
    <span class="go">Mulai Kuis →</span>
  </a>

  <a href="#" class="menu-card c-gold">
    <div class="menu-icon">👘</div>
    <h3>Toko Kostum</h3>
    <p>Tukar poinmu dengan pakaian adat untuk avatar kamu.</p>
    <span class="go">Lihat Koleksi →</span>
  </a>

  <a href="#" class="menu-card c-green">
    <div class="menu-icon">🏅</div>
    <h3>Peringkat</h3>
    <p>Bandingkan poinmu dengan pemain lain di seluruh Nusantara.</p>
    <span class="go">Lihat Peringkat →</span>
  </a>
</section>

<section class="fact">
  <div class="fact-icon">💡</div>
  <div>
    <b>Tahukah kamu?</b>
    <p>{{ $fact }}</p>
  </div>
</section>