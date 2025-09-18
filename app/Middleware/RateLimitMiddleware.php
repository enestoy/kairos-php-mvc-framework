<?php

namespace App\Middleware;

use Core\Security\SpiderTrap;

class RateLimitMiddleware
{
    protected string $storeDir;

    public function __construct()
    {
        $this->storeDir = BASE_PATH . '/storage/ratelimit';

        if (!is_dir($this->storeDir)) {
            mkdir($this->storeDir, 0777, true);
        }
    }

    /**
     * @param int $limitInterval Süre (saniye) - örn 60 saniye
     * @param int $maxHits Bu süre içinde izin verilen maksimum istek sayısı
     * @param string|null $currentUri Kontrol edilen URI, default null ise otomatik alır
     */
    public function handle(int $limitInterval = 60, int $maxHits = 30, ?string $currentUri = null): void
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

        // Whitelist kaldırıldı, tüm IP'ler takipte

        if ($currentUri === null) {
            $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
        }

        // Admin login sayfasını kısıtlamıyoruz (kullanıcı girişini zorlaştırmamak için)
        if ($currentUri === '/admin/login') {
            return;
        }

        // Eğer puan eşiğini aşan IP varsa engelle
        if (SpiderTrap::isBlocked($ip)) {
            SpiderTrap::blockRequest("⛔ IP limit aşımı nedeniyle geçici engellendiniz.");
        }

        $file = $this->getStorageFilePath($ip);
        $now = time();
        $data = ['hits' => 0, 'start' => $now];

        if (is_file($file)) {
            $contents = file_get_contents($file);
            if ($contents !== false) {
                $decoded = json_decode($contents, true);
                if (is_array($decoded)) {
                    $data = $decoded;
                }
            }
        }

        // Süre dolduysa sayaç sıfırlanır
        if (($now - $data['start']) >= $limitInterval) {
            $data = ['hits' => 0, 'start' => $now];
        }

        $data['hits']++;

        // İstek sayısı limiti aşarsa puan artır
        if ($data['hits'] > $maxHits) {
            SpiderTrap::logAttack("RATE_LIMIT_EXCEEDED: URI=$currentUri");
            SpiderTrap::incrementScore($ip);
        }

        file_put_contents($file, json_encode($data), LOCK_EX);
    }

    protected function sanitizeIp(string $ip): string
    {
        // : karakterini dosya ismi için _ ile değiştiriyoruz
        return preg_replace('/[^0-9a-zA-Z\._]/', '_', $ip);
    }

    protected function getStorageFilePath(string $ip): string
    {
        return $this->storeDir . DIRECTORY_SEPARATOR . $this->sanitizeIp($ip) . '.json';
    }
}
