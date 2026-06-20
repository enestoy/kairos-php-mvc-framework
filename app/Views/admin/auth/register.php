<?php $pageTitle = 'Kullanıcı Ekle'; ?>
<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>
<?php $topTitle = 'Yeni Kullanıcı Ekle'; require __DIR__ . '/../layouts/partials/topnav.php'; ?>

<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
  <div class="max-w-xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold text-slate-800">Kullanıcı Ekle</h1>

    <div class="card p-6 sm:p-8">
      <?php if (!empty($errors['general'])): ?>
        <div class="mb-5 flex items-center gap-2 rounded-lg bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-700">
          <i class="bi bi-exclamation-triangle-fill"></i><span><?= htmlspecialchars($errors['general']) ?></span>
        </div>
      <?php endif; ?>

      <form method="post" action="" class="space-y-5">
        <div>
          <label for="name" class="form-label">Ad Soyad</label>
          <input type="text" id="name" name="name"
                 class="form-input <?= isset($errors['name']) ? 'form-input-error' : '' ?>"
                 value="<?= htmlspecialchars($old['name'] ?? '') ?>" placeholder="Ad Soyad" required>
          <?php if (isset($errors['name'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['name'] ?></p><?php endif; ?>
        </div>

        <div>
          <label for="username" class="form-label">Kullanıcı Adı</label>
          <input type="text" id="username" name="username"
                 class="form-input <?= isset($errors['username']) ? 'form-input-error' : '' ?>"
                 value="<?= htmlspecialchars($old['username'] ?? '') ?>" placeholder="kullanici_adi" required>
          <?php if (isset($errors['username'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['username'] ?></p><?php endif; ?>
        </div>

        <div>
          <label for="email" class="form-label">E-posta</label>
          <input type="email" id="email" name="email"
                 class="form-input <?= isset($errors['email']) ? 'form-input-error' : '' ?>"
                 value="<?= htmlspecialchars($old['email'] ?? '') ?>" placeholder="ornek@email.com" required>
          <?php if (isset($errors['email'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['email'] ?></p><?php endif; ?>
        </div>

        <div>
          <label for="password" class="form-label">Şifre</label>
          <input type="password" id="password" name="password"
                 class="form-input <?= isset($errors['password']) ? 'form-input-error' : '' ?>"
                 placeholder="En az 6 karakter" required>
          <?php if (isset($errors['password'])): ?><p class="mt-1 text-sm text-rose-600"><?= $errors['password'] ?></p><?php endif; ?>
        </div>

        <div>
          <label for="role" class="form-label">Rol</label>
          <select id="role" name="role" class="form-input" required>
            <option value="admin"  <?= (($old['role'] ?? '') === 'admin')  ? 'selected' : '' ?>>Admin</option>
            <option value="editor" <?= (($old['role'] ?? '') === 'editor') ? 'selected' : '' ?>>Editor</option>
            <option value="viewer" <?= (($old['role'] ?? 'viewer') === 'viewer') ? 'selected' : '' ?>>Viewer</option>
          </select>
        </div>

        <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>" />

        <button type="submit" class="btn-primary w-full py-3">
          <i class="bi bi-person-plus-fill"></i> Kullanıcıyı Kaydet
        </button>
      </form>
    </div>

    <p class="text-center">
      <a href="<?= base_url('admin/users') ?>" class="text-sm font-medium text-brand-600 hover:text-brand-700">
        <i class="bi bi-people mr-1"></i>Kullanıcı listesine dön
      </a>
    </p>
  </div>
</main>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
