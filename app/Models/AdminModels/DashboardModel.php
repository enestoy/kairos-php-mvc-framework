<?php
namespace App\Models\AdminModels;

use App\Models\Model;

class DashboardModel extends Model
{
    protected $table = 'settings';

    public function getAllSettings()
    {
        return $this->getAll($this->table);
    }
}

