<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar (Figma Style – Putih Bersih) */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            transition: 0.3s;
            z-index: 1000;
            border-right: 1px solid #e2e8f0; /* garis tipis elegan */
        }

        .sidebar.show { left: 0; }

        @media(max-width: 992px) {
            .sidebar { left: -300px; }
        }

        /* Judul Sidebar */
        .sidebar h4 {
            color: #159F46;
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
        }

        /* Menu di Sidebar */
        .nav-link {
            color: #1e293b !important;   /* teks gelap rapi */
            padding: 12px 22px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
            transition: 0.2s ease;
        }

        .nav-link i {
            color: #159F46;  /* ikon hijau seperti Figma */
            font-size: 18px;
        }

        /* Hover */
        .nav-link:hover {
            background: #f1f5f9;       /* abu soft */
        }

        /* Active Menu */
        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }


        /* Toggle Button */
        .toggle-btn {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            z-index: 1200;
            background: #159F46;
            padding: 8px 10px;
            border-radius: 8px;
            border: none;
            color: white;
            font-size: 22px;
        }
        @media(max-width: 992px) {
            .toggle-btn {
                display: inline-block;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        /* Card Statistik */
        .card {
            border-radius: 18px !important;
            border: none !important;
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
        }

        .metric-title {
            font-size: 12px;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 700;
        }

        .metric-value {
            font-size: 30px;
            font-weight: 500;
        }

        .dashboard-icon {
            font-size: 40px;
            opacity: 0.35;
        }

        /* Produk Terpopuler (Figma Style) */
        .popular-card {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
        }
        .popular-title {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
        }
        .popular-item {
            padding: 18px 0;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
        }
        .popular-item:last-child { border-bottom: none; }
        .popular-name {
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
        }
        .popular-count {
            font-size: 13px;
            color: #64748b;
        }
        .popular-price {
            font-weight: 600;
            font-size: 15px;
            color: #16a34a;
        }

        .quick-action-card {
            transition: 0.2s ease;
        }

        .quick-action-card:hover {
            background-color: #f5f5f5;
            transform: translateY(-3px);
        }

    </style>
</head>

<body>

<!-- TOGGLE BUTTON -->
<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <h4>EzRent Admin</h4>

    <nav class="nav flex-column">

        <a class="nav-link active" href="#">
            <i class="bi bi-speedometer2"></i> Dashboard</a>

        <a class="nav-link" href="<?= base_url('admin/produk'); ?>">
            <i class="bi bi-box-seam"></i> Produk</a>

        <a class="nav-link" href="<?= base_url('admin/kategori'); ?>">
            <i class="bi bi-tags"></i> Kategori</a>

        <a class="nav-link" href="<?= base_url('admin/pemesanan'); ?>">
            <i class="bi bi-receipt"></i> Pemesanan Terbaru</a>

        <a class="nav-link" href="<?= base_url('admin/testimoni'); ?>">
            <i class="bi bi-star-fill"></i> Testimoni </a>

        <a class="nav-link" href="<?= base_url('admin/artikel'); ?>">
            <i class="bi bi-journal-text"></i> Artikel</a>

        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="bi bi-people"></i> Data User</a>

        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <h1 class="fw-bold">Dashboard Admin</h1>
    <p class="lead">Selamat datang kembali, <strong><?= $user['nama']; ?></strong>.</p>

    <!-- Statistik -->
    <div class="row mt-4 g-4">

        <div class="col-lg-3 col-md-6">
            <div class="card p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="metric-title">Total Produk</div>
                        <div class="metric-value"><?= $stats['total_produk']; ?></div>
                    </div>
                    <div class="col-4 text-end">
                        <i class="bi bi-box-seam dashboard-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="metric-title">Total Penyewa</div>
                        <div class="metric-value"><?= $stats['total_penyewa']; ?></div>
                    </div>
                    <div class="col-4 text-end">
                        <i class="bi bi-people-fill dashboard-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="metric-title">Total Review</div>
                        <div class="metric-value"><?= $stats['total_review']; ?></div>
                    </div>
                    <div class="col-4 text-end">
                        <i class="bi bi-star-fill dashboard-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="metric-title">Pendapatan Bulan Ini</div>
                        <div class="metric-value">Rp <?= number_format($pendapatan_bulan_ini, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-4 text-end">
                        <i class="bi bi-cash-stack dashboard-icon"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- PEMESANAN TERBARU -->
    <div class="card mt-4 p-3">
        <h5 class="fw-bold">Pemesanan Terbaru</h5>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Penyewa</th>
                    <th>Produk</th>
                    <th>Tgl Mulai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recent_orders as $o): ?>
                <tr>
                    <td><?= $o->nama_lengkap; ?></td>
                    <td><?= $o->nama_produk; ?></td>
                    <td><?= $o->tanggal_mulai; ?></td>
                    <td><span class="badge bg-success">Selesai</span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- PRODUK TERPOPULER (FIGMA STYLE) -->
    <div class="popular-card mt-4">
        <div class="popular-title">Produk Terpopuler</div>

        <?php foreach($popular as $p): ?>
        <div class="popular-item">
            <div>
                <div class="popular-name"><?= $p->nama_produk; ?></div>
                <div class="popular-count"><?= $p->jumlah_disewa; ?>x disewa</div>
            </div>

            <div class="popular-price">
                Rp <?= number_format($p->jumlah_disewa * $p->harga, 0, ',', '.'); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Aksi Cepat
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <!-- Tambah Produk -->
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('admin/produk/'); ?>" class="text-decoration-none">
                            <div class="quick-action-card p-3 rounded shadow-sm text-center border">
                                <div class="icon mb-2">
                                    <i class="bi bi-plus-circle-fill text-success fs-1"></i>
                                </div>
                                <div class="fw-bold text-dark">Tambah Produk Baru</div>
                            </div>
                        </a>
                    </div>

                    <!-- Tulis Artikel -->
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('admin/artikel/'); ?>" class="text-decoration-none">
                            <div class="quick-action-card p-3 rounded shadow-sm text-center border">
                                <div class="icon mb-2">
                                    <i class="bi bi-journal-text text-primary fs-1"></i>
                                </div>
                                <div class="fw-bold text-dark">Tulis Artikel Baru</div>
                            </div>
                        </a>
                    </div>

                    <!-- Lihat Review Baru -->
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('admin/testimoni'); ?>" class="text-decoration-none">
                            <div class="quick-action-card p-3 rounded shadow-sm text-center border">
                                <div class="icon mb-2">
                                    <i class="bi bi-star-fill text-warning fs-1"></i>
                                </div>
                                <div class="fw-bold text-dark">Lihat Review Baru</div>
                            </div>
                        </a>
                    </div>

                    <!-- Tambah Pemesanan -->
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= base_url('admin/transaksi/tambah'); ?>" class="text-decoration-none">
                            <div class="quick-action-card p-3 rounded shadow-sm text-center border">
                                <div class="icon mb-2">
                                    <i class="bi bi-cart-plus-fill text-danger fs-1"></i>
                                </div>
                                <div class="fw-bold text-dark">Tambah Pemesanan Terbaru</div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
}
</script>

</body>
</html>