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

    /**
     * Herkese açık kayıt (self-registration).
     * Yeni kullanıcılar buradan kayıt olup panele giriş yapabilir.
     * Güvenlik: rol her zaman 'viewer' olarak zorlanır.
     */
    public function register()
    {
        if (Session::isLoggedIn()) {
            header('Location: ' . base_url('admin/dashboard'));
            exit;
        }

        $errors = [];
        $old = ['name' => '', 'username' => '', 'email' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = array_merge($old, array_intersect_key($_POST, $old));

            $name     = trim($_POST['name'] ?? '');
            $username = trim($_POST['username'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm  = $_POST['password_confirm'] ?? '';

            if ($name === '') {
                $errors['name'] = 'Ad soyad gerekli.';
            }
            if ($username === '') {
                $errors['username'] = 'Kullanıcı adı gerekli.';
            } elseif (!preg_match('/^[a-zA-Z0-9_.]{3,30}$/', $username)) {
                $errors['username'] = 'Kullanıcı adı 3-30 karakter, harf/rakam/_/. olmalı.';
            }
            if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Geçerli bir e-posta giriniz.';
            }
            if (strlen($password) < 6) {
                $errors['password'] = 'Şifre en az 6 karakter olmalı.';
            }
            if ($password !== $confirm) {
                $errors['password_confirm'] = 'Şifreler eşleşmiyor.';
            }

            $userModel = new UserModel();
            if ($username !== '' && $userModel->getUserByUsername($username)) {
                $errors['username'] = 'Bu kullanıcı adı zaten alınmış.';
            }
            if ($email !== '' && $userModel->getUserByEmail($email)) {
                $errors['email'] = 'Bu e-posta zaten kayıtlı.';
            }

            if (empty($errors)) {
                $ok = $userModel->createUser([
                    'name'     => $name,
                    'username' => $username,
                    'email'    => $email,
                    'password' => $password,
                    'role'     => 'viewer', // public kayıtta rol sabit
                    'status'   => 1,
                ]);

                if ($ok) {
                    Session::setFlash('success', 'Kayıt başarılı! Artık giriş yapabilirsin.');
                    header('Location: ' . base_url('admin/login'));
                    exit;
                }
                $errors['general'] = 'Kayıt sırasında bir hata oluştu, tekrar deneyin.';
            }
        }

        $this->render('auth/register', [
            'errors' => $errors,
            'old'    => $old,
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
