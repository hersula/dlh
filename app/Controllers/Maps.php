<?php

namespace App\Controllers;

class Maps extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => 'maps',
            'content'   => 'pages/dashboard/maps_v'
        ];
        echo view('template/wrapper_v',$data);
    }
}
