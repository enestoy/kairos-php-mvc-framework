<?php

// app/Helpers/UrlHelper.php
namespace App\Helpers;

class UrlHelper
{
    // Statik değişken: Base URL değeri sadece bir kez okunup, hafızada saklanacak
    protected static $base;

    /**
     * baseUrl metodu, uygulamanın temel URL'sini alır ve
     * isteğe bağlı olarak verilen path'i bu temel URL'ye ekler.
     *
     * @param string $path  URL'nin sonuna eklenecek yol (örn: 'login', 'user/profile')
     * @return string       Tam URL döner
     */
    public static function baseUrl($path = '')
    {
        // Eğer base URL daha önce ayarlanmamışsa, config dosyasından oku
        if (!self::$base) {
            // app.php konfig dosyasını dahil et
            $config = require __DIR__ . '/../Config/app.php';
            // base_url'yi al, sağdan ve soldan slash'leri temizle, ve değişkene ata
            self::$base = rtrim($config['base_url'], '/');
        }

        // Base URL ile verilen path'i birleştir, gereksiz slash'leri temizle
        return self::$base . '/' . ltrim($path, '/');
    }

    /**
     * redirect metodu, verilen URL'ye yönlendirme yapar.
     *
     * @param string $url  Yönlendirilmek istenen yol (path)
     */
    public static function redirect($url)
    {
        // HTTP header ile yönlendirmeyi yap, tam URL'yi oluşturmak için baseUrl'yi kullan
        header('Location: ' . self::baseUrl($url));
        // Yönlendirme sonrası işlemi durdur, sonrasını çalıştırma
        exit;
    }
}
