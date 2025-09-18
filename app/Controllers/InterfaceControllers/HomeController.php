<?php
namespace App\Controllers\InterfaceControllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Ana Sayfa',
            'welcomeMessage' => 'Hoş geldin!'
        ];
        $this->render('interface/layouts/home', $data);
    }
}
