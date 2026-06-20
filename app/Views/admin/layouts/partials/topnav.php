<?php
  $topTitle = $topTitle ?? ('Hoşgeldin, ' . htmlspecialchars($user['username'] ?? $user['name'] ?? 'Ziyaretçi') . '!');
?>
<header class="sticky top-0 z-20 h-16 bg-white/80 backdrop-blur border-b border-slate-200">
  <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
    <div class="flex items-center gap-3 min-w-0">
      <button id="kx-menu-btn" type="button"
              class="lg:hidden grid h-10 w-10 place-items-center rounded-lg text-slate-600 hover:bg-slate-100"
              aria-label="Menüyü aç">
        <i class="bi bi-list text-2xl"></i>
      </button>
      <h2 class="truncate text-base sm:text-lg font-semibold text-slate-800"><?= $topTitle ?></h2>
    </div>
    <div class="flex items-center gap-2">
      <a href="<?= base_url() ?>" target="_blank"
         class="hidden sm:inline-flex btn-ghost" title="Siteyi görüntüle">
        <i class="bi bi-box-arrow-up-right"></i><span class="hidden md:inline">Siteyi Gör</span>
      </a>
      <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-100 text-brand-700">
        <i class="bi bi-person-fill text-lg"></i>
      </span>
    </div>
  </div>
</header>
