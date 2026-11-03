<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Aktivitas - SAGA TANI</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fitur.css') }}">
</head>
<body style="background: #f8fcf9;">

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

    {{-- ===== KONTEN UTAMA HALAMAN RIWAYAT ===== --}}
    <main class="dv-wrap" style="max-width: 1300px;">
        
        <div class="riwayat-header-box">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                <div class="dv-status-icon" style="width: 50px; height: 50px; font-size: 22px;">⏱️</div>
                <div>
                    <h1 style="font-size: 22px; color: var(--dv-hijau-tua); margin-bottom: 4px;">Riwayat Aktivitas</h1>
                    <p style="font-size: 13.5px; color: var(--dv-abu);">Lihat riwayat aktivitas pengusiran hama tikus pada lahan Anda secara lengkap.</p>
                </div>
            </div>

            <div class="dv-status-row" style="grid-template-columns: repeat(4, 1fr);">
                <div class="dv-card dv-status" style="padding: 16px;">
                    <div class="dv-status-body">
                        <small>Total Aktivitas</small>
                        <strong>128</strong>
                        <span>↑ 12% dari periode</span>
                    </div>
                </div>
                <div class="dv-card dv-status" style="padding: 16px;">
                    <div class="dv-status-body">
                        <small>Berhasil</small>
                        <strong style="color: #16a34a;">116</strong>
                        <span>↑ 91% dari total</span>
                    </div>
                </div>
                <div class="dv-card dv-status" style="padding: 16px; background: #fffbeb; border-color: #fde68a;">
                    <div class="dv-status-body">
                        <small>Peringatan</small>
                        <strong style="color: #d97706;">8</strong>
                        <span>↑ 6% dari total</span>
                    </div>
                </div>
                <div class="dv-card dv-status" style="padding: 16px; background: #fef2f2; border-color: #fecaca;">
                    <div class="dv-status-body">
                        <small>Gagal</small>
                        <strong style="color: #dc2626;">4</strong>
                        <span>↑ 3% dari total</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="dv-card dv-panel" style="margin-bottom: 30px; padding: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
                <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                    
                    {{-- TOMBOL PERIODE --}}
                    <div>
                        <label style="font-size: 11px; color: var(--dv-abu); display: block; margin-bottom: 4px;">Periode</label>
                        <button type="button" id="btnBukaModalPeriode" style="padding: 8px 14px; border-radius: 8px; border: 1px solid var(--dv-garis); font-size: 13px; background: #fff; cursor: pointer; display: flex; align-items: center; gap: 10px; color: var(--dv-teks); font-weight: 500;">
                            <span id="labelPeriodeAktif">01 Okt 2026 - 31 Okt 2026</span>
                            <span>▼</span>
                        </button>
                    </div>

                    <div>
                        <label style="font-size: 11px; color: var(--dv-abu); display: block; margin-bottom: 4px;">Perangkat</label>
                        <select style="padding: 8px 12px; border-radius: 8px; border: 1px solid var(--dv-garis); font-size: 13px; outline: none; background: #fff; font-family: inherit;">
                            <option>Semua Perangkat</option>
                        </select>
                    </div>
                </div>

                {{-- PENCARIAN & FILTER --}}
                <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                    <input type="text" id="inputPencarian" placeholder="Cari suara, perangkat, lokasi..." style="padding: 8px 14px; border-radius: 8px; border: 1px solid var(--dv-garis); font-size: 13px; outline: none; width: 240px; font-family: inherit;">
                    <button type="button" id="btnTerapkanFilter" class="btn-modal-aktif" style="padding: 8px 16px; font-size: 13px; cursor: pointer;">Terapkan Filter</button>
                    <button type="button" id="btnUnduhLaporan" class="btn-modal-tutup" style="padding: 8px 16px; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 5px;">📥 Unduh Laporan</button>
                </div>
            </div>

            <table class="activity-table">
                <thead>
                    <tr>
                        <th>Tanggal & Waktu</th>
                        <th>Perangkat</th>
                        <th>Lokasi Sawah</th>
                        <th>Mode Operasi</th>
                        <th>Suara</th>
                        <th>Durasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tabelRiwayatBody">
                    <tr data-keyword="31 okt 2026 r-881 sawah utara manual suara elang 5 menit berhasil">
                        <td>31 Okt 2026, 08:24</td>
                        <td>R-881</td>
                        <td>📍 Sawah Utara</td>
                        <td>⚡ Manual</td>
                        <td>🔊 Suara Elang</td>
                        <td>5 menit</td>
                        <td><span class="badge-status success">Berhasil</span></td>
                    </tr>
                    <tr data-keyword="30 okt 2026 r-882 sawah tengah terjadwal suara burung hantu 10 menit berhasil">
                        <td>30 Okt 2026, 20:00</td>
                        <td>R-882</td>
                        <td>📍 Sawah Tengah</td>
                        <td>⏰ Terjadwal</td>
                        <td>🔊 Suara Burung Hantu</td>
                        <td>10 menit</td>
                        <td><span class="badge-status success">Berhasil</span></td>
                    </tr>
                    <tr data-keyword="29 okt 2026 r-881 sawah selatan otomatis suara ular 7 menit peringatan">
                        <td>29 Okt 2026, 19:15</td>
                        <td>R-881</td>
                        <td>📍 Sawah Selatan</td>
                        <td>🤖 Otomatis</td>
                        <td>🔊 Suara Ular</td>
                        <td>7 menit</td>
                        <td><span class="badge-status warning">⚠️ Peringatan</span></td>
                    </tr>
                    <tr data-keyword="28 okt 2026 r-883 blok c terjadwal suara rubah 8 menit berhasil">
                        <td>28 Okt 2026, 21:30</td>
                        <td>R-883</td>
                        <td>📍 Blok C</td>
                        <td>⏰ Terjadwal</td>
                        <td>🔊 Suara Rubah</td>
                        <td>8 menit</td>
                        <td><span class="badge-status success">Berhasil</span></td>
                    </tr>
                    <tr data-keyword="27 okt 2026 r-882 sawah tengah otomatis suara anjing 10 menit gagal">
                        <td>27 Okt 2026, 17:45</td>
                        <td>R-882</td>
                        <td>📍 Sawah Tengah</td>
                        <td>🤖 Otomatis</td>
                        <td>🔊 Suara Anjing</td>
                        <td>10 menit</td>
                        <td><span class="badge-status danger">❌ Gagal</span></td>
                    </tr>
                </tbody>
            </table>

            <div id="pesanKosong" style="display: none; text-align: center; padding: 25px; color: var(--dv-abu); font-size: 13px;">
                Tidak ada data riwayat aktivitas yang sesuai dengan kata kunci pencarian.
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ url('/fitur') }}" class="btn-modal-aktif" style="text-decoration: none; display: inline-block;">← Kembali ke Halaman Dashboard</a>
        </div>
    </main>

    {{-- ===== MODAL PEMILIH TANGGAL ===== --}}
    <div id="modalPeriode" class="modal-overlay">
        <div class="modal-content" style="max-width: 420px; text-align: left;">
            <h3>Pilih Periode Tanggal</h3>
            <p>Tentukan rentang tanggal mulai dan tanggal selesai untuk memfilter riwayat aktivitas.</p>
            
            <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--dv-teks); margin-bottom: 6px;">Tanggal Mulai:</label>
                    <input type="date" id="inputTanggalMulai" value="2026-10-01" class="input-datetime">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--dv-teks); margin-bottom: 6px;">Tanggal Selesai:</label>
                    <input type="date" id="inputTanggalSelesai" value="2026-10-31" class="input-datetime">
                </div>
            </div>

            <div class="modal-actions">
                <button type="button" id="btnSimpanPeriode" class="btn-modal-aktif">Terapkan</button>
                <button type="button" id="btnTutupPeriode" class="btn-modal-tutup">Batal</button>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 2026 SAGA TANI. Semua hak dilindungi.</p>
    </footer>

    {{-- ===== JAVASCRIPT ===== --}}
    <script>
        const modalPeriode = document.getElementById('modalPeriode');
        const btnBukaModalPeriode = document.getElementById('btnBukaModalPeriode');
        const btnTutupPeriode = document.getElementById('btnTutupPeriode');
        const btnSimpanPeriode = document.getElementById('btnSimpanPeriode');
        const labelPeriodeAktif = document.getElementById('labelPeriodeAktif');
        const inputMulai = document.getElementById('inputTanggalMulai');
        const inputSelesai = document.getElementById('inputTanggalSelesai');

        btnBukaModalPeriode.addEventListener('click', () => { modalPeriode.style.display = 'flex'; });
        btnTutupPeriode.addEventListener('click', () => { modalPeriode.style.display = 'none'; });

        function formatTanggalIndo(tanggalStr) {
            if (!tanggalStr) return '';
            const dt = new Date(tanggalStr);
            const opsi = { day: '2-digit', month: 'short', year: 'numeric' };
            return dt.toLocaleDateString('id-ID', opsi);
        }

        btnSimpanPeriode.addEventListener('click', () => {
            const tglMulai = formatTanggalIndo(inputMulai.value);
            const tglSelesai = formatTanggalIndo(inputSelesai.value);
            if (inputMulai.value && inputSelesai.value) {
                labelPeriodeAktif.innerText = `${tglMulai} - ${tglSelesai}`;
            }
            modalPeriode.style.display = 'none';
        });

        // Logika Pencarian & Filter Tabel
        const inputPencarian = document.getElementById('inputPencarian');
        const btnTerapkanFilter = document.getElementById('btnTerapkanFilter');
        const tabelRiwayatBody = document.getElementById('tabelRiwayatBody');
        const pesanKosong = document.getElementById('pesanKosong');

        function jalankanPencarian() {
            const keyword = inputPencarian.value.toLowerCase().trim();
            const barisData = tabelRiwayatBody.getElementsByTagName('tr');
            let jumlahDitemukan = 0;

            for (let i = 0; i < barisData.length; i++) {
                const keywordBaris = barisData[i].getAttribute('data-keyword') || '';
                if (keywordBaris.includes(keyword) || keyword === "") {
                    barisData[i].style.display = "";
                    jumlahDitemukan++;
                } else {
                    barisData[i].style.display = "none";
                }
            }

            if (jumlahDitemukan === 0) {
                pesanKosong.style.display = "block";
            } else {
                pesanKosong.style.display = "none";
            }
        }

        btnTerapkanFilter.addEventListener('click', () => {
            jalankanPencarian();
        });

        inputPencarian.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                jalankanPencarian();
            }
        });

        // Logika Unduh Laporan (CSV)
        const btnUnduhLaporan = document.getElementById('btnUnduhLaporan');
        btnUnduhLaporan.addEventListener('click', () => {
            let csv = [];
            const rows = document.querySelectorAll('.activity-table tr');

            for (let i = 0; i < rows.length; i++) {
                if (rows[i].style.display !== 'none') {
                    let row = [], cols = rows[i].querySelectorAll('th, td');
                    for (let j = 0; j < cols.length; j++) {
                        let text = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, "").trim();
                        row.push('"' + text + '"');
                    }
                    csv.push(row.join(','));
                }
            }

            if (csv.length <= 1) {
                alert("Tidak ada data yang dapat diunduh.");
                return;
            }

            let csvFile = new Blob([csv.join('\n')], { type: 'text/csv;charset=utf-8;' });
            let downloadLink = document.createElement('a');
            downloadLink.download = 'Laporan_Riwayat_Aktivitas_SagaTani.csv';
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });

        window.addEventListener('click', (e) => {
            if (e.target === modalPeriode) {
                modalPeriode.style.display = 'none';
            }
        });
    </script>
</body>
</html>