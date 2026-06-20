<?php
namespace App\Controllers; // Sınıfımız 'App\Controllers' isim alanında tanımlanıyor

class BaseController
{
    /**
     * View dosyasını yükler ve isteğe bağlı olarak verileri o dosyaya aktarır.
     *
     * @param string $view Yüklenecek view dosyasının yolu (örnek: 'home/index')
     * @param array $data Görünüme gönderilecek değişkenler [opsiyonel]
     */
    protected function render($view, $data = [])
    {
        // $data dizisindeki anahtarları değişken olarak açar (örnek: ['title' => 'Merhaba'] => $title = 'Merhaba';)
        extract($data);

        // View dosyasının tam yolu hesaplanıyor:
        $viewPath = __DIR__                              // Şu anki dizin (app/Controllers)
            . DIRECTORY_SEPARATOR . '..'                 // Bir üst klasöre çık (app/)
            . DIRECTORY_SEPARATOR . 'Views'              // Views klasörüne gir (app/Views)
            . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $view) // Yol içindeki '/' karakterlerini sistemin uygun ayırıcısına çevir
            . '.php';                                    // .php uzantısını ekle

        // Eğer view dosyası bulunamazsa bir istisna fırlat
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: " . $viewPath);
        }

        // View dosyasını dahil et
        require_once $viewPath;
    }
}
