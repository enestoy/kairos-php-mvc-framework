<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kayıt Ol | Kairos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="<?= asset('assets/css/tailwind.css') ?>" rel="stylesheet" />
</head>
<body class="h-full bg-gradient-to-br from-brand-600 to-brand-900">
    <div class="min-h-full flex items-center justify-center p-4 py-10">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-auth p-8 sm:p-10">
                <div class="text-center mb-8">
                    <span class="inline-grid h-16 w-16 place-items-center rounded-2xl bg-brand-100 text-brand-600 text-2xl mb-4">
                        <i class="bi bi-person-plus"></i>
                    </span>
                    <h1 class="text-2xl font-bold text-slate-800">Hesap Oluştur</h1>
                    <p class="text-sm text-slate-500 mt-1">Kayıt ol ve panele giriş yap</p>
                </div>

                <?php if (!empty($errors['general'])): ?>
                    <div class="mb-5 flex items-center gap-2 rounded-lg bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-700">
                        <i class="bi bi-exclamation-triangle-fill"></i><span><?= htmlspecialchars($errors['general']) ?></span>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('register') ?>" class="space-y-4">
                    <div>
                        <label for="name" class="form-label">Ad Soyad</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-person"></i></span>
                            <input type="text" id="name" name="name"
                                   class="form-input <?= isset($errors['name']) ? 'form-input-error' : '' ?>"
                                   value="<?= htmlspecialchars($old['name'] ?? '') ?>" placeholder="Ad Soyad" required autofocus>
                        </div>
                        <?php if (isset($errors['name'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['name'] ?></p><?php endif; ?>
                    </div>

                    <div>
                        <label for="username" class="form-label">Kullanıcı Adı</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-at"></i></span>
                            <input type="text" id="username" name="username"
                                   class="form-input <?= isset($errors['username']) ? 'form-input-error' : '' ?>"
                                   value="<?= htmlspecialchars($old['username'] ?? '') ?>" placeholder="kullanici_adi" required>
                        </div>
                        <?php if (isset($errors['username'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['username'] ?></p><?php endif; ?>
                    </div>

                    <div>
                        <label for="email" class="form-label">E-posta</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email"
                                   class="form-input <?= isset($errors['email']) ? 'form-input-error' : '' ?>"
                                   value="<?= htmlspecialchars($old['email'] ?? '') ?>" placeholder="ornek@email.com" required>
                        </div>
                        <?php if (isset($errors['email'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['email'] ?></p><?php endif; ?>
                    </div>

                    <div>
                        <label for="password" class="form-label">Şifre</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-key"></i></span>
                            <input type="password" id="password" name="password"
                                   class="form-input <?= isset($errors['password']) ? 'form-input-error' : '' ?>"
                                   placeholder="En az 6 karakter" required>
                        </div>
                        <?php if (isset($errors['password'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['password'] ?></p><?php endif; ?>
                    </div>

                    <div>
                        <label for="password_confirm" class="form-label">Şifre (Tekrar)</label>
                        <div class="input-group">
                            <span class="input-icon"><i class="bi bi-key-fill"></i></span>
                            <input type="password" id="password_confirm" name="password_confirm"
                                   class="form-input <?= isset($errors['password_confirm']) ? 'form-input-error' : '' ?>"
                                   placeholder="Şifreyi tekrar girin" required>
                        </div>
                        <?php if (isset($errors['password_confirm'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['password_confirm'] ?></p><?php endif; ?>
                    </div>

                    <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>">

                    <button type="submit" class="btn-primary w-full py-3">
                        <i class="bi bi-check2-circle"></i> Kayıt Ol
                    </button>
                </form>

                <p class="text-center text-sm text-slate-500 mt-6">
                    Zaten hesabın var mı?
                    <a href="<?= base_url('admin/login') ?>" class="font-semibold text-brand-600 hover:text-brand-700">Giriş Yap</a>
                </p>
            </div>

            <p class="text-center mt-6">
                <a href="<?= base_url() ?>" class="text-sm text-white/80 hover:text-white">
                    <i class="bi bi-arrow-left mr-1"></i>Anasayfaya dön
                </a>
            </p>
        </div>
    </div>
</body>
</html>
