<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SAGA TANI</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <header class="navbar">
        <div class="container navbar-isi">

            <a href="{{ route('beranda') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Saga Tani">
                <div>
                    <strong>SAGA TANI</strong>
                    <small>Masa Depan Pertanian, Bersama</small>
                </div>
            </a>

            <nav class="menu">
                <a href="{{ route('beranda') }}" class="aktif">Beranda</a>
                <a href="#">Tentang</a>
                <a href="#">Fitur</a>
                <a href="#">Blog</a>
                <a href="#">Bantuan</a>
            </nav>

            <a href="#" class="btn btn-hijau">Daftar</a>

        </div>
    </header>

    {{-- ===== BAGIAN UTAMA (foto latar) ===== --}}
    <main class="latar">
        <div class="container isi-login">

            {{-- Kiri: sambutan --}}
            <div class="sambutan">
                <div class="ikon-daun">🌿</div>
                <h1>Selamat Datang <br> Kembali!</h1>
                <p>Pantau pertanian Anda dengan lebih cerdas <br> bersama SAGA TANI.</p>

                {{-- Kartu kecil "Kondisi Tanaman" --}}
                <div class="kartu-kondisi">
                    <div class="kondisi-atas">
                        <span class="bulat">🌱</span>
                        <div>
                            <small>Kondisi Tanaman</small>
                            <strong>✔ Sehat</strong>
                        </div>
                    </div>
                    <div class="kondisi-bawah">
                        <div><small>Luas Lahan</small><b>2,5 Ha</b></div>
                        <div><small>Kelembapan Tanah</small><b>68%</b></div>
                        <div><small>Suhu Udara</small><b>28°C</b></div>
                    </div>
                </div>
            </div>

            {{-- Kanan: kartu form login --}}
            <div class="kartu-login">

                <div class="ikon-daun kecil">🌿</div>
                <h2>Masuk ke SAGA TANI</h2>
                <p class="sub">Masukkan akun Anda untuk melanjutkan</p>

                {{-- Pesan error jika login gagal --}}
                @if ($errors->any())
                    <div class="alert-error">
                        @foreach ($errors->all() as $pesan)
                            <p>{{ $pesan }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf

                    {{-- Email / Nomor HP --}}
                    <label for="login">Email atau Nomor HP</label>
                    <div class="kolom">
                        <svg class="ikon-input" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 21c0-4 4-6 8-6s8 2 8 6"/>
                        </svg>
                        <input type="text" id="login" name="login"
                               value="{{ old('login') }}"
                               placeholder="Contoh: nama@email.com atau 081234567890"
                               required autofocus>
                    </div>

                    {{-- Kata sandi --}}
                    <label for="password">Kata Sandi</label>
                    <div class="kolom">
                        <svg class="ikon-input" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="5" y="11" width="14" height="10" rx="2"/>
                            <path d="M8 11V8a4 4 0 0 1 8 0v3"/>
                        </svg>
                        <input type="password" id="password" name="password"
                               placeholder="Masukkan kata sandi" required>

                        {{-- Tombol mata --}}
                        <button type="button" id="tombolMata" class="tombol-mata" aria-label="Tampilkan kata sandi">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    <div class="baris-opsi">
                        <label class="ingat">
                            <input type="checkbox" name="ingat" checked> Ingat saya
                        </label>
                        <a href="#">Lupa kata sandi?</a>
                    </div>

                    <button type="submit" class="btn-masuk">Masuk →</button>
                </form>

                <div class="pemisah"><span>atau masuk dengan</span></div>

                {{-- Tombol Google (tampilan saja dulu) --}}
                <a href="#" class="btn-google">
                    <svg viewBox="0 0 48 48" width="22" height="22">
                        <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.8-6.8C35.8 2.4 30.2 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.9 6.1C12.4 13.6 17.7 9.5 24 9.5z"/>
                        <path fill="#4285F4" d="M46.5 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.7c-.6 3-2.3 5.5-4.8 7.2l7.5 5.8c4.4-4.1 7.1-10.1 7.1-17.5z"/>
                        <path fill="#FBBC05" d="M10.5 28.7A14.5 14.5 0 0 1 9.5 24c0-1.6.3-3.2.9-4.7l-7.9-6.1A24 24 0 0 0 0 24c0 3.9.9 7.5 2.6 10.8l7.9-6.1z"/>
                        <path fill="#34A853" d="M24 48c6.2 0 11.4-2 15.2-5.6l-7.5-5.8c-2 1.4-4.7 2.2-7.7 2.2-6.3 0-11.6-4.1-13.5-9.8l-7.9 6.1C6.5 42.6 14.6 48 24 48z"/>
                    </svg>
                    Google
                </a>

                <p class="daftar">Belum punya akun? <a href="#">Daftar sekarang</a></p>
            </div>

        </div>
    </main>

<script>
    // Tombol mata: tampilkan / sembunyikan kata sandi
    const kolomSandi = document.getElementById('password');
    const tombolMata = document.getElementById('tombolMata');

    tombolMata.addEventListener('click', function () {
        kolomSandi.type = (kolomSandi.type === 'password') ? 'text' : 'password';
    });
</script>

</body>
</html>