<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\AdminController;
use Core\Session;            // ← Bunu ekle!

class DashboardController extends AdminController
{
    public function index()
    {
        // Flash mesajı eklemeden önce Session'ın başlatılmış olduğundan emin ol
        // (App::__construct içinde start() zaten çağrılıyor)


      

        $data = [
            'pageTitle' => 'Admin Dashboard',
        ];

        $this->render('admin/dashboard/index', $data);
    }
}
