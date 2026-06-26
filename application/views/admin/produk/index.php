<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk</title>

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

<?php
$segment = $this->uri->segment(2); // admin/{segment}
?>

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
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-content">
    <div class="page-header">
        <h1>Kelola Produk</h1>
        <p class="subtitle">Tambah, edit, atau hapus produk rental.</p>
    </div>

    <div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <input type="text"
       id="searchProduk"
       class="form-control w-25"
       placeholder="Cari produk...">

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </button>

    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr class="text-uppercase text-secondary small">
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga / Hari</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($produk as $p): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <?php if (!empty($p->foto)): ?>
                                <img src="<?= base_url('assets/img/produk/'.$p->foto->nama_file) ?>"
                                     width="44" height="44"
                                     style="object-fit:cover;border-radius:10px;">
                            <?php else: ?>
                                <div style="width:44px;height:44px;border-radius:10px;background:#e5e7eb;"></div>
                            <?php endif; ?>

                            <div class="fw-semibold text-dark">
                                <?= $p->nama_produk ?>
                            </div>
                        </div>
                    </td>

                    <td><?= $p->nama_kategori ?></td>

                    <td class="fw-semibold text-success">
                        Rp <?= number_format($p->harga,0,',','.') ?>
                    </td>

                    <td>
                        <?= $p->stok_tersedia ?> / <?= $p->stok ?> unit
                    </td>

                    <td>
                        <?php if ($p->stok_tersedia > 0): ?>
                            <span class="badge bg-success">Tersedia</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Tidak Tersedia</span>
                        <?php endif; ?>
                    </td>

                    <td class="text-center">

                    <button class="btn btn-outline-primary btn-sm me-1"
                    onclick="openEditModal(
                        '<?= $p->id_produk ?>',
                        '<?= $p->id_kategori ?>',
                        '<?= htmlspecialchars($p->kode_produk, ENT_QUOTES) ?>',
                        '<?= htmlspecialchars($p->nama_produk, ENT_QUOTES) ?>',
                        '<?= htmlspecialchars($p->deskripsi, ENT_QUOTES) ?>',
                        '<?= htmlspecialchars($p->spesifikasi, ENT_QUOTES) ?>',
                        '<?= $p->harga ?>',
                        '<?= $p->stok ?>',
                        '<?= $p->status ?>',
                        '<?= base_url('assets/img/produk/' . ($p->foto->nama_file ?? 'noimage.png')) ?>'
                    )">
                    <i class="bi bi-pencil"></i>
                    </button>


                    <a href="<?= base_url('admin/produk/hapus/'.$p->id_produk) ?>"
                       class="btn btn-outline-danger btn-sm"
                       onclick="return confirm('Hapus produk ini?')">
                        <i class="bi bi-trash"></i>
                    </a>

                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
}
</script>

</div>

</div>
<script>
document.getElementById('searchProduk').addEventListener('keyup', function () {
    let keyword = this.value.toLowerCase();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function (row) {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(keyword) ? '' : 'none';
    });
});
</script>

<!-- MODAL TAMBAH PRODUK -->
<div class="modal fade" id="modalTambahProduk">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">

<div class="modal-body row g-3">
<h3><b>Tambah Produk</b></h3>
<div class="col-md-6">
<label>Kode Produk</label>
<input type="text" name="kode_produk" class="form-control" required>
</div>

<div class="col-md-6">
<label>Kategori</label>
<select name="id_kategori" class="form-control" required>
<?php foreach ($kategori as $k): ?>
<option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
<?php endforeach ?>
</select>
</div>

<div class="col-md-6">
<label>Nama Produk</label>
<input type="text" name="nama_produk" class="form-control" required>
</div>

<div class="col-md-6">
<label>Harga / Hari</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="col-md-6">
<label>Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<div class="col-md-6">
<label>Kondisi</label>
<input type="text" name="kondisi" class="form-control">
</div>

<div class="col-md-12">
<label>Spesifikasi</label>
<textarea name="spesifikasi" class="form-control"></textarea>
</div>

<div class="col-md-12">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control"></textarea>
</div>

<div class="col-md-6">
<label>Status</label>
<select name="status" class="form-control">
<option value="tersedia">Tersedia</option>
<option value="tidak_tersedia">Tidak Tersedia</option>
</select>
</div>

<div class="col-md-6">
<label>Foto Produk</label>
<input type="file" name="foto[]" multiple class="form-control">
</div>

</div>

<div class="modal-footer">
<button class="btn btn-primary">Simpan</button>
</div>

</form>
</div>
</div>
</div>



<!-- MODAL EDIT PRODUK -->
<div class="modal fade" id="modalEditProduk" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form id="formEditProduk" method="post" enctype="multipart/form-data">

<input type="hidden" id="edit_id">

<div class="modal-body">
  <div class="row g-3">
    <h3><b>Edit Produk</b></h3>
    <div class="col-md-4 text-center">
      <label class="form-label fw-semibold">Foto Saat Ini</label>
      <img id="edit_foto_preview"
           class="img-fluid rounded shadow-sm mb-2"
           style="max-height:160px; object-fit:cover">
      <input type="file" name="foto[]" multiple class="form-control mt-2">
    </div>

    <div class="col-md-8">
      <div class="row g-3">

        <div class="col-md-6">
          <label>Kode Produk</label>
          <input type="text" name="kode_produk" id="edit_kode" class="form-control" readonly>
        </div>

        <div class="col-md-6">
          <label>Kategori</label>
          <select name="id_kategori" id="edit_kategori" class="form-control">
            <?php foreach ($kategori as $k): ?>
              <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-6">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" id="edit_nama" class="form-control">
        </div>

        <div class="col-md-6">
          <label>Harga</label>
          <input type="number" name="harga" id="edit_harga" class="form-control">
        </div>

        <div class="col-md-6">
          <label>Stok</label>
          <input type="number" name="stok" id="edit_stok" class="form-control">
        </div>

        <div class="col-md-6">
          <label>Status</label>
          <select name="status" id="edit_status" class="form-control">
            <option value="tersedia">Tersedia</option>
            <option value="tidak_tersedia">Tidak Tersedia</option>
          </select>
        </div>

        <div class="col-md-12">
          <label>Spesifikasi</label>
          <textarea name="spesifikasi" id="edit_spesifikasi" class="form-control" rows="2"></textarea>
        </div>

        <div class="col-md-12">
          <label>Deskripsi</label>
          <textarea name="deskripsi" id="edit_deskripsi" class="form-control" rows="2"></textarea>
        </div>

      </div>
    </div>

  </div>
  <button class="btn btn-warning mt-3">Update</button>
</div>


</form>

    </div>
  </div>
</div>

<script>
function openEditModal(id, kategori, kode, nama, deskripsi, spesifikasi, harga, stok, status, foto) {
document.getElementById('formEditProduk').action =
"<?= base_url('admin/produk/update/') ?>" + id;

edit_kode.value = kode;
edit_nama.value = nama;
edit_harga.value = harga;
edit_stok.value = stok;
edit_deskripsi.value = deskripsi;
edit_spesifikasi.value = spesifikasi;
edit_status.value = status;
edit_kategori.value = kategori;
edit_foto_preview.src = foto;

new bootstrap.Modal(document.getElementById('modalEditProduk')).show();
}

</script>


<style>
.modal-body label {
    font-weight: 600;
    margin-bottom: 4px;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
