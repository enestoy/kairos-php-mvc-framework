<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <title>Admin Paneli Girişi</title>
    <style>
        /* Temiz ve modern bir sans-serif font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Inter', sans-serif;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(0,0,0,0.6);
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            text-align: left;
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 8px 2px #9f7aea;
            background-color: #fff;
            color: #333;
        }

        button {
            padding: 14px;
            background: #9f7aea;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            user-select: none;
        }

        button:hover {
            background-color: #7c64d6;
        }

        .error-message {
            background-color: #f44336cc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            color: #fff;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Paneli Girişi</h1>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Kullanıcı Adı:</label>
            <input 
                type="text" 
                id="username"
                name="username" 
                value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" 
                required 
                autocomplete="username"
            >

            <label for="password">Şifre:</label>
            <input 
                type="password" 
                id="password"
                name="password" 
                required 
                autocomplete="current-password"
            >

            <input type="hidden" name="_token" value="<?= \App\Middleware\CsrfMiddleware::getToken() ?? \App\Middleware\CsrfMiddleware::generateToken() ?>">

            <button type="submit">Giriş Yap</button>
        </form>
    </div>
</body>
</html>
