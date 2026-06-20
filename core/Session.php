<?php 
namespace Core;

class Session
{
    /**
     * Oturum (session) başlatır.
     * Eğer zaten başlamadıysa, PHP oturumunu açar.
     * Böylece $_SESSION dizisi kullanılabilir hale gelir.
     */
    public static function start()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Oturum içine veri yazar.
     * @param string $key  Anahtar (örneğin 'user_id')
     * @param mixed $value Anahtara atanacak değer (örneğin 5)
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Oturumdan veri okur.
     * @param string $key Anahtar
     * @return mixed|null Eğer veri yoksa null döner.
     */
    public static function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Oturumdan belirli bir veriyi siler.
     * @param string $key Silinecek anahtar
     */
    public static function remove(string $key)
    {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Oturumu tamamen sonlandırır.
     * Bütün $_SESSION verisi silinir.
     */
    public static function destroy()
    {
        session_destroy();
    }

    /**
     * Kullanıcının giriş yapıp yapmadığını kontrol eder.
     * Bu örnekte 'admin_logged_in' ve 'user' bilgileri kontrol ediliyor.
     * Giriş yapılmışsa true, değilse false döner.
     */
    public static function isLoggedIn(): bool
    {
        return !empty($_SESSION['admin_logged_in']) 
            && isset($_SESSION['user']) 
            && is_array($_SESSION['user']);
    }

    /**
     * Tek seferlik (flash) mesaj atar.
     * Örneğin: Hata mesajı veya başarı bildirimi.
     * @param string $key Mesaj anahtarı (örn. 'error', 'success')
     * @param mixed $message Mesaj içeriği
     */
    public static function setFlash(string $key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    /**
     * Tek seferlik flash mesajını getirir ve siler.
     * Böylece mesaj sadece bir kere gösterilir.
     * @param string $key Mesaj anahtarı
     * @return mixed|null Mesaj varsa döner, yoksa null
     */
    public static function getFlash(string $key)
    {
        if (isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]); // Mesajı tek kullanımlık yapıyoruz
            return $msg;
        }
        return null;
    }

    /**
     * Tüm flash mesajları getirir ve temizler.
     * Birden fazla flash mesaj varsa hepsi birden alınabilir.
     * @return array Flash mesajlar dizisi, yoksa boş dizi
     */
    public static function getFlashes(): array
    {
        if (empty($_SESSION['flash'])) {
            return [];
        }
        $flashes = $_SESSION['flash'];
        unset($_SESSION['flash']); // Flash mesajları sıfırla
        return $flashes;
    }
}
