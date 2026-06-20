<?php $pageTitle = 'Profilim'; ?>
<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>
<?php $topTitle = 'Kullanıcı Profili'; require __DIR__ . '/../layouts/partials/topnav.php'; ?>

<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
  <div class="max-w-2xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold text-slate-800">Kullanıcı Profili</h1>

    <div class="card overflow-hidden">
      <!-- Üst banner: avatar + isim lacivertin üstünde -->
      <div class="bg-gradient-to-r from-brand-600 to-brand-800 px-6 py-7">
        <div class="flex items-center gap-4">
          <span class="grid h-20 w-20 shrink-0 place-items-center rounded-2xl bg-white shadow-card text-brand-700 text-3xl font-bold ring-4 ring-white/30">
            <?= strtoupper(mb_substr($user['name'] ?? '?', 0, 1)) ?>
          </span>
          <div class="min-w-0">
            <h2 class="text-xl font-bold text-white truncate"><?= htmlspecialchars($user['name']) ?></h2>
            <span class="mt-1 inline-flex items-center gap-1 rounded-full bg-white/20 px-2.5 py-0.5 text-xs font-medium text-white">
              <i class="bi bi-shield-check"></i><?= htmlspecialchars($user['role'] ?? 'Bilinmiyor') ?>
            </span>
          </div>
        </div>
      </div>

      <div class="px-6 pb-6">
        <dl class="mt-2 divide-y divide-slate-100">
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
          <a href="<?= base_url('admin/dashboard') ?>" class="btn-outline">
            <i class="bi bi-arrow-left"></i> Panele Dön
          </a>
        </div>
      </div>
    </div>

    <p class="text-center text-sm text-slate-400">
      İlerleyen sürümlerde profil düzenleme ve daha fazla detay eklenecektir.
    </p>
  </div>
</main>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
