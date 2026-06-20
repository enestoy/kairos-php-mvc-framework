    <footer class="border-t border-slate-200 bg-white px-4 sm:px-6 lg:px-8 py-4 text-center text-sm text-slate-500">
      &copy; <?= date('Y') ?> Kairos Panel. Tüm hakları saklıdır.
    </footer>
  </div><!-- /içerik sütunu -->
</div><!-- /flex -->

<!-- Bildirimler -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= asset('assets/js/alerts.js') ?>"></script>

<script>
  // Mobil sidebar aç/kapa
  (function () {
    const btn = document.getElementById('kx-menu-btn');
    const sidebar = document.getElementById('kx-sidebar');
    const overlay = document.getElementById('kx-overlay');
    if (!sidebar || !overlay) return;

    const open = () => {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    };
    const close = () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    };
    btn && btn.addEventListener('click', open);
    overlay.addEventListener('click', close);
  })();
</script>
</body>
</html>
