<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAGA TANI - Monitoring Pengusiran Hama Tikus</title>

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fitur.css') }}">
</head>
<body>

    {{-- ===== NAVBAR (Menu Fitur Dihapus) ===== --}}
    <header class="navbar">
        <div class="navbar-isi">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Saga Tani">
                <div>
                    <strong>SAGA TANI</strong>
                    <small>Masa Depan Pertanian, Bersama</small>
                </div>
            </a>

            <nav class="menu">
                <a href="{{ url('/') }}" class="nav-link aktif">Beranda</a>
                <a href="{{ url('/tentang') }}" class="nav-link">Tentang</a>
            </nav>
        </div>
    </header>

    {{-- ===== HERO ===== --}}
    <section class="hero" id="beranda">
        <p class="tulisan-tangan">
            Pertanian <br> Lebih Aman <br> Hasil Lebih Baik
        </p>

        <div class="hero-teks">
            <span class="badge">🌱 Solusi Pertanian Modern</span>

            <h1>SAGA TANI</h1>
            <h2>
                Monitoring Pengusiran <br>
                <span class="hijau">Hama Tikus</span>
            </h2>

            <p class="deskripsi">
                Dukung hasil panen yang lebih optimal dengan teknologi
                monitoring pengusiran hama tikus yang cerdas, efisien,
                dan mudah digunakan.
            </p>

            <div class="fitur-singkat" id="fitur">
                <div class="fitur-item">
                    <div class="ikon">🛡️</div>
                    <h4>Deteksi Real-time</h4>
                    <p>Pantau aktivitas tikus secara langsung</p>
                </div>
                <div class="fitur-item">
                    <div class="ikon">📡</div>
                    <h4>Pengusiran Otomatis</h4>
                    <p>Menggunakan perangkat berteknologi tinggi</p>
                </div>
                <div class="fitur-item">
                    <div class="ikon">🍃</div>
                    <h4>Meningkatkan Hasil Panen</h4>
                    <p>Lahan lebih aman, petani lebih sejahtera</p>
                </div>
            </div>

            <div class="tombol-aksi">
                <a href="{{ url('/fitur') }}" class="btn btn-hijau btn-besar">Mulai Sekarang →</a>
            </div>
        </div>
    </section>
// note bila bilov biy
    {{-- ===== FOOTER ===== --}}
    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

</body>
</html>