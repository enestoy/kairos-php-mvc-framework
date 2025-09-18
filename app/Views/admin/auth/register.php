<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>

<div id="content" class="p-4 d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 112px); background: linear-gradient(135deg, #667eea, #764ba2);">
  <style>
 .register-card {
  background: rgba(0, 0, 0, 0.65);
  border: none;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
  max-width: 420px; /* Maksimum genişlik sınırı */
  width: 100%;
  margin: 0 auto 0 auto; /* Yatayda ortala */
  padding: 0 1.5rem; /* Yandan iç boşluk */
  box-sizing: border-box; /* Padding ve border genişlik hesabına dahil */
}



    .register-card h3 {
      margin-bottom: 1.5rem;
      font-weight: 700;
      text-align: center;
      color: #fff;
      letter-spacing: 1.5px;
    }

    .register-card label {
      color: #dcd7f7;
      font-weight: 500;
    }

    .register-card .form-control,
    .register-card .form-select {
      background-color: #3c327a;
      border: none;
      color: #eee;
      border-radius: 8px;
      transition: box-shadow 0.3s ease;
    }

    .register-card .form-control::placeholder {
      color: #bbb;
    }

    .register-card .form-control:focus,
    .register-card .form-select:focus {
      background-color: #fff;
      color: #333;
      box-shadow: 0 0 8px 2px #9f7aea;
      outline: none;
    }

    .register-card .btn-primary {
      background-color: #9f7aea;
      border: none;
      font-weight: 600;
      transition: background-color 0.3s ease;
      user-select: none;
    }

    .register-card .btn-primary:hover {
      background-color: #7c64d6;
    }

    .register-card .invalid-feedback {
      color: #f8b4b4;
    }

    .register-card a {
      color: #b8a1f7;
      text-decoration: none;
      transition: color 0.3s ease;
      user-select: none;
    }

    .register-card a:hover {
      color: #e0d9ff;
      text-decoration: underline;
    }
  </style>

  <div class="register-card card shadow-sm">
    <h3 class="mt-3">Kayıt Ol</h3>

    <?php if (!empty($errors['general'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($errors['general']) ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <div class="mb-3">
        <label for="name" class="form-label">Ad Soyad</label>
        <input
          type="text"
          id="name"
          name="name"
          class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
          value="<?= htmlspecialchars($old['name'] ?? '') ?>"
          placeholder="Adınızı Soyadınızı girin"
          required
          autocomplete="name" />
        <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Kullanıcı Adı</label>
        <input
          type="text"
          id="username"
          name="username"
          class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
          value="<?= htmlspecialchars($old['username'] ?? '') ?>"
          placeholder="Kullanıcı adınızı seçin"
          required
          autocomplete="username" />
        <div class="invalid-feedback"><?= $errors['username'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-posta</label>
        <input
          type="email"
          id="email"
          name="email"
          class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
          value="<?= htmlspecialchars($old['email'] ?? '') ?>"
          placeholder="E-posta adresinizi girin"
          required
          autocomplete="email" />
        <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Şifre</label>
        <input
          type="password"
          id="password"
          name="password"
          class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
          placeholder="Güçlü bir şifre belirleyin"
          required
          autocomplete="new-password" />
        <div class="invalid-feedback"><?= $errors['password'] ?? '' ?></div>
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select id="role" name="role" class="form-select" required>
          <option value="admin" <?= (isset($old['role']) && $old['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
          <option value="editor" <?= (isset($old['role']) && $old['role'] === 'editor') ? 'selected' : '' ?>>Editor</option>
          <option value="viewer" <?= (isset($old['role']) && $old['role'] === 'viewer') ? 'selected' : '' ?>>Viewer</option>
        </select>
      </div>

      <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>" />

      <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
    </form>

    <div class="mt-3 mb-3 text-center">
      <a href="<?= base_url('admin/login') ?>">Zaten hesabın var mı? Giriş Yap</a>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>