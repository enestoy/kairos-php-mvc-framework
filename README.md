# Kairos PHP MVC Framework

Kairos is a modern and lightweight **PHP MVC framework**, focused on clean architecture, modularity, and security.
It is designed to enable rapid development, scalability for medium/large-scale applications, and easier maintainability.

> **v2.0** — Redesigned UI with **Tailwind CSS**, navy theme, a data-driven admin dashboard, and public self-registration.

---

## ✨ Features

- **MVC Architecture** (Controller, Model, View)
- **Modern UI with Tailwind CSS** — navy theme, responsive admin panel & dashboard
- **Authentication** — admin login + **public self-registration** (`/register`)
- **Middleware Support**: Authorization (Auth), CSRF protection, Logging, Rate Limiting, Cache Control, Spider Trap
- **Service Layer** (Mail Service with PHPMailer integration)
- **Routing System**: Web & API routes
- **Security Helpers**: Session management, CSRF, spider protection
- **Environment based config** (`.env` driven app & database settings)
- **Error Views** (404 & 500)
- **Unit & Integration Test Support** (PHPUnit)

---

## 📂 Project Structure

```text
kairos-mvc/
├── app/             # Application layer (Controllers, Models, Views, Middleware, Services, Routes, Helpers, Config)
├── core/            # Core framework components (App, Router, MVC base classes, Security tools)
├── public/          # Public directory (index.php, compiled assets, .htaccess)
│   └── assets/css/  # tailwind.css (compiled output)
├── resources/       # Front-end sources (resources/css/app.css — Tailwind input)
├── storage/         # Runtime storage (rate limit data)
├── tests/           # Unit and integration tests
├── logs/            # Log files
├── tailwind.config.js
├── package.json     # Tailwind build scripts
├── .env.example     # Environment template (copy to .env)
└── index.php        # Entry point
```

---

## 🛠 Requirements

- PHP >= 8.1
- Composer
- Node.js >= 18 & npm (for the Tailwind CSS build)
- MySQL (or any PDO-compatible database)

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/enestoy/kairos-php-mvc-framework.git
cd kairos-php-mvc-framework
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Build front-end assets (Tailwind CSS)

```bash
npm install
npm run build:css     # one-off build → public/assets/css/tailwind.css
# npm run watch:css   # rebuild automatically while developing
```

### 4. Environment configuration

Copy the example file and adjust it for your setup:

```bash
cp .env.example .env
```

`.env` (defaults are for MAMP — MySQL on port **8889**, user/pass `root`/`root`):

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

# Mail service
MAIL_HOST=smtp.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=tls
```

> `app/Config/app.php` and `app/Config/database.php` read these values automatically.

### 5. Database setup

- Create a database named `mvc-php` in MySQL.
- Import the provided `mvc-php.sql` into it.

### 6. Run

Using PHP's built-in server (development):

```bash
php -S localhost:8000 server-router.php
```

Or serve the project through MAMP/Apache and set `APP_URL` accordingly.

---

🔑 **Default Admin Login**

- URL: `http://localhost:8000/admin/login`
- Username: `admin`
- Password: `123456`

New users can register themselves at `http://localhost:8000/register` (assigned the `viewer` role).

> For security reasons, please change the default password after installation.

---

## 🧩 Suggestions / Improvements

- Add new middlewares (e.g., IP-based rate limiting, JSON body validator) for better flexibility & security.
- Extend the service layer to include additional mail providers (SendGrid, Mailgun, etc.).
- Integrate caching and queue systems (Redis, etc.) to improve performance.
- Add more unit and integration tests to ensure reliability.

---

## 📜 License

This project is licensed under the MIT License — feel free to fork, improve, and contribute.
