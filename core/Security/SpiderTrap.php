<?php
namespace Core\Security;

class SpiderTrap
{
    protected static $scoreFileDir = BASE_PATH . '/storage/ratelimit';
    protected static $scoreFile = null;
    protected static $threshold = 100;       // Bloklanma eşiği
    protected static $penalty = 25;          // Her şüpheli istek puanı
    protected static $blockDuration = 3600;  // 1 saat ban

    protected static function init()
    {
        // Klasör yoksa oluştur
        if (!is_dir(self::$scoreFileDir)) {
            mkdir(self::$scoreFileDir, 0777, true);
        }

        // Dosya yolunu hazırla
        self::$scoreFile = self::$scoreFileDir . '/spidertrap.json';

        // Dosya yoksa boş json oluştur
        if (!file_exists(self::$scoreFile)) {
            file_put_contents(self::$scoreFile, json_encode([]));
        }
    }

    public static function detect()
    {
        self::init();

        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

        if (self::isBlocked($ip)) {
            self::blockRequest("You are temporarily banned. 🕷️");
        }

        $suspiciousPatterns = [
            '/(\%27)|(\')|(\-\-)|(\%23)|(#)/i',
            '/((\%3C)|<).*script.*((\%3E)|>)/i',
            '/(select|insert|update|delete|drop|union)/i',
            '/\.\.\//',
        ];

        $data = array_merge($_GET, $_POST);
        foreach ($data as $input) {
            foreach ($suspiciousPatterns as $pattern) {
                if (preg_match($pattern, $input)) {
                    self::logAttack($input);
                    self::incrementScore($ip);
                }
            }
        }
    }

    public static function isBlocked($ip)
    {
        self::init();

        $scores = self::loadScores();
        if (!isset($scores[$ip])) return false;

        $entry = $scores[$ip];
        if ($entry['score'] < self::$threshold) return false;

        $elapsed = time() - $entry['blocked_at'];
        if ($elapsed > self::$blockDuration) {
            unset($scores[$ip]);
            self::saveScores($scores);
            return false;
        }

        return true;
    }

    public static function incrementScore($ip)
    {
        self::init();

        $scores = self::loadScores();

        if (!isset($scores[$ip])) {
            $scores[$ip] = ['score' => 0, 'blocked_at' => null];
        }

        $scores[$ip]['score'] += self::$penalty;

        if ($scores[$ip]['score'] >= self::$threshold) {
            $scores[$ip]['blocked_at'] = time();
        }

        self::saveScores($scores);
    }

    public static function loadScores()
    {
        if (!file_exists(self::$scoreFile)) return [];

        $json = file_get_contents(self::$scoreFile);
        return json_decode($json, true) ?? [];
    }

    public static function saveScores($scores)
    {
        file_put_contents(self::$scoreFile, json_encode($scores, JSON_PRETTY_PRINT));
    }

    public static function logAttack($input)
    {
        $logDir = BASE_PATH . '/app/logs';
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $logPath = $logDir . '/spidertrap.log';
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        $uri = $_SERVER['REQUEST_URI'] ?? 'unknown';
        $message = "[" . date('Y-m-d H:i:s') . "] IP: $ip - Agent: $agent - URI: $uri - Input: $input" . PHP_EOL;
        file_put_contents($logPath, $message, FILE_APPEND);
    }

    public static function blockRequest($message = null)
    {
        http_response_code(403);
        exit($message ?? 'Access Forbidden. You have been caught by the SpiderTrap 🕷️');
    }
}
