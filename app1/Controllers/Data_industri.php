<?php

namespace App\Controllers;

class Data_industri extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'data industri',
            'submenu' => 'data industri',
            'content'   => 'pages/admin_panel/data_industri_v'
        ];
        echo view('template/wrapper_v',$data);
    }
    
}
