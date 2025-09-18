<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>

<div id="content" class="p-4">
  <div class="container" style="max-width: 600px;">

    <h2 class="text-white mb-4">Kullanıcı Profili</h2>

    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <p class="mb-3">
          <i class="bi bi-person-circle me-2"></i>
          <strong>Ad:</strong>
          <?= htmlspecialchars($user['name']) ?>
        </p>
        <p class="mb-3">
          <i class="bi bi-envelope-fill me-2"></i>
          <strong>Email:</strong>
          <?= htmlspecialchars($user['email']) ?>
        </p>
        <p class="mb-0">
          <i class="bi bi-shield-lock-fill me-2"></i>
          <strong>Rol:</strong>
          <?= htmlspecialchars($user['role'] ?? 'Bilinmiyor') ?>
        </p>
      </div>
      <div class="card-footer bg-transparent border-0 text-end">
        <a href="<?= base_url('admin/dashboard') ?>"
           class="btn btn-sm"
           style="background-color: var(--medium-purple); color: #fff;">
          <i class="bi bi-arrow-left-circle me-1"></i> Panele Dön
        </a>
      </div>
    </div>

    <div class="text-center text-secondary" style="font-size: 0.9rem;">
      Bu bölümde kullanıcıya dair temel bilgiler gösterilmektedir. İlerleyen sürümlerde daha fazla profil detayı ve düzenleme seçenekleri eklenecektir.
    </div>

  </div>
</div>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
