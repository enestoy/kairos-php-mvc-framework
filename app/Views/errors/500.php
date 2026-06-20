<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>500 - Sunucu Hatası</title>
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
        .msg { font-size: 1.35rem; margin-bottom: .5rem; }
        p { color: #6b7a90; margin-bottom: 2rem; }
        .btn-kx {
            background: #243584; color: #fff; font-weight: 600;
            padding: .7rem 2rem; border-radius: .6rem; text-decoration: none;
            transition: background .2s ease;
        }
        .btn-kx:hover { background: #1d2a69; color: #fff; }
        @media (max-width: 576px) { .code { font-size: 5rem; } }
    </style>
</head>
<body>
    <div class="icon"><i class="bi bi-exclamation-octagon"></i></div>
    <div class="code">500</div>
    <div class="msg">Üzgünüz, sunucuda bir hata oluştu.</div>
    <p>Lütfen daha sonra tekrar deneyin veya site yöneticisi ile iletişime geçin.</p>
    <a href="<?= base_url() ?>" class="btn-kx"><i class="bi bi-house-door" style="margin-right:.4rem"></i> Anasayfaya Dön</a>
</body>
</html>
