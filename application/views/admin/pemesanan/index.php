
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pemesanan - EzRent Admin</title>

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
            transition: 0.3s;
            z-index: 1000;
            border-right: 1px solid #e2e8f0;
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
        }

        .nav-link i { color: #159F46; }

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

        .table {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>

<?php
$segment = $this->uri->segment(2); // admin/{segment}

function badgeStatus($status) {
    $map = [
        'pending' => 'secondary',
        'dibayar' => 'primary',
        'dikonfirmasi' => 'info',
        'disewa' => 'warning',
        'selesai' => 'success',
        'dibatalkan' => 'danger'
    ];
    return $map[$status] ?? 'dark';
}
?>

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
           href="<?= base_url('admin/transaksi'); ?>">
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
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <h2 class="fw-bold mb-2">Kelola Pemesanan</h2>
    <p class="text-muted mb-4">Riwayat & status penyewaan pelanggan</p>

    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </button>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Kode Transaksi</th>
                <th>User</th>
                <th>Produk</th>
                <th>Periode</th>
                <th>Total</th>
                <th>Status</th>
                <th width="170">Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php foreach($transaksi as $t): ?>
<tr>
    <td><?= $t->kode_transaksi ?></td>
    <td><?= $t->nama_lengkap ?></td>
    <td><?= $t->nama_produk ?></td>
    <td><?= $t->tanggal_mulai ?> – <?= $t->tanggal_selesai ?></td>
    <td>Rp <?= number_format($t->total_harga) ?></td>
    <td>
        <span class="badge bg-<?= badgeStatus($t->status) ?>">
            <?= ucfirst($t->status) ?>
        </span>
    </td>

    <!-- AKSI (SATU KOLOM) -->
    <td class="text-nowrap">
        <button class="btn btn-sm btn-primary me-1"
            onclick="openEditModal(
                '<?= $t->id_transaksi ?>',
                '<?= $t->status ?>',
                '<?= htmlspecialchars($t->catatan_admin ?? '', ENT_QUOTES) ?>',
                '<?= $t->denda ?>'
            )">
            <i class="bi bi-pencil"></i>
        </button>

        <a href="<?= base_url('admin/transaksi/hapus/'.$t->id_transaksi) ?>"
           onclick="return confirm('Hapus transaksi ini?')"
           class="btn btn-sm btn-danger">
           <i class="bi bi-trash"></i>
        </a>
    </td>

</tr>
<?php endforeach; ?>
</tbody>

    </table>

</div>

<!-- MODAL SELESAI -->
<div class="modal fade" id="selesaiModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('admin/transaksi/selesai') ?>">
            <input type="hidden" name="id_transaksi" id="id_transaksi">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selesaikan Penyewaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Denda (jika ada)</label>
                    <input type="number" name="denda" class="form-control" value="0">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
}

function openSelesaiModal(id) {
    document.getElementById('id_transaksi').value = id;
    new bootstrap.Modal(document.getElementById('selesaiModal')).show();
}
</script>


<div class="modal fade" id="tambahModal">
  <div class="modal-dialog modal-lg">
    <<form method="post" action="<?= base_url('admin/transaksi/tambah') ?>">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Transaksi</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body row g-3">

          <div class="col-md-6">
            <label class="form-label">User</label>
            <select name="id_user" class="form-select" required>
              <option value="">-- Pilih User --</option>
              <?php foreach($users as $u): ?>
                <option value="<?= $u->id_user ?>"><?= $u->nama_lengkap ?> (<?= $u->email ?>) </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Produk</label>
            <select name="id_produk" class="form-select" required>
              <option value="">-- Pilih Produk --</option>
              <?php foreach($produk as $p): ?>
                <option value="<?= $p->id_produk ?>"><?= $p->nama_produk?> - Rp <?= number_format($p->harga) ?>/hari</option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Jumlah Unit</label>
            <input type="number" name="jumlah_unit" class="form-control" min="1" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Durasi (hari)</label>
            <input type="number" name="durasi_hari" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Total Harga</label>
            <input type="number" name="total_harga" class="form-control" required>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>



<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('admin/transaksi/update') ?>">
      <input type="hidden" name="id_transaksi" id="edit_id">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Transaksi</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Status Transaksi</label>
            <select name="status" id="edit_status" class="form-select">
              <option value="pending">Pending</option>
              <option value="dibayar">Dibayar</option>
              <option value="disewa">Disewa</option>
              <option value="selesai">Selesai</option>
              <option value="dibatalkan">Dibatalkan</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Catatan Admin</label>
            <textarea name="catatan_admin" id="edit_catatan"
                      class="form-control" rows="3"
                      placeholder="Catatan tambahan dari admin"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Denda (Rp)</label>
            <input type="number" name="denda" id="edit_denda"
                   class="form-control" value="0">
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
function openEditModal(id, status, catatan, denda) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_catatan').value = catatan;
    document.getElementById('edit_denda').value = denda;

    new bootstrap.Modal(document.getElementById('editModal')).show();
}
</script>



</body>
</html>
