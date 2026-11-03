<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur SAGA TANI - Monitoring Pengusiran Hama Tikus</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
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
            <nav class="menu"></nav>
        </div>
    </header>

    {{-- ===== HERO BANNER DUA KOLOM ===== --}}
    <section class="hero-fitur-banner">
        <div class="hero-fitur-teks">
            <h2>Kelola Perangkat dengan <br><span>Mudah untuk Pertanian yang Lebih Aman</span></h2>
            <p>SAGA TANI menyediakan berbagai fitur canggih untuk membantu Anda mengelola perangkat pengusir hama tikus secara efektif dan efisien.</p>
        </div>
        <div class="hero-fitur-gambar">
            <img src="{{ asset('images/alat-sagatani.png') }}" alt="Ilustrasi Perangkat SAGA TANI" onerror="this.style.display='none'">
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

    <div id="toast" class="dv-toast" role="status" aria-live="polite"></div>

    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
        import {
            getDatabase, ref, onValue, set, update, push, remove, query, limitToLast
        } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-database.js";

        const app = initializeApp({
            databaseURL: "https://sagatani-7f2c3-default-rtdb.asia-southeast1.firebasedatabase.app"
        });
        const db = getDatabase(app);
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
            if (!w) return '-';
            const d = new Date(w);
            if (isNaN(d)) return String(w);
            const jam = d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false }).replace('.', ':');
            return new Date().toDateString() === d.toDateString() ? jam : d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }) + ' ' + jam;
        }

        function bukaModal(el) { el.style.display = 'flex'; }
        function tutupModal(el) { el.style.display = 'none'; }

        async function catatRiwayat(aktivitas, status) {
            try { await push(ref(db, 'riwayat'), { waktu: Date.now(), aktivitas, status }); } catch (e) {}
        }

        async function kirim(promise, pesanSukses) {
            try { await promise; toast(pesanSukses); } catch (e) { toast('Gagal terhubung ke database.'); }
        }

        const katalogSuara = [
            { nama: 'Suara Elang', ket: 'Paling efektif' },
            { nama: 'Suara Burung Hantu', ket: 'Rekomendasi' },
            { nama: 'Suara Rubah', ket: 'Rekomendasi' },
            { nama: 'Suara Ular', ket: 'Rekomendasi' },
            { nama: 'Suara Anjing', ket: 'Rekomendasi' },
            { nama: 'Suara Serigala', ket: 'Rekomendasi' }
        ];
        let suaraAktif = ['Suara Elang', 'Suara Ular'];

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

            if (k.interval_menit) $('ketJadwal').textContent = `Setiap ${k.interval_menit} menit`;
            else if (k.jadwal) $('ketJadwal').textContent = 'Jadwal: ' + k.jadwal.replace('T', ' ');
            else $('ketJadwal').textContent = 'Atur jadwal pengusiran';

            const sensor = k.status_sensor || 'Siaga';
            $('statSensor').textContent = sensor;
            $('statSensorKet').textContent = sensor.toLowerCase() === 'siaga' ? 'Siap mendeteksi pergerakan' : 'Pergerakan terdeteksi';
            $('ketOtomatis').textContent = sensor.toLowerCase() === 'siaga' ? 'Sensor siaga' : 'Sensor mendeteksi gerakan';

            const diputar = k.suara_diputar || '';
            $('statSuara').textContent = diputar ? diputar : 'Tidak Ada';
            $('statSuaraKet').textContent = diputar ? 'Sedang diputar di lahan' : 'Menunggu pemicu...';

            if (Array.isArray(k.suara_aktif)) suaraAktif = k.suara_aktif.filter(Boolean);
            renderSuara();
        });

        onValue(ref(db, 'perangkat'), (snap) => {
            const p = snap.val()?.['R-881'] || Object.values(snap.val() || {})[0];
            const pill = $('statPerangkatPill');
            if (!p) {
                $('statPerangkat').textContent = 'ESP32';
                $('statPerangkatKet').textContent = 'Terakhir aktif: -';
                pill.textContent = 'Offline';
                pill.classList.add('offline');
                return;
            }
            const online = String(p.status || '').toLowerCase().match(/^(online|aktif)$/);
            $('statPerangkat').textContent = p.nama || 'ESP32';
            $('statPerangkatKet').textContent = 'Terakhir aktif: ' + (p.terakhir_aktif ? formatWaktu(p.terakhir_aktif) + ' WIB' : '-');
            pill.textContent = online ? 'Online' : 'Offline';
            pill.classList.toggle('offline', !online);
        });

        function renderSuara() {
            const ul = $('daftarSuaraAktif');
            ul.innerHTML = '';
            if (suaraAktif.length === 0) {
                ul.innerHTML = '<li class="dv-kosong" style="justify-content:center;">Belum ada suara aktif.</li>';
                return;
            }
            suaraAktif.forEach((nama) => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <button type="button" class="dv-play">▶</button>
                    <span class="dv-nama">${esc(nama)}</span>
                    <button type="button" class="dv-menu-btn">⋮</button>
                    <div class="dv-dropdown"><button type="button" data-aksi="nonaktif">Nonaktifkan</button></div>`;
                li.querySelector('.dv-play').addEventListener('click', async () => {
                    await kirim(update(ref(db, 'kontrol_sistem'), { putar_suara: nama, suara_diputar: nama }), 'Memutar: ' + nama);
                    catatRiwayat(nama + ' diputar', 'Berhasil');
                });
                const dd = li.querySelector('.dv-dropdown');
                li.querySelector('.dv-menu-btn').addEventListener('click', (e) => {
                    e.stopPropagation();
                    document.querySelectorAll('.dv-dropdown.buka').forEach(x => { if (x !== dd) x.classList.remove('buka'); });
                    dd.classList.toggle('buka');
                });
                dd.querySelector('[data-aksi="nonaktif"]').addEventListener('click', () => {
                    kirim(set(ref(db, 'kontrol_sistem/suara_aktif'), suaraAktif.filter(s => s !== nama)), nama + ' dinonaktifkan');
                });
                ul.appendChild(li);
            });
        }

        document.addEventListener('click', () => document.querySelectorAll('.dv-dropdown.buka').forEach(x => x.classList.remove('buka')));

        onValue(query(ref(db, 'riwayat'), limitToLast(5)), (snap) => {
            const body = $('riwayatBody');
            const daftar = [];
            snap.forEach(c => daftar.push(c.val()));
            if (daftar.length === 0) {
                body.innerHTML = '<tr><td colspan="3" class="dv-kosong">Belum ada aktivitas.</td></tr>';
                return;
            }
            daftar.sort((a, b) => (Number(b.waktu) || 0) - (Number(a.waktu) || 0));
            body.innerHTML = daftar.map(r => `
                <tr>
                    <td>${esc(formatWaktu(r.waktu))}</td>
                    <td>${esc(r.aktivitas)}</td>
                    <td><span class="dv-badge ${String(r.status).toLowerCase().includes('berhasil') ? 'hijau' : 'kuning'}">${esc(r.status)}</span></td>
                </tr>`).join('');
        });

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

        $('modeOtomatis').addEventListener('click', async () => {
            await kirim(update(ref(db, 'kontrol_sistem'), { mode_operasi: 'Otomatis', perintah_manual: false }), 'Mode Otomatis aktif');
            catatRiwayat('Mode diubah ke Otomatis', 'Siaga');
        });

        const modalJadwal = $('modalJadwal');
        $('btnAturJadwal').addEventListener('click', () => bukaModal(modalJadwal));
        $('btnTutupJadwal').addEventListener('click', () => tutupModal(modalJadwal));
        $('btnSimpanJadwal').addEventListener('click', async () => {
            const interval = parseInt($('inputInterval').value, 10);
            const tanggal = $('inputTanggal').value;
            if (!interval && !tanggal) { toast('Isi interval atau tanggal.'); return; }
            tutupModal(modalJadwal);
            await kirim(update(ref(db, 'kontrol_sistem'), { mode_operasi: 'Terjadwal', interval_menit: interval || null, jadwal: tanggal || null }), 'Jadwal disimpan');
            catatRiwayat('Jadwal pengusiran diperbarui', 'Siaga');
        });

        const modalSuara = $('modalSuara');
        $('btnKelolaSuara').addEventListener('click', () => {
            $('pilihanSuara').innerHTML = katalogSuara.map(s => `
                <label class="sound-popup-item">
                    <div class="sound-popup-left"><span class="sound-icon-circle">🔊</span><div><strong>${s.nama}</strong><small>${s.ket}</small></div></div>
                    <input type="checkbox" name="suara_hewan" value="${s.nama}" ${suaraAktif.includes(s.nama) ? 'checked' : ''}>
                </label>`).join('');
            bukaModal(modalSuara);
        });
        $('btnTutupSuara').addEventListener('click', () => tutupModal(modalSuara));
        $('btnSimpanSuara').addEventListener('click', async () => {
            const dipilih = [...document.querySelectorAll('input[name="suara_hewan"]:checked')].map(c => c.value);
            tutupModal(modalSuara);
            await kirim(set(ref(db, 'kontrol_sistem/suara_aktif'), dipilih), 'Daftar suara diperbarui');
        });

        window.addEventListener('click', (e) => {
            [modalManual, modalJadwal, modalSuara].forEach(m => { if (e.target === m) tutupModal(m); });
        });

        renderSuara();
    </script>
</body>
</html>