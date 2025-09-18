<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>

<div id="content" class="p-4">
  <div class="container">

    <h2 class="text-white mb-4">Kullanıcılar</h2>

    <div class="row g-4">
      <?php foreach ($users as $user): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($user['name']) ?></h5>
              <p class="card-text text-muted mb-3"><?= htmlspecialchars($user['email']) ?></p>
              <a href="<?= base_url('admin/user?id=' . $user['id']) ?>"
                 class="btn btn-sm"
                 style="background-color: var(--medium-purple); color: #fff;">
                Detayına Git
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
