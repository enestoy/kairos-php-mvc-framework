<?php

use Core\Router;

use App\Middleware\{
    AuthMiddleware,
    CsrfMiddleware,
    LoggingMiddleware,
    CacheControlMiddleware,
    RateLimitMiddleware
};

use App\Controllers\AdminControllers\{
    DashboardController,
    AuthController,
    RegisterController,
    ProfileController,
    UserController
};

use App\Controllers\InterfaceControllers\HomeController;
use App\Controllers\InterfaceControllers\ContactController;

$router = new Router();

/* ---------- PUBLIC INTERFACE ---------- */

// Anasayfa (salt GET): sadece cache kontrolü
$router->get('/', HomeController::class, 'index', [
    CacheControlMiddleware::class,
]);

// İletişim formu gösterme (GET): cache
$router->get('/contact', ContactController::class, 'showForm', [
    CacheControlMiddleware::class,
]);

// Form gönderme (POST): CSRF + RateLimit
$router->post('/contact', ContactController::class, 'submit', [
    CsrfMiddleware::class,
    RateLimitMiddleware::class,
]);

/* ---------- AUTH (public) ---------- */

// Login gösterme (GET): cache + rate limit 
$router->get('/admin/login', AuthController::class, 'login', [
    CacheControlMiddleware::class,
    RateLimitMiddleware::class,
]);

// Login işlemi (POST): CSRF + RateLimit
$router->post('/admin/login', AuthController::class, 'login', [
    CsrfMiddleware::class,
    RateLimitMiddleware::class,
]);

/* ---------- LOGOUT ---------- */

// Logout (GET): yalnızca oturum kontrolü ve loglama
$router->get('/admin/logout', AuthController::class, 'logout', [
    AuthMiddleware::class,
    LoggingMiddleware::class,
]);

/* ---------- ADMIN PANEL ---------- */

// Tüm /admin/* GET’leri: Auth + Logging
// POST’lara ek olarak CSRF ve RateLimit koyacağız
$router->group([
    'prefix'     => '/admin',
    'middleware' => [
        AuthMiddleware::class,
        LoggingMiddleware::class,
    ],
], function($router) {
    // Dashboard, Profil, Kullanıcı listeleme vs.
    $router->get('/dashboard', DashboardController::class, 'index');
    $router->get('/profile',   ProfileController::class,   'show');
    $router->get('/users',     UserController::class,      'index');
    $router->get('/user',      UserController::class,      'show');

    // Kayıt formu (GET): sadece Auth+Logging
    $router->get('/register', RegisterController::class, 'register');

    // Kayıt işlemi (POST): Auth + CSRF + RateLimit + Logging
    $router->post('/register', RegisterController::class, 'register', [
        AuthMiddleware::class,
        CsrfMiddleware::class,
        RateLimitMiddleware::class,
        LoggingMiddleware::class,
    ]);
});

return $router;
