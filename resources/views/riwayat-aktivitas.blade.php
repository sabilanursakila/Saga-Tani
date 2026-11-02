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

    {{-- ===== NAVBAR (Menu Navigasi Dihapus) ===== --}}
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
                {{-- Kosong --}}
            </nav>
        </div>
    </header>

    {{-- ===== KONTEN UTAMA HALAMAN RIWAYAT ===== --}}
    <main class="fitur-section" style="max-width: 1300px; margin: 40px auto;">
        
        <div class="riwayat-header-box" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 25px; margin-bottom: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                <div class="icon-box" style="font-size: 24px;">⏱️</div>
                <div>
                    <h1 style="font-size: 24px; color: var(--hijau-gelap); margin-bottom: 4px;">Riwayat Aktivitas</h1>
                    <p style="font-size: 14px; color: var(--abu);">Lihat riwayat aktivitas pengusiran hama tikus pada lahan Anda secara lengkap.</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
                <div style="background: #f8fcf9; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="background: var(--hijau-muda); padding: 8px; border-radius: 8px;">📊</span>
                        <span style="font-size: 13px; color: var(--abu);">Total Aktivitas</span>
                    </div>
                    <div style="font-size: 28px; font-weight: 700; color: var(--hijau-gelap);">128</div>
                    <small style="font-size: 11px; color: var(--hijau-tua); font-weight: 600;">↑ 12% dari periode sebelumnya</small>
                </div>

                <div style="background: #f8fcf9; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="background: #e6f4ea; padding: 8px; border-radius: 8px;">✅</span>
                        <span style="font-size: 13px; color: var(--abu);">Pengusiran Berhasil</span>
                    </div>
                    <div style="font-size: 28px; font-weight: 700; color: var(--hijau-gelap);">116</div>
                    <small style="font-size: 11px; color: var(--hijau-tua); font-weight: 600;">↑ 91% dari total aktivitas</small>
                </div>

                <div style="background: #f8fcf9; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="background: #fef3c7; padding: 8px; border-radius: 8px;">⚠️</span>
                        <span style="font-size: 13px; color: var(--abu);">Peringatan</span>
                    </div>
                    <div style="font-size: 28px; font-weight: 700; color: var(--hijau-gelap);">8</div>
                    <small style="font-size: 11px; color: #d97706; font-weight: 600;">↑ 6% dari total aktivitas</small>
                </div>

                <div style="background: #f8fcf9; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="background: #fee2e2; padding: 8px; border-radius: 8px;">❌</span>
                        <span style="font-size: 13px; color: var(--abu);">Gagal</span>
                    </div>
                    <div style="font-size: 28px; font-weight: 700; color: var(--hijau-gelap);">4</div>
                    <small style="font-size: 11px; color: #dc2626; font-weight: 600;">↑ 3% dari total aktivitas</small>
                </div>
            </div>
        </div>

        <div class="fitur-card" style="margin-bottom: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
                <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                    
                    {{-- TOMBOL PERIODE --}}
                    <div>
                        <label style="font-size: 11px; color: var(--abu); display: block; margin-bottom: 4px;">Periode</label>
                        <button type="button" id="btnBukaModalPeriode" style="padding: 8px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13px; background: #fff; cursor: pointer; display: flex; align-items: center; gap: 10px; color: var(--teks); font-weight: 500;">
                            <span id="labelPeriodeAktif">01 Okt 2026 - 31 Okt 2026</span>
                            <span>▼</span>
                        </button>
                    </div>

                    <div>
                        <label style="font-size: 11px; color: var(--abu); display: block; margin-bottom: 4px;">Perangkat</label>
                        <select style="padding: 8px 12px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13px; outline: none; background: #fff;">
                            <option>Semua Perangkat</option>
                        </select>
                    </div>
                </div>

                {{-- KOLOM PENCARIAN & TOMBOL TERAPKAN FILTER / UNDUH --}}
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="text" id="inputPencarian" placeholder="Cari suara, perangkat, lokasi..." style="padding: 8px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13px; outline: none; width: 240px;">
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
                        <td><span class="badge-status" style="background:#fef3c7; color:#d97706;">⚠️ Peringatan</span></td>
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
                        <td>27 okt 2026, 17:45</td>
                        <td>R-882</td>
                        <td>📍 Sawah Tengah</td>
                        <td>🤖 Otomatis</td>
                        <td>🔊 Suara Anjing</td>
                        <td>10 menit</td>
                        <td><span class="badge-status" style="background:#fee2e2; color:#dc2626;">❌ Gagal</span></td>
                    </tr>
                </tbody>
            </table>

            <div id="pesanKosong" style="display: none; text-align: center; padding: 25px; color: var(--abu); font-size: 13px;">
                Tidak ada data riwayat aktivitas yang sesuai dengan kata kunci pencarian.
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ url('/fitur') }}" class="btn-modal-aktif" style="text-decoration: none; display: inline-block;">← Kembali ke Halaman Dashboard</a>
        </div>
    </main>

    {{-- ===== POP-UP MODAL PEMILIH TANGGAL ===== --}}
    <div id="modalPeriode" class="modal-overlay">
        <div class="modal-content" style="max-width: 420px; text-align: left;">
            <h3>Pilih Periode Tanggal</h3>
            <p>Tentukan rentang tanggal mulai dan tanggal selesai untuk memfilter riwayat aktivitas.</p>
            
            <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--teks); margin-bottom: 6px;">Tanggal Mulai:</label>
                    <input type="date" id="inputTanggalMulai" value="2026-10-01" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--teks); margin-bottom: 6px;">Tanggal Selesai:</label>
                    <input type="date" id="inputTanggalSelesai" value="2026-10-31" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 14px; outline: none;">
                </div>
            </div>

            <div class="modal-actions" style="display: flex; justify-content: flex-end; gap: 10px;">
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
                // Hanya unduh baris yang sedang tampil (tidak tersembunyi karena filter)
                if (rows[i].style.display !== 'none') {
                    let row = [], cols = rows[i].querySelectorAll('th, td');
                    for (let j = 0; j < cols.length; j++) {
                        // Bersihkan teks dari emoji atau spasi berlebih
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

            // Buat file CSV virtual dan download otomatis
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