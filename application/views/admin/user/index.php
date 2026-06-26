<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User | EzRent Admin</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        /* === SIDEBAR (FIGMA STYLE) === */
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
            border-right: 1px solid #e2e8f0;
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
            transition: 0.2s ease;
        }

        .nav-link i {
            color: #159F46;
            font-size: 18px;
        }

        .nav-link:hover {
            background: #f1f5f9;
        }

        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }

        /* === TOGGLE === */
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

        /* === CONTENT === */
        .main-content {
            margin-left: 260px;
            padding: 30px;
            transition: 0.3s;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 8px 30px rgba(0,0,0,.04);
        }

        .table th {
            color: #64748b;
            font-weight: 600;
            font-size: 14px;
            background: #f8fafc;
        }

        .badge-admin {
            background: #e2f8ec;
            color: #159F46;
            font-weight: 600;
        }

        .badge-user {
            background: #e5e7eb;
            color: #374151;
            font-weight: 600;
        }

        @media(max-width: 992px) {
            .sidebar { left: -300px; }
            .sidebar.show { left: 0; }
            .toggle-btn { display: inline-block; }
            .main-content { margin-left: 0; }
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
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a class="nav-link" href="<?= base_url('admin/produk'); ?>"><i class="bi bi-box-seam"></i> Produk</a>
        <a class="nav-link" href="<?= base_url('admin/kategori'); ?>"><i class="bi bi-tags"></i> Kategori</a>
        <a class="nav-link" href="<?= base_url('admin/pemesanan'); ?>"><i class="bi bi-receipt"></i> Pemesanan Terbaru</a>
        <a class="nav-link" href="<?= base_url('admin/testimoni'); ?>"><i class="bi bi-star-fill"></i> Testimoni</a>
        <a class="nav-link" href="<?= base_url('admin/artikel'); ?>"><i class="bi bi-journal-text"></i> Artikel</a>
        <a class="nav-link active" href="<?= base_url('admin/user'); ?>"><i class="bi bi-people"></i> Data User</a>
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>
</div>

<!-- CONTENT -->
<div class="main-content">
    <h4 class="fw-bold mb-4">Data User</h4>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($users as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->nama_lengkap ?></td>
                        <td><?= $u->email ?></td>
                        <td>
                            <span class="badge <?= ($u->role=='admin') ? 'badge-admin' : 'badge-user' ?>">
                                <?= strtoupper($u->role) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/user/change_role/'.$u->id_user) ?>"
                               class="btn btn-warning btn-sm"
                               onclick="return confirm('Ubah role user ini?')">
                                Role
                            </a>

                            <a href="<?= base_url('admin/user/delete/'.$u->id_user) ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Hapus user ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('show');
}
</script>

</body>
</html>