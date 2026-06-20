# Kairos PHP MVC Framework (Türkçe README)

Kairos, temiz mimari, modülerlik ve güvenlik odaklı, modern ve hafif bir **PHP MVC framework**'üdür. Hızlı geliştirme, orta ve büyük ölçekli uygulamalarda ölçeklenebilirlik ve bakımı kolaylaştıracak yapı sağlamak için tasarlandı.

> **v2.0** — **Tailwind CSS** ile yenilenen arayüz, lacivert tema, gerçek verili admin dashboard ve herkese açık kayıt.

---

## ✨ Özellikler

- **MVC Mimari** (Controller, Model, View)
- **Tailwind CSS ile modern arayüz** — lacivert tema, responsive yönetim paneli & dashboard
- **Kimlik doğrulama** — admin girişi + **herkese açık kayıt** (`/register`)
- **Middleware desteği**: Yetkilendirme (Auth), CSRF koruması, Loglama, Rate Limiting, Cache Kontrol, Spider Trap
- **Service Layer** (PHPMailer entegrasyonlu Mail Service)
- **Routing Sistemi**: Web ve API rotaları
- **Güvenlik Yardımcıları**: Oturum yönetimi, CSRF, spider koruması
- **Ortam tabanlı yapılandırma** (`.env` ile app & veritabanı ayarları)
- **Hata Görünümleri** (404 & 500)
- **Unit & Integration Test Desteği** (PHPUnit)

---

## 📂 Proje Yapısı

```text
kairos-mvc/
├── app/             # Uygulama katmanı (Controllers, Models, Views, Middleware, Services, Routes, Helpers, Config)
├── core/            # Çekirdek framework bileşenleri (App, Router, MVC base sınıfları, Güvenlik araçları)
├── public/          # Public dizini (index.php, derlenmiş assets, .htaccess)
│   └── assets/css/  # tailwind.css (derlenmiş çıktı)
├── resources/       # Ön yüz kaynakları (resources/css/app.css — Tailwind girdisi)
├── storage/         # Çalışma anı depolama (rate limit verileri)
├── tests/           # Unit ve integration testleri
├── logs/            # Log dosyaları
├── tailwind.config.js
├── package.json     # Tailwind derleme komutları
├── .env.example     # Ortam şablonu (.env olarak kopyala)
└── index.php        # Giriş noktası
```

---

## 🛠 Gereksinimler

- PHP >= 8.1
- Composer
- Node.js >= 18 & npm (Tailwind CSS derlemesi için)
- MySQL (veya PDO uyumlu başka bir veritabanı)

---

## 🚀 Kurulum

### 1. Repoyu kopyala (clone)

```bash
git clone https://github.com/enestoy/kairos-php-mvc-framework.git
cd kairos-php-mvc-framework
```

### 2. PHP bağımlılıklarını yükle

```bash
composer install
```

### 3. Ön yüz varlıklarını derle (Tailwind CSS)

```bash
npm install
npm run build:css     # tek seferlik derleme → public/assets/css/tailwind.css
# npm run watch:css   # geliştirirken otomatik yeniden derleme
```

### 4. Ortam değişkenlerini yapılandırma

Örnek dosyayı kopyalayıp kendine göre düzenle:

```bash
cp .env.example .env
```

`.env` (varsayılanlar MAMP içindir — MySQL port **8889**, kullanıcı/şifre `root`/`root`):

```ini
APP_NAME=Kairos
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=mvc-php
DB_USERNAME=root
DB_PASSWORD=root

# Mail servis
MAIL_HOST=smtp.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
```

> `app/Config/app.php` ve `app/Config/database.php` bu değerleri otomatik okur.

### 5. Veritabanı kurulumu

- MySQL üzerinde `mvc-php` adında bir veritabanı oluşturun.
- Sağlanan `mvc-php.sql` dosyasını bu veritabanına import edin.

### 6. Çalıştırma

PHP yerleşik sunucusu (geliştirme):

```bash
php -S localhost:8000 server-router.php
```

Ya da projeyi MAMP/Apache üzerinden sunup `APP_URL`'i ona göre ayarlayın.

---

🔑 **Varsayılan Admin Girişi**

- URL: `http://localhost:8000/admin/login`
- Kullanıcı adı: `admin`
- Parola: `123456`

Yeni kullanıcılar `http://localhost:8000/register` adresinden kendileri kayıt olabilir (`viewer` rolü atanır).

> Güvenlik için kurulumdan sonra varsayılan şifreyi değiştirin.

---

## 🧩 Nasıl Geliştirilebilir / Öneriler

- Yeni middleware'ler ekleyerek (ör. IP bazlı limit, JSON body validator) güvenliği ve esnekliği artırın.
- Service katmanını genişleterek farklı mail sağlayıcılarını (SendGrid, Mailgun) ekleyin.
- Cache ve queue mekanizmalarını (Redis vb.) entegre ederek performansı iyileştirin.
- Daha fazla birim testi ve entegrasyon testi ekleyerek güvenilirlik sağlayın.

---

## 📜 Lisans

Bu proje MIT lisanslıdır — özgürce fork atabilir, geliştirebilir ve katkıda bulunabilirsiniz.
