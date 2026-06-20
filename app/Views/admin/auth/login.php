<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giriş | Kairos Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="<?= asset('assets/css/tailwind.css') ?>" rel="stylesheet" />
</head>
<body class="h-full bg-gradient-to-br from-brand-600 to-brand-900">
    <div class="min-h-full flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-auth p-8 sm:p-10">
                <div class="text-center mb-8">
                    <span class="inline-grid h-16 w-16 place-items-center rounded-2xl bg-brand-100 text-brand-600 text-2xl mb-4">
                        <i class="bi bi-shield-lock"></i>
                    </span>
                    <h1 class="text-2xl font-bold text-slate-800">Admin Paneli Girişi</h1>
                    <p class="text-sm text-slate-500 mt-1">Devam etmek için hesabınıza giriş yapın</p>
                </div>

                <?php if (!empty($error)): ?>
                    <div class="mb-5 flex items-center gap-2 rounded-lg bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-700">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <span><?= htmlspecialchars($error) ?></span>
                    </div>
                <?php endif; ?>

                <form method="post" action="" class="space-y-5">
                    <div>
                        <label for="username" class="form-label">Kullanıcı Adı</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-person"></i></span>
                            <input type="text" id="username" name="username" class="form-input"
                                   value="<?= isset($username) ? htmlspecialchars($username) : '' ?>"
                                   placeholder="Kullanıcı adınız" required autocomplete="username" autofocus>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="form-label">Şifre</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-key"></i></span>
                            <input type="password" id="password" name="password" class="form-input"
                                   placeholder="••••••••" required autocomplete="current-password">
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>">

                    <button type="submit" class="btn-primary w-full py-3">
                        <i class="bi bi-box-arrow-in-right"></i> Giriş Yap
                    </button>
                </form>

                <p class="text-center text-sm text-slate-500 mt-6">
                    Hesabın yok mu?
                    <a href="<?= base_url('register') ?>" class="font-semibold text-brand-600 hover:text-brand-700">Kayıt Ol</a>
                </p>
            </div>

            <p class="text-center mt-6">
                <a href="<?= base_url() ?>" class="text-sm text-white/80 hover:text-white">
                    <i class="bi bi-arrow-left mr-1"></i>Anasayfaya dön
                </a>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= asset('assets/js/alerts.js') ?>"></script>
    <?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
</body>
</html>
