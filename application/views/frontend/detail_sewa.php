<style>
    .rating-stars {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating-stars input {
        display: none;
    }

    .rating-stars label {
        position: relative;
        width: 40px;
        font-size: 30px;
        color: #dee2e6; /* Warna bintang kosong (abu-abu muda) */
        cursor: pointer;
        transition: color 0.2s ease;
    }

    /* Efek Hover & Check */
    .rating-stars label:hover,
    .rating-stars label:hover ~ label,
    .rating-stars input:checked ~ label {
        color: #ffc107; /* Warna emas Bootstrap warning */
    }

    .rating-stars label:active {
        transform: scale(0.9);
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- CARD DETAIL -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt-cutoff me-2"></i> Detail Transaksi
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Produk</span>
                        <strong><?= $detail->nama_produk ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Periode</span>
                        <strong><?= $detail->tanggal_mulai ?> – <?= $detail->tanggal_selesai ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Harga</span>
                        <strong class="text-success">
                            Rp <?= number_format($detail->total_harga) ?>
                        </strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Status</span>
                        <span class="badge bg-<?= $detail->status == 'selesai' ? 'success' : 'secondary' ?>">
                            <?= ucfirst($detail->status) ?>
                        </span>
                    </li>
                </ul>
            </div>

            <!-- FLASH MESSAGE -->
<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-warning shadow-sm">
        <i class="bi bi-exclamation-triangle me-1"></i>
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success shadow-sm">
        <i class="bi bi-check-circle me-1"></i>
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?php if($detail->status == 'selesai' && !$sudah_review): ?>
<div class="card shadow-sm border-0 mt-4 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3">
        <h6 class="mb-0 fw-bold text-dark">
            <i class="bi bi-star-fill text-warning me-2"></i>Berikan Penilaian Anda
        </h6>
    </div>

    <div class="card-body p-4">
        <form method="post" action="<?= base_url('home/simpan_review') ?>">
            <input type="hidden" name="id_produk" value="<?= $detail->id_produk ?>">
            <input type="hidden" name="id_transaksi" value="<?= $detail->id_transaksi ?>">

            <div class="mb-4 text-center text-md-start">
                <label class="form-label fw-bold d-block text-muted small text-uppercase mb-2">Rating Produk</label>
                <div class="rating-stars">
                    <?php for($i=5; $i>=1; $i--): ?>
                        <input type="radio" name="rating" id="star<?= $i ?>" value="<?= $i ?>" required>
                        <label for="star<?= $i ?>"><i class="bi bi-star-fill"></i></label>
                    <?php endfor; ?>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold text-muted small text-uppercase mb-2">Ulasan Anda</label>
                <textarea name="komentar" 
                          class="form-control border-light-subtle bg-light" 
                          rows="4" 
                          placeholder="Ceritakan pengalaman Anda menggunakan produk ini..." 
                          style="resize: none;"
                          required></textarea>
            </div>

            <div class="d-grid d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success px-5 py-2 fw-semibold shadow-sm">
                    <i class="bi bi-send-fill me-2"></i>Kirim Review
                </button>
            </div>
        </form>
    </div>
</div>

<?php elseif($detail->status == 'selesai' && $sudah_review): ?>

<div class="alert alert-info shadow-sm mt-4">
    <i class="bi bi-info-circle me-1"></i>
    Kamu sudah memberikan review untuk produk ini. Terima kasih 🙌
</div>

<?php endif; ?>


        </div>
    </div>
</div>