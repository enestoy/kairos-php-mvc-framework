<?php
// Uygulama yapılandırması — değerler .env dosyasından okunur.
return [
    'base_url' => parse_env('APP_URL', 'http://localhost:8000'),
    'app_name' => parse_env('APP_NAME', 'Kairos'),
    'env'      => parse_env('APP_ENV', 'production'),
    // APP_DEBUG metin ("true"/"false") gelebileceği için bool'a çevriliyor.
    'debug'    => filter_var(parse_env('APP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN),
];
