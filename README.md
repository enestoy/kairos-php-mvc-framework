# Kairos PHP MVC Framework

Kairos is a modern and lightweight **PHP MVC framework**, focused on clean architecture, modularity, and security.  
It is designed to enable rapid development, scalability for medium/large-scale applications, and easier maintainability.

---

## ✨ Features

- **MVC Architecture** (Controller, Model, View)
- **Middleware Support**: Authorization (Auth), CSRF protection, Logging, Rate Limiting, Cache Control, Spider Trap
- **Service Layer** (Mail Service with PHPMailer integration)
- **Routing System**: Web & API routes
- **Security Helpers**: Session management, CSRF, spider protection
- **Ready-to-use Admin Panel** (admin login + dashboard)
- **Error Views** (404 & 500)
- **Unit & Integration Test Support** (PHPUnit)

---

## 📂 Project Structure

```text
mvc-php/
├── app/           # Application layer (Controllers, Models, Views, Middleware, Services, Routes, Helpers)
├── core/          # Core framework components (App, Router, MVC base classes, Security tools)
├── public/        # Public directory (index.php, assets, .htaccess)
├── storage/       # Storage for cache / rate limit data
├── tests/         # Unit and integration tests
├── vendor/        # Composer dependencies
├── logs/          # Log files
├── .env           # Environment configuration
└── index.php      # Entry point
```

---

## 🚀 Installation

Follow the steps below to run the project locally:

### 1. Clone the repository

```bash
git clone https://github.com/enestoy/kairos-php-mvc-framework.git
cd kairos-php-mvc-framework
```

### 2. Install dependencies

```bash
composer install
```

### 3. Database setup

- Create a database named `mvc-php` in MySQL.
- Import the provided SQL file into this database.

### 4. Configure environment variables

`.env` example:

```ini
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost/kairos/mvc-v1

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mvc-php
DB_USERNAME=root
DB_PASSWORD=secret

# Mail service
MAIL_HOST=smtp.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
```

🔑 **Default Admin Login**

- URL: `http://localhost/kairos/mvc-v1/admin/login`
- Username: `admin`
- Password: `123456`

> Once installation is complete, log in and explore the admin panel.  
> For security reasons, please change the default password immediately.

---

## 🛠 Requirements

- PHP >= 8.1
- Composer
- MySQL (or any PDO-compatible database)

---

## 🧩 Suggestions / Improvements

- Add new middlewares (e.g., IP-based rate limiting, JSON body validator) for better flexibility & security.
- Extend the service layer to include additional mail providers (SendGrid, Mailgun, etc.).
- Integrate caching and queue systems (Redis, etc.) to improve performance.
- Add more unit and integration tests to ensure reliability.

---

## 📜 License

This project is licensed under the MIT License — feel free to fork, improve, and contribute.
