<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang SAGA TANI - Teknologi Pertanian Modern</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fitur.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
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
                <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                <a href="{{ url('/tentang') }}" class="nav-link aktif">Tentang</a>
                <a href="{{ url('/fitur') }}" class="nav-link">Fitur</a>
            </nav>
        </div>
    </header>

    {{-- ===== HERO TENTANG ===== --}}
    <section class="hero-tentang">
        <div class="hero-teks">
            <span class="badge">🌱 Tentang Kami</span>
            <h1>SAGA TANI<br>Teknologi untuk Pertanian yang Lebih Baik</h1>
            <p class="deskripsi">
                SAGA TANI hadir sebagai solusi inovatif untuk membantu petani mengelola pertanian secara modern, efisien, dan berkelanjutan dengan memanfaatkan teknologi digital.
            </p>
        </div>
        
        <p class="tulisan-tangan kanan">
            Bersama Petani, Menuju <br> Pertanian Modern
        </p>
        
        <div class="wave-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
                <path fill="#ffffff" fill-opacity="1" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    {{-- ===== VISI & MISI ===== --}}
    <section class="visi-misi-section">
        <div class="kiri-teks">
            <h4 class="hijau-kecil">Tentang SAGA TANI</h4>
            <h2>Dari Petani, Untuk Masa Depan</h2>
            <p>SAGA TANI adalah platform digital yang dirancang untuk membantu petani dalam mengelola lahan, memantau kondisi tanaman, dan mengendalikan hama seperti tikus dengan teknologi modern. Kami percaya bahwa pertanian yang maju dimulai dari petani yang mendapatkan dukungan teknologi yang tepat.</p>
        </div>
        
        <div class="kanan-cards">
            <div class="card">
                <div class="ikon-lingkaran">🎯</div>
                <h3>Visi</h3>
                <p>Menjadi platform pertanian terdepan di Indonesia yang mendukung pertanian berkelanjutan dan berbasis teknologi.</p>
            </div>
            <div class="card">
                <div class="ikon-lingkaran">🚀</div>
                <h3>Misi</h3>
                <p>Memberikan solusi digital yang mudah, terjangkau, dan bermanfaat bagi petani untuk meningkatkan produktivitas dan hasil panen.</p>
            </div>
        </div>
    </section>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

</body>
</html>