<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>

<div id="content" class="p-4">
  <div class="container" style="max-width: 600px;">

    <h2 class="text-white mb-3">Kullanıcı Detayları</h2>

    <div class="card shadow-sm">
      <div class="card-body">
        <p><strong>Ad:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Rol:</strong> <?= htmlspecialchars($user['role'] ?? 'Bilinmiyor') ?></p>
      </div>
      <div class="card-footer bg-transparent border-0 text-end">
        <a href="<?= base_url('admin/users') ?>"
           class="btn btn-sm"
           style="background-color: var(--medium-purple); color: #fff;">
          <i class="bi bi-arrow-left-circle me-1"></i> Geri Dön
        </a>
      </div>
    </div>

  </div>
</div>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
