<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Bizimle İletişime Geçin</h2>

                    <form action="<?= base_url('contact') ?>" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Adınız</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            <div class="invalid-feedback">Lütfen adınızı girin.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">Geçerli bir e-posta adresi girin.</div>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">Mesajınız</label>
                            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
                            <div class="invalid-feedback">Lütfen bir mesaj yazın.</div>
                        </div>
                         <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>">

                        <button type="submit" class="btn btn-primary w-100">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>

<script>
// Bootstrap 5 validation
(function () {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
