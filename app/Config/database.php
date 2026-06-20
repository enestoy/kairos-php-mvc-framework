<?php
// Veritabanı yapılandırması — değerler .env dosyasından okunur.
// (parse_env, public/index.php içinde functions.php ile zaten yüklenmiştir)
// Varsayılanlar MAMP içindir (MySQL port 8889, root/root).

$host    = parse_env('DB_HOST', '127.0.0.1');
$port    = parse_env('DB_PORT', '8889');
$dbname  = parse_env('DB_DATABASE', 'mvc-php');
$charset = 'utf8mb4';

return [
    'host'     => $host,
    'port'     => $port,
    'dbname'   => $dbname,
    'username' => parse_env('DB_USERNAME', 'root'),
    'password' => parse_env('DB_PASSWORD', 'root'),
    'charset'  => $charset,
    // DSN tek kaynaktan (yukarıdaki değişkenlerden) üretilir; tekrar/uyumsuzluk olmaz.
    'dsn'      => "mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}",
];
