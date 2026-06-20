<?php

namespace App\Controllers;

use Core\Session;

class AdminController
{
    /**
     * View dosyasını yükler ve gerekli verileri aktarır.
     *
     * @param string $view Yüklenmek istenen view dosyasının yolu (örnek: 'admin/dashboard')
     * @param array $data View dosyasına aktarılacak veriler (anahtar => değer)
     */
    protected function render($view, $data = [])
    {
        // Kullanıcı oturum açmışsa ve $data içinde 'user' yoksa, kullanıcı bilgilerini otomatik olarak ekle
        if (Session::isLoggedIn() && !isset($data['user'])) {
            $data['user'] = Session::get('user'); // Oturumdaki kullanıcı verisini al
        }

        // Verileri değişken haline getir (örnek: $data['title'] varsa -> $title)
        extract($data);

        // View dosyasının tam sistem yolunu oluştur (örnek: app/Views/admin/dashboard.php)
        $viewPath = __DIR__                         // Şu anki dizin (app/Controllers)
            . DIRECTORY_SEPARATOR . '..'            // Bir üst dizin (app)
            . DIRECTORY_SEPARATOR . 'Views'         // Views klasörüne gir
            . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $view) // View yolunu işletim sistemine uygun hale getir
            . '.php';                               // .php uzantısını ekle

        // Eğer belirtilen view dosyası yoksa hata fırlat
        if (!file_exists($viewPath)) {
            throw new \Exception("View file not found: " . $viewPath);
        }

        // View dosyasını projeye dahil et ve çalıştır
        require_once $viewPath;
    }
}
