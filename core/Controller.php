<?php
// Namespace tanımı: Bu sınıf, Core ad alanı içinde tanımlıdır.
// Böylece projenin geri kalanında diğer sınıflarla çakışma riski ortadan kalkar.
namespace Core;

class Controller
{
    /**
     * View (görünüm) dosyasını yükler ve verileri bu dosyaya aktarır.
     *
     * @param string $view Yüklenecek view dosyasının yolu (örneğin: 'home/index')
     * @param array $data Görünüme aktarılacak veriler (örneğin: ['title' => 'Ana Sayfa'])
     */
    protected function render(string $view, array $data = [])
    {
        // Verileri dizi olarak değil, doğrudan değişken olarak kullanılabilir hale getirir.
        // Örn: ['title' => 'Merhaba'] ⇒ $title = 'Merhaba';
        extract($data);

        // İlgili view dosyasını projenin /app/Views dizininden çağırır.
        // Örn: render('home/index') ⇒ ../app/Views/home/index.php
        require_once __DIR__ . '/../app/Views/' . $view . '.php';
    }

    /**
     * JSON formatında bir HTTP yanıtı döner.
     * Genellikle API istekleri için kullanılır.
     *
     * @param array $data Döndürülecek veri dizisi (örneğin: ['status' => 'success'])
     * @param int $statusCode HTTP yanıt kodu (varsayılan: 200 OK)
     */
    protected function jsonResponse(array $data, int $statusCode = 200)
    {
        // HTTP yanıt kodunu ayarlar (200, 404, 500 vs.)
        http_response_code($statusCode);

        // Yanıtın JSON formatında olduğunu ve UTF-8 karakter setiyle gönderileceğini belirtir.
        header('Content-Type: application/json; charset=utf-8');

        // Veriyi JSON formatına çevirerek yazdırır:
        // - JSON_UNESCAPED_UNICODE: Türkçe karakterler gibi Unicode karakterleri kaçırmaz.
        // - JSON_PRETTY_PRINT: JSON'u okunabilir biçimde (indent'li) döner.
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Yanıt verildikten sonra scriptin çalışmasını durdurur.
        // Böylece alt satırlarda başka bir şey çalışmaz.
        exit;
    }
}
