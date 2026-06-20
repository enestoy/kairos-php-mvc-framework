<?php

// Hataların görünür olmasını sağlıyoruz, geliştirme aşamasında olmazsa olmaz.
// Böylece ufak hatalar bile gözümüzden kaçmaz, tam gaz debug yaparız.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// BASE_PATH projenin ana klasörünü temsil ediyor. Mesela D:\xampp\htdocs\mvc-php
// Her yerde kullanabilmek için sabit (constant) olarak tanımlıyoruz.
define('BASE_PATH', dirname(__DIR__));

// SpiderTrap sınıfını dahil ediyoruz. Bu kritik güvenlik duvarın gibi.
// Gelen her isteği süzüyor, şüpheli hareket varsa engelliyor.
use Core\Security\SpiderTrap;
require_once BASE_PATH . '/core/Security/SpiderTrap.php';
SpiderTrap::detect(); // Hemen tetikle, şüpheli IP veya saldırgan varsa kapıyı kapatır

// Composer autoload dosyasını dahil ediyoruz.
// Böylece vendor klasöründeki paketleri otomatik kullanabiliriz.
require_once __DIR__ . '/../vendor/autoload.php';

// Yardımcı fonksiyonlarımızı dahil ediyoruz, örneğin url(), debug() gibi.
require_once __DIR__ . '/../app/Helpers/functions.php';

// .env dosyasını yükleyip ortam değişkenlerini alıyoruz.
// Böylece gizli anahtarlar, db bilgileri dışarıda kalır, kodumuz temiz olur.
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Oturum (session) başlatıyoruz, bu çok önemli!
// Çünkü kullanıcı bilgisi, login durumu, flash mesajlar hep session’da tutuluyor.
session_start();  // <=== BURASI ÇOK KRİTİK!

// Core\App sınıfını kullanıyoruz, bu uygulamanın beyni gibi.
// Gelen URL’yi al, route’ları yükle, çalıştır.
use Core\App;

// URL parametresini alıyoruz, yoksa ana sayfa ('/') kabul ediyoruz.
$url = $_GET['url'] ?? '/';

// Eğer URL "api/" ile başlıyorsa API rotalarını yüklüyoruz,
// değilse web sayfası rotalarını yüklüyoruz.
// Bu ayrım, API ve web katmanlarını ayrı tutmak için.
if (str_starts_with($url, 'api/')) {
    $router = require BASE_PATH . '/app/Routes/api.php';
} else {
    $router = require BASE_PATH . '/app/Routes/web.php';
}

// App nesnesini oluşturuyoruz, router’ı içine veriyoruz.
$app = new \Core\App($router);

// Uygulamayı çalıştırıyoruz, URL’yi veriyoruz.
// Burada istek karşılanır, controller’a yönlendirilir.
$app->run($url);
