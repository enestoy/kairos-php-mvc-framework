<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <title>Sayfa Bulunamadı - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #121212;
            color: #f8f9fa;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding: 2rem;
        }
        h1 {
            font-size: 6rem;
            font-weight: 900;
            letter-spacing: 0.2rem;
            margin-bottom: 1rem;
            color: #dc3545; /* Bootstrap'ın kırmızısı */
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        a.btn-primary {
            padding: 0.75rem 2rem;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }
        a.btn-primary:hover {
            background-color: #bd2130;
            text-decoration: none;
        }
        footer {
            position: fixed;
            bottom: 10px;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Üzgünüz, bu adreste ait bir sayfa yok.</p>
    <a href="<?= base_url('') ?>" class="btn btn-primary">Anasayfaya Dön</a>

    <footer>
        &copy; <?= date('Y') ?> Süper Web - Yolunu bulamadın ama biz buradayız.
    </footer>
</body>
</html>
