<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Sewa Lengkap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
       body {
    background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f4 100%);
}

.main-container {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(46, 125, 50, 0.1);
}

/* Accordion */
.accordion-item {
    border: none;
    border-bottom: 1px solid #c8e6c9;
}

.accordion-button {
    padding: 1.2rem 1.25rem;
    font-size: 1rem;
    background: #fff;
    transition: all 0.3s ease;
}

.accordion-button:hover {
    background: #f1f8f4;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #2e7d32 0%, #388e3c 100%);
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(46, 125, 50, 0.2);
}

.accordion-button:not(.collapsed) .icon-box {
    background: rgba(255, 255, 255, 0.2);
    color: #ffffff;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: #66bb6a;
}

/* Icon di header */
.icon-box {
    width: 36px;
    height: 36px;
    background: #e8f5e9;
    color: #2e7d32;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

/* Body accordion */
.accordion-body {
    padding: 1.5rem 1.5rem 2rem;
    font-size: 0.95rem;
    line-height: 1.7;
    background: #fafafa;
}

/* Card kecil */
.card {
    border-radius: 14px;
    border: 1px solid #c8e6c9;
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 12px rgba(46, 125, 50, 0.15);
    transform: translateY(-2px);
}

.card-body {
    padding: 1.25rem;
}

/* Requirement box */
.requirement-card {
    background: linear-gradient(135deg, #f1f8f4 0%, #e8f5e9 100%);
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 10px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
    font-size: 0.95rem;
    border-left: 4px solid #4caf50;
}

.requirement-card i {
    font-size: 1.1rem;
    margin-top: 2px;
}

/* Table */
.table {
    border-radius: 12px;
    overflow: hidden;
}

.table th, .table td {
    vertical-align: middle;
}

.table-primary {
    background: linear-gradient(135deg, #2e7d32 0%, #388e3c 100%);
    color: white;
}

/* Alert */
.alert {
    border-radius: 12px;
}

.alert-info {
    background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
    border-color: #81c784;
    color: #1b5e20;
}

.alert-success {
    background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%);
    border-color: #66bb6a;
    color: #1b5e20;
}

.alert-danger {
    background: linear-gradient(135deg, #ffebee 0%, #ffcdd2 100%);
    border-color: #ef5350;
    color: #c62828;
}

/* List group */
.list-group-item {
    border: none;
    border-bottom: 1px solid #e8f5e9;
    padding: 12px 0;
}

/* Badge */
.badge {
    padding: 0.4rem 0.8rem;
    font-weight: 600;
}

.bg-success {
    background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%) !important;
}

.bg-warning {
    background: linear-gradient(135deg, #ffa726 0%, #ffb74d 100%) !important;
}

.bg-danger {
    background: linear-gradient(135deg, #e53935 0%, #ef5350 100%) !important;
}

/* Text colors */
.text-primary {
    color: #2e7d32 !important;
}

.text-success {
    color: #388e3c !important;
}

/* Links */
a {
    color: #2e7d32;
}

a:hover {
    color: #1b5e20;
}

/* Header styling */
.text-center h2 i {
    color: #2e7d32;
}

/* Custom styling untuk icon besar */
.card-body i[style*="font-size: 2rem"],
.card-body i[style*="font-size: 3rem"] {
    color: #2e7d32 !important;
}

    </style>
</head>
<body>
    <div class="container py-5">
        <div class="main-container p-4 p-md-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">
                    <i class="bi bi-book"></i> Panduan Lengkap Sewa
                </h2>
                <p class="text-muted fs-5">
                    Informasi lengkap mengenai proses sewa, syarat & ketentuan, pembayaran, pengiriman, hingga kebijakan refund
                </p>
            </div>

            <div class="accordion accordion-flush shadow-sm rounded" id="panduanAccordion">

                <!-- Syarat & Ketentuan Umum -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#syaratKetentuan"
                                 aria-expanded="false">
                            <i class="bi bi-file-text icon-box"></i>
                            Syarat & Ketentuan Umum
                        </button>
                    </h2>
                    <div id="syaratKetentuan" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3"><i class="bi bi-person-check text-primary"></i> Persyaratan Penyewa:</h6>
                            <div class="requirement-card">
                                <i class="bi bi-check-circle-fill text-success"></i> <strong>Minimal berusia 15 tahun</strong>
                            </div>
                            <div class="requirement-card">
                                <i class="bi bi-check-circle-fill text-success"></i> <strong>Memiliki KTP / Kartu Identitas yang masih berlaku</strong><br>
                    
                            </div>
                            <div class="requirement-card">
                                <i class="bi bi-check-circle-fill text-success"></i> <strong>Nomor telepon aktif & WhatsApp</strong><br>
                                <small class="text-muted">Untuk konfirmasi dan komunikasi selama proses sewa</small>
                            </div>
                            <div class="requirement-card">
                                <i class="bi bi-check-circle-fill text-success"></i> <strong>Email aktif</strong><br>
                                <small class="text-muted">Untuk menerima invoice dan konfirmasi booking</small>
                            </div>

                            <h6 class="fw-bold mt-4 mb-3"><i class="bi bi-shield-check text-primary"></i> Jaminan & Deposit:</h6>
                            <ul>
                                <li><strong>Deposit:</strong> Sebesar 20-50% dari harga sewa (tergantung jenis produk)</li>
                                <li><strong>Jaminan KTP:</strong> KTP / Kartu Identitas wajib diserahkan saat pengambilan barang</li>
                                <li><strong>Untuk sewa di atas Rp 1.000.000:</strong> Diperlukan jaminan tambahan berupa BPKB/SIM/Kartu Keluarga</li>
                                <li>Deposit & Jaminan akan dikembalikan setelah barang dikembalikan dalam kondisi baik</li>
                            </ul>

                            
                        </div>
                    </div>
                </div>

                <!-- Cara Sewa -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#caraSewa">
                            <i class="bi bi-cart-check icon-box"></i>
                            Cara Sewa Produk
                        </button>
                    </h2>
                    <div id="caraSewa" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Langkah-langkah menyewa:</h6>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item">
                                    <strong>Pilih Produk</strong><br>
                                    <small class="text-muted">Browse katalog dan pilih produk yang ingin disewa</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Cek Ketersediaan</strong><br>
                                    <small class="text-muted">Tentukan tanggal sewa dan durasi, sistem akan otomatis menampilkan ketersediaan</small>
                                </li>
                                
                                <li class="list-group-item">
                                    <strong>Login / Daftar Akun</strong><br>
                                    <small class="text-muted">Buat akun baru atau login untuk melanjutkan</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Isi Data Lengkap</strong><br>
                                    <small class="text-muted">Lengkapi data diri, nomor KTP/Kartu Identitas, dan alamat pengiriman/pengambilan</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Hubungi via WhatsApp</strong><br>
                                    <small class="text-muted">Melengkapi form yang tersedia, ketika sudah dikonfirmasi.</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Pilih Metode Pengiriman</strong><br>
                                    <small class="text-muted">Pilih ambil sendiri atau diantar (dengan biaya tambahan)</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Selesaikan Pembayaran</strong><br>
                                    <small class="text-muted">Bayar sesuai metode yang dipilih dalam waktu 1x24 jam</small>
                                </li>
                                <li class="list-group-item">
                                    <strong>Konfirmasi Booking</strong><br>
                                    <small class="text-muted">Setelah pembayaran terverifikasi, Anda akan menerima konfirmasi via email / WhatsApp</small>
                                </li>
                            </ol>

                            <div class="alert alert-info mt-4" role="alert">
                                <i class="bi bi-info-circle-fill"></i> <strong>Tips:</strong> Booking lebih awal untuk memastikan ketersediaan produk, terutama di hari libur atau weekend.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pembayaran -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#pembayaran">
                            <i class="bi bi-credit-card icon-box"></i>
                            Metode Pembayaran
                        </button>
                    </h2>
                    <div id="pembayaran" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Metode pembayaran yang tersedia:</h6>
                            
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-bank2" style="font-size: 2rem; color: #2e7d32;"></i>
                                            <h6 class="mt-2">Transfer Bank</h6>
                                            <small class="text-muted">BCA, Mandiri, BNI, BRI</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-wallet2" style="font-size: 2rem; color: #2e7d32;"></i>
                                            <h6 class="mt-2">E-Wallet</h6>
                                            <small class="text-muted">OVO, Dana, GoPay, ShopeePay</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-qr-code" style="font-size: 2rem; color: #2e7d32;"></i>
                                            <h6 class="mt-2">QRIS</h6>
                                            <small class="text-muted">Semua aplikasi e-wallet</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="fw-bold mb-2">Ketentuan Pembayaran:</h6>
                            <ul>
                                <li>Pembayaran harus dilakukan <strong>maksimal 1x24 jam</strong> setelah booking</li>
                                <li>Upload bukti pembayaran melalui dashboard atau WhatsApp</li>
                                <li>Verifikasi pembayaran dilakukan maksimal 2 jam pada jam operasional</li>
                                <li>Jika pembayaran tidak dilakukan dalam waktu yang ditentukan, booking otomatis dibatalkan</li>
                                <li>Untuk pembayaran via transfer bank, mohon transfer sesuai nominal <strong>unik</strong> yang tertera</li>
                            </ul>

                            <div class="alert alert-success mt-3" role="alert">
                                <i class="bi bi-check-circle-fill"></i> Setelah pembayaran terverifikasi, Anda akan menerima invoice digital via email.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengiriman -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#pengiriman">
                            <i class="bi bi-truck icon-box"></i>
                            Pengiriman & Pengambilan
                        </button>
                    </h2>
                    <div id="pengiriman" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Opsi Pengambilan Barang:</h6>
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6><i class="bi bi-shop text-primary"></i> Ambil Sendiri (Gratis)</h6>
                                    <ul class="mb-0">
                                        <li>Datang ke lokasi kami sesuai jadwal yang telah ditentukan</li>
                                        <li>Bawa KTP asli dan bukti pembayaran</li>
                                        <li>Barang akan dicek kondisinya bersama Anda sebelum diserahkan</li>
                                        <li>Waktu pengambilan: Sesuai jam operasional</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6><i class="bi bi-bicycle text-success"></i> Pengiriman dalam Kota (Berbayar)</h6>
                                    <ul class="mb-0">
                                        <li>Tarif mulai dari Rp 15.000 (tergantung jarak)</li>
                                        <li>Estimasi pengiriman: 1-3 jam setelah pembayaran terverifikasi</li>
                                        <li>Gratis ongkir untuk transaksi di atas Rp 500.000</li>
                                        <li>Barang diantar oleh kurir resmi kami</li>
                                    </ul>
                                </div>
                            </div>

                            <h6 class="fw-bold mb-3">Pengembalian Barang:</h6>
                            <ul>
                                <li>Barang wajib dikembalikan <strong>tepat waktu</strong> sesuai tanggal akhir sewa</li>
                                <li>Toleransi keterlambatan: <span class="badge bg-warning text-dark">3 jam</span> (dikenakan denda 10% per hari)</li>
                                <li>Cek kondisi barang bersama kami saat pengembalian</li>
                                <li>Deposit & Jaminan akan dikembalikan jika barang dalam kondisi baik (max 1x24 jam)</li>
                                <li>Jika ada kerusakan, biaya perbaikan akan dipotong dari deposit</li>
                            </ul>

                            <div class="alert alert-danger mt-3" role="alert">
                                <i class="bi bi-exclamation-octagon-fill"></i> <strong>Keterlambatan lebih dari 3 hari tanpa konfirmasi dianggap sebagai kehilangan barang dan akan diproses sesuai hukum yang berlaku.</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ubah Jadwal -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#jadwal">
                            <i class="bi bi-calendar-event icon-box"></i>
                            Perubahan Jadwal & Perpanjangan
                        </button>
                    </h2>
                    <div id="jadwal" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Reschedule (Ubah Jadwal):</h6>
                            <ul>
                                <li>Dapat dilakukan maksimal <strong>H-1 sebelum tanggal sewa</strong></li>
                                <li>Hanya dapat dilakukan <strong>1 kali</strong> per booking</li>
                                <li>Tergantung ketersediaan produk pada tanggal baru</li>
                                <li>Tidak dikenakan biaya tambahan</li>
                                <li>Hubungi customer service via WhatsApp atau dashboard</li>
                            </ul>

                            <h6 class="fw-bold mt-4 mb-3">Perpanjangan Sewa:</h6>
                            <ul>
                                <li>Dapat dilakukan maksimal <strong>H-2 sebelum masa sewa berakhir</strong></li>
                                <li>Bayar selisih harga untuk hari tambahan</li>
                                <li>Tergantung ketersediaan produk</li>
                                <li>Konfirmasi perpanjangan wajib dilakukan via WhatsApp</li>
                            </ul>

                            
                        </div>
                    </div>
                </div>

                <!-- Batal & Refund -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#refund">
                            <i class="bi bi-x-circle icon-box"></i>
                            Pembatalan & Refund
                        </button>
                    </h2>
                    <div id="refund" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Kebijakan Pembatalan:</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Waktu Pembatalan</th>
                                            <th>Refund</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>H-3 atau lebih</strong></td>
                                            <td><span class="badge bg-success">100%</span></td>
                                            <td>Full refund, tidak ada potongan</td>
                                        </tr>
                                        <tr>
                                            <td><strong>H-2</strong></td>
                                            <td><span class="badge bg-warning text-dark">50%</span></td>
                                            <td>Refund setengah dari total pembayaran</td>
                                        </tr>
                                        <tr>
                                            <td><strong>H-1 / Hari H</strong></td>
                                            <td><span class="badge bg-danger">0%</span></td>
                                            <td>Tidak dapat refund</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h6 class="fw-bold mt-4 mb-3">Proses Refund:</h6>
                            <ul>
                                <li>Ajukan pembatalan via WhatsApp</li>
                                <li>Sertakan nomor booking dan alasan pembatalan</li>
                                <li>Refund akan diproses maksimal <strong>7 hari kerja</strong></li>
                                <li>Uang akan dikembalikan ke rekening/e-wallet yang sama saat pembayaran</li>
                                <li>Biaya admin refund: <strong>Rp 5.000</strong></li>
                            </ul>

                            <div class="alert alert-info mt-3" role="alert">
                                <i class="bi bi-info-circle-fill"></i> <strong>Catatan:</strong> Untuk pembatalan karena force majeure (bencana alam, pandemi, dll), kebijakan khusus akan diberlakukan. Hubungi customer service untuk detail lebih lanjut.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aturan -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#aturan">
                            <i class="bi bi-exclamation-triangle icon-box"></i>
                            Aturan & Tanggung Jawab
                        </button>
                    </h2>
                    <div id="aturan" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Tanggung Jawab Penyewa:</h6>
                            <div class="requirement-card">
                                <i class="bi bi-shield-x text-danger"></i> <strong>Kerusakan</strong><br>
                                Penyewa bertanggung jawab penuh atas kerusakan yang terjadi selama masa sewa. Biaya perbaikan sesuai estimasi bengkel resmi.
                            </div>
                            <div class="requirement-card">
                                <i class="bi bi-search text-warning"></i> <strong>Kehilangan</strong><br>
                                Penyewa wajib mengganti dengan barang yang sama atau membayar sesuai harga baru barang + denda 20%.
                            </div>
                            <div class="requirement-card">
                                <i class="bi bi-hand-thumbs-down text-primary"></i> <strong>Penyalahgunaan</strong><br>
                                Dilarang menyewakan kembali, mengubah, atau menggunakan untuk keperluan ilegal. Pelanggaran akan dikenakan sanksi hukum.
                            </div>

                            <h6 class="fw-bold mt-4 mb-3">Larangan Penggunaan:</h6>
                            <ul>
                                <li>Menggunakan barang untuk kegiatan ilegal atau melanggar hukum</li>
                                <li>Menyewakan kembali kepada pihak lain tanpa izin</li>
                                <li>Mengubah, memodifikasi, atau membongkar barang</li>
                                <li>Membawa barang keluar kota tanpa konfirmasi tertulis</li>
                                <li>Menggunakan di luar kapasitas atau fungsi yang ditentukan</li>
                            </ul>

                            <h6 class="fw-bold mt-4 mb-3">Kondisi Barang:</h6>
                            <ul>
                                <li>Barang diserahkan dalam kondisi baik dan berfungsi normal</li>
                                <li>Penyewa wajib mengecek kondisi barang saat penerimaan</li>
                                <li>Laporkan segera jika ada kerusakan atau kekurangan</li>
                                <li>Dokumentasi foto/video saat serah terima sangat dianjurkan</li>
                            </ul>

                            <div class="alert alert-danger mt-3" role="alert">
                                <i class="bi bi-shield-fill-exclamation"></i> <strong>Peringatan Keras:</strong> Pencurian, penggelapan, atau tidak mengembalikan barang akan dilaporkan ke pihak berwajib dan diproses secara hukum.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#review">
                            <i class="bi bi-star icon-box"></i>
                            Review & Penilaian
                        </button>
                    </h2>
                    <div id="review" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <h6 class="fw-bold mb-3">Memberikan Review:</h6>
                            <ul>
                                <li>Review dapat diberikan setelah <strong>status sewa selesai</strong></li>
                                <li>Periode review: <strong>7 hari</strong> setelah pengembalian barang</li>
                                <li>Beri penilaian 1-5 bintang untuk:
                                    <ul>
                                        <li>Kualitas produk</li>
                                        <li>Pelayanan</li>
                                        <li>Ketepatan waktu</li>
                                    </ul>
                                </li>
                                
                            </ul>

                            <div class="alert alert-success mt-4" role="alert">
                                <i class="bi bi-chat-quote-fill"></i> Review Anda sangat membantu customer lain dan membantu kami meningkatkan pelayanan!
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Operasional -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#operasional">
                            <i class="bi bi-clock-fill icon-box"></i>
                            Jam Operasional & Kontak
                        </button>
                    </h2>

                    <div id="operasional" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">
                            <div class="row g-4">

                                <!-- Jam Operasional -->
                                <div class="col-md-6">
                                    <div class="card h-100 text-center">
                                        <div class="card-body">
                                            <i class="bi bi-clock-history" style="font-size: 3rem; color: #2e7d32;"></i>
                                            <h5 class="mt-3 fw-bold">Jam Operasional</h5>
                                            <p class="mb-1 fw-semibold">Senin – Minggu</p>
                                            <p class="fw-bold fs-4 mb-1" style="color: #2e7d32;">09.00 – 21.00 WIB</p>
                                            <small class="text-muted">Termasuk hari libur nasional</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kontak -->
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="fw-bold mb-4">
                                                <i class="bi bi-headset text-success me-1"></i> Hubungi Kami
                                            </h5>

                                            <div class="mb-3">
                                                <i class="bi bi-whatsapp text-success me-1"></i>
                                                <strong>WhatsApp</strong><br>
                                                <a href="https://wa.me/6281234567890"
                                                   class="text-success fw-semibold text-decoration-none">
                                                    +62 812-3456-7890
                                                </a>
                                            </div>

                                            <div class="mb-3">
                                                <i class="bi bi-envelope-fill text-primary me-1"></i>
                                                <strong>Email</strong><br>
                                                <a href="mailto:info@ezrentcamp.com"
                                                   class="text-decoration-none fw-semibold">
                                                    info@ezrentcamp.com
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="alert alert-success mt-4">
                                <i class="bi bi-lightning-charge-fill me-1"></i>
                                <strong>Fast Response!</strong> Kami merespons cepat via WhatsApp untuk pertanyaan & pemesanan.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq">
                            <i class="bi bi-question-circle-fill icon-box"></i>
                            Pertanyaan Yang Sering Ditanyakan (FAQ)
                        </button>
                    </h2>

                    <div id="faq" class="accordion-collapse collapse" data-bs-parent="#panduanAccordion">
                        <div class="accordion-body">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="bi bi-patch-question-fill me-1"></i>
                                        Apakah bisa sewa tanpa KTP?
                                    </h6>
                                    <p class="mb-0">
                                        Tidak bisa. KTP wajib sebagai jaminan. Bisa diganti SIM atau identitas resmi lain yang masih berlaku.
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="bi bi-patch-question-fill me-1"></i>
                                        Bagaimana jika barang rusak saat digunakan?
                                    </h6>
                                    <p class="mb-0">
                                        Segera hubungi kami. Jangan memperbaiki sendiri. Biaya disesuaikan tingkat kerusakan.
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="bi bi-patch-question-fill me-1"></i>
                                        Apakah ada minimal durasi sewa?
                                    </h6>
                                    <p class="mb-0">
                                        Minimal sewa 1 hari (24 jam). Untuk durasi singkat, silakan hubungi CS.
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="bi bi-patch-question-fill me-1"></i>
                                        Bisa untuk event atau rombongan?
                                    </h6>
                                    <p class="mb-0">
                                        Bisa. Kami menyediakan paket khusus untuk grup & event.
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="bi bi-patch-question-fill me-1"></i>
                                        Apakah barang sudah dibersihkan?
                                    </h6>
                                    <p class="mb-0">
                                        Ya. Semua barang dicuci & disterilkan setelah pemakaian.
                                    </p>
                                </div>
                            </div>

                            <div class="alert alert-info mt-4">
                                <i class="bi bi-chat-dots-fill me-1"></i>
                                Masih ada pertanyaan? Hubungi kami via WhatsApp atau email.
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>