<?php

namespace App\Controllers;

class Validasi_datalaporan extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'validasi data',
            'submenu' => 'validasi data laporan',
            'content'   => 'pages/admin_panel/validasi_datalaporan_v.php'
        ];
        echo view('template/wrapper_v',$data);
    }
    
}
