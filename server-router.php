<?php
// PHP yerleşik sunucusu için router (MAMP/Apache .htaccess yerine geliştirme amaçlı).
// Docroot = proje kökü; böylece /public/assets/... yolları gerçek dosyalara çözümlenir.
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;

// Gerçek bir statik dosya isteniyorsa (css/js/görsel) onu sun
if ($path !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// Aksi halde isteği uygulamaya (public/index.php) yönlendir
$_GET['url'] = ltrim($path, '/');
require __DIR__ . '/public/index.php';
