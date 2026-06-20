<?php $pageTitle = 'Kullanıcılar'; ?>
<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>
<?php $topTitle = 'Kullanıcılar'; require __DIR__ . '/../layouts/partials/topnav.php'; ?>

<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 space-y-6">

  <div class="flex flex-wrap items-center justify-between gap-3">
    <div>
      <h1 class="text-2xl font-bold text-slate-800">Kullanıcılar</h1>
      <p class="text-sm text-slate-500 mt-1"><?= count($users) ?> kayıtlı kullanıcı</p>
    </div>
    <a href="<?= base_url('admin/register') ?>" class="btn-primary">
      <i class="bi bi-person-plus-fill"></i> Yeni Kullanıcı
    </a>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
    <?php foreach ($users as $u): ?>
      <div class="card card-hover p-5 flex items-center gap-4">
        <span class="grid h-14 w-14 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 text-xl font-semibold">
          <?= strtoupper(mb_substr($u['name'] ?? '?', 0, 1)) ?>
        </span>
        <div class="min-w-0 flex-1">
          <h3 class="truncate font-semibold text-slate-800"><?= htmlspecialchars($u['name']) ?></h3>
          <p class="truncate text-sm text-slate-400 mb-2"><i class="bi bi-envelope mr-1"></i><?= htmlspecialchars($u['email']) ?></p>
          <a href="<?= base_url('admin/user?id=' . $u['id']) ?>"
             class="inline-flex items-center gap-1 text-sm font-medium text-brand-600 hover:text-brand-700">
            Detayına Git <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</main>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
