<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
/* === DETAIL PRODUK CSS (Inline) === */
.container-detail {
    max-width: 1200px;
    margin: auto;
    padding: 30px 15px;
}

/* Flexbox untuk Main Layout (Kiri: Gambar, Kanan: Info) */
.detail-main-content {
    display: flex;
    gap: 30px;
    margin-bottom: 50px;
}

/* Kolom Kiri: Gambar */
.detail-gallery {
    flex: 0 0 45%;
    max-width: 45%;
    position: relative;
}

.main-image-container {
    height: 450px; /* Tinggi gambar utama */
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.main-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.label-recommended {
    position: absolute;
    top: 15px;
    right: 15px;
    padding: 5px 10px;
    background-color: #159f46; /* Hijau */
    color: white;
    font-size: 0.8rem;
    font-weight: bold;
    border-radius: 4px;
    z-index: 10;
}

/* Kolom Kanan: Informasi & Aksi */
.detail-info {
    flex: 1;
}

.detail-info .category-breadcrumb {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 5px;
}

.detail-info h1 {
    font-size: 2rem;
    font-weight: 700;
    color: #343a40;
    margin-bottom: 10px;
}

.detail-rating {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
}

.star-rating {
    color: #ffc107;
    font-size: 1.2rem;
    margin-right: 5px;
}

.rating-value {
    font-weight: 600;
}

.review-count {
    color: #6c757d;
    font-size: 0.9rem;
}

.detail-price {
    font-size: 2.2rem;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 25px;
}

.detail-price span {
    font-size: 1rem;
    font-weight: normal;
    color: #6c757d;
    margin-left: 5px;
}

/* Status Stok */
.stock-status {
    padding: 10px 0;
    margin-bottom: 25px;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.stock-status span {
    font-weight: bold;
    color: #159f46; /* Tersedia */
}

.stock-status .kosong {
    color: #dc3545; /* Kosong */
}

/* Tombol */
.action-buttons {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
}

.whatsapp-button {
    flex-grow: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 12px 20px;
    background-color: #159f46;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s;
}

.whatsapp-button:hover {
    background-color: #117d38;
}

.whatsapp-button i {
    margin-right: 10px;
}

/* === BAGIAN TAB (Deskripsi, Spesifikasi) === */
.detail-tabs {
    display: flex;
    flex-direction: column;
}

.tabs-menu {
    display: flex;
    border-bottom: 2px solid #eee;
    margin-bottom: 20px;
}

.tab-button {
    padding: 10px 20px;
    cursor: pointer;
    font-weight: 600;
    color: #6c757d;
    border: none;
    background: none;
    border-bottom: 2px solid transparent;
    transition: all 0.3s;
}

.tab-button.active {
    color: #159f46;
    border-bottom: 2px solid #159f46;
}

.tab-content h3 {
    font-size: 1.3rem;
    color: #343a40;
    margin-bottom: 10px;
}

.tab-content p {
    color: #495057;
    line-height: 1.6;
}

/* Spesifikasi List */
.spec-list {
    list-style: none;
    padding: 0;
}

.spec-list li {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px dashed #eee;
    font-size: 0.95rem;
}

.spec-list li strong {
    flex-basis: 30%;
    font-weight: 600;
    color: #343a40;
}

.spec-list li span {
    flex-basis: 70%;
    text-align: right;
    color: #6c757d;
}


/* === BAGIAN RATING & REVIEW === */
.review-section {
    margin-top: 50px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.review-section h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
}

.review-card {
    padding: 15px 0;
    border-bottom: 1px solid #f8f9fa; /* Pembatas tipis */
}

.review-card:last-child {
    border-bottom: none;
}

.review-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
    align-items: center;
}

.reviewer-name {
    font-weight: bold;
    color: #343a40;
}

.review-date {
    font-size: 0.8rem;
    color: #999;
}

.review-text {
    font-size: 0.95rem;
    color: #495057;
}

/* === PRODUK TERKAIT === */
.related-products {
    margin-top: 70px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.related-products h2 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

/* Styling Card Produk Terkait (diambil dari katalog sebelumnya) */
.related-products .product-card {
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    height: 100%;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: #212529;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.related-products .product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0px 5px 12px rgba(0,0,0,0.1);
}

.related-products .product-card .product-image {
    position: relative;
    height: 150px;
    overflow: hidden;
}

.related-products .product-card .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-products .product-card .product-info {
    padding: 12px;
    flex-grow: 1;
}

.related-products .product-card .product-info h4 {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 5px;
    height: 2.2em;
    overflow: hidden;
}

.related-products .product-card .product-rating .rating-value {
    color: #ffc107;
    font-weight: 600;
    font-size: 0.85rem;
}

.related-products .product-card .product-price {
    color: #343a40;
    font-weight: bold;
    font-size: 1rem;
    margin-top: 8px;
}

.label-diskon {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 4px 8px;
    background-color: #dc3545; /* Merah */
    color: white;
    font-size: 0.75rem;
    font-weight: bold;
    border-radius: 4px;
    z-index: 10;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .detail-main-content {
        flex-direction: column;
    }
    .detail-gallery, .detail-info {
        max-width: 100%;
        flex: 1 1 100%;
    }
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 576px) {
    .product-grid {
        grid-template-columns: 1fr;
    }
    .detail-price {
        font-size: 1.8rem;
    }
}
</style>

<div class="container-detail">

    <?php 
        // 1. Ambil data utama produk
        $p = $produk;
        
        // 2. Logika Gambar Utama (Fix: Kadang di detail namanya 'foto_utama' atau di dalam list)
        // Cek apakah ada foto utama, jika tidak ada ambil dari list pertama, jika tidak ada lagi pakai default
        $foto_utama = 'default.jpg';
        if (!empty($p['foto_utama'])) {
            $foto_utama = $p['foto_utama'];
        } elseif (!empty($p['foto_list'][0]['nama_file'])) {
            $foto_utama = $p['foto_list'][0]['nama_file'];
        }
        
        // 3. Logika Review & Rating (Fix: Ambil jumlah dari list review yang benar-benar ada)
        $jml_review = !empty($p['review_list']) ? count($p['review_list']) : 0;
        
        // Hitung rata-rata rating jika tidak dikirim dari database
        $rating = $p['rating'] ?? 0;
        $full_stars = floor($rating);
        $half_star = $rating - $full_stars >= 0.5 ? 1 : 0;
        $empty_stars = 5 - $full_stars - $half_star;

        // 4. Status Stok
        $stok_sekarang = isset($p['stok_tersedia']) ? $p['stok_tersedia'] : ($p['stok'] ?? 0);
        $is_available = $stok_sekarang > 0;
        $stok_class = $is_available ? '' : 'kosong';
    ?>

    <div class="detail-main-content">
        
        <div class="detail-gallery">
            <div class="product-image-wrapper">
                <?php if (!$is_available): ?>
                    <span class="label-diskon" style="position:absolute; top:15px; right:15px; background:#dc3545; color:white; padding:5px 10px; border-radius:4px; z-index:5;">Kosong</span>
                <?php elseif (isset($p['is_recommended']) && $p['is_recommended'] == 1): ?>
                    <span class="label-recommended">Rekomendasi</span>
                <?php endif; ?>
            
                <div class="main-image-container">
                    <img src="<?= base_url('assets/img/produk/' . html_escape($foto_utama)) ?>" 
                         alt="<?= html_escape($p['nama_produk']) ?>"
                         onerror="this.onerror=null;this.src='<?= base_url('assets/img/produk/default.jpg') ?>';">
                </div>
            </div>
        </div>
        
        <div class="detail-info">
            <p class="category-breadcrumb">
                Katalog / <?= html_escape($p['nama_kategori'] ?? 'Produk') ?> / <?= html_escape($p['nama_produk']) ?>
            </p>
            
            <h1><?= html_escape($p['nama_produk']) ?></h1>
            
            <div class="detail-rating">
                <?php if ($p['jumlah_review'] > 0): ?>
                    <span class="star-rating">
                        <?php 
                            $full_stars = floor($p['rating']);
                            $half_star = ($p['rating'] - $full_stars) >= 0.5 ? 1 : 0;
                            $empty_stars = 5 - $full_stars - $half_star;

                            echo str_repeat('★', $full_stars);
                            if ($half_star) echo '½'; 
                            echo str_repeat('☆', $empty_stars);
                        ?>
                    </span>
                    <span class="rating-value"><?= number_format($p['rating'], 1) ?></span> 
                    <span class="review-count">(<?= $p['jumlah_review'] ?> ulasan)</span>
                <?php else: ?>
                    <span class="star-rating">☆☆☆☆☆</span>
                    <span class="review-count">Belum ada ulasan</span>
                <?php endif; ?>
            </div>
            
            <p class="detail-price">
                Rp. <?= number_format($p['harga'], 0, ',', '.') ?> <span>/ hari</span>
            </p>
            
            <div class="stock-status">
                Stok tersedia saat ini: <span class="<?= $stok_class ?>"><?= $stok_sekarang ?> unit</span>
            </div>

            <div class="action-buttons">
                <?php if ($is_available): ?>
                    <?php if ($this->session->userdata('id_user')): // Cek apakah user sudah login ?>
                        <button type="button" class="whatsapp-button w-100 border-0" data-bs-toggle="modal" data-bs-target="#modalSewa">
                            <i class="fab fa-whatsapp"></i> Pesan Sekarang
                        </button>
                    <?php else: ?>
                        <a href="<?= site_url('auth/login') ?>" class="btn btn-outline-success w-100 fw-bold p-2">
                            <i class="fas fa-sign-in-alt"></i> Login untuk Menyewa
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <button class="btn btn-secondary w-100" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>

            <div class="detail-tabs">
                <div class="tabs-menu">
                    <button class="tab-button active" onclick="openTab(event, 'deskripsi')">Deskripsi Produk</button>
                    <button class="tab-button" onclick="openTab(event, 'spesifikasi')">Spesifikasi</button>
                </div>

                <div id="deskripsi" class="tab-content" style="display: block;">
                    <h3>Deskripsi Produk</h3>
                    <p><?= nl2br(html_escape($p['deskripsi'] ?? 'Deskripsi belum tersedia.')) ?></p>
                </div>

                <div id="spesifikasi" class="tab-content" style="display: none;">
                    <h3>Spesifikasi</h3>
                    <ul class="spec-list">
                        <li><strong>Kategori</strong> <span><?= html_escape($p['nama_kategori']) ?></span></li>
                        <li><strong>Keterangan</strong> <span><?= html_escape($p['spesifikasi'] ?? 'N/A') ?></span></li>
                        </ul>
                </div>
            </div>
            
        </div>
    </div>
    
    <hr>
    
    <div class="review-section">
        <h2>Rating & Ulasan (<?= $p['jumlah_review'] ?? 0 ?>)</h2>
        
        <?php if (!empty($p['review_list'])): ?>
            <?php foreach ($p['review_list'] as $review): ?>
                <div class="review-card">
                    <div class="review-header">
                        <span class="reviewer-name"><?= html_escape($review['nama_lengkap']) ?></span>
                        <span class="review-date"><?= date('d M Y', strtotime($review['created_at'])) ?></span>
                    </div>
                    <div class="detail-rating" style="margin-bottom: 5px;">
                        <span class="star-rating" style="font-size: 0.9rem;">
                            <?= str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']) ?>
                        </span>
                    </div>
                    <p class="review-text"><?= nl2br(html_escape($review['isi_review'])) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Belum ada ulasan untuk produk ini.</p>
        <?php endif; ?>
    </div>
    
    <hr>
    
    <div class="related-products">
        <h2>Produk Terkait</h2>
        
        <div class="product-grid">
            <?php if (!empty($produk_terkait)): ?>
                <?php foreach ($produk_terkait as $item): ?>
                    <a href="<?= site_url('produk/detail/' . $item['id_produk']) ?>" class="product-card">
                        
                        <div class="product-image">
                            <?php if ($item['stok_tersedia'] == 0): ?>
                                <span class="label-diskon">Kosong</span>
                            <?php elseif ($item['is_recommended'] == 1): ?>
                                <span class="label-recommended">Rekomendasi</span>
                            <?php endif; ?>
                            <img src="<?= base_url('assets/img/produk/' . html_escape($item['foto_utama'])) ?>" 
                                 alt="<?= html_escape($item['nama_produk']) ?>">
                        </div>
                        
                        <div class="product-info">
                            <h4><?= html_escape($item['nama_produk']) ?></h4>
                            <div class="product-rating">
                                <span class="rating-value">★ <?= number_format($item['rating'], 1) ?></span>
                            </div>
                            <p class="product-price">Rp. <?= number_format($item['harga'], 0, ',', '.') ?> / hari</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada produk terkait di kategori yang sama.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function openTab(evt, tabName) {
    var i, tabcontent, tabbuttons;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<div class="modal fade" id="modalSewa" tabindex="-1" aria-labelledby="modalSewaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="modalSewaLabel">Pesan via WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 bg-light rounded-3 mb-4">
                    <h6 class="fw-bold mb-1" id="produk-nama"><?= html_escape($p['nama_produk']) ?></h6>
                    <p class="text-muted mb-0 small" id="produk-harga-text">Rp <?= number_format($p['harga'], 0, ',', '.') ?> / hari</p>
                </div>

                <form id="formPemesananWA">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Tanggal Mulai *</label>
                            <input type="date" class="form-control" id="tgl_mulai" required min="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Tanggal Selesai *</label>
                            <input type="date" class="form-control" id="tgl_selesai" required min="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Jumlah Item *</label>
                            <input type="number" class="form-control" id="jumlah_item" value="1" min="1" max="<?= $stok_sekarang ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Catatan Tambahan</label>
                            <textarea class="form-control" id="catatan_wa" rows="2" placeholder="Contoh: Mohon konfirmasi ketersediaan"></textarea>
                        </div>
                        
                        <div class="col-12 mt-3">
                            <div class="d-flex justify-content-between p-2 border-top border-bottom bg-light">
                                <span class="fw-bold">Estimasi Total:</span>
                                <span class="fw-bold text-success" id="total_estimasi">Rp 0</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="checkSetuju" required>
                                <label class="form-check-label small" for="checkSetuju">
                                    Saya sudah membaca <a href="<?= base_url('panduan'); ?>" target="_blank">Panduan Sewa</a> dan menyetujui S&K.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 mt-4">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fab fa-whatsapp"></i> Kirim ke WA
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Harga dasar dari PHP
const hargaHarian = <?= $p['harga'] ?>;

function hitungTotal() {
    const tgl1 = document.getElementById('tgl_mulai').value;
    const tgl2 = document.getElementById('tgl_selesai').value;
    const qty = document.getElementById('jumlah_item').value;

    if (tgl1 && tgl2) {
        const start = new Date(tgl1);
        const end = new Date(tgl2);
        const diffTime = end - start;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // Termasuk hari pertama

        if (diffDays > 0) {
            const total = diffDays * hargaHarian * qty;
            document.getElementById('total_estimasi').innerText = 'Rp ' + total.toLocaleString('id-ID') + ' (' + diffDays + ' hari)';
            return { total, diffDays };
        }
    }
    document.getElementById('total_estimasi').innerText = 'Rp 0';
    return { total: 0, diffDays: 0 };
}

// Trigger hitung saat input berubah
document.querySelectorAll('#tgl_mulai, #tgl_selesai, #jumlah_item').forEach(item => {
    item.addEventListener('change', hitungTotal);
});

// Handle Kirim ke WhatsApp
document.getElementById('formPemesananWA').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const { total, diffDays } = hitungTotal();
    if (diffDays <= 0) {
        alert('Tanggal selesai harus setelah tanggal mulai!');
        return;
    }

    const tglMulai = document.getElementById('tgl_mulai').value;
    const tglSelesai = document.getElementById('tgl_selesai').value;
    const qty = document.getElementById('jumlah_item').value;
    const catatan = document.getElementById('catatan_wa').value || '-';
    const namaProduk = "<?= $p['nama_produk'] ?>";
    const waNumber = "6285740725548";

    const pesan = `Halo EzRentCamp,%0A` +
                  `Saya ingin menyewa produk berikut:%0A%0A` +
                  `*Produk:* ${namaProduk}%0A` +
                  `*Jumlah:* ${qty} unit%0A` +
                  `*Durasi:* ${tglMulai} s/d ${tglSelesai} (${diffDays} hari)%0A` +
                  `*Estimasi Total:* Rp ${total.toLocaleString('id-ID')}%0A` +
                  `*Catatan:* ${catatan}%0A%0A` +
                  `Saya sudah menyetujui Panduan Sewa. Mohon info ketersediaannya.`;

    window.open(`https://wa.me/${waNumber}?text=${pesan}`, '_blank');
});
</script>