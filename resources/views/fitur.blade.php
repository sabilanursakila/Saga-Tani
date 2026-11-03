<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur SAGA TANI - Monitoring Pengusiran Hama Tikus</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fitur.css') }}">

    {{-- Gaya khusus dashboard baru (prefix dv-). Boleh dipindah ke public/css/fitur.css --}}
    <style>
        :root {
            --dv-hijau: #166534;
            --dv-hijau-tua: #14532d;
            --dv-hijau-muda: #ecfdf3;
            --dv-hijau-garis: #bbf7d0;
            --dv-teks: #1f2937;
            --dv-abu: #6b7280;
            --dv-garis: #e5e7eb;
        }

        .dv-wrap { max-width: 1100px; margin: 28px auto 48px; padding: 0 20px; font-family: 'Poppins', sans-serif; color: var(--dv-teks); }

        .dv-card { background: #fff; border: 1px solid var(--dv-garis); border-radius: 18px; box-shadow: 0 2px 10px rgba(20, 83, 45, .06); }

        /* --- Baris 1: kartu status --- */
        .dv-status-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .dv-status { display: flex; align-items: center; gap: 14px; padding: 18px; background: var(--dv-hijau-muda); border-color: var(--dv-hijau-garis); }
        .dv-status-icon { width: 54px; height: 54px; border-radius: 50%; background: #fff; display: grid; place-items: center; font-size: 26px; flex: none; border: 1px solid var(--dv-hijau-garis); }
        .dv-status-body { flex: 1; min-width: 0; }
        .dv-status-body small { display: block; font-size: 12px; font-weight: 500; color: var(--dv-teks); }
        .dv-status-body strong { display: block; font-size: 24px; font-weight: 700; color: var(--dv-hijau-tua); line-height: 1.25; }
        .dv-status-body span { font-size: 12px; color: var(--dv-abu); }
        .dv-pill { align-self: flex-start; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 999px; background: #16a34a; color: #fff; }
        .dv-pill.offline { background: #dc2626; }

        /* --- Judul seksi --- */
        .dv-section-title { display: flex; align-items: center; gap: 8px; margin: 26px 0 12px; font-size: 15px; font-weight: 600; color: var(--dv-hijau-tua); }
        .dv-section-title .dv-ic { font-size: 18px; }

        /* --- Mode operasi --- */
        .dv-mode-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .dv-mode { display: flex; align-items: center; gap: 14px; padding: 16px 18px; text-align: left; cursor: pointer; font-family: inherit; color: inherit; transition: border-color .2s, background .2s; }
        .dv-mode:hover { border-color: #86efac; }
        .dv-mode:focus-visible, .dv-play:focus-visible, .dv-menu-btn:focus-visible, .dv-btn-lihat:focus-visible { outline: 3px solid #4ade80; outline-offset: 2px; }
        .dv-mode.aktif { background: var(--dv-hijau-muda); border-color: #4ade80; }
        .dv-mode-icon { font-size: 28px; width: 46px; height: 46px; display: grid; place-items: center; flex: none; }
        .dv-mode strong { display: flex; align-items: center; gap: 6px; font-size: 14px; font-weight: 600; }
        .dv-mode small { display: block; font-size: 12px; color: var(--dv-abu); margin-top: 2px; }
        .dv-dot { width: 9px; height: 9px; border-radius: 50%; background: #22c55e; display: none; }
        .dv-mode.aktif .dv-dot { display: inline-block; }

        /* --- Dua kolom bawah --- */
        .dv-bawah { display: grid; grid-template-columns: 1fr 1.25fr; gap: 16px; margin-top: 26px; align-items: start; }
        .dv-panel { padding: 18px; }
        .dv-panel-head { display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 12px; }
        .dv-panel-head h3 { display: flex; align-items: center; gap: 8px; margin: 0; font-size: 15px; font-weight: 600; color: var(--dv-hijau-tua); }
        .dv-btn-lihat { font-family: inherit; font-size: 12px; font-weight: 600; color: var(--dv-hijau); background: #fff; border: 1px solid #86efac; padding: 5px 12px; border-radius: 999px; cursor: pointer; text-decoration: none; white-space: nowrap; }
        .dv-btn-lihat:hover { background: var(--dv-hijau-muda); }

        /* --- Daftar suara --- */
        .dv-suara { list-style: none; margin: 0; padding: 0; }
        .dv-suara li { position: relative; display: flex; align-items: center; gap: 12px; padding: 11px 4px; border-bottom: 1px solid var(--dv-garis); font-size: 13.5px; font-weight: 500; }
        .dv-suara li:last-child { border-bottom: 0; }
        .dv-suara .dv-nama { flex: 1; }
        .dv-play { width: 30px; height: 30px; border-radius: 50%; border: 2px solid #16a34a; background: #fff; color: #16a34a; font-size: 11px; cursor: pointer; display: grid; place-items: center; padding: 0 0 0 2px; }
        .dv-play:hover { background: #16a34a; color: #fff; }
        .dv-menu-btn { background: none; border: 0; font-size: 20px; line-height: 1; color: var(--dv-abu); cursor: pointer; padding: 2px 8px; border-radius: 6px; }
        .dv-menu-btn:hover { background: #f3f4f6; }
        .dv-dropdown { position: absolute; right: 4px; top: 100%; z-index: 5; background: #fff; border: 1px solid var(--dv-garis); border-radius: 10px; box-shadow: 0 6px 18px rgba(0, 0, 0, .12); overflow: hidden; display: none; }
        .dv-dropdown.buka { display: block; }
        .dv-dropdown button { display: block; width: 100%; text-align: left; font-family: inherit; font-size: 12.5px; padding: 9px 16px; background: #fff; border: 0; cursor: pointer; }
        .dv-dropdown button:hover { background: #f3f4f6; }
        .dv-kosong { font-size: 13px; color: var(--dv-abu); text-align: center; padding: 16px 8px; }

        /* --- Riwayat --- */
        .dv-tabel { width: 100%; border-collapse: collapse; font-size: 12.5px; }
        .dv-tabel th { text-align: left; font-weight: 600; color: var(--dv-abu); background: #f9fafb; padding: 9px 12px; }
        .dv-tabel th:first-child { border-radius: 10px 0 0 10px; }
        .dv-tabel th:last-child { border-radius: 0 10px 10px 0; }
        .dv-tabel td { padding: 12px; border-bottom: 1px solid var(--dv-garis); }
        .dv-tabel tr:last-child td { border-bottom: 0; }
        .dv-badge { display: inline-block; font-size: 11.5px; font-weight: 600; padding: 3px 10px; border-radius: 999px; }
        .dv-badge.hijau { background: #dcfce7; color: #166534; }
        .dv-badge.biru { background: #dbeafe; color: #1d4ed8; }
        .dv-badge.merah { background: #fee2e2; color: #b91c1c; }
        .dv-badge.kuning { background: #fef3c7; color: #b45309; }

        /* --- Toast --- */
        .dv-toast { position: fixed; left: 50%; bottom: 28px; transform: translateX(-50%) translateY(20px); background: var(--dv-hijau-tua); color: #fff; padding: 10px 20px; border-radius: 999px; font-size: 13px; opacity: 0; pointer-events: none; transition: opacity .25s, transform .25s; z-index: 9999; }
        .dv-toast.tampil { opacity: 1; transform: translateX(-50%) translateY(0); }

        @media (max-width: 900px) {
            .dv-status-row, .dv-mode-row, .dv-bawah { grid-template-columns: 1fr; }
        }
        @media (prefers-reduced-motion: reduce) {
            .dv-toast, .dv-mode { transition: none; }
        }
    </style>
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
            <nav class="menu"></nav>
        </div>
    </header>

    {{-- ===== HERO BANNER ===== --}}
    <section class="hero-fitur-banner">
        <div class="hero-fitur-teks">
            <h2>Kelola Perangkat dengan <br><span>Mudah untuk Pertanian yang Lebih Aman</span></h2>
            <p>SAGA TANI menyediakan berbagai fitur canggih untuk membantu Anda mengelola perangkat pengusir hama tikus secara efektif dan efisien.</p>
        </div>
    </section>

    {{-- ===== DASHBOARD ===== --}}
    <main class="dv-wrap">

        {{-- Baris 1: Status --}}
        <div class="dv-status-row">
            <div class="dv-card dv-status">
                <div class="dv-status-icon">📡</div>
                <div class="dv-status-body">
                    <small>Status Sensor</small>
                    <strong id="statSensor">Memuat...</strong>
                    <span id="statSensorKet">Menunggu data perangkat</span>
                </div>
            </div>

            <div class="dv-card dv-status">
                <div class="dv-status-icon">🔊</div>
                <div class="dv-status-body">
                    <small>Suara Sedang Diputar</small>
                    <strong id="statSuara">Tidak Ada</strong>
                    <span id="statSuaraKet">Menunggu pemicu...</span>
                </div>
            </div>

            <div class="dv-card dv-status">
                <div class="dv-status-icon">🛰️</div>
                <div class="dv-status-body">
                    <small>Perangkat</small>
                    <strong id="statPerangkat">ESP32</strong>
                    <span id="statPerangkatKet">Terakhir aktif: -</span>
                </div>
                <span class="dv-pill offline" id="statPerangkatPill">Offline</span>
            </div>
        </div>

        {{-- Mode operasi --}}
        <div class="dv-section-title"><span class="dv-ic">⚙️</span> Mode Operasi Aktif</div>
        <div class="dv-mode-row">
            <button type="button" class="dv-card dv-mode" id="modeOtomatis">
                <span class="dv-mode-icon">📶</span>
                <span>
                    <strong>Otomatis (Sensor) <i class="dv-dot"></i></strong>
                    <small id="ketOtomatis">Sensor mendeteksi gerakan</small>
                </span>
            </button>
            <button type="button" class="dv-card dv-mode" id="btnAturJadwal">
                <span class="dv-mode-icon">🕒</span>
                <span>
                    <strong>Terjadwal (Interval) <i class="dv-dot"></i></strong>
                    <small id="ketJadwal">Atur jadwal pengusiran</small>
                </span>
            </button>
            <button type="button" class="dv-card dv-mode" id="btnMulaiSekarang">
                <span class="dv-mode-icon">👆</span>
                <span>
                    <strong>Manual <i class="dv-dot"></i></strong>
                    <small>Putar suara sekarang</small>
                </span>
            </button>
        </div>

        {{-- Baris bawah: Daftar suara + Riwayat --}}
        <div class="dv-bawah">
            <section class="dv-card dv-panel">
                <div class="dv-panel-head">
                    <h3>🎵 Daftar Suara Predator</h3>
                    <button type="button" class="dv-btn-lihat" id="btnKelolaSuara">Kelola Suara</button>
                </div>
                <ul id="daftarSuaraAktif" class="dv-suara"></ul>
            </section>

            <section class="dv-card dv-panel">
                <div class="dv-panel-head">
                    <h3>🔄 Riwayat Aktivitas</h3>
                    <a href="{{ url('/riwayat-aktivitas') }}" class="dv-btn-lihat">Lihat Semua</a>
                </div>
                <table class="dv-tabel">
                    <thead>
                        <tr><th>Waktu</th><th>Aktivitas</th><th>Status</th></tr>
                    </thead>
                    <tbody id="riwayatBody">
                        <tr><td colspan="3" class="dv-kosong">Memuat riwayat...</td></tr>
                    </tbody>
                </table>
            </section>
        </div>

        <div style="margin-top:18px; text-align:right;">
        </div>
    </main>

    {{-- ===== MODAL MANUAL ===== --}}
    <div id="modalManual" class="modal-overlay">
        <div class="modal-content">
            <h3>Kontrol Perangkat Manual</h3>
            <p>Pilih status untuk mengaktifkan atau mematikan perangkat pengusir hama saat ini.</p>
            <div class="modal-actions">
                <button type="button" id="btnAktifkan" class="btn-modal-aktif">Aktifkan</button>
                <button type="button" id="btnMatikan" class="btn-modal-mati">Matikan</button>
                <button type="button" id="btnTutupManual" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL ATUR JADWAL ===== --}}
    <div id="modalJadwal" class="modal-overlay">
        <div class="modal-content">
            <h3>Atur Jadwal Pengusiran Hama</h3>
            <p>Pilih interval pengulangan, atau tentukan tanggal dan jam aktif tertentu.</p>
            <div class="form-group-jadwal">
                <label for="inputInterval">Ulangi setiap (menit):</label>
                <input type="number" id="inputInterval" class="input-datetime" min="1" placeholder="Contoh: 30">
            </div>
            <div class="form-group-jadwal">
                <label for="inputTanggal">Atau pilih tanggal, bulan, tahun &amp; jam:</label>
                <input type="datetime-local" id="inputTanggal" class="input-datetime">
            </div>
            <div class="modal-actions">
                <button type="button" id="btnSimpanJadwal" class="btn-modal-aktif">Simpan Jadwal</button>
                <button type="button" id="btnTutupJadwal" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL KELOLA SUARA ===== --}}
    <div id="modalSuara" class="modal-overlay">
        <div class="modal-content modal-suara-container">
            <h3>Pilih Suara Pengusir Hama</h3>
            <p>Anda bisa memilih beberapa suara hewan untuk diaktifkan sekaligus pada perangkat.</p>
            <div id="pilihanSuara" class="sound-popup-list"></div>
            <div class="modal-actions" style="margin-top: 20px;">
                <button type="button" id="btnSimpanSuara" class="btn-modal-aktif">Simpan Pilihan</button>
                <button type="button" id="btnTutupSuara" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL SEMUA PERANGKAT ===== --}}
    <div id="modalPerangkat" class="modal-overlay">
        <div class="modal-content modal-suara-container">
            <h3>Daftar Seluruh Perangkat (Baterai)</h3>
            <p>Pantau kapasitas daya baterai, status operasional, serta kelola perangkat Anda.</p>
            <div id="daftarPerangkatList" class="sound-popup-list"></div>
            <div class="modal-actions" style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
                <button type="button" id="btnTambahPerangkat" class="btn-modal-aktif" style="background: var(--hijau-tua);">+ Tambah Perangkat</button>
                <button type="button" id="btnTutupPerangkat" class="btn-modal-tutup">Tutup</button>
            </div>
        </div>
    </div>

    <div id="toast" class="dv-toast" role="status" aria-live="polite"></div>

    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

    {{-- ===== FIREBASE + LOGIKA DASHBOARD ===== --}}
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
        import {
            getDatabase, ref, onValue, set, update, push, remove, query, limitToLast
        } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-database.js";

        const app = initializeApp({
            databaseURL: "https://sagatani-7f2c3-default-rtdb.asia-southeast1.firebasedatabase.app"
        });
        const db = getDatabase(app);

        /* ---------- Helper ---------- */
        const $ = (id) => document.getElementById(id);

        function esc(teks) {
            const d = document.createElement('div');
            d.textContent = teks ?? '';
            return d.innerHTML;
        }

        function toast(pesan) {
            const t = $('toast');
            t.textContent = pesan;
            t.classList.add('tampil');
            clearTimeout(toast._t);
            toast._t = setTimeout(() => t.classList.remove('tampil'), 2500);
        }

        function formatWaktu(w) {
            if (w === undefined || w === null || w === '') return '-';
            const d = new Date(w);
            if (isNaN(d)) return String(w);
            const jam = d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false }).replace('.', ':');
            const hariIni = new Date().toDateString() === d.toDateString();
            if (hariIni) return jam;
            return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }) + ' ' + jam;
        }

        function bukaModal(el) { el.style.display = 'flex'; }
        function tutupModal(el) { el.style.display = 'none'; }

        async function catatRiwayat(aktivitas, status) {
            try {
                await push(ref(db, 'riwayat'), { waktu: Date.now(), aktivitas, status });
            } catch (e) { console.error('Gagal mencatat riwayat:', e); }
        }

        async function kirim(promise, pesanSukses) {
            try {
                await promise;
                toast(pesanSukses);
            } catch (e) {
                console.error(e);
                toast('Gagal terhubung ke database. Cek koneksi atau Firebase Rules.');
            }
        }

        /* ---------- Katalog suara ---------- */
        const katalogSuara = [
            { nama: 'Suara Elang',        ket: 'Paling efektif (rekomendasi)' },
            { nama: 'Suara Burung Hantu', ket: 'Rekomendasi' },
            { nama: 'Suara Rubah',        ket: 'Rekomendasi' },
            { nama: 'Suara Ular',         ket: 'Rekomendasi' },
            { nama: 'Suara Anjing',       ket: 'Rekomendasi' },
            { nama: 'Suara Serigala',     ket: 'Rekomendasi' }
        ];
        let suaraAktif = ['Suara Elang', 'Suara Ular']; // default jika node belum ada

        /* ---------- Mode operasi ---------- */
        const kartuMode = { otomatis: $('modeOtomatis'), terjadwal: $('btnAturJadwal'), manual: $('btnMulaiSekarang') };

        function tandaiMode(teks) {
            const m = String(teks ?? '').toLowerCase();
            let kunci = 'otomatis';
            if (m.includes('jadwal')) kunci = 'terjadwal';
            else if (m.includes('manual')) kunci = 'manual';
            Object.entries(kartuMode).forEach(([k, el]) => el.classList.toggle('aktif', k === kunci));
        }

        onValue(ref(db, 'kontrol_sistem'), (snap) => {
            const k = snap.val() || {};

            tandaiMode(k.mode_operasi);

            // Keterangan kartu terjadwal
            if (k.interval_menit) $('ketJadwal').textContent = `Setiap ${k.interval_menit} menit`;
            else if (k.jadwal) $('ketJadwal').textContent = 'Jadwal: ' + k.jadwal.replace('T', ' ');
            else $('ketJadwal').textContent = 'Atur jadwal pengusiran';

            // Kartu status sensor
            const sensor = k.status_sensor || 'Siaga';
            $('statSensor').textContent = sensor;
            $('statSensorKet').textContent = sensor.toLowerCase() === 'siaga'
                ? 'Siap mendeteksi pergerakan'
                : 'Pergerakan terdeteksi';
            $('ketOtomatis').textContent = sensor.toLowerCase() === 'siaga' ? 'Sensor siaga' : 'Sensor mendeteksi gerakan';

            // Kartu suara diputar
            const diputar = k.suara_diputar || '';
            $('statSuara').textContent = diputar ? diputar : 'Tidak Ada';
            $('statSuaraKet').textContent = diputar ? 'Sedang diputar di lahan' : 'Menunggu pemicu...';

            // Suara aktif
            if (Array.isArray(k.suara_aktif)) suaraAktif = k.suara_aktif.filter(Boolean);
            else if (k.suara_aktif && typeof k.suara_aktif === 'object') suaraAktif = Object.values(k.suara_aktif);
            renderSuara();
        });

        /* ---------- Perangkat ---------- */
        let dataPerangkat = {}; // { id: {nama, status, baterai, terakhir_aktif} }

        onValue(ref(db, 'perangkat'), (snap) => {
            dataPerangkat = snap.val() || {};
            renderKartuPerangkat();
            renderDaftarPerangkat();
        });

        function renderKartuPerangkat() {
            const id = dataPerangkat['R-881'] ? 'R-881' : Object.keys(dataPerangkat)[0];
            const p = id ? dataPerangkat[id] : null;
            const pill = $('statPerangkatPill');

            if (!p) {
                $('statPerangkat').textContent = 'Belum ada';
                $('statPerangkatKet').textContent = 'Tambahkan perangkat';
                pill.textContent = 'Offline';
                pill.classList.add('offline');
                return;
            }

            const online = String(p.status || '').toLowerCase().match(/^(online|aktif)$/);
            $('statPerangkat').textContent = p.nama || 'ESP32';
            $('statPerangkatKet').textContent = 'Terakhir aktif: ' + (p.terakhir_aktif ? formatWaktu(p.terakhir_aktif) + ' WIB' : '-');
            pill.textContent = online ? 'Online' : 'Offline';
            pill.classList.toggle('offline', !online);
        }

        function renderDaftarPerangkat() {
            const wadah = $('daftarPerangkatList');
            wadah.innerHTML = '';
            const entri = Object.entries(dataPerangkat);

            if (entri.length === 0) {
                wadah.innerHTML = '<p class="dv-kosong">Belum ada perangkat terdaftar.</p>';
                return;
            }

            entri.forEach(([id, p]) => {
                const aktif = String(p.status || '').toLowerCase().match(/^(online|aktif)$/);
                const baterai = p.baterai !== undefined ? (String(p.baterai).includes('%') ? p.baterai : p.baterai + '%') : '-';
                const item = document.createElement('div');
                item.className = 'sound-popup-item' + (aktif ? ' active-item' : '');
                if (!aktif) { item.style.borderColor = '#fca5a5'; item.style.background = '#fef2f2'; }

                item.innerHTML = `
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle" style="${aktif ? '' : 'background:#fee2e2;'}">${aktif ? '🔋' : '🪫'}</span>
                        <div>
                            <strong>${esc(p.nama || id)}</strong>
                            <small style="${aktif ? '' : 'color:#dc2626;'}">Status: ${esc(p.status || '-')} • Baterai: ${esc(baterai)}</small>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span style="font-size:11px; font-weight:600; color:${aktif ? 'var(--hijau-tua)' : '#dc2626'};">${aktif ? '🟢 Online' : '🔴 Offline'}</span>
                        <button type="button" data-hapus="${esc(id)}" style="background:#fee2e2; color:#dc2626; border:none; padding:5px 10px; border-radius:6px; font-size:11px; font-weight:600; cursor:pointer;">Hapus</button>
                    </div>`;
                wadah.appendChild(item);
            });

            wadah.querySelectorAll('[data-hapus]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = btn.dataset.hapus;
                    const nama = dataPerangkat[id]?.nama || id;
                    if (confirm(`Yakin ingin menghapus perangkat "${nama}"?`)) {
                        kirim(remove(ref(db, 'perangkat/' + id)), 'Perangkat dihapus');
                    }
                });
            });
        }

        $('btnTambahPerangkat').addEventListener('click', () => {
            const lokasi = prompt('Masukkan nama lokasi perangkat baru (contoh: Sawah Utara):');
            if (!lokasi || !lokasi.trim()) return;
            const nomor = Object.keys(dataPerangkat).length + 1;
            const id = 'R-' + String(Date.now()).slice(-3);
            kirim(
                set(ref(db, 'perangkat/' + id), {
                    nama: `${lokasi.trim()} (Unit 0${nomor})`,
                    status: 'Online',
                    baterai: 100,
                    terakhir_aktif: Date.now()
                }),
                'Perangkat baru berhasil ditambahkan'
            );
        });

        /* ---------- Daftar suara di dashboard ---------- */
        function renderSuara() {
            const ul = $('daftarSuaraAktif');
            ul.innerHTML = '';

            if (suaraAktif.length === 0) {
                ul.innerHTML = '<li class="dv-kosong" style="justify-content:center;">Belum ada suara yang diaktifkan. Klik “Kelola Suara”.</li>';
                return;
            }

            suaraAktif.forEach((nama) => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <button type="button" class="dv-play" aria-label="Putar ${esc(nama)}">▶</button>
                    <span class="dv-nama">${esc(nama)}</span>
                    <button type="button" class="dv-menu-btn" aria-label="Menu ${esc(nama)}">⋮</button>
                    <div class="dv-dropdown">
                        <button type="button" data-aksi="nonaktif">Nonaktifkan</button>
                    </div>`;

                li.querySelector('.dv-play').addEventListener('click', () => putarSuara(nama));

                const dd = li.querySelector('.dv-dropdown');
                li.querySelector('.dv-menu-btn').addEventListener('click', (e) => {
                    e.stopPropagation();
                    document.querySelectorAll('.dv-dropdown.buka').forEach(x => { if (x !== dd) x.classList.remove('buka'); });
                    dd.classList.toggle('buka');
                });
                dd.querySelector('[data-aksi="nonaktif"]').addEventListener('click', () => {
                    const baru = suaraAktif.filter(s => s !== nama);
                    kirim(set(ref(db, 'kontrol_sistem/suara_aktif'), baru), nama + ' dinonaktifkan');
                });

                ul.appendChild(li);
            });
        }

        document.addEventListener('click', () => {
            document.querySelectorAll('.dv-dropdown.buka').forEach(x => x.classList.remove('buka'));
        });

        async function putarSuara(nama) {
            // ESP32 membaca node ini lalu memutar suara; setelah selesai, ESP32 mengosongkan lagi
            await kirim(
                update(ref(db, 'kontrol_sistem'), { putar_suara: nama, suara_diputar: nama }),
                'Perintah putar dikirim: ' + nama
            );
            catatRiwayat(nama + ' diputar', 'Berhasil');
        }

        /* ---------- Riwayat (5 terbaru, terbaru di atas) ---------- */
        function kelasBadge(status) {
            const s = String(status || '').toLowerCase();
            if (s.includes('berhasil')) return 'hijau';
            if (s.includes('deteksi')) return 'merah';
            if (s.includes('siaga')) return 'biru';
            return 'kuning';
        }

        onValue(query(ref(db, 'riwayat'), limitToLast(5)), (snap) => {
            const body = $('riwayatBody');
            const daftar = [];
            snap.forEach(c => { daftar.push(c.val()); });

            if (daftar.length === 0) {
                body.innerHTML = '<tr><td colspan="3" class="dv-kosong">Belum ada aktivitas tercatat.</td></tr>';
                return;
            }

            daftar.sort((a, b) => (Number(b.waktu) || 0) - (Number(a.waktu) || 0));
            body.innerHTML = daftar.map(r => `
                <tr>
                    <td>${esc(formatWaktu(r.waktu))}</td>
                    <td>${esc(r.aktivitas)}</td>
                    <td><span class="dv-badge ${kelasBadge(r.status)}">${esc(r.status)}</span></td>
                </tr>`).join('');
        });

        /* ---------- Modal: Manual ---------- */
        const modalManual = $('modalManual');
        $('btnMulaiSekarang').addEventListener('click', () => bukaModal(modalManual));
        $('btnTutupManual').addEventListener('click', () => tutupModal(modalManual));

        $('btnAktifkan').addEventListener('click', async () => {
            tutupModal(modalManual);
            await kirim(update(ref(db, 'kontrol_sistem'), { mode_operasi: 'Manual', perintah_manual: true }), 'Perangkat diaktifkan');
            catatRiwayat('Pengusiran manual dimulai', 'Berhasil');
        });
        $('btnMatikan').addEventListener('click', async () => {
            tutupModal(modalManual);
            await kirim(update(ref(db, 'kontrol_sistem'), { perintah_manual: false }), 'Perangkat dimatikan');
            catatRiwayat('Pengusiran manual dihentikan', 'Siaga');
        });

        /* ---------- Modal: Otomatis (klik kartu langsung ganti mode) ---------- */
        $('modeOtomatis').addEventListener('click', async () => {
            await kirim(update(ref(db, 'kontrol_sistem'), { mode_operasi: 'Otomatis', perintah_manual: false }), 'Mode Otomatis (Sensor) aktif');
            catatRiwayat('Mode diubah ke Otomatis (Sensor)', 'Siaga');
        });

        /* ---------- Modal: Jadwal ---------- */
        const modalJadwal = $('modalJadwal');
        $('btnAturJadwal').addEventListener('click', () => bukaModal(modalJadwal));
        $('btnTutupJadwal').addEventListener('click', () => tutupModal(modalJadwal));

        $('btnSimpanJadwal').addEventListener('click', async () => {
            const interval = parseInt($('inputInterval').value, 10);
            const tanggal = $('inputTanggal').value;

            if (!interval && !tanggal) {
                toast('Isi interval menit atau pilih tanggal dan jam dulu.');
                return;
            }

            const data = { mode_operasi: 'Terjadwal' };
            data.interval_menit = interval > 0 ? interval : null;
            data.jadwal = tanggal || null;

            tutupModal(modalJadwal);
            await kirim(update(ref(db, 'kontrol_sistem'), data), 'Jadwal disimpan');
            catatRiwayat(interval ? `Jadwal interval ${interval} menit disimpan` : 'Jadwal ' + tanggal.replace('T', ' ') + ' disimpan', 'Siaga');
        });

        /* ---------- Modal: Kelola suara ---------- */
        const modalSuara = $('modalSuara');

        function renderPilihanSuara() {
            const wadah = $('pilihanSuara');
            wadah.innerHTML = '';
            katalogSuara.forEach(s => {
                const label = document.createElement('label');
                label.className = 'sound-popup-item';
                label.innerHTML = `
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🔊</span>
                        <div><strong>${esc(s.nama)}</strong><small>${esc(s.ket)}</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <input type="checkbox" name="suara_hewan" value="${esc(s.nama)}" ${suaraAktif.includes(s.nama) ? 'checked' : ''}>
                    </div>`;
                wadah.appendChild(label);
            });
        }

        $('btnKelolaSuara').addEventListener('click', () => { renderPilihanSuara(); bukaModal(modalSuara); });
        $('btnTutupSuara').addEventListener('click', () => tutupModal(modalSuara));
        $('btnSimpanSuara').addEventListener('click', async () => {
            const dipilih = [...document.querySelectorAll('input[name="suara_hewan"]:checked')].map(c => c.value);
            tutupModal(modalSuara);
            await kirim(set(ref(db, 'kontrol_sistem/suara_aktif'), dipilih), 'Daftar suara aktif diperbarui');
        });

        /* ---------- Modal: Perangkat ---------- */
        const modalPerangkat = $('modalPerangkat');
        $('btnLihatPerangkat').addEventListener('click', () => bukaModal(modalPerangkat));
        $('btnTutupPerangkat').addEventListener('click', () => tutupModal(modalPerangkat));

        /* ---------- Klik di luar modal menutup ---------- */
        window.addEventListener('click', (e) => {
            [modalManual, modalJadwal, modalSuara, modalPerangkat].forEach(m => { if (e.target === m) tutupModal(m); });
        });

        renderSuara();
    </script>
</body>
</html>