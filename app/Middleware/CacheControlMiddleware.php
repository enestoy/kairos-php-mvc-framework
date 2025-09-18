<?php
namespace App\Middleware;

class CacheControlMiddleware
{
    /**
     * Bu middleware, tarayıcı önbelleğini devre dışı bırakır.
     * Amaç: Sayfaların her seferinde taze, güncel içerikle yüklenmesini sağlamak.
     */
    public function handle()
    {
        // Tarayıcıya diyoruz ki: “Hiçbir şeyi saklama”
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

        // Eski IE sürümleri için özel önbellek talimatları
        header("Cache-Control: post-check=0, pre-check=0", false);

        // HTTP 1.0 uyumluluğu için klasik no-cache direktifi
        header("Pragma: no-cache");

        // Geçmiş bir tarih vererek, içeriği hemen geçersiz kıl
        header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
    }
}
