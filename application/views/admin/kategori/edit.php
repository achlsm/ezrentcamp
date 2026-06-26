<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori - EzRent Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
        }

        .page-container {
            max-width: 600px;
            margin: 50px auto;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.06);
            border: 1px solid #eef1f4;
        }

        .btn-green {
            background: #159F46;
            color: white;
        }
        .btn-green:hover {
            background: #12863b;
            color: white;
        }

        label {
            font-weight: 600;
            color: #1e293b;
        }

        .preview-img {
            width: 100px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .custom-select-wrapper {
            position: relative;
        }

        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' class='bi bi-chevron-down' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>") no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px !important;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

    </style>
</head>

<body>

<div class="page-container">
    <h2 class="fw-bold mb-2">Edit Kategori</h2>
    <p style="font-size:15px; font-weight:200; color:#64748b;">Perbarui informasi kategori</p>

    <div class="form-card">

        <form action="<?= base_url('admin/kategori/update/'.$kategori->id_kategori); ?>" 
              method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" 
                       value="<?= $kategori->nama_kategori; ?>" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required><?= $kategori->deskripsi; ?></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                <img src="<?= base_url('assets/img/kategori/'.$kategori->gambar); ?>" class="preview-img">
            </div>

            <div class="mb-3">
                <label>Ganti Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control">
                <input type="hidden" name="gambar_lama" value="<?= $kategori->gambar; ?>">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <div class="custom-select-wrapper">
                <select name="status" class="form-control custom-select">
                    <option value="aktif" <?= $kategori->status == 'aktif' ? 'selected' : '' ?>>Tersedia</option>
                    <option value="nonaktif" <?= $kategori->status == 'nonaktif' ? 'selected' : '' ?>>Tidak Tersedia</option>
                </select>
            </div>

            <button type="submit" class="btn btn-green">Update</button>
            <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

</body>
</html>