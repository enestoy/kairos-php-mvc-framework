</div>

        <footer class="py-2 text-center bg-purple">
            &copy; <?= date('Y') ?> Kairos Panel. Tüm hakları saklıdır.
        </footer>
    </div>

    <!-- Bootstrap 5 JS ve bağımlılıkları -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar toggle mobil için
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.querySelector('.sidebar-toggle');

        toggleBtn.addEventListener('click', () => {
            const expanded = toggleBtn.getAttribute('aria-expanded') === 'true';
            toggleBtn.setAttribute('aria-expanded', !expanded);
            sidebar.classList.toggle('d-none');
        });
    </script>
</body>
</html>
