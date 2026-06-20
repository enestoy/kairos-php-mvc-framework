</main>

<footer class="bg-brand-900 text-slate-300">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-2">
    <span class="flex items-center gap-2 text-sm">
      <i class="bi bi-hexagon-fill text-brand-400"></i>© <?= date('Y') ?> Kairos Framework
    </span>
    <span class="text-xs text-slate-400">Tüm hakları saklıdır.</span>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= asset('assets/js/alerts.js') ?>"></script>

<script>
  // Mobil menü aç/kapa
  (function () {
    var btn = document.getElementById('nav-toggle');
    var menu = document.getElementById('nav-menu');
    if (btn && menu) btn.addEventListener('click', function () { menu.classList.toggle('hidden'); });
  })();
</script>
</body>
</html>
