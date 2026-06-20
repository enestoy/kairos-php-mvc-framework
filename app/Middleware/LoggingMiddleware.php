<?php
namespace App\Middleware;

class LoggingMiddleware
{
    /**
     * Middleware'in ana işlevi.
     * Her HTTP isteği geldiğinde tetiklenir.
     * İstek bilgilerini log dosyasına yazar.
     */
    public function handle()
    {
        // Logların saklanacağı dizin: proje kökünde /logs
        $logDir = __DIR__ . '/../../logs';

        // Eğer logs klasörü yoksa oluştur.
        // Oluşturma başarısızsa hata fırlatır.
        if (!is_dir($logDir)) {
            if (!mkdir($logDir, 0777, true) && !is_dir($logDir)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $logDir));
            }
        }

        // İstek log dosyasının tam yolu
        $logFile = $logDir . '/request.log';

        // Log mesajı hazırla:
        // [tarih] IP-adresi HTTP-metodu İstek-URI'si
        $logMessage = sprintf(
            "[%s] %s %s %s\n",
            date('Y-m-d H:i:s'),                       // Güncel tarih ve saat
            $_SERVER['REMOTE_ADDR'] ?? 'unknown',     // İsteyen IP adresi
            $_SERVER['REQUEST_METHOD'],                // GET, POST, PUT, DELETE vs.
            $_SERVER['REQUEST_URI']                     // İstenen sayfa/yol
        );

        // Log mesajını dosyaya ekle, var olan içeriğin sonuna yaz
        file_put_contents($logFile, $logMessage, FILE_APPEND);

        // Ayrıca debug amaçlı basit bir not dosyasına yazalım,
        // middleware'in çalıştığını kolayca anlayabilmek için.
        file_put_contents($logDir . '/debug_middleware.txt', "LoggingMiddleware çalıştı\n", FILE_APPEND);
    }
}
