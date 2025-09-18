<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\AdminController;
use App\Models\AdminModels\UserModel;

class ProfileController extends AdminController
{
    protected UserModel $userModel;

    public function __construct()
    {
     
        $this->userModel = new UserModel();
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            die('Geçersiz kullanıcı ID’si.');
        }

        $user = $this->userModel->find($id);

        if (!$user) {
            die('Kullanıcı bulunamadı.');
        }

        $this->render('admin/dashboard/profile', ['user' => $user]);
    }
}
