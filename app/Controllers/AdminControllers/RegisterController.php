<?php
namespace App\Controllers\AdminControllers;

use App\Controllers\AdminController;
use Core\Session;
use App\Models\AdminModels\UserModel;

class RegisterController extends AdminController
{
   
    public function register()
    {
        $errors = [];
        $old = ['name'=>'', 'username'=>'', 'email'=>'', 'role'=>'viewer'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = array_merge($old, array_intersect_key($_POST, $old));

            // Validation
            if (empty($_POST['name'])) {
                $errors['name'] = 'Ad soyad gerekli.';
            }
            if (empty($_POST['username'])) {
                $errors['username'] = 'Kullanıcı adı gerekli.';
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Geçerli e-posta giriniz.';
            }
            if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
                $errors['password'] = 'Şifre en az 6 karakter olmalı.';
            }

            // Unique username/email check
            $userModel = new UserModel();
            if ($userModel->getUserByUsername($_POST['username'])) {
                $errors['username'] = 'Bu kullanıcı adı zaten alınmış.';
            }

            if (empty($errors)) {
                $success = $userModel->createUser($_POST);
                if ($success) {
                    Session::setFlash('success', 'Kullanıcı başarıyla oluşturuldu.');
                    
                   header('Location: ' . base_url('admin/dashboard'));
                    exit;
                } else {
                    $errors['general'] = 'Kayıt sırasında bir hata oluştu.';
                }
            }
        }

        $this->render('admin/auth/register', [
            'errors' => $errors,
            'old'    => $old
        ]);
    }
}