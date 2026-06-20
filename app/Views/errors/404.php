<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sayfa Bulunamadı - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #eef1f7 0%, #dfe4f2 100%);
            color: #2d3a4b;
            min-height: 100vh;
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            text-align: center; padding: 2rem;
        }
        .code { font-size: 7rem; font-weight: 800; color: #243584; line-height: 1; margin-bottom: .5rem; }
        .icon { font-size: 3rem; color: #3346a3; margin-bottom: 1rem; }
        p { font-size: 1.25rem; color: #6b7a90; margin-bottom: 2rem; }
        .btn-kx {
            background: #243584; color: #fff; font-weight: 600;
            padding: .7rem 2rem; border-radius: .6rem; text-decoration: none;
            transition: background .2s ease;
        }
        .btn-kx:hover { background: #1d2a69; color: #fff; }
        footer { position: fixed; bottom: 14px; font-size: .85rem; color: #8896a8; }
    </style>
</head>
<body>
    <div class="icon"><i class="bi bi-compass"></i></div>
    <div class="code">404</div>
    <p>Üzgünüz, bu adrese ait bir sayfa bulunamadı.</p>
    <a href="<?= base_url('') ?>" class="btn-kx"><i class="bi bi-house-door" style="margin-right:.4rem"></i> Anasayfaya Dön</a>
    <footer>&copy; <?= date('Y') ?> Kairos — Yolunu bulamadın ama biz buradayız.</footer>
</body>
</html>
