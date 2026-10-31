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

            <nav class="menu">
                <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                <a href="{{ url('/tentang') }}" class="nav-link">Tentang</a>
                <a href="{{ url('/fitur') }}" class="nav-link aktif">Fitur</a>
            </nav>
        </div>
    </header>

    {{-- ===== HERO BANNER MEMANJANG DENGAN TEKS DI ATAS GAMBAR ===== --}}
    <section class="hero-fitur-banner">
        <div class="hero-fitur-teks">
            <h2>Kelola Perangkat dengan <br><span>Mudah untuk Pertanian yang Lebih Aman</span></h2>
            <p>SAGA TANI menyediakan berbagai fitur canggih untuk membantu Anda mengelola perangkat pengusir hama tikus secara efektif dan efisien.</p>
        </div>
    </section>

    {{-- ===== KONTEN KARTU FITUR DI BAWAHNYA ===== --}}
    <section class="fitur-section">
        <div class="fitur-grid">
            
            {{-- Kartu 1: Mode Operasi --}}
            <div class="fitur-card">
                <div class="card-title-box">
                    <div class="icon-box">⚙️</div>
                    <div>
                        <h3>Mode Operasi</h3>
                        <p>Atur cara kerja perangkat sesuai kebutuhan lahan Anda</p>
                    </div>
                </div>
                <div class="mode-operasi-grid">
                    <div class="sub-box">
                        <h4>Manual</h4>
                        <p>Aktifkan pengusiran hama tikus secara langsung kapan saja.</p>
                        <button id="btnMulaiSekarang" class="btn-outline-kecil" style="cursor:pointer;">Mulai Sekarang →</button>
                    </div>
                    <div class="sub-box">
                        <h4>Terjadwal</h4>
                        <p>Jadwalkan pengusiran otomatis sesuai waktu yang diinginkan.</p>
                        <button id="btnAturJadwal" class="btn-outline-kecil" style="cursor:pointer;">Atur Jadwal →</button>
                    </div>
                </div>
            </div>

            {{-- Kartu 2: Detail Perangkat --}}
            <div class="fitur-card">
                <div class="card-title-box space-between">
                    <div class="icon-box">📱</div>
                    <div>
                        <h3>Detail Perangkat</h3>
                        <p>Kelola berbagai jenis suara pengusir hama yang tersedia di perangkat.</p>
                    </div>
                    <button type="button" id="btnLihatPerangkat" class="link-hijau-tebal" style="background:none; border:none; cursor:pointer; padding:0;">Lihat semua perangkat →</button>
                </div>
                <div class="stats-row">
                    <div class="stat-item">
                        <span class="stat-icon">📡</span>
                        <span class="stat-num" id="statTotal">3</span>
                        <span class="stat-label">Total Perangkat</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">🟢</span>
                        <span class="stat-num" id="statAktif">2</span>
                        <span class="stat-label">Perangkat Aktif</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-icon">🔴</span>
                        <span class="stat-num" id="statOffline">1</span>
                        <span class="stat-label">Perangkat Offline</span>
                    </div>
                </div>
            </div>

            {{-- Kartu 3: Daftar Suara --}}
            <div class="fitur-card">
                <div class="card-title-box space-between">
                    <div class="icon-box">🔊</div>
                    <div>
                        <h3>Daftar Suara</h3>
                        <p>Kelola berbagai jenis suara pengusir hama yang tersedia di perangkat.</p>
                    </div>
                    <button type="button" id="btnKelolaSuara" class="link-hijau-tebal" style="background:none; border:none; cursor:pointer; padding:0;">Kelola Suara →</button>
                </div>
                <div id="daftarSuaraAktif" class="sound-list">
                    <!-- Dinamis via JS -->
                </div>
            </div>

            {{-- Kartu 4: Riwayat Aktivitas --}}
            <div class="fitur-card">
                <div class="card-title-box space-between">
                    <div class="icon-box">🕒</div>
                    <div>
                        <h3>Riwayat Aktivitas</h3>
                        <p>Pantau seluruh aktivitas pengusiran hama pada perangkat Anda.</p>
                    </div>
                    <a href="{{ url('/riwayat-aktivitas') }}" class="link-hijau-tebal">Lihat semua →</a>
                </div>
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Tanggal & Waktu</th>
                            <th>Lokasi</th>
                            <th>Jenis Aktivitas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>18 Agst 2026 08:25</td>
                            <td>📍 Sawah Selatan</td>
                            <td>⚡ Pengusiran Otomatis</td>
                            <td><span class="badge-status success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>18 Agst 2026 06:32</td>
                            <td>📍 Sawah Tengah</td>
                            <td>⏰ Pengusiran Terjadwal</td>
                            <td><span class="badge-status success">Berhasil</span></td>
                        </tr>
                        <tr>
                            <td>1 Sep 2026 16:10</td>
                            <td>📍 Tepi Sungai</td>
                            <td>🖐️ Pengusiran Manual</td>
                            <td><span class="badge-status pending">Persiapan</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    {{-- ===== MODAL / POP-UP MANUAL ===== --}}
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

    {{-- ===== MODAL / POP-UP ATUR JADWAL ===== --}}
    <div id="modalJadwal" class="modal-overlay">
        <div class="modal-content">
            <h3>Atur Jadwal Pengusiran Hama</h3>
            <p>Tentukan tanggal, bulan, tahun, dan jam aktif perangkat otomatis.</p>
            <div class="form-group-jadwal">
                <label for="inputTanggal">Pilih Tanggal, Bulan, Tahun & Jam:</label>
                <input type="datetime-local" id="inputTanggal" class="input-datetime">
            </div>
            <div class="modal-actions">
                <button type="button" id="btnSimpanJadwal" class="btn-modal-aktif">Simpan Jadwal</button>
                <button type="button" id="btnTutupJadwal" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL / POP-UP KELOLA SUARA ===== --}}
    <div id="modalSuara" class="modal-overlay">
        <div class="modal-content modal-suara-container">
            <h3>Pilih Suara Pengusir Hama</h3>
            <p>Anda bisa memilih beberapa suara hewan untuk diaktifkan sekaligus pada perangkat.</p>
            
            <div class="sound-popup-list">
                <label class="sound-popup-item">
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🦅</span>
                        <div><strong>Suara Elang</strong><small>Paling efektif [rekomendasi]</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <button type="button" class="play-btn-popup" onclick="event.preventDefault(); alert('Memutar Suara Elang...');">▶</button>
                        <input type="checkbox" name="suara_hewan" value="Suara Elang" data-desc="Paling efektif (rekomendasi)" checked>
                    </div>
                </label>
                <label class="sound-popup-item">
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🦉</span>
                        <div><strong>Suara Burung Hantu</strong><small>Rekomendasi</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <button type="button" class="play-btn-popup" onclick="event.preventDefault(); alert('Memutar Suara Burung Hantu...');">▶</button>
                        <input type="checkbox" name="suara_hewan" value="Suara Burung Hantu" data-desc="Rekomendasi">
                    </div>
                </label>
                <label class="sound-popup-item">
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🦊</span>
                        <div><strong>Suara Rubah</strong><small>Rekomendasi</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <button type="button" class="play-btn-popup" onclick="event.preventDefault(); alert('Memutar Suara Rubah...');">▶</button>
                        <input type="checkbox" name="suara_hewan" value="Suara Rubah" data-desc="Rekomendasi">
                    </div>
                </label>
                <label class="sound-popup-item">
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🐍</span>
                        <div><strong>Suara Ular</strong><small>Rekomendasi</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <button type="button" class="play-btn-popup" onclick="event.preventDefault(); alert('Memutar Suara Ular...');">▶</button>
                        <input type="checkbox" name="suara_hewan" value="Suara Ular" data-desc="Rekomendasi" checked>
                    </div>
                </label>
                <label class="sound-popup-item">
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle">🐕</span>
                        <div><strong>Suara Anjing</strong><small>Rekomendasi</small></div>
                    </div>
                    <div class="sound-popup-right">
                        <button type="button" class="play-btn-popup" onclick="event.preventDefault(); alert('Memutar Suara Anjing...');">▶</button>
                        <input type="checkbox" name="suara_hewan" value="Suara Anjing" data-desc="Rekomendasi">
                    </div>
                </label>
            </div>

            <div class="modal-actions" style="margin-top: 20px;">
                <button type="button" id="btnSimpanSuara" class="btn-modal-aktif">Simpan Pilihan</button>
                <button type="button" id="btnTutupSuara" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL / POP-UP LIHAT SEMUA PERANGKAT ===== --}}
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

    {{-- ===== FOOTER ===== --}}
    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

    {{-- ===== JAVASCRIPT ===== --}}
    <script>
        const modalManual = document.getElementById('modalManual');
        const btnMulai = document.getElementById('btnMulaiSekarang');
        const btnTutupManual = document.getElementById('btnTutupManual');
        const btnAktifkan = document.getElementById('btnAktifkan');
        const btnMatikan = document.getElementById('btnMatikan');

        btnMulai.addEventListener('click', (e) => { e.preventDefault(); modalManual.style.display = 'flex'; });
        btnTutupManual.addEventListener('click', () => modalManual.style.display = 'none');
        btnAktifkan.addEventListener('click', () => { alert('Perangkat DIAKTIFKAN!'); modalManual.style.display = 'none'; });
        btnMatikan.addEventListener('click', () => { alert('Perangkat DIMATIKAN!'); modalManual.style.display = 'none'; });

        const modalJadwal = document.getElementById('modalJadwal');
        const btnAturJadwal = document.getElementById('btnAturJadwal');
        const btnTutupJadwal = document.getElementById('btnTutupJadwal');
        const btnSimpanJadwal = document.getElementById('btnSimpanJadwal');
        const inputTanggal = document.getElementById('inputTanggal');

        btnAturJadwal.addEventListener('click', (e) => { e.preventDefault(); modalJadwal.style.display = 'flex'; });
        btnTutupJadwal.addEventListener('click', () => modalJadwal.style.display = 'none');
        btnSimpanJadwal.addEventListener('click', () => {
            if(!inputTanggal.value) { alert('Pilih tanggal dan jam dulu!'); return; }
            alert('Jadwal disimpan: ' + inputTanggal.value);
            modalJadwal.style.display = 'none';
        });

        // Modal Kelola Suara
        const modalSuara = document.getElementById('modalSuara');
        const btnKelolaSuara = document.getElementById('btnKelolaSuara');
        const btnTutupSuara = document.getElementById('btnTutupSuara');
        const btnSimpanSuara = document.getElementById('btnSimpanSuara');
        const containerDaftarSuara = document.getElementById('daftarSuaraAktif');

        function perbaruiTampilanSuaraAktif() {
            const checkboxes = document.querySelectorAll('input[name="suara_hewan"]:checked');
            containerDaftarSuara.innerHTML = '';
            if (checkboxes.length === 0) {
                containerDaftarSuara.innerHTML = '<p style="font-size:13px; color:var(--abu); text-align:center; padding:10px;">Belum ada suara yang diaktifkan.</p>';
                return;
            }
            checkboxes.forEach(cb => {
                const namaSuara = cb.value;
                const desc = cb.getAttribute('data-desc');
                const itemDiv = document.createElement('div');
                itemDiv.className = 'sound-item';
                itemDiv.innerHTML = `
                    <div class="sound-info">
                        <button type="button" class="play-btn" onclick="alert('Memutar ${namaSuara}...')">▶</button>
                        <div><strong>${namaSuara}</strong><small>${desc}</small></div>
                    </div>
                    <span class="status-aktif">🟢 Aktif</span>
                `;
                containerDaftarSuara.appendChild(itemDiv);
            });
        }
        perbaruiTampilanSuaraAktif();
        btnKelolaSuara.addEventListener('click', (e) => { e.preventDefault(); modalSuara.style.display = 'flex'; });
        btnTutupSuara.addEventListener('click', () => modalSuara.style.display = 'none');
        btnSimpanSuara.addEventListener('click', () => {
            perbaruiTampilanSuaraAktif();
            alert('Daftar suara aktif berhasil diperbarui!');
            modalSuara.style.display = 'none';
        });

        // Data Perangkat IoT (Baterai) dengan Fungsi Hapus & Tambah
        let dataPerangkat = [
            { nama: "Sawah Selatan (Unit 01)", status: "Aktif", baterai: "92% (Aman)" },
            { nama: "Sawah Tengah (Unit 02)", status: "Aktif", baterai: "75% (Aman)" },
            { nama: "Tepi Sungai (Unit 03)", status: "Offline", baterai: "5% (Perlu Ganti)" }
        ];

        const modalPerangkat = document.getElementById('modalPerangkat');
        const btnLihatPerangkat = document.getElementById('btnLihatPerangkat');
        const btnTutupPerangkat = document.getElementById('btnTutupPerangkat');
        const btnTambahPerangkat = document.getElementById('btnTambahPerangkat');
        const daftarPerangkatList = document.getElementById('daftarPerangkatList');

        function renderPerangkat() {
            daftarPerangkatList.innerHTML = '';
            let total = dataPerangkat.length;
            let aktif = 0;
            let offline = 0;

            if (total === 0) {
                daftarPerangkatList.innerHTML = '<p style="font-size:13px; color:var(--abu); text-align:center; padding:15px;">Belum ada perangkat terdaftar.</p>';
            }

            dataPerangkat.forEach((p, index) => {
                if (p.status === "Aktif") aktif++;
                else offline++;

                const isAktif = p.status === "Aktif";
                const itemDiv = document.createElement('div');
                itemDiv.className = `sound-popup-item ${isAktif ? 'active-item' : ''}`;
                if (!isAktif) {
                    itemDiv.style.borderColor = '#fca5a5';
                    itemDiv.style.background = '#fef2f2';
                }

                itemDiv.innerHTML = `
                    <div class="sound-popup-left">
                        <span class="sound-icon-circle" style="${!isAktif ? 'background: #fee2e2;' : ''}">${isAktif ? '🔋' : '🪫'}</span>
                        <div>
                            <strong>${p.nama}</strong>
                            <small style="${!isAktif ? 'color: #dc2626;' : ''}">Status: ${p.status} • Baterai: ${p.baterai}</small>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 11px; font-weight: 600; color: ${isAktif ? 'var(--hijau-tua)' : '#dc2626'};">
                            ${isAktif ? '🟢 Aktif' : '🔴 Offline'}
                        </span>
                        <button type="button" onclick="hapusPerangkat(${index})" style="background: #fee2e2; color: #dc2626; border: none; padding: 5px 10px; border-radius: 6px; font-size: 11px; font-weight: 600; cursor: pointer;">Hapus</button>
                    </div>
                `;
                daftarPerangkatList.appendChild(itemDiv);
            });

            document.getElementById('statTotal').innerText = total;
            document.getElementById('statAktif').innerText = aktif;
            document.getElementById('statOffline').innerText = offline;
        }

        window.hapusPerangkat = function(index) {
            if (confirm(`Yakin ingin menghapus perangkat "${dataPerangkat[index].nama}"?`)) {
                dataPerangkat.splice(index, 1);
                renderPerangkat();
            }
        };

        renderPerangkat();

        btnLihatPerangkat.addEventListener('click', (e) => {
            e.preventDefault();
            modalPerangkat.style.display = 'flex';
        });
        btnTutupPerangkat.addEventListener('click', () => modalPerangkat.style.display = 'none');

        btnTambahPerangkat.addEventListener('click', () => {
            const namaBaru = prompt("Masukkan nama lokasi perangkat baru (contoh: Sawah Utara):");
            if (namaBaru && namaBaru.trim() !== "") {
                dataPerangkat.push({
                    nama: `${namaBaru.trim()} (Unit 0${dataPerangkat.length + 1})`,
                    status: "Aktif",
                    baterai: "100% (Baru)"
                });
                renderPerangkat();
                alert("Perangkat baru berhasil ditambahkan!");
            }
        });

        window.addEventListener('click', (e) => {
            if (e.target === modalManual) modalManual.style.display = 'none';
            if (e.target === modalJadwal) modalJadwal.style.display = 'none';
            if (e.target === modalSuara) modalSuara.style.display = 'none';
            if (e.target === modalPerangkat) modalPerangkat.style.display = 'none';
        });
    </script>
</body>
</html>