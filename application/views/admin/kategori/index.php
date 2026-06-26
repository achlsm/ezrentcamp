<?php
$segment = $this->uri->segment(2); // admin/{controller}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori - EzRent Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            z-index: 1000;
            border-right: 1px solid #e2e8f0;
            transition: 0.3s;
        }
        .sidebar.show { left: 0; }

        @media(max-width: 992px) {
            .sidebar { left: -300px; }
        }

        .sidebar h4 {
            color: #159F46;
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .nav-link {
            color: #1e293b !important;
            padding: 12px 22px;
            display: flex;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
            transition: 0.2s ease;
            align-items: center;
        }

        .nav-link i { color: #159F46; font-size: 18px; }

        .nav-link:hover { background: #f1f5f9; }

        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }

        /* TOGGLE */
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
            .toggle-btn { display: inline-block; }
            .main-content { margin-left: 0 !important; }
        }

        /* MAIN */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        /* KATEGORI CARD */
        .kategori-box {
            background: #ffffff;
            padding: 20px;
            border-radius: 18px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.06);
            border: 1px solid #eef1f4;
            position: relative;
            height: 100%;
            transition: 0.25s ease;
        }

        .kategori-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(0,0,0,0.08);
        }

        .kategori-image {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            object-fit: cover;
        }

        .kategori-name {
            font-size: 17px;
            font-weight: 700;
            margin-top: 10px;
            color: #1e293b;
        }

        .kategori-desc {
            font-size: 13px;
            font-weight: 200;
            color: #475569;
        }

        .kategori-sub {
            font-size: 14px;
            color: #6b7280;
        }

        .kategori-actions {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 10px;
        }

        .kategori-actions i {
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<!-- TOGGLE -->
<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <h4>EzRent Admin</h4>

    <nav class="nav flex-column">

        <a class="nav-link <?= ($segment == '' || $segment == 'dashboard') ? 'active' : '' ?>"
            href="<?= base_url('admin/dashboard'); ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a class="nav-link <?= ($segment == 'produk') ? 'active' : '' ?>"
            href="<?= base_url('admin/produk'); ?>">
                <i class="bi bi-box-seam"></i> Produk
        </a>

        <a class="nav-link <?= ($segment == 'kategori') ? 'active' : '' ?>"
            href="<?= base_url('admin/kategori'); ?>">
                <i class="bi bi-tags"></i> Kategori
        </a>

        <a class="nav-link <?= ($segment == 'transaksi') ? 'active' : '' ?>"
            href="<?= base_url('admin/pemesanan'); ?>">
               <i class="bi bi-receipt"></i> Pemesanan Terbaru
        </a>

        <a class="nav-link <?= ($segment == 'testimoni') ? 'active' : '' ?>"
            href="<?= base_url('admin/testimoni'); ?>">
                <i class="bi bi-star-fill"></i> Testimoni
        </a>

        <a class="nav-link <?= ($segment == 'artikel') ? 'active' : '' ?>"
            href="<?= base_url('admin/artikel'); ?>">
                <i class="bi bi-journal-text"></i> Artikel
        </a>

        <a class="nav-link <?= ($segment == 'user') ? 'active' : '' ?>"
            href="<?= base_url('admin/user'); ?>">
                <i class="bi bi-people"></i> Data User
        </a>

        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="bi bi-box-arrow-right"></i> Logout</a>
        </nav>
    </div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <h2 class="fw-bold mb-1">Kelola Kategori</h2>
    <p class="text-muted mb-3">Ubah, edit, atau hapus kategori produk</p>

    <a href="<?= base_url('admin/kategori/tambah'); ?>"
       class="btn mb-4 text-white"
       style="background:#159F46;border-radius:8px;">
        <i class="bi bi-plus-circle"></i> Tambah Kategori
    </a>

    <div class="row g-4">
        <?php foreach($kategori as $k): ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="kategori-box">

                <div class="kategori-actions">
                    <a href="<?= base_url('admin/kategori/edit/'.$k->id_kategori); ?>" class="text-secondary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="<?= base_url('admin/kategori/hapus/'.$k->id_kategori); ?>"
                       onclick="return confirm('Hapus kategori ini?');"
                       class="text-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </div>

                <img src="<?= base_url('assets/img/kategori/'.$k->gambar); ?>" class="kategori-image">

                <div class="kategori-name"><?= $k->nama_kategori; ?></div>
                <div class="kategori-desc"><?= $k->deskripsi; ?></div>
                <div class="kategori-sub"><?= $k->jumlah_produk; ?> produk</div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
}
</script>

</body>
</html>
