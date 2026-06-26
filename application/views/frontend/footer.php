<style>
    .footer-full {
        background: #000;
        color: #e6e6e6;
        padding: 50px 0;
        font-weight: 300;
    }
    .footer-full h5 {
        color: #159f46;
        font-weight: 400;
    }
    .footer-full h6 {
        color: #ffffff;
        font-weight: 400;
    }
    .footer-full a, 
    .footer-full p, 
    .footer-full li {
        color: #e6e6e6 !important;
        opacity: 0.85;
        font-weight: 300;
    }
    .footer-full a:hover {
        color: #fff !important;
        opacity: 1;
    }
    .footer-full hr {
        border-color: #444;
    }
</style>

<footer class="full-bleed footer-full">
    <div class="container">
        <div class="row">

            <div class="col-md-3 mb-4">
                <h5>EzRent Camp Jogja</h5>
                <p>Platform rental perlengkapan outdoor terpercaya di Yogyakarta. Sewa peralatan camping & hiking berkualitas dengan harga terjangkau.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Katalog Produk</a></li>
                    <li><a href="#">Artikel</a></li>
                    <li><a href="#">Testimoni</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Kontak</h5>
                <p><i class="bi bi-geo-alt"></i> Jl. Kaliurang KM 5, Yogyakarta</p>
                <p><i class="bi bi-telephone"></i> +62 812-3456-7890</p>
                <p><i class="bi bi-envelope"></i> info@ezrentcampjogja.com</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Sewa Sekarang</h5>
                <p>Pesan perlengkapan camping Anda melalui WhatsApp untuk respon cepat!</p>

                <a href="https://wa.me/6281234567890" class="btn btn-success btn-sm w-100 mb-2">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>

        </div>

        <hr>

        <p class="text-center small mb-0">
            © <?= date('Y'); ?> EzRent Camp Jogja. All rights reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>