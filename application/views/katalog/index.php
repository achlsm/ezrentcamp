<?php 
// Pastikan variabel-variabel seperti $current_filter, $kategori_list, $jumlah_produk, dan $produk_list
// telah didefinisikan di Controller Anda.
?>
<style>
/* === CSS KHUSUS KATALOG === */
.container-katalog { padding: 30px 15px; max-width: 1200px; margin: auto; }
.page-title { font-size: 1.3rem !important; font-weight: 700; color: #000 !important; margin-bottom: 0.25rem; }
.subtitle { color: #6c757d; margin-bottom: 30px; font-size: 0.9rem; }
.row { display: flex; flex-wrap: wrap; margin-right: -10px; margin-left: -10px; }
.row > div { padding-right: 10px; padding-left: 10px; }
.col-lg-3 { flex: 0 0 auto; width: 25%; }
.col-lg-9 { flex: 0 0 auto; width: 75%; }

/* SIDEBAR FILTER */
.filter-sidebar { padding: 20px; border: 1px solid #e9ecef; border-radius: 10px; background-color: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
.filter-sidebar h3 { font-size: 1rem; font-weight: 700; margin-bottom: 18px; }
.filter-group { margin-bottom: 12px; }
.filter-group h4 { font-size: 0.9rem; font-weight: 700; margin-bottom: 10px; }
.filter-group label { display: flex; align-items: center; font-size: 0.85rem; cursor: pointer; margin-bottom: 6px; color: #495057; }
.filter-group input[type="checkbox"], .filter-group input[type="radio"] { margin-right: 8px; accent-color: #159f46; width: 16px; height: 16px; }

/* Range Slider Styling */
.range-slider-custom { width: 100%; margin: 12px 0 5px; -webkit-appearance: none; height: 5px; background: #e9ecef; border-radius: 5px; outline: none; }
.range-slider-custom::-webkit-slider-thumb { -webkit-appearance: none; width: 16px; height: 16px; border-radius: 50%; background: #159f46; cursor: pointer; }

.apply-filter-btn { width: 100%; padding: 8px; border: none; border-radius: 8px; background-color: #159f46; color: white; font-weight: 600; cursor: pointer; margin-bottom: 8px; font-size: 0.85rem; }
.reset-filter-btn { display: block; width: 100%; text-align: center; text-decoration: none; color: #159f46; font-size: 0.85rem; padding: 7px 0; border-radius: 8px; border: 1px solid #159f46; font-weight: 600; }

/* PRODUCT GRID */
.product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
.product-card { border-radius: 10px; overflow: hidden; transition: all 0.3s; border: 1px solid #e9ecef; display: flex; flex-direction: column; text-decoration: none; color: #212529; background: white; }
.product-card:hover { transform: translateY(-4px); box-shadow: 0 6px 16px rgba(0,0,0,0.1); color: #212529; }
.product-image { position: relative; height: 180px; overflow: hidden; }
.product-image img { width: 100%; height: 100%; object-fit: cover; }
.product-info { padding: 12px; flex-grow: 1; }
.product-price { color: #159f46; font-weight: 700; font-size: 1.05rem; }

/* BADGES */
.label-recommended { position: absolute; top: 10px; right: 10px; padding: 4px 10px; border-radius: 5px; font-size: 0.7rem; font-weight: 700; color: white; background: #159f46; z-index: 10; }
.label-discount { position: absolute; top: 10px; right: 10px; padding: 4px 10px; border-radius: 5px; font-size: 0.7rem; font-weight: 700; color: white; background: #dc3545; z-index: 10; }

/* MOBILE ELEMENTS */
.mobile-filter-toggle { display: none; width: 100%; padding: 12px; background: white; border: 1px solid #e9ecef; border-radius: 8px; font-weight: 600; margin-bottom: 15px; }
.filter-overlay { display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 999; }
.filter-overlay.active { display: block; }
.filter-sidebar-mobile { position: fixed; top: 0; left: -100%; width: 85%; max-width: 350px; height: 100%; background: white; z-index: 1000; transition: 0.3s; overflow-y: auto; }
.filter-sidebar-mobile.active { left: 0; }
.filter-header-mobile { display: flex; justify-content: space-between; padding: 20px; border-bottom: 1px solid #e9ecef; }

.pagination-container {
                margin-top: 40px;
                display: flex;
                justify-content: center;
            }
            .pagination {
                display: flex;
                list-style: none;
                padding: 0;
                gap: 5px;
            }
            .pagination li a, .pagination li span {
                padding: 8px 16px;
                border: 1px solid #e9ecef;
                border-radius: 6px;
                text-decoration: none;
                color: #495057;
                font-size: 0.9rem;
                transition: all 0.3s;
            }
            .pagination li.active span {
                background-color: #159f46;
                color: white;
                border-color: #159f46;
            }
            .pagination li a:hover {
                background-color: #f0fdf4;
                color: #159f46;
            }

@media (max-width: 992px) {
    .col-lg-3 { display: none; }
    .col-lg-9 { width: 100%; }
    .mobile-filter-toggle { display: block; }
    .product-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
    .product-grid { grid-template-columns: 1fr; }
}
</style>

<div class="container-katalog">
    <h3 class="page-title">Katalog Produk</h3>
    <p class="subtitle">Temukan perlengkapan outdoor yang Anda butuhkan</p>

    <form method="GET" action="<?= site_url('katalog') ?>" id="filterForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h3>Filter</h3>
                    
                    <div class="filter-group">
                        <h4>Kategori</h4>
                        <?php if (isset($kategori_list)): foreach ($kategori_list as $kat): ?>
                            <label>
                                <input type="checkbox" name="kategori[]" value="<?= $kat['id_kategori'] ?>"
                                    <?= in_array($kat['id_kategori'], $current_filter['kategori'] ?? []) ? 'checked' : '' ?>
                                    onchange="this.form.submit()">
                                <?= html_escape($kat['nama_kategori']) ?>
                            </label>
                        <?php endforeach; endif; ?>
                    </div>

                    <hr>

                    <div class="filter-group">
                        <h4>Ketersediaan</h4>
                        <?php $curr_ket = $current_filter['ketersediaan'] ?? 'semua'; ?>
                        <label><input type="radio" name="ketersediaan" value="semua" <?= $curr_ket == 'semua' ? 'checked' : '' ?> onchange="this.form.submit()"> Semua</label>
                        <label><input type="radio" name="ketersediaan" value="tersedia" <?= $curr_ket == 'tersedia' ? 'checked' : '' ?> onchange="this.form.submit()"> Tersedia</label>
                        <label><input type="radio" name="ketersediaan" value="kosong" <?= $curr_ket == 'kosong' ? 'checked' : '' ?> onchange="this.form.submit()"> Kosong</label>
                    </div>

                    <hr>

                    <div class="filter-group">
                        <h4>Harga Maksimal</h4>
                        <input type="range" id="harga_range_slider" name="max_harga" class="range-slider-custom"
                               min="0" max="100000" step="1000" 
                               value="<?= html_escape($current_filter['max_harga'] ?? 100000) ?>"
                               oninput="updateHargaDisplay(this.value, 'harga_val_display')">
                        <div class="text-center mt-2">
                            <strong id="harga_val_display">Rp. <?= number_format($current_filter['max_harga'] ?? 100000, 0, ',', '.') ?></strong>
                        </div>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="apply-filter-btn">Terapkan Filter</button>
                        <a href="<?= site_url('katalog') ?>" class="reset-filter-btn">Reset</a>
                    </div>
                </div>
            </div>

           <div class="col-lg-9">
    <div class="d-flex justify-content-between align-items-center mb-4" style="gap:10px; flex-wrap: wrap;">
        <div style="flex-grow: 1; max-width: 450px;">
            <form action="<?= base_url('katalog') ?>" method="GET">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control" placeholder="Cari produk..." 
                           value="<?= html_escape($current_filter['cari'] ?? '') ?>" autocomplete="off">
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-search"></i> <span class="d-none d-sm-inline"></span>
                    </button>
                </div>
            </form>
        </div>
                    
                    <select name="sort" class="form-control" style="width: 200px;" onchange="this.form.submit()">
                        <option value="">Urutkan</option>
                        <option value="rating_tertinggi" <?= ($current_filter['sort'] == 'rating_tertinggi') ? 'selected' : '' ?>>Rating Tertinggi</option>
                        <option value="harga_terendah" <?= ($current_filter['sort'] == 'harga_terendah') ? 'selected' : '' ?>>Harga Terendah</option>
                    </select>

                    <button type="button" class="mobile-filter-toggle" onclick="toggleMobileFilter()">☰ Filter</button>
                </div>

                <p class="text-muted small">Menampilkan <?= $jumlah_produk ?? 0 ?> produk</p>

                <div class="product-grid">
                <?php if (!empty($produk_list)): foreach ($produk_list as $p): ?>
                    <?php 
                        // 1. Logika Rating Dinamis
                        $rating = isset($p['rating']) ? (float)$p['rating'] : 0;
                        $full_stars = floor($rating);
                        $half_star = ($rating - $full_stars) >= 0.5 ? 1 : 0;
                        $empty_stars = 5 - $full_stars - $half_star;

                        // 2. Logika Gambar Anti-Cache
                        $foto = !empty($p['foto_utama']) ? $p['foto_utama'] : 'default.jpg';
                        
                        // 3. Logika Stok
                        // Kita pakai pengecekan p['stok'] atau p['stok_tersedia'] sesuai database kamu
                        $sisa_stok = isset($p['stok_tersedia']) ? $p['stok_tersedia'] : ($p['stok'] ?? 0);
                    ?>
                    
                    <a href="<?= site_url('produk/detail/'.$p['id_produk']) ?>" class="product-card">
                        <div class="product-image">
                            <span class="<?= $sisa_stok > 0 ? 'label-recommended' : 'label-discount' ?>">
                                <?= $sisa_stok > 0 ? 'Tersedia' : 'Habis' ?>
                            </span>

                            <img src="<?= base_url('assets/img/produk/'.$foto) ?>?v=<?= time(); ?>" 
                                 alt="<?= html_escape($p['nama_produk']) ?>"
                                 style="width: 100%; height: 100%; object-fit: cover;"
                                 onerror="this.onerror=null;this.src='<?= base_url('assets/img/produk/default.jpg') ?>';">
                        </div>

                        <div class="product-info">
                            <h6 style="font-weight: 700; margin-bottom: 5px; height: 2.4em; overflow: hidden;">
                                <?= html_escape($p['nama_produk']) ?>
                            </h6>
                            
                            <div class="d-flex align-items-center mb-2" style="gap: 8px;">
                                <div style="font-size: 0.85rem;">
                                    <span style="color:#ffc107">★</span> 
                                    <strong><?= ($p['rating'] > 0) ? number_format($p['rating'], 1) : '0' ?></strong>
                                </div>

                                <div style="width: 1px; height: 12px; background: #dee2e6;"></div>

                                <div class="text-muted" style="font-size: 0.75rem;">
                                    <?= $p['jumlah_review'] ?> Ulasan
                                </div>

                                <div style="width: 1px; height: 12px; background: #dee2e6;"></div>

                                <div style="font-size: 0.75rem; color: #159f46; font-weight: 600;">
                                    <?= $p['jumlah_disewa'] ?>x Tersewa
                                </div>
                            </div>

                            <p class="product-price" style="margin-bottom: 0;">
                                Rp. <?= number_format($p['harga'], 0, ',', '.') ?> 
                                <small style="font-size: 0.7rem; color: #6c757d;">/ hari</small>
                            </p>
                        </div>
                    </a>
                <?php endforeach; else: ?>
                    <div style="grid-column: 1/-1; text-align: center; padding: 100px 20px;">
                        <i class="fas fa-box-open" style="font-size: 3rem; color: #dee2e6; margin-bottom: 15px; display: block;"></i>
                        <p style="color: #6c757d;">Yah, produk yang kamu cari tidak ditemukan.</p>
                        <a href="<?= site_url('katalog') ?>" class="btn btn-sm" style="color: #159f46; text-decoration: underline;">Lihat semua produk</a>
                    </div>
                <?php endif; ?>
            </div>
                <div class="pagination-container">
                <?php echo $pagination_links; ?>
            </div>
            </div>
        </div>
    </form>
</div>

<div class="filter-overlay" id="filterOverlay" onclick="toggleMobileFilter()"></div>
<div class="filter-sidebar-mobile" id="filterSidebarMobile">
    <div class="filter-header-mobile">
        <h3>Filter Produk</h3>
        <button type="button" onclick="toggleMobileFilter()" style="border:none; background:none; font-size:24px;">&times;</button>
    </div>
    <div style="padding: 20px;">
        <div class="filter-group">
            <h4>Kategori</h4>
            <?php if (isset($kategori_list)): foreach ($kategori_list as $kat): ?>
                <label>
                    <input type="checkbox" name="kategori_mobile[]" value="<?= $kat['id_kategori'] ?>"
                        <?= in_array($kat['id_kategori'], $current_filter['kategori'] ?? []) ? 'checked' : '' ?>>
                    <?= html_escape($kat['nama_kategori']) ?>
                </label>
            <?php endforeach; endif; ?>
        </div>
        <hr>
        <div class="filter-group">
            <h4>Ketersediaan</h4>
            <label><input type="radio" name="ketersediaan_mobile" value="semua" <?= $curr_ket == 'semua' ? 'checked' : '' ?>> Semua</label>
            <label><input type="radio" name="ketersediaan_mobile" value="tersedia" <?= $curr_ket == 'tersedia' ? 'checked' : '' ?>> Tersedia</label>
            <label><input type="radio" name="ketersediaan_mobile" value="kosong" <?= $curr_ket == 'kosong' ? 'checked' : '' ?>> Kosong</label>
        </div>
        <hr>
        <div class="filter-group">
            <h4>Harga Maksimal</h4>
            <input type="range" id="harga_range_slider_mobile" class="range-slider-custom"
                   min="0" max="100000" step="1000" 
                   value="<?= html_escape($current_filter['max_harga'] ?? 100000) ?>"
                   oninput="updateHargaDisplay(this.value, 'harga_val_display_mobile')">
            <div class="text-center mt-2">
                <strong id="harga_val_display_mobile">Rp. <?= number_format($current_filter['max_harga'] ?? 100000, 0, ',', '.') ?></strong>
            </div>
        </div>
        <button type="button" class="apply-filter-btn" onclick="applyMobileFilter()">Terapkan Filter</button>
    </div>
</div>

<script>
function updateHargaDisplay(val, elementId) {
    document.getElementById(elementId).innerText = 'Rp. ' + parseInt(val).toLocaleString('id-ID');
}

function toggleMobileFilter() {
    document.getElementById('filterOverlay').classList.toggle('active');
    document.getElementById('filterSidebarMobile').classList.toggle('active');
}

function applyMobileFilter() {
    const form = document.getElementById('filterForm');
    
    // 1. Sinkron Kategori
    const kategoriMobile = document.querySelectorAll('input[name="kategori_mobile[]"]:checked');
    document.querySelectorAll('input[name="kategori[]"]').forEach(cb => cb.checked = false);
    kategoriMobile.forEach(cb => {
        const mainCb = document.querySelector(`input[name="kategori[]"][value="${cb.value}"]`);
        if (mainCb) mainCb.checked = true;
    });
    
    // 2. Sinkron Ketersediaan (DIBETULKAN SYNTAX-NYA)
    const ketersediaanMobile = document.querySelector('input[name="ketersediaan_mobile"]:checked');
    if (ketersediaanMobile) {
        const mainRadio = document.querySelector(`input[name="ketersediaan"][value="${ketersediaanMobile.value}"]`);
        if (mainRadio) mainRadio.checked = true;
    }
    
    // 3. Sinkron Harga
    const hargaMobile = document.getElementById('harga_range_slider_mobile');
    const mainSlider = document.getElementById('harga_range_slider');
    if (hargaMobile && mainSlider) {
        mainSlider.value = hargaMobile.value;
    }
    
    form.submit();
}
</script>