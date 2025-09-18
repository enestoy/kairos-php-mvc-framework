<!-- APP WRAPPER -->
  <div id="app-wrapper" class="flex-grow-1 d-flex overflow-hidden">

    <!-- SABİT SIDEBAR (desktop) -->
    <nav id="sidebar"
         class="d-none d-lg-flex flex-column p-3 bg-purple"
         style="width:250px">
      <h3 class="text-center mb-4 fw-bold" style="letter-spacing:2px;">Kairos</h3>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link active text-white">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
          </a>
        </li>
         <li class="nav-item mb-2">
          <a href="<?= base_url('admin/profile?id=' . $user['id']) ?>" class="nav-link text-white">
            <i class="bi bi-person-square me-2"></i> Profilim
          </a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= base_url('admin/users') ?>" class="nav-link text-white">
            <i class="bi bi-people-fill me-2"></i> Kullanıcılar
          </a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= base_url('admin/register') ?>" class="nav-link text-white">
            <i class="bi bi-person-plus-fill me-2"></i> Kullanıcı Ekle
          </a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link text-white">
            <i class="bi bi-gear-fill me-2"></i> Ayarlar
          </a>
        </li>
      </ul>
      <div class="mt-auto">
        <a href="<?= base_url('admin/logout') ?>"
           class="nav-link exit text-white fw-bold"
           style="font-size:1.1rem; letter-spacing:.05em;">
          <i class="bi bi-box-arrow-right me-2"></i> Çıkış Yap
        </a>
      </div>
    </nav>

    <!-- OFFCANVAS SIDEBAR (mobile) -->
    <div class="offcanvas offcanvas-start bg-purple text-white d-lg-none"
         tabindex="-1"
         id="offcanvasSidebar"
         aria-labelledby="offcanvasSidebarLabel">
      <div class="offcanvas-header border-bottom border-white/25">
        <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Kairos</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body p-0">
        <ul class="nav nav-pills flex-column p-3">
          <li class="nav-item mb-2">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link active text-white">
              <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="<?= base_url('admin/profile?id=' . $user['id']) ?>" class="nav-link  text-white">
              <i class="bi bi-person-square me-2"></i> Profilim
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="<?= base_url('admin/users') ?>" class="nav-link text-white">
              <i class="bi bi-people-fill me-2"></i> Kullanıcılar
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="<?= base_url('admin/register') ?>" class="nav-link text-white">
              <i class="bi bi-person-plus-fill me-2"></i> Kullanıcı Ekle
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link text-white">
              <i class="bi bi-gear-fill me-2"></i> Ayarlar
            </a>
          </li>
          <li class="mt-auto">
            <a href="<?= base_url('admin/logout') ?>"
               class="nav-link exit text-white fw-bold">
              <i class="bi bi-box-arrow-right me-2"></i> Çıkış Yap
            </a>
          </li>
        </ul>
      </div>
    </div>
