<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Testimoni - Admin EzRent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            width: 260px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 25px;
            transition: left 0.3s ease;
            z-index: 1000;
            border-right: 1px solid #e2e8f0;
        }

        .sidebar.show { left: 0; }

        @media(max-width: 992px) {
            .sidebar { left: -260px; }
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
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
        }
        .nav-link:hover { background: #f1f5f9; }
        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }
        .nav-link i { color: #159F46; font-size: 18px; }

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
        @media(max-width: 992px){ .toggle-btn { display: inline-block; } }

        .main-content { margin-left: 260px; padding: 30px; }
        @media(max-width:992px){ .main-content { margin-left:0; } }

        .review-card {
            background:white;
            border-radius:18px;
            padding:20px;
            box-shadow:0 4px 14px rgba(0,0,0,0.06);
            border:1px solid #eef1f4;
            height:100%;
        }

        .badge-status { padding:5px 10px; border-radius:6px; font-size:12px; font-weight:600; }
        .approved { background:#DCFCE7; color:#159F46; }
        .pending { background:#e2e8f0; color:#475569; }
        .rejected { background:#fee2e2; color:#b91c1c; }
    </style>
</head>
<body>

<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar" id="sidebar">
    <h4>EzRent Admin</h4>
    <nav class="nav flex-column">
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a class="nav-link" href="<?= base_url('admin/produk'); ?>"><i class="bi bi-box-seam"></i> Produk</a>
        <a class="nav-link" href="<?= base_url('admin/kategori'); ?>"><i class="bi bi-tags"></i> Kategori</a>
        <a class="nav-link" href="<?= base_url('admin/transaksi'); ?>"><i class="bi bi-receipt"></i> Pemesanan Terbaru</a>
        <a class="nav-link active" href="<?= base_url('admin/testimoni'); ?>"><i class="bi bi-star-fill"></i> Testimoni</a>
        <a class="nav-link" href="<?= base_url('admin/artikel'); ?>"><i class="bi bi-journal-text"></i> Artikel</a>
        <a class="nav-link" href="<?= base_url('admin/user'); ?>"><i class="bi bi-people"></i> Data User</a>
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>
</div>

<div class="main-content">
    <h2 class="fw-bold mb-2">Kelola Testimoni</h2>
    <p class="text-muted mb-4">Setujui atau tolak review pelanggan sebelum ditampilkan</p>

    <div class="row mb-4 g-3">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="card p-3 shadow-sm border-0">
                <div>Total Review</div>
                <div class="text-success fw-bold"><?= $total_review ?></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="card p-3 shadow-sm border-0">
                <div>Menunggu Persetujuan</div>
                <div class="text-warning fw-bold"><?= $pending_review ?></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="card p-3 shadow-sm border-0">
                <div>Rating Rata-rata</div>
                <div class="text-primary fw-bold">
                    <?= $rating_rata2 ?> <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach($review as $r): ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="review-card">
                <div class="d-flex justify-content-between">
                    <strong><?= $r->nama_lengkap ?></strong>
                    <span class="badge-status <?= $r->status == 'approved' ? 'approved' : ($r->status == 'rejected' ? 'rejected' : 'pending') ?>">
                        <?= ucfirst($r->status) ?>
                    </span>
                </div>

                <div class="text-warning my-2" style="font-size:18px;">⭐ <?= $r->rating ?></div>
                <p><?= $r->isi_review ?></p>
                <hr>
                <small class="text-success"><?= $r->nama_produk ?></small><br>
                <small class="text-muted"><?= date("d M Y", strtotime($r->created_at)) ?></small>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <?php if($r->status != 'approved'): ?>
                        <a href="<?= base_url('admin/testimoni/approve/'.$r->id_review); ?>" class="btn btn-success btn-sm">
                            <i class="bi bi-check-circle"></i> Approve
                        </a>
                    <?php endif; ?>

                    <?php if($r->status != 'rejected'): ?>
                        <a href="<?= base_url('admin/testimoni/reject/'.$r->id_review); ?>" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-x-circle"></i> Reject
                        </a>
                    <?php endif; ?>

                    <!-- 🔥 TOMBOL HAPUS -->
                    <a href="<?= base_url('admin/testimoni/delete/'.$r->id_review); ?>"
                       class="btn btn-outline-dark btn-sm"
                       onclick="return confirm('Yakin ingin menghapus testimoni ini?')">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("show");
}
</script>

</body>
</html>