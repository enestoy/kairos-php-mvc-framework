<?php $pageTitle = 'Anasayfa'; ?>
<?php include __DIR__ . '/partials/header.php'; ?>
<?php include __DIR__ . '/partials/navbar.php'; ?>

<div class="max-w-6xl mx-auto w-full px-4 sm:px-6 py-10 space-y-10">

  <!-- Hero -->
  <section class="rounded-3xl bg-gradient-to-br from-brand-600 to-brand-900 text-white text-center px-6 py-16 sm:py-20 shadow-xl">
    <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">Kairos'a Hoşgeldin</h1>
    <p class="max-w-2xl mx-auto text-base sm:text-lg text-slate-200 mb-8">
      Zamanın ruhunu yakala, teknolojiyi kendine hizmetkâr eyle. Temiz, modüler ve güvenlik odaklı hafif bir PHP MVC framework.
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-3">
      <a href="<?= base_url('register') ?>" class="btn-white px-6 py-3 text-base">
        <i class="bi bi-person-plus"></i> Hemen Kayıt Ol
      </a>
      <a href="<?= base_url('admin/login') ?>" class="btn-white-outline px-6 py-3 text-base">
        <i class="bi bi-box-arrow-in-right"></i> Panele Giriş
      </a>
    </div>
  </section>

  <!-- Özellik kartları -->
  <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="card card-hover p-6 flex flex-col text-center">
      <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-brand-100 text-brand-600 text-2xl mb-4">
        <i class="bi bi-shield-lock"></i>
      </span>
      <h3 class="text-lg font-semibold text-slate-800 mb-2">Admin Girişi</h3>
      <p class="text-sm text-slate-500 mb-6 flex-1">Yönetim paneline güvenli bir şekilde giriş yap ve sistemini yönet.</p>
      <a href="<?= base_url('admin/login') ?>" class="btn-primary w-full">
        <i class="bi bi-box-arrow-in-right"></i> Giriş Yap
      </a>
    </div>

    <div class="card card-hover p-6 flex flex-col text-center">
      <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-brand-100 text-brand-600 text-2xl mb-4">
        <i class="bi bi-chat-dots"></i>
      </span>
      <h3 class="text-lg font-semibold text-slate-800 mb-2">Bize Ulaş</h3>
      <p class="text-sm text-slate-500 mb-6 flex-1">Fikrini, önerini veya sorununu bizimle paylaşmak ister misin?</p>
      <a href="https://enestoy.com/contact" target="_blank" rel="noopener" class="btn-primary w-full">
        <i class="bi bi-envelope"></i> İletişim
      </a>
    </div>

    <div class="card card-hover p-6 flex flex-col text-center">
      <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-brand-100 text-brand-600 text-2xl mb-4">
        <i class="bi bi-speedometer2"></i>
      </span>
      <h3 class="text-lg font-semibold text-slate-800 mb-2">Panel Önizleme</h3>
      <p class="text-sm text-slate-500 mb-6 flex-1">Yetkin varsa paneli gez, kullanıcıları ve içerikleri yönet.</p>
      <a href="<?= base_url('admin/dashboard') ?>" class="btn-primary w-full">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
    </div>

  </section>

</div>
<?php include __DIR__ . '/partials/footer.php'; ?>
