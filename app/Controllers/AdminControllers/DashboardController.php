<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\AdminController;
use App\Models\AdminModels\UserModel;

class DashboardController extends AdminController
{
    public function index()
    {
        $userModel = new UserModel();

        $totalUsers = $userModel->countUsers();
        $activeUsers = $userModel->countByStatus(1);
        // Son 30 gün içindeki yeni kayıtlar
        $newUsers = $userModel->countNewSince(date('Y-m-d H:i:s', strtotime('-30 days')));

        $data = [
            'pageTitle'   => 'Dashboard',
            'stats'       => [
                'total'   => $totalUsers,
                'active'  => $activeUsers,
                'new'     => $newUsers,
                'uptime'  => '99.9%',
            ],
            'recentUsers' => $userModel->recentUsers(5),
        ];

        $this->render('admin/dashboard/index', $data);
    }
}
