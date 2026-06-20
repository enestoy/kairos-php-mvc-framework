<?php
namespace App\Middleware;

use Core\Session; // Oturum işlemlerini yöneten kendi Session sınıfın

class AuthMiddleware
{
    /**
     * Bu middleware, kullanıcının oturum açıp açmadığını kontrol eder.
     * Eğer kullanıcı giriş yapmamışsa, admin giriş sayfasına yönlendirilir.
     */
    public function handle()
    {
        // Şu anki URL'yi al, yalnızca yol kısmını çeker (sorgu parametreleri hariç)
        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Eğer kullanıcı zaten /admin/login sayfasındaysa tekrar oraya yönlendirme
        // Yoksa sonsuz döngüye gireriz (kendi kendini yönlendiren sistem gibi...)
        if ($currentUri === '/admin/login') {
            return; // middleware burada durur, yoluna devam et
        }

        // Eğer kullanıcı giriş yapmamışsa, login sayfasına yönlendir
        if (!Session::isLoggedIn()) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }

        // Giriş yapmışsa hiçbir şey yapmaz, kontrol altındaki route’a erişimine izin verir
    }
}
