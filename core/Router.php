<?php

namespace Core;

class Router
{
    // Tüm tanımlanan rotaları burada saklıyoruz
    protected array $routes = [];

    // Grup halinde tanımlanan route bilgileri (prefix, middleware gibi)
    protected array $groupStack = [];

    // GET isteği için route tanımı
    public function get(string $uri, string $controller, string $method, array $middleware = [])
    {
        $this->addRoute('GET', $uri, $controller, $method, $middleware);
    }

    // POST isteği için route tanımı
    public function post(string $uri, string $controller, string $method, array $middleware = [])
    {
        $this->addRoute('POST', $uri, $controller, $method, $middleware);
    }

    // PUT isteği için route tanımı
    public function put(string $uri, string $controller, string $method, array $middleware = [])
    {
        $this->addRoute('PUT', $uri, $controller, $method, $middleware);
    }

    // DELETE isteği için route tanımı
    public function delete(string $uri, string $controller, string $method, array $middleware = [])
    {
        $this->addRoute('DELETE', $uri, $controller, $method, $middleware);
    }

    // Route'ları iç mantıkla kaydeden özel metot
    protected function addRoute(string $httpMethod, string $uri, string $controller, string $method, array $middleware = [])
    {
        $prefix = '';
        $groupMiddleware = [];

        // Grup varsa, onun ön ekini ve middleware’lerini route’a uygula
        foreach ($this->groupStack as $group) {
            $prefix .= '/' . trim($group['prefix'], '/');
            $groupMiddleware = array_merge($groupMiddleware, $group['middleware'] ?? []);
        }

        // URI'yi düzgün biçime getir
        $uri = '/' . trim($uri, '/');
        $fullUri = rtrim($prefix . $uri, '/') ?: '/';

        // Route'un benzersiz anahtarı: Örn. "GET:/users"
        $key = $httpMethod . ':' . $fullUri;

        // Rotalar dizisine kaydediyoruz
        $this->routes[$key] = [
            'controller' => $controller,
            'method'     => $method,
            'middleware' => array_merge($groupMiddleware, $middleware)
        ];
    }

    // Route grubu tanımlama: prefix ve middleware gibi ayarları birlikte uygular
    public function group(array $options, callable $callback): void
    {
        // Stack’e grup bilgilerini ekle
        $this->groupStack[] = [
            'prefix' => $options['prefix'] ?? '',
            'middleware' => $options['middleware'] ?? [],
        ];

        // Grup içindeki route tanımlarını çalıştır
        $callback($this);

        // Grup tamamlandıktan sonra stack’ten çıkar
        array_pop($this->groupStack);
    }

    // URI ve HTTP metodu ile rotayı al
    public function getRoute(string $httpMethod, string $uri)
    {
        $key = $httpMethod . ':' . '/' . trim($uri, '/');
        return $this->routes[$key] ?? null;
    }

    // Gelen isteği karşılayan rotayı çalıştır
    public function dispatch(string $httpMethod, string $uri)
    {
        $key = $httpMethod . ':' . '/' . trim($uri, '/');

        // Eğer route tanımlı değilse, 404 fırlat
        if (!isset($this->routes[$key])) {
            http_response_code(404);
            throw new \RuntimeException("404 - Route not found: {$key}");
        }

        // İlgili route detaylarını al
        $route = $this->routes[$key];
        $controllerName = $route['controller'];
        $method = $route['method'];
        $middlewares = $route['middleware'];

        // Controller sınıfı var mı kontrol et
        if (!class_exists($controllerName)) {
            throw new \RuntimeException("Controller '{$controllerName}' not found");
        }

        // Middleware’leri sırayla çalıştır
        foreach ($middlewares as $middlewareClass) {
            if (!class_exists($middlewareClass)) {
                throw new \RuntimeException("Middleware '{$middlewareClass}' not found");
            }

            $middleware = new $middlewareClass();

            if (!method_exists($middleware, 'handle')) {
                throw new \RuntimeException("Middleware '{$middlewareClass}' must have a handle() method");
            }

            // Middleware’in handle() metodunu çalıştır
            $middleware->handle();
        }

        // Controller nesnesini oluştur
        $controller = new $controllerName();

        // Controller içinde istenen metod var mı kontrol et
        if (!method_exists($controller, $method)) {
            throw new \RuntimeException("Method '{$method}' not found in controller '{$controllerName}'");
        }

        // Metodu çalıştır
        call_user_func([$controller, $method]);
    }
}
