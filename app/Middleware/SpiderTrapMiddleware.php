<?php

namespace App\Middleware;

use Core\Security\SpiderTrap;

class SpiderTrapMiddleware
{
    public function handle()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $referer = $_SERVER['HTTP_REFERER'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

        // Whitelist kaldırıldı, artık her IP puanı takip edilecek

        $badBots = ['curl', 'wget', 'python', 'scan', 'libwww', 'HttpClient', 'bot', 'spider', 'crawl'];

        foreach ($badBots as $bad) {
            if (stripos($userAgent, $bad) !== false) {
                SpiderTrap::logAttack("BAD_BOT: $userAgent");
                SpiderTrap::incrementScore($ip);
            }
        }

        if (empty($referer) && !str_contains($userAgent, 'Mozilla')) {
            SpiderTrap::logAttack("NO_REFERER: $userAgent");
            SpiderTrap::incrementScore($ip);
        }

        if ($this->tooFast()) {
            SpiderTrap::logAttack("TOO_FAST: $userAgent");
            SpiderTrap::incrementScore($ip);
        }

        // Burada engelleme sadece puan eşik seviyesini aşanlar için yapılacak
        if (SpiderTrap::isBlocked($ip)) {
            SpiderTrap::blockRequest("🕷️ You are temporarily banned.");
        }
    }

    protected function tooFast(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $now = time();
        $last = $_SESSION['__last_req'] ?? 0;
        $_SESSION['__last_req'] = $now;

        return ($now - $last) < 1;
    }
}
