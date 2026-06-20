<?php
  $cur = $_GET['url'] ?? '';
  $isActive = fn (string $needle) => str_contains($cur, $needle) ? 'active' : '';
  $navItems = [
      ['url' => 'admin/dashboard', 'icon' => 'bi-speedometer2',     'label' => 'Dashboard',     'match' => 'dashboard'],
      ['url' => 'admin/profile?id=' . ($user['id'] ?? ''), 'icon' => 'bi-person-square', 'label' => 'Profilim', 'match' => 'profile'],
      ['url' => 'admin/users',     'icon' => 'bi-people-fill',      'label' => 'Kullanıcılar',  'match' => 'users'],
      ['url' => 'admin/register',  'icon' => 'bi-person-plus-fill', 'label' => 'Kullanıcı Ekle','match' => 'admin/register'],
  ];
?>
<div class="min-h-screen flex">

  <!-- Mobil arkaplan örtüsü -->
  <div id="kx-overlay" class="fixed inset-0 z-30 bg-slate-900/50 backdrop-blur-sm hidden lg:hidden"></div>

  <!-- SIDEBAR -->
  <aside id="kx-sidebar"
         class="fixed lg:sticky top-0 inset-y-0 left-0 z-40 w-64 h-screen shrink-0
                bg-brand-900 text-slate-300 flex flex-col
                -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Marka -->
    <div class="h-16 flex items-center gap-2 px-6 border-b border-white/10">
      <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-600 text-white text-lg">
        <i class="bi bi-hexagon-fill"></i>
      </span>
      <span class="text-lg font-bold tracking-wide text-white">Kairos</span>
    </div>

    <!-- Menü -->
    <nav class="flex-1 overflow-y-auto px-3 py-5 space-y-1">
      <p class="px-4 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400/70">Menü</p>
      <?php foreach ($navItems as $item): ?>
        <a href="<?= base_url($item['url']) ?>" class="side-link <?= $isActive($item['match']) ?>">
          <i class="bi <?= $item['icon'] ?> text-lg"></i>
          <span><?= $item['label'] ?></span>
        </a>
      <?php endforeach; ?>
    </nav>

    <!-- Alt: kullanıcı + çıkış -->
    <div class="border-t border-white/10 p-3">
      <div class="flex items-center gap-3 px-2 py-2 mb-1">
        <span class="grid h-9 w-9 place-items-center rounded-full bg-white/10 text-white">
          <i class="bi bi-person-fill"></i>
        </span>
        <div class="min-w-0">
          <p class="truncate text-sm font-semibold text-white"><?= htmlspecialchars($user['name'] ?? $user['username'] ?? 'Kullanıcı') ?></p>
          <p class="truncate text-xs text-slate-400"><?= htmlspecialchars($user['role'] ?? '') ?></p>
        </div>
      </div>
      <a href="<?= base_url('admin/logout') ?>"
         class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-rose-300 hover:bg-rose-500/10 hover:text-rose-200 transition-colors">
        <i class="bi bi-box-arrow-right text-lg"></i>
        <span>Çıkış Yap</span>
      </a>
    </div>
  </aside>

  <!-- İÇERİK SÜTUNU -->
  <div class="flex-1 flex flex-col min-w-0">
