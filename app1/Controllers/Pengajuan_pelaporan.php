<?php

namespace App\Controllers;

class Pengajuan_pelaporan extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'pengajuan pelaporan',
            'submenu' => 'pengajuan pelaporan',
            'content'   => 'pages/pengajuan_pelaporan/pengajuan_pelaporan_v'
        ];
        echo view('template/wrapper_v',$data);
    }

}