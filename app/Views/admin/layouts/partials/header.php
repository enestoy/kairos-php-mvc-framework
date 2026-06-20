<!DOCTYPE html>
<html lang="tr" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | Kairos Panel' : 'Kairos Panel' ?></title>

    <!-- Bootstrap Icons (yalnızca ikon fontu) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Kairos Tailwind çıktısı -->
    <link href="<?= asset('assets/css/tailwind.css') ?>" rel="stylesheet" />
</head>

<body class="h-full bg-slate-100 text-slate-700">
