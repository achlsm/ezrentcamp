<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Sewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h3 class="mb-4">Riwayat Sewa Saya</h3>

    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th>Kode</th>
                <th>Produk</th>
                <th>Periode</th>
                <th>Total</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($riwayat as $r): ?>
            <tr>
                <td><?= $r->kode_transaksi ?></td>
                <td><?= $r->nama_produk ?></td>
                <td><?= $r->tanggal_mulai ?> - <?= $r->tanggal_selesai ?></td>
                <td>Rp <?= number_format($r->total_harga) ?></td>
                <td>
                    <span class="badge bg-secondary"><?= ucfirst($r->status) ?></span>
                </td>
                <td>
                    <a href="<?= base_url('home/detail_sewa/'.$r->id_transaksi) ?>"
                       class="btn btn-sm btn-primary">
                        Lihat Detail
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>