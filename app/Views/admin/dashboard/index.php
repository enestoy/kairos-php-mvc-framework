<?php $pageTitle = 'Dashboard'; ?>
<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>
<?php require __DIR__ . '/../layouts/partials/topnav.php'; ?>

<?php
  $stats = $stats ?? ['total' => 0, 'active' => 0, 'new' => 0, 'uptime' => '—'];
  $recentUsers = $recentUsers ?? [];
  $cards = [
    ['label' => 'Toplam Kullanıcı', 'value' => number_format($stats['total']), 'icon' => 'bi-people-fill',   'tone' => 'from-brand-500 to-brand-700',     'sub' => 'Kayıtlı tüm hesaplar'],
    ['label' => 'Aktif Kullanıcı',  'value' => number_format($stats['active']),'icon' => 'bi-person-check-fill','tone' => 'from-emerald-500 to-emerald-700', 'sub' => 'Durumu aktif olanlar'],
    ['label' => 'Yeni Kayıt (30g)', 'value' => number_format($stats['new']),   'icon' => 'bi-person-plus-fill', 'tone' => 'from-amber-500 to-amber-600',     'sub' => 'Son 30 gün'],
    ['label' => 'Sunucu Çalışma',   'value' => $stats['uptime'],               'icon' => 'bi-hdd-network-fill', 'tone' => 'from-sky-500 to-sky-700',         'sub' => 'Uptime'],
  ];
  $roleBadge = fn ($r) => match ($r) {
    'admin'  => 'badge-blue',
    'editor' => 'badge-amber',
    default  => 'badge-slate',
  };
?>

<main class="flex-1 px-4 sm:px-6 lg:px-8 py-6 space-y-6">

  <!-- Başlık -->
  <div class="flex flex-wrap items-end justify-between gap-3">
    <div>
      <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
      <p class="text-sm text-slate-500 mt-1">Panele genel bakış ve son etkinlikler.</p>
    </div>
    <a href="<?= base_url('admin/register') ?>" class="btn-primary">
      <i class="bi bi-person-plus-fill"></i> Yeni Kullanıcı
    </a>
  </div>

  <!-- İstatistik kartları -->
  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
    <?php foreach ($cards as $c): ?>
      <div class="card card-hover p-5">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-sm font-medium text-slate-500"><?= $c['label'] ?></p>
            <p class="mt-2 text-3xl font-bold text-slate-800"><?= $c['value'] ?></p>
          </div>
          <span class="grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br <?= $c['tone'] ?> text-white text-xl shadow-md">
            <i class="bi <?= $c['icon'] ?>"></i>
          </span>
        </div>
        <p class="mt-3 text-xs text-slate-400"><i class="bi bi-graph-up-arrow mr-1"></i><?= $c['sub'] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Alt bölüm: grafik + son kayıtlar -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Haftalık etkinlik (basit CSS bar chart) -->
    <div class="card p-6 lg:col-span-2">
      <div class="flex items-center justify-between mb-6">
        <div>
          <h3 class="font-semibold text-slate-800">Haftalık Etkinlik</h3>
          <p class="text-xs text-slate-400">Örnek görselleştirme</p>
        </div>
        <span class="badge-blue"><i class="bi bi-activity"></i> Canlı</span>
      </div>
      <?php $bars = ['Pzt'=>55,'Sal'=>72,'Çar'=>40,'Per'=>85,'Cum'=>63,'Cmt'=>30,'Paz'=>48]; ?>
      <div class="flex items-end justify-between gap-3 h-48">
        <?php foreach ($bars as $day => $h): ?>
          <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full rounded-t-lg bg-gradient-to-t from-brand-600 to-brand-400 hover:from-brand-700 hover:to-brand-500 transition-all"
                 style="height: <?= $h ?>%" title="<?= $h ?>%"></div>
            <span class="text-xs text-slate-400"><?= $day ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Son kayıtlar -->
    <div class="card p-6">
      <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-slate-800">Son Kayıtlar</h3>
        <a href="<?= base_url('admin/users') ?>" class="text-sm font-medium text-brand-600 hover:text-brand-700">Tümü</a>
      </div>
      <ul class="divide-y divide-slate-100">
        <?php if (empty($recentUsers)): ?>
          <li class="py-4 text-sm text-slate-400 text-center">Henüz kayıt yok.</li>
        <?php else: foreach ($recentUsers as $ru): ?>
          <li class="py-3 flex items-center gap-3">
            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700 text-sm font-semibold">
              <?= strtoupper(mb_substr($ru['name'] ?? $ru['username'] ?? '?', 0, 1)) ?>
            </span>
            <div class="min-w-0 flex-1">
              <p class="truncate text-sm font-medium text-slate-700"><?= htmlspecialchars($ru['name'] ?? $ru['username']) ?></p>
              <p class="truncate text-xs text-slate-400"><?= htmlspecialchars($ru['email']) ?></p>
            </div>
            <span class="<?= $roleBadge($ru['role'] ?? '') ?>"><?= htmlspecialchars($ru['role'] ?? '—') ?></span>
          </li>
        <?php endforeach; endif; ?>
      </ul>
    </div>
  </div>

</main>

<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>
