<?php
namespace App\Models; // Uygulamanın Models isim alanında yer alıyor

use Core\Model as CoreModel; // Core katmanındaki Model sınıfını CoreModel takma adıyla dahil ediyoruz

class Model
{
    protected $db;

    /**
     * Constructor – Sınıf her örneklendiğinde çalışır.
     * Core katmanındaki Model sınıfından PDO nesnesini alıp `$db` özelliğine atar.
     * Böylece veritabanı işlemleri bu sınıf üzerinden yürütülür.
     */
    public function __construct()
    {
        $this->db = CoreModel::db();  // Core'daki singleton PDO bağlantısı
    }

    /**
     * Belirtilen tablodaki tüm verileri getirir.
     *
     * @param string $table Verilerin çekileceği tablo adı
     * @return array Tablodaki tüm kayıtları dizi olarak döner
     */
    public function getAll($table)
    {
        $stmt = $this->db->query("SELECT * FROM {$table}"); // SQL sorgusunu doğrudan çalıştırır
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); // Verileri ilişkisel dizi olarak döner
    }

    /**
     * Belirtilen tablodan ID'ye göre tek bir kayıt getirir.
     *
     * @param string $table Verilerin çekileceği tablo adı
     * @param int $id Aranacak kaydın ID'si
     * @return array|false Kayıt varsa ilişkisel dizi, yoksa false döner
     */
    public function getById($table, $id)
    {
        // Hazırlanmış ifade ile güvenli sorgu
        $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
