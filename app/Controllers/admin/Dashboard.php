<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => 'overview',
            'content'   => 'pages/dashboard/dashboard_v'
        ];
        echo view('template/wrapper_v',$data);
    }
}
