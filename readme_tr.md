# Kairos PHP MVC Framework (Türkçe README)

Kairos, temiz mimari, modülerlik ve güvenlik odaklı, modern ve hafif bir **PHP MVC framework**'üdür. Hızlı geliştirme, orta ve büyük ölçekli uygulamalarda ölçeklenebilirlik ve bakımı kolaylaştıracak yapı sağlamak için tasarlandı.

---

## ✨ Özellikler

- **MVC Mimari** (Controller, Model, View)
- **Middleware desteği**: Yetkilendirme (Auth), CSRF koruması, Loglama, Rate Limiting, Cache Kontrol, Spider Trap
- **Service Layer** (PHPMailer entegrasyonlu Mail Service)
- **Routing Sistemi**: Web ve API rotaları
- **Güvenlik Yardımcıları**: Oturum yönetimi, CSRF, spider koruması
- **Kullanıma hazır yönetici paneli** (admin login + dashboard)
- **Hata Görünümleri** (404 & 500)
- **Unit & Integration Test Desteği** (PHPUnit)

---

## 📂 Proje Yapısı

```text
mvc-php/
├── app/           # Uygulama katmanı (Controllers, Models, Views, Middleware, Services, Routes, Helpers)
├── core/          # Çekirdek framework bileşenleri (App, Router, MVC base sınıfları, Güvenlik araçları)
├── public/        # Public dizini (index.php, assets, .htaccess)
├── storage/       # Cache / rate limit verileri için depolama
├── tests/         # Unit ve integration testleri
├── vendor/        # Composer bağımlılıkları
├── logs/          # Log dosyaları
├── .env           # Ortam (environment) konfigürasyonu
└── index.php      # Giriş noktası
```

---

## 🚀 Kurulum

Aşağıdaki adımlarla projeyi yerel ortamınızda çalıştırabilirsiniz.

### 1. Repoyu kopyala (clone)

```bash
git clone https://github.com/enestoy/kairos-php-mvc-framework.git
cd kairos-php-mvc-framework
```

### 2. Bağımlılıkları yükle

```bash
composer install
```

### 3. Veritabanı kurulumu

- MySQL üzerinde `mvc-php` adında bir veritabanı oluşturun.
- Sağlanan SQL dosyasını bu veritabanına import edin.

### 4. Ortam değişkenlerini yapılandırma

`.env` örneği:

```ini
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost/kairos/mvc-v1

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mvc-php
DB_USERNAME=root
DB_PASSWORD=secret

# Mail servis
MAIL_HOST=smtp.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
```

🔑 **Varsayılan Admin Girişi**

- URL: `http://localhost/kairos/mvc-v1/admin/login`
- Kullanıcı adı: `admin`
- Parola: `123456`

> Kurulum tamamlandıktan sonra hemen oturum açıp paneli keşfedebilirsiniz. Güvenlik için lütfen varsayılan şifreyi değiştirin.

---

## 🛠 Gereksinimler

- PHP >= 8.1
- Composer
- MySQL (veya PDO uyumlu başka bir veritabanı)

---

## 🧩 Nasıl Geliştirilebilir / Öneriler

- Yeni middleware'ler ekleyerek (ör. IP bazlı limit, JSON body validator) güvenliği ve esnekliği artırın.
- Service katmanını genişleterek farklı mail sağlayıcılarını (SendGrid, Mailgun) ekleyin.
- Cache ve queue mekanizmalarını (Redis vb.) entegre ederek performansı iyileştirin.
- Daha fazla birim testi ve entegrasyon testi ekleyerek güvenilirlik sağlayın.

---

## 📜 Lisans

Bu proje MIT lisanslıdır — özgürce fork atabilir, geliştirebilir ve katkıda bulunabilirsiniz.

---
