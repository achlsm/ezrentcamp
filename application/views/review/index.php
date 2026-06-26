<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Testimoni Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6f8;
            font-family: 'Segoe UI', sans-serif;
        }

        /* HEADER HIJAU */
        .header-green {
            background: #1f8f4d;
            color: white;
            padding: 50px 20px;
            border-radius: 20px;
        }

        .stats-box {
            background: white;
            color: #1f8f4d; 
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            height: 100%;
        }

       .stats-box h5 {
            font-size: 19px;     
            font-weight: 300;    
        }

        .review-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.06);
            border: 1px solid #f1f1f1;
            height: 100%;
            transition: 0.3s;
        }

        .review-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 22px rgba(0,0,0,0.1);
        }

        .line-small {
            width: 40%;
            height: 2px;
            background: #e5e5e5;
            margin: 12px 0;
        }
            @media (max-width: 768px) {
            .stats-box { text-align: center; }
            .stack-sm { display: block !important; width: 100% !important; margin-bottom: 10px; }
        }
    </style>
</head>

<body>

<!-- BAGIAN HIJAU ATAS FULL WIDTH -->
<div class="header-green w-100 py-5 mb-4 text-center" style="border-radius:0; margin:0;">
    <h3 class="fw-bold mb-2">Testimoni Pelanggan</h3>
    <p class="mb-0">Ulasan asli dari pelanggan EzRent Camp Jogja</p>
</div>

<div class="container my-5"> <!-- container dimulai di sini -->


    <!-- 4 KOTAK STATISTIK -->
    <div class="row g-3 mb-4">

        <!-- Total Ulasan -->
        <div class="col-md-3 col-12">
            <div class="stats-box text-center">
                <h5 class="fw-bold mb-0">256</h5>
                <small class="text-muted">Total Ulasan</small>
            </div>
        </div>

        <!-- Rating Rata-rata -->
        <div class="col-md-3 col-12">
            <div class="stats-box text-center">
                <h5 class="fw-bold mb-0">
                    4.8
                    <i class="bi bi-star-fill" style="color: #f4c542; margin-left: 4px; font-size: 16px;"></i>
                </h5>


                <small class="text-muted">Rating Rata-rata</small>
            </div>
        </div>

        <!-- Tingkat Kepuasan -->
        <div class="col-md-3 col-12">
            <div class="stats-box text-center">
                <h5 class="fw-bold mb-0">98%</h5>
                <small class="text-muted">Tingkat Kepuasan</small>
            </div>
        </div>

        <!-- Search Bar -->
      <div class="col-auto d-flex align-items-center justify-content-center">
        <form action="<?= site_url('testimoni/index') ?>" method="GET">
            <div class="d-flex align-items-center">
                <input type="text"
                    name="cari"
                    class="form-control rounded-start-3"
                    placeholder="Cari..."
                    style="width:220px; height:40px;"
                    value="<?= html_escape($this->input->get('cari')) ?>">

                <button type="submit"
                        class="btn text-white px-4 rounded-end-3"
                        style="background:#159F46; height:40px; font-weight:600;">
                    Cari
                </button>
            </div>
        </form>
    </div>

    <div class="row mt-4">

        <?php foreach ($review as $r): ?>
            <div class="col-md-4 col-12 mb-4">

                <div class="review-card">

                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center me-2" style="width: 45px; height: 45px; font-size:18px;">
                            <i class="bi bi-person"></i>
                        </div>
                        <strong><?= $r->nama_lengkap ?></strong>
                    </div>

                    <div class="text-warning mb-2">⭐ <?= $r->rating ?></div>

                    <p class="mb-2" style="color:#444; line-height:1.5;">
                        <?= $r->isi_review ?>
                    </p>

                    <div class="line-small"></div>

                    <div class="text-success small mb-1">
                        <?= $r->nama_produk ?>
                    </div>

                    <div class="text-muted small">
                        <?= date('d M Y', strtotime($r->created_at)) ?>
                    </div>

                </div>

            </div>
        <?php endforeach; ?>

    </div>
</div>
</div>


</body>
</html>