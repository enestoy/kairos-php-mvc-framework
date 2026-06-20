<?php $current = $_GET['url'] ?? '/'; $isHome = ($current === '/' || $current === ''); ?>
<nav class="bg-brand-900 text-white shadow-lg">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="flex h-16 items-center justify-between">
      <!-- Marka -->
      <a href="<?= base_url() ?>" class="flex items-center gap-2 text-lg font-bold tracking-wide">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-600 text-white">
          <i class="bi bi-hexagon-fill"></i>
        </span>
        Kairos
      </a>

      <!-- Masaüstü menü -->
      <div class="hidden md:flex items-center gap-1">
        <a href="<?= base_url() ?>"
           class="px-3 py-2 rounded-lg text-sm font-medium transition-colors <?= $isHome ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' ?>">
          <i class="bi bi-house-door mr-1"></i>Anasayfa
        </a>
        <a href="<?= base_url('register') ?>" class="btn-white-outline text-sm ml-2 px-4 py-2">
          <i class="bi bi-person-plus"></i>Kayıt Ol
        </a>
        <a href="<?= base_url('admin/login') ?>" class="btn-white text-sm px-4 py-2">
          <i class="bi bi-box-arrow-in-right"></i>Giriş
        </a>
      </div>

      <!-- Mobil buton -->
      <button id="nav-toggle" type="button"
              class="md:hidden grid h-10 w-10 place-items-center rounded-lg text-white hover:bg-white/10"
              aria-label="Menü">
        <i class="bi bi-list text-2xl"></i>
      </button>
    </div>
  </div>

  <!-- Mobil menü -->
  <div id="nav-menu" class="hidden md:hidden border-t border-white/10 px-4 py-3 space-y-1">
    <a href="<?= base_url() ?>" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-200 hover:bg-white/10"><i class="bi bi-house-door mr-1"></i>Anasayfa</a>

    <div class="flex gap-2 pt-2">
      <a href="<?= base_url('register') ?>" class="btn-white-outline flex-1 text-sm"><i class="bi bi-person-plus"></i>Kayıt Ol</a>
      <a href="<?= base_url('admin/login') ?>" class="btn-white flex-1 text-sm"><i class="bi bi-box-arrow-in-right"></i>Giriş</a>
    </div>
  </div>
</nav>

<main class="flex-1">
