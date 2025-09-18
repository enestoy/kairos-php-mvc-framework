<?php

namespace App\Controllers\AdminControllers;

use Core\Session;
use App\Models\AdminModels\UserModel;

use Core\Controller;  // Base Controller, middleware yok

class AuthController extends Controller
{
    public function login()
    {
        if (Session::isLoggedIn()) {
            header('Location: ' . base_url('admin/dashboard'));
            exit;
        }


        $username = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
                Session::set('admin_logged_in', true);
                // Kullanıcının tüm bilgilerini session'a koyuyoruz
                Session::set('user', [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ]);
                  Session::setFlash('success', 'Giriş Başarılı');
                header('Location: ' . base_url('admin/dashboard'));
                exit;
            } else {
                $error = "Kullanıcı adı veya şifre yanlış!";
            }
        }

        // View’a hem $error hem $username’i gönder
        $this->render('admin/auth/login', [
            'error'    => $error,
            'username' => $username
        ]);
    }

    public function logout()
    {
        // 1. Session verilerini temizle
        Session::destroy();

        // 2. Mevcut çerez ayarlarını al
        $params = session_get_cookie_params();

        // 3. PHPSESSID çerezini sil
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],     // doğru path
            $params['domain'],   // doğru domain
            $params['secure'],   // HTTPS flag
            $params['httponly']  // HttpOnly flag
        );

        // 4. Login sayfasına yönlendir
        header('Location: ' . base_url('admin/login'));
        exit;
    }
}
