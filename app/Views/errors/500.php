<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>500 - Sunucu Hatası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            background-color: #f8f9fa;
        }
        .error-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #dc3545;
        }
        .error-code {
            font-size: 10rem;
            font-weight: 900;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .btn-home {
            font-weight: 600;
        }
        @media (max-width: 576px) {
            .error-code {
                font-size: 6rem;
            }
            .error-message {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container error-container">
        <div class="error-code">500</div>
        <div class="error-message">Üzgünüz, sunucuda bir hata oluştu.</div>
        <p class="mb-4 text-muted">
            Lütfen daha sonra tekrar deneyin veya site yöneticisi ile iletişime geçin.
        </p>
        <a href="<?= base_url() ?>" class="btn btn-danger btn-lg btn-home">
            Anasayfaya Dön
        </a>
    </div>
</body>
</html>
