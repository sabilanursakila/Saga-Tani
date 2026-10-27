<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAGA TANI - Monitoring Pengusiran Hama Tikus</title>

    {{-- Font tulisan tangan untuk "Pertanian Lebih Aman" --}}
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <header class="navbar">
        <div class="container navbar-isi">

            <a href="/" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Saga Tani">
                <div>
                    <strong>SAGA TANI</strong>
                    <small>Masa Depan Pertanian, Bersama</small>
                </div>
            </a>

            <nav class="menu">
                <a href="#beranda" class="aktif">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#fitur">Fitur</a>
                <a href="#blog">Blog</a>
                <a href="#bantuan">Bantuan</a>
            </nav>

            <div class="tombol-auth">
                <a href="#" class="btn btn-outline">Masuk</a>
                <a href="#" class="btn btn-hijau">Daftar</a>
            </div>

        </div>
    </header>

    {{-- ===== HERO ===== --}}
    <section class="hero" id="beranda">

        {{-- Tulisan tangan di pojok kanan atas --}}
        <p class="tulisan-tangan">
            Pertanian <br> Lebih Aman <br> Hasil Lebih Baik
        </p>

        <div class="container">
            <div class="hero-teks">

                <span class="badge">🌱 Solusi Pertanian Modern</span>

                <h1>SAGA TANI</h1>
                <h2>
                    Monitoring Pengusiran <br>
                    <span class="hijau">Hama Tikus</span>
                </h2>

                <p class="deskripsi" id="tentang">
                    Dukung hasil panen yang lebih optimal dengan teknologi
                    monitoring pengusiran hama tikus yang cerdas, efisien,
                    dan mudah digunakan.
                </p>

                {{-- 4 fitur --}}
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
                        <div class="ikon">📍</div>
                        <h4>Pantau dari Mana Saja</h4>
                        <p>Akses data melalui aplikasi web &amp; mobile</p>
                    </div>
                    <div class="fitur-item">
                        <div class="ikon">🍃</div>
                        <h4>Meningkatkan Hasil Panen</h4>
                        <p>Lahan lebih aman, petani lebih sejahtera</p>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="tombol-aksi">
                    <a href="#" class="btn btn-hijau btn-besar">Mulai Sekarang →</a>
                    <a href="#" class="link-video">
                        <span class="ikon-play">▶</span> Tonton Video Pengenalan
                    </a>
                </div>

            </div>
        </div>
    </section>

</body>
</html>