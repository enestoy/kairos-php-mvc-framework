<?php

// Core ad alanında yer alır. Böylece projedeki sınıf yapısı modülerleşir.
namespace Core;

// PDO sınıfı kullanılacağı için import edilir.
use PDO;

abstract class Model
{
    // Tüm modellerde ortak kullanılacak PDO bağlantısı statik olarak tanımlanır.
    // Böylece tek bağlantı üzerinden çoklu işlem yapılabilir, yeniden bağlantı oluşturulmaz.
    protected static $db;

    /**
     * Veritabanı bağlantısını başlatır ve döndürür.
     * Eğer bağlantı daha önce yapılmışsa, tekrar oluşturmak yerine mevcut bağlantıyı verir.
     *
     * @return PDO PDO nesnesi (hazır veritabanı bağlantısı)
     */
    public static function db(): PDO
    {
        // Eğer daha önce bağlantı oluşturulmadıysa (ilk çağrılış),
        // konfigürasyon dosyasını alır ve yeni PDO nesnesi oluşturur.
        if (!self::$db) {
            // Bağlantı ayarları, ayrı bir config dosyasından çekilir (separation of concerns)
            $config = require __DIR__ . '/../app/Config/database.php';

            // PDO nesnesi oluşturulur.
            self::$db = new PDO(
                $config['dsn'],         // Veritabanı bağlantı adresi (örnek: mysql:host=localhost;dbname=mydb)
                $config['username'],    // Veritabanı kullanıcı adı
                $config['password'],    // Veritabanı şifresi
                [
                    // Hata yönetimi: exception fırlatır, böylece hataları kontrol edebilirsin.
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    // Veritabanından dönen verilerin dizi formatında olması sağlanır.
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }

        // Mevcut (veya yeni oluşturulmuş) PDO bağlantısı döndürülür.
        return self::$db;
    }
}
