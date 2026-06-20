<?php
namespace App\Middleware;

use Core\Session;

class CsrfMiddleware
{
    /**
     * Gelen isteği kontrol eden ana fonksiyon.
     * 
     * Sadece veri değiştiren isteklerde (POST, PUT, DELETE)
     * token doğrulaması yapar, yoksa hemen durdurur.
     */
    public function handle()
    {
        // İstek metodunu alıyoruz (POST, GET, vb.)
        $method = $_SERVER['REQUEST_METHOD'];

        // Sadece kritik işlemlerde koruma uygula
        if (in_array($method, ['POST', 'PUT', 'DELETE'])) {
            // Formdan gelen token (genellikle gizli input _token)
            $token = $_POST['_token'] ?? '';

            // Oturumda saklanan token (daha önce oluşturulmuş)
            $sessionToken = Session::get('_csrf_token');

            // Token yoksa ya da eşleşmiyorsa, saldırı var demektir
            if (!$token || $token !== $sessionToken) {
                // 403 Forbidden kodu ile erişimi engelle
                http_response_code(403);
                echo 'CSRF token doğrulaması başarısız.';
                exit; // Burada yolun sonu, güvenlik ihlali
            }
        }
    }

    /**
     * Yeni, güçlü ve rastgele CSRF token oluşturur.
     * Bu token, form içinde gizli input olarak gönderilir.
     * 
     * @return string Oluşturulan token
     */
    public static function generateToken()
    {
        // 32 byte’lık rastgele veri, hex string'e çevriliyor (64 karakter)
        $token = bin2hex(random_bytes(32));

        // Token'ı session'a kaydet (sonraki doğrulamalar için)
        Session::set('_csrf_token', $token);

        // Token'ı geri döndür (formlarda kullanılır)
        return $token;
    }

    /**
     * Session'daki CSRF token'ı getirir.
     * 
     * @return string|null Token varsa döner, yoksa null
     */
    public static function getToken()
    {
        return Session::get('_csrf_token');
    }
}
