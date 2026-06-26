<?php
$segment = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Artikel - EzRentCamp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body { background-color: #f5f7fa; font-family: 'Inter', sans-serif; }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            border-right: 1px solid #e2e8f0;
            z-index: 1000;
            transition: transform .3s ease;
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
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
            transition: 0.2s;
        }

        .nav-link i { color: #159F46; font-size: 18px; }

        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }

        /* ===== MAIN ===== */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .card-custom {
            border-radius: 20px;
            border: none;
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
            background: #fff;
        }

        .stat-card {
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .badge-published {
            background: #e2f8ec;
            color: #159F46;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 11px;
        }

        .badge-draft {
            background: #f1f5f9;
            color: #64748b;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 11px;
        }

        /* ===== TOGGLE ===== */
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: #159F46;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            display: none;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.active { transform: translateX(0); }
            .main-content { margin-left: 0; padding-top: 70px; }
            .toggle-btn { display: block; }
        }
    </style>
</head>
<body>

<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <h4>EzRent Admin</h4>
    <nav class="nav flex-column">
        <a class="nav-link <?= ($segment == '' || $segment == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard'); ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link <?= ($segment == 'produk') ? 'active' : '' ?>" href="<?= base_url('admin/produk'); ?>">
            <i class="bi bi-box-seam"></i> Produk
        </a>
        <a class="nav-link <?= ($segment == 'kategori') ? 'active' : '' ?>" href="<?= base_url('admin/kategori'); ?>">
            <i class="bi bi-tags"></i> Kategori
        </a>
        <a class="nav-link <?= ($segment == 'transaksi') ? 'active' : '' ?>" href="<?= base_url('admin/pemesanan'); ?>">
            <i class="bi bi-receipt"></i> Pemesanan Terbaru
        </a>
        <a class="nav-link <?= ($segment == 'testimoni') ? 'active' : '' ?>" href="<?= base_url('admin/testimoni'); ?>">
            <i class="bi bi-star-fill"></i> Testimoni
        </a>
        <a class="nav-link <?= ($segment == 'artikel') ? 'active' : '' ?>" href="<?= base_url('admin/artikel'); ?>">
            <i class="bi bi-journal-text"></i> Artikel
        </a>
        <a class="nav-link <?= ($segment == 'user') ? 'active' : '' ?>" href="<?= base_url('admin/user'); ?>">
            <i class="bi bi-people"></i> Data User
        </a>
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>
</div>

<div class="main-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h3 class="fw-bold mb-1">Kelola Artikel & Tips</h3>
                <p class="text-muted mb-0">Atur konten edukasi pendakian untuk audiens Anda.</p>
            </div>
            <button class="btn btn-success px-4 py-2" style="background: #159F46; border:none; border-radius: 12px; font-weight: 600;" data-bs-toggle="modal" data-bs-target="#modalArtikel" onclick="addForm()">
                <i class="fa fa-plus-circle me-2"></i> Tulis Artikel Baru
            </button>
        </div>

        <div class="row mb-4 g-3">
            <div class="col-md-4">
                <div class="card-custom stat-card">
                    <div class="icon-box" style="background:#e2f8ec; color:#159F46;"><i class="fa fa-newspaper"></i></div>
                    <div><small class="text-muted d-block fw-bold mb-1">TOTAL ARTIKEL</small><span class="fs-4 fw-bold"><?= count($artikel) ?></span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom stat-card">
                    <div class="icon-box" style="background:#e0f2fe; color:#0284c7;"><i class="fa fa-paper-plane"></i></div>
                    <div><small class="text-muted d-block fw-bold mb-1">PUBLISHED</small><span class="fs-4 fw-bold"><?= $total_published ?></span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom stat-card">
                    <div class="icon-box" style="background:#fff7ed; color:#ea580c;"><i class="fa fa-file-signature"></i></div>
                    <div><small class="text-muted d-block fw-bold mb-1">DRAFT</small><span class="fs-4 fw-bold"><?= $total_draft ?></span></div>
                </div>
            </div>
        </div>

        <div class="card-custom overflow-hidden shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 border-0 py-3">Detail Artikel</th>
                            <th class="border-0 py-3">Tag</th>
                            <th class="border-0 py-3">Status</th>
                            <th class="border-0 py-3">Tanggal Publish</th>
                            <th class="text-center border-0 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($artikel as $a): ?>
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('assets/img/artikel/'.$a['thumbnail']) ?>" class="rounded-3 me-3 border" style="width: 70px; height: 50px; object-fit: cover;" onerror="this.src='https://placehold.co/100x100?text=No+Img'">
                                    <div>
                                        <div class="fw-bold text-dark mb-0"><?= (strlen($a['judul']) > 45) ? substr($a['judul'], 0, 45) . '...' : $a['judul']; ?></div>
                                        <small class="text-muted">Oleh: <?= $a['nama_penulis'] ?? 'Admin' ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border-1 px-3 py-2 rounded-3" style="font-size: 11px;"><?= $a['tag'] ?></span></td>
                            <td><?= ($a['status'] == 'published') ? '<span class="badge-published">Published</span>' : '<span class="badge-draft">Draft</span>' ?></td>
                            <td><small class="text-muted fst-italic"><?= $a['tanggal_publish'] ? date('d M Y', strtotime($a['tanggal_publish'])) : 'Belum Publish' ?></small></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-success border-0 edit-btn" 
                                        data-id="<?= $a['id_artikel'] ?>"
                                        data-judul="<?= htmlspecialchars($a['judul']) ?>"
                                        data-tag="<?= $a['tag'] ?>"
                                        data-status="<?= $a['status'] ?>"
                                        data-konten='<?= htmlspecialchars($a['konten']) ?>'>
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url('admin/artikel/hapus/'.$a['id_artikel']) ?>" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus artikel ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalArtikel" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form action="<?= base_url('admin/artikel/simpan') ?>" method="POST" enctype="multipart/form-data" class="w-100">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="fw-bold m-0"><i class="fa fa-edit text-success me-2"></i> Editor Artikel EzRent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" name="id_artikel" id="id_artikel">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">JUDUL ARTIKEL</label>
                                <input type="text" name="judul" id="judul" class="form-control form-control-lg border-0 bg-light shadow-none" placeholder="Masukkan judul artikel yang menarik..." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">KONTEN LENGKAP</label>
                                <textarea name="konten" id="editor_artikel"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-0 bg-light p-4 rounded-4 shadow-none">
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted">TAG / KATEGORI</label>
                                    <select name="tag" id="tag" class="form-select border-0 shadow-sm" style="border-radius: 10px;">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Tips Hiking">Tips Hiking</option>
                                        <option value="Review Alat">Review Alat</option>
                                        <option value="Tips Outdoor">Tips Outdoor</option>
                                        <option value="Edukasi">Edukasi</option>
                                        <option value="Cerita Pendaki">Cerita Pendaki</option>
                                        <option value="Keamanan">Keamanan & Keselamatan</option>
                                        <option value="Keamanan">Destinasi</option>
                                    </select>
                                    <small class="text-muted mt-1 d-block" style="font-size: 11px;">Data ini akan masuk ke kolom <b>tag</b> di tabel artikel.</small>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted">STATUS PUBLIKASI</label>
                                    <select name="status" id="status" class="form-select border-0 shadow-sm">
                                        <option value="published">Publikasikan</option>
                                        <option value="draft">Simpan sebagai Draft</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">UPLOAD THUMBNAIL</label>
                                    <div class="upload-area bg-white p-3 border rounded-3 text-center">
                                        <input type="file" name="thumbnail" class="form-control border-0 shadow-none">
                                        <small class="text-muted mt-2 d-block small">Rekomendasi: 800x600px</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal" style="border-radius: 10px;">Batal</button>
                    <button type="submit" class="btn btn-success px-5 py-2 shadow" style="background: #159F46; border-radius: 10px; font-weight: 600;">Simpan Artikel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
    // Inisialisasi CKEditor 4
    var editor = CKEDITOR.replace('editor_artikel', {
        versionCheck: false,
        height: 380,
        uiColor: '#ffffff'
    });

    // Reset form saat klik "Tambah"
    function addForm() {
        $('#id_artikel').val('');
        $('#judul').val('');
        $('#tag').val('Tips Hiking');
        $('#status').val('published');
        editor.setData('');
    }

    // Isi data saat klik "Edit"
    $('.edit-btn').on('click', function() {
        const d = $(this).data();
        $('#id_artikel').val(d.id);
        $('#judul').val(d.judul);
        $('#tag').val(d.tag);
        $('#status').val(d.status);
        editor.setData(d.konten);
        $('#modalArtikel').modal('show');
    });

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
}

document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 992) {
            document.getElementById('sidebar').classList.remove('active');
        }
    });
});
</script>


</body>
</html>