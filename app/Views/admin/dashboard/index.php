<?php require __DIR__ . '/../layouts/partials/header.php'; ?>
<?php require __DIR__ . '/../layouts/partials/navbar.php'; ?>




<!-- İçerik -->
<div id="content" class="flex-grow-1 p-4 overflow-auto">
    <nav id="topnav" aria-label="Üst navigasyon" style="display:flex; justify-content:space-between; align-items:center; background-color: var(--medium-purple); padding:0.75rem 1.5rem; border-radius:0.5rem; color: var(--white); margin-bottom:1.8rem; user-select:none;">
        <span>Hoşgeldin, <?= htmlspecialchars($user['username'] ?? 'Ziyaretçi') ?>!</span>
        <button class="sidebar-toggle d-lg-none" aria-label="Menüyü aç/kapa" aria-expanded="false" style="font-size:1.5rem; background:none; border:none; color: var(--white); cursor:pointer;">
            <i class="bi bi-list"></i>
        </button>
    </nav>

    <div class="container-fluid px-0">
        <h1 class="mb-3" style="font-weight: 700; color: var(--white);">Dashboard</h1>
        <p style="color: #cfcce0; font-style: italic; margin-bottom: 2rem;">
            Bu dashboard geliştirme aşamasındadır. Yeni özellikler ve iyileştirmeler yakında eklenecektir.
        </p>

        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="dashboard-card flex-fill" style="background-color: var(--medium-purple); border-radius: 0.75rem; padding: 1.5rem; color: var(--white); box-shadow: 0 3px 10px rgb(0 0 0 / 0.3); transition: background-color 0.3s ease; display: flex; justify-content: space-between; align-items: center; cursor: default; user-select: none; flex:1 1 auto; min-height:150px;">
                    <div>
                        <h5>Toplam Kullanıcı</h5>
                        <h2>1,245</h2>
                    </div>
                    <i class="bi bi-people-fill card-icon" style="font-size:2.8rem; opacity:0.75;"></i>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="dashboard-card flex-fill" style="background-color: var(--medium-purple); border-radius: 0.75rem; padding: 1.5rem; color: var(--white); box-shadow: 0 3px 10px rgb(0 0 0 / 0.3); transition: background-color 0.3s ease; display: flex; justify-content: space-between; align-items: center; cursor: default; user-select: none; flex:1 1 auto; min-height:150px;">
                    <div>
                        <h5>Aktif Oturumlar</h5>
                        <h2>342</h2>
                    </div>
                    <i class="bi bi-person-check card-icon" style="font-size:2.8rem; opacity:0.75;"></i>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="dashboard-card flex-fill" style="background-color: var(--medium-purple); border-radius: 0.75rem; padding: 1.5rem; color: var(--white); box-shadow: 0 3px 10px rgb(0 0 0 / 0.3); transition: background-color 0.3s ease; display: flex; justify-content: space-between; align-items: center; cursor: default; user-select: none; flex:1 1 auto; min-height:150px;">
                    <div>
                        <h5>Yeni Kayıtlar</h5>
                        <h2>58</h2>
                    </div>
                    <i class="bi bi-person-plus card-icon" style="font-size:2.8rem; opacity:0.75;"></i>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="dashboard-card flex-fill" style="background-color: var(--medium-purple); border-radius: 0.75rem; padding: 1.5rem; color: var(--white); box-shadow: 0 3px 10px rgb(0 0 0 / 0.3); transition: background-color 0.3s ease; display: flex; justify-content: space-between; align-items: center; cursor: default; user-select: none; flex:1 1 auto; min-height:150px;">
                    <div>
                        <h5>Sunucu Durumu</h5>
                        <h2>%99.9</h2>
                    </div>
                    <i class="bi bi-server card-icon" style="font-size:2.8rem; opacity:0.75;"></i>
                </div>
            </div>
        </div>
    </div>
</div>





<?php require __DIR__ . '/../layouts/partials/footer.php'; ?>
<?php require __DIR__ . '/../layouts/partials/flash.php'; ?>