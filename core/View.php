<?php

namespace Core;

class View
{
    /**
     * Belirtilen görünüm dosyasını yükler ve içine veri gönderir.
     *
     * @param string $view  Görünüm dosyasının yolu (örneğin: 'home/index')
     * @param array  $data  Görünümde kullanılacak veriler (anahtar => değer)
     */
    public static function render(string $view, array $data = [])
    {
        // Dizideki anahtarları değişkenlere dönüştürür.
        // Örneğin ['title' => 'Merhaba'] ise, $title = 'Merhaba' olur.
        extract($data);

        // Görünüm dosyasını dahil eder.
        // Böylece template dosyası içindeki PHP kodları çalışır.
        require_once __DIR__ . '/../app/Views/' . $view . '.php';
    }
}
