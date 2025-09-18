<?php

use App\Helpers\UrlHelper;
use App\Helpers\DebugHelper;
use App\Helpers\StringHelper;
use App\Helpers\DateHelper;

// Geçerli tarih ve saat bilgisini döner (Türkiye saatine göre)
if (!function_exists('now')) {
    function now($format = 'Y-m-d H:i:s') {
        return DateHelper::now($format);
    }
}

// Verilen tarih ile şu an arasındaki farkı insan diliyle döner (örn: "3 gün önce")
if (!function_exists('diffForHumans')) {
    function diffForHumans($date) {
        return DateHelper::diffForHumans($date);
    }
}

// Belirtilen tarihi istenilen formata çevirir (örn: "01.08.2025 22:30")
if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'd.m.Y H:i') {
        return DateHelper::format($date, $format);
    }
}

// Uygulamanın temel URL'sini verir. Opsiyonel olarak yola ek uzantı verilebilir.
if (!function_exists('base_url')) {
    function base_url($path = '') {
        return UrlHelper::baseUrl($path);
    }
}

// Belirtilen URL'ye yönlendirme yapar
if (!function_exists('redirect')) {
    function redirect($url) {
        return UrlHelper::redirect($url);
    }
}

// Veriyi yazdırıp, uygulamayı durdurur (debugging için kullanılır)
if (!function_exists('dd')) {
    function dd($data) {
        return DebugHelper::dd($data);
    }
}

// Metni URL'ye uygun bir forma (slug) dönüştürür (örn: "Merhaba Dünya" => "merhaba-dunya")
if (!function_exists('slugify')) {
    function slugify($text) {
        return StringHelper::slugify($text);
    }
}

// Public dizinindeki varlık (CSS, JS, görsel) dosyasının tam yolunu döner
function asset(string $path): string {
    $config = require BASE_PATH . '/app/Config/app.php';
    return rtrim($config['base_url'], '/') . '/public/' . ltrim($path, '/');
}

// .env dosyasından tek bir çevresel değişkeni çeker (daha hızlı ama her çağrıda dosya okur)
function parse_env(string $key, $default = null)
{
    $envPath = dirname(__DIR__) . '/.env';
    if (!file_exists($envPath)) {
        return $default;
    }

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Yorum satırlarını atla
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        // Anahtar-değer çiftini ayır ve kontrol et
        [$envKey, $envValue] = array_map('trim', explode('=', $line, 2));
        if ($envKey === $key) {
            return $envValue;
        }
    }

    return $default;
}

// .env dosyasını bir kez belleğe alarak çevresel değişkenlere hızlı erişim sağlar
function env(string $key, $default = null) {
    static $env; // İlk seferde dosyayı okuyup bellekte tutar
    if (!$env) {
        $envPath = dirname(__DIR__) . '/.env';
        if (!file_exists($envPath)) {
            return $default;
        }
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            [$k, $v] = array_map('trim', explode('=', $line, 2));
            $env[$k] = $v;
        }
    }
    return $env[$key] ?? $default;
}
