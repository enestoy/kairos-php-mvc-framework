-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Eyl 2025, 16:27:08
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mvc-php`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`) VALUES
(1, 'Teknoloji', 'teknoloji'),
(2, 'Yazılım', 'yazilim'),
(3, 'Girişimcilik', 'girisimcilik'),
(4, 'Kariyer', 'kariyer'),
(5, 'Tarih', 'tarih');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `content`, `author_id`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'PHP ile MVC Tasarım Deseni', 'php-mvc-tasarim-deseni', 'MVC mimarisi üzerine detaylı yazı...', 1, 'published', '2025-07-20 14:00:00', '2025-07-26 19:49:46', '2025-07-26 19:49:46'),
(2, 'Girişimcilikte Başarı Faktörleri', 'girisimcilikte-basari-faktorleri', 'Başarılı girişimcilerin kullandığı yöntemler...', NULL, 'published', '2025-07-15 09:30:00', '2025-07-26 19:49:46', '2025-07-26 19:49:46'),
(3, 'Laravel vs CodeIgniter Karşılaştırması', 'laravel-vs-codeigniter', 'Laravel ve CodeIgniter frameworklerinin analizi...', 1, 'draft', NULL, '2025-07-26 19:49:46', '2025-07-26 19:49:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `blog_post_id` int(11) NOT NULL,
  `blog_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog_post_categories`
--

INSERT INTO `blog_post_categories` (`blog_post_id`, `blog_category_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'Admin giriş yaptı', '192.168.1.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-07-26 19:50:40'),
(2, NULL, 'Yeni blog yazısı oluşturdu', '192.168.1.15', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)', '2025-07-26 19:50:40'),
(3, 1, 'Kurs eklendi: Matematik 101', '192.168.1.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)', '2025-07-26 19:50:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_path`, `file_type`, `uploaded_by`, `uploaded_at`) VALUES
(1, 'logo.png', '/public/assets/img/logo.png', 'image/png', 1, '2025-07-26 19:50:51'),
(2, 'banner.jpg', '/public/assets/img/banner.jpg', 'image/jpeg', 1, '2025-07-26 19:50:51'),
(3, 'blog_php.jpg', '/public/assets/img/blog_php.jpg', 'image/jpeg', NULL, '2025-07-26 19:50:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hakkimizda', 'Hakkımızda', '<p>Firmamız 2000 yılında kurulmuştur...</p>', 'Hakkımızda - Süper Web', 'Firmamız hakkında bilgi', 'firma, hakkımızda', 'published', '2025-07-26 19:51:05', '2025-07-26 19:51:05'),
(2, 'iletisim', 'İletişim', '<p>Bize ulaşmak için...</p>', 'İletişim - Süper Web', 'İletişim bilgileri', 'iletişim, adres, telefon', 'published', '2025-07-26 19:51:05', '2025-07-26 19:51:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `type` enum('text','image','boolean') DEFAULT 'text',
  `label` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `label`, `updated_at`) VALUES
(1, 'site_name', 'Süper Web Yazılım', 'text', 'Site İsmi', '2025-07-26 19:51:34'),
(2, 'site_logo', '/public/assets/img/logo.png', 'image', 'Site Logosu', '2025-07-26 19:51:34'),
(3, 'site_icon', '/public/assets/img/favicon.ico', 'image', 'Site İkonu', '2025-07-26 19:51:34'),
(4, 'show_loader', '1', 'boolean', 'Loader Gösterilsin mi?', '2025-07-26 19:51:34'),
(5, 'site_phone', '+90 000 000 00 00', 'text', 'Telefon Numarası', '2025-09-18 14:26:43'),
(6, 'site_email', 'info@supersite.com', 'text', 'E-posta Adresi', '2025-07-26 19:52:51'),
(7, 'facebook_url', 'https://facebook.com/supersite', 'text', 'Facebook Adresi', '2025-07-26 19:52:51'),
(8, 'twitter_url', 'https://twitter.com/supersite', 'text', 'Twitter Adresi', '2025-07-26 19:52:51'),
(9, 'instagram_url', 'https://instagram.com/supersite', 'text', 'Instagram Adresi', '2025-07-26 19:52:51'),
(10, 'seo_meta_title', 'Süper Web Yazılım - Ana Sayfa', 'text', 'SEO Meta Başlığı', '2025-07-26 19:52:51'),
(11, 'seo_meta_desc', 'Yazılım ve girişimcilik dünyasından en yeni gelişmeler.', 'text', 'SEO Meta Açıklaması', '2025-07-26 19:52:51'),
(12, 'seo_meta_keywords', 'php, mvc, yazılım, girişimcilik', 'text', 'SEO Anahtar Kelimeler', '2025-07-26 19:52:51'),
(13, 'footer_text', '© 2025 Süper Web Yazılım. Tüm hakları saklıdır.', 'text', 'Altbilgi Metni', '2025-07-26 19:52:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','viewer') DEFAULT 'viewer',
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Enes', 'eneskairos', 'enes@supersite.com', '$2y$12$bhPJDU5MJF8RJ/HI4f.TO.VtnFvL/Ukzh7i9F6.AQwMEWmgsGYZAa', 'admin', 1, '2025-07-26 19:41:53', '2025-07-27 13:40:14'),
(6, 'Admin', 'admin', 'admin@email.com', '$2y$12$A6Y/ZA4FaE83C8gNxhK43.K9wb87Yy.IMZpGA4JqIhIL3Lp4998sa', 'admin', 1, '2025-07-27 11:24:43', '2025-07-27 11:24:43'),
(8, 'Admin2', 'admin2', 'admin2@email.com', '$2y$12$OAf5lSVTPjA2rWaK6cCnbOamd0kNQaUQAoz4kBi0kB/0jUAAhZwBe', 'admin', 1, '2025-07-29 15:36:32', '2025-07-29 15:36:32'),
(12, 'super web', 'superweb2', 'superadmin@email.com', '$2y$10$VDLlq9WKdLVJqU3DVctcHOI9QnxXXN7xiOmv4M6Cz9P3G/9V8Zq7G', 'admin', 1, '2025-08-02 13:16:02', '2025-08-02 13:16:02'),
(13, 'Editör', 'editor', 'editor@mail.com', '$2y$10$2iE./rYMmOpTEA1gfTLMruxW6PZevoCqxSqRq4zc33a3bV.68TRZu', 'editor', 1, '2025-08-02 15:34:09', '2025-08-02 15:34:09'),
(14, 'test user', 'testuser', 'testuser@gmail.com', '$2y$10$cSeMivSOWJLCWbz.wHmalOgv38Ec4B2Y/BXZkAutEfyaIGGaUb8L6', 'admin', 1, '2025-09-18 14:20:33', '2025-09-18 14:20:33');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Tablo için indeksler `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_author` (`author_id`);

--
-- Tablo için indeksler `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD PRIMARY KEY (`blog_post_id`,`blog_category_id`),
  ADD KEY `blog_category_id` (`blog_category_id`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD CONSTRAINT `blog_post_categories_ibfk_1` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_post_categories_ibfk_2` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
