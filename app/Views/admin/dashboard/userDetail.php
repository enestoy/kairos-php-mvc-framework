<?php $pageTitle = 'Kullanıcı Detayı'; ?>
<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>
<?php $topTitle = 'Kullanıcı Detayları'; require __DIR__ . '/../layouts/partials/topnav.php'; ?>

<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
  <div class="max-w-2xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold text-slate-800">Kullanıcı Detayları</h1>

    <div class="card p-6">
      <div class="flex items-center gap-4 pb-5 mb-5 border-b border-slate-100">
        <span class="grid h-16 w-16 place-items-center rounded-2xl bg-brand-100 text-brand-700 text-2xl font-bold">
          <?= strtoupper(mb_substr($user['name'] ?? '?', 0, 1)) ?>
        </span>
        <div>
          <h2 class="text-xl font-bold text-slate-800"><?= htmlspecialchars($user['name']) ?></h2>
          <span class="badge-blue"><?= htmlspecialchars($user['role'] ?? 'Bilinmiyor') ?></span>
        </div>
      </div>

      <dl class="divide-y divide-slate-100">
        <div class="py-3 flex items-center gap-3">
          <dt class="w-32 text-sm text-slate-400"><i class="bi bi-person mr-1"></i>Ad Soyad</dt>
          <dd class="font-medium text-slate-700"><?= htmlspecialchars($user['name']) ?></dd>
        </div>
        <div class="py-3 flex items-center gap-3">
          <dt class="w-32 text-sm text-slate-400"><i class="bi bi-envelope mr-1"></i>E-posta</dt>
          <dd class="font-medium text-slate-700"><?= htmlspecialchars($user['email']) ?></dd>
        </div>
        <div class="py-3 flex items-center gap-3">
          <dt class="w-32 text-sm text-slate-400"><i class="bi bi-shield-lock mr-1"></i>Rol</dt>
          <dd class="font-medium text-slate-700"><?= htmlspecialchars($user['role'] ?? 'Bilinmiyor') ?></dd>
        </div>
      </dl>

      <div class="mt-6 text-right">
        <a href="<?= base_url('admin/users') ?>" class="btn-outline">
          <i class="bi bi-arrow-left"></i> Geri Dön
        </a>
      </div>
    </div>
  </div>
</main>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
