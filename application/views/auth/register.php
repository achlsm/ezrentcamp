<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | EzRent Camp Jogja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: linear-gradient(135deg, #159f46 0%, #0d7a35 100%); 
        }
        .auth-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            max-width: 450px;
            width: 100%;
        }
        .logo-section {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px 0;
            background: #159f46;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            margin-top: -40px;
            margin-left: -40px;
            margin-right: -40px;
        }
        .logo-section img {
            width: 60px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="auth-container">
    <div class="auth-box">
        <div class="logo-section">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo">
            <h5 class="fw-bold m-0">EzRent Camp Jogja</h5>
            <p class="small m-0 mt-1">Daftar untuk mulai menyewa peralatan camping</p>
        </div>

        <?php echo $this->session->flashdata('message'); ?>
        
        <h4 class="text-center mb-4">Buat Akun Baru</h4>

        <form method="POST" action="<?php echo site_url('auth/register'); ?>">
            
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                           placeholder="Masukkan nama lengkap" value="<?php echo set_value('nama_lengkap'); ?>">
                </div>
                <?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label small fw-bold">Email <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" 
                           placeholder="nama@email.com" value="<?php echo set_value('email'); ?>">
                </div>
                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-bold">Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="Minimal 6 karakter">
                </div>
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="mb-4">
                <label for="confirm_password" class="form-label small fw-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                           placeholder="Ulangi password">
                </div>
                <?php echo form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="syaratKetentuan" required>
                <label class="form-check-label small" for="syaratKetentuan">
                    Saya setuju dengan <a href="#" class="text-success text-decoration-none fw-bold">Syarat & Ketentuan</a> dan <a href="#" class="text-success text-decoration-none fw-bold">Kebijakan Privasi</a>
                </label>
            </div>

            <button type="submit" class="btn btn-success rounded-pill w-100 py-2 fw-bold">Daftar Sekarang</button>
        </form>
        
        <p class="text-center small mt-4">
            Sudah punya akun? <a href="<?php echo site_url('auth/login'); ?>" class="text-success fw-bold text-decoration-none">Masuk di sini</a>
        </p>

        <div class="text-center mt-3">
            <a href="<?php echo base_url(); ?>" class="text-muted small text-decoration-none">← Kembali ke Home</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>