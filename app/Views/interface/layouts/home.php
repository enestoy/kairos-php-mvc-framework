<?php include __DIR__ . '/partials/header.php'; ?>
<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Kairos'a Hoşgeldin</h1>
        <p class="lead text-muted">Zamanın ruhunu yakala, teknolojiyi kendine hizmetkâr eyle.</p>
    </div>

    <div class="row g-4">
        <!-- Admin Giriş Kartı -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-semibold">Admin Girişi</h5>
                    <p class="card-text">Yönetim paneline giriş yapmak için burayı kullan.</p>
                    <a href="<?= base_url('admin/login') ?>" class="btn btn-primary">Giriş Yap</a>
                </div>
            </div>
        </div>

        <!-- İletişim Sayfası -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-semibold">Bize Ulaş</h5>
                    <p class="card-text">Fikrini, önerini veya sorununu paylaşmak ister misin?</p>
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-success">İletişim</a>
                </div>
            </div>
        </div>

        <!-- Panel Önizleme -->
        <div class="col-md-4">
            <div class="card shadow-lg h-100 border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-semibold">Panel Önizleme</h5>
                    <p class="card-text">Yetkin varsa paneli gezebilir, kullanıcıları yönetebilirsin.</p>
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-outline-dark">Dashboard</a>
                </div>
            </div>
        </div>
    </div>

 
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>