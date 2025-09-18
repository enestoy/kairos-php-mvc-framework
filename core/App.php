<?php

namespace Core;

class App
{
    // Router sınıfından bir örnek tutuyoruz (bağımlılık enjeksiyonu ile)
    protected Router $router;

    public function __construct(Router $router)
    {
        // Uygulama başladığında oturumu başlatıyoruz.
        Session::start(); // Eğer Session zaten çalışmıyorsa, burada başlatılıyor.

        // Router nesnesini sınıf içine alıyoruz (bu sınıfın dışarıyla olan iletişimini sağlayacak yapı)
        $this->router = $router;
    }

    public function run(string $url)
    {
        try {
            // HTTP methodunu al (GET, POST vs.)
            $httpMethod = $_SERVER['REQUEST_METHOD'];

            // URL'yi baştaki ve sondaki slash'lerden arındırıp normalize ediyoruz
            $uri = '/' . trim($url, '/');

            // Bu method ve URI'ye karşılık gelen route'u router'dan istiyoruz
            $route = $this->router->getRoute($httpMethod, $uri);

            if (!$route) {
                // Eğer eşleşen route yoksa, 404 sayfasını gösteriyoruz
                http_response_code(404);
                require BASE_PATH . '/app/Views/errors/404.php';
                exit;
            }

            // Route bulunduysa, bu route’a ait controller ve method'u çalıştır
            $this->router->dispatch($httpMethod, $uri);

        } catch (\Throwable $e) {
            // Hataları burada yakalıyoruz. Özellikle "production" ortamında kullanıcıya detay göstermemek önemli.
            http_response_code(500);
            require BASE_PATH . '/app/Views/errors/500.php'; // 500 sayfan yoksa basit bir hata mesajı da koyabilirsin
            exit;
        }
    } 
}
