<?php

use Core\Router;
use App\Controllers\ApiControllers\UserApiController;

$router = new Router();


// Basit API endpoint - kullanıcıları jsonplaceholder’dan çeken endpoint
$router->get('/api/users', UserApiController::class, 'getUsers');

// İstersen burada başka API endpoint'leri de açabilirsin.

return $router;
