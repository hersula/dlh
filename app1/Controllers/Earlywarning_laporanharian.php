<?php

namespace App\Controllers;

class Earlywarning_laporanharian extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'peringatan industri',
            'submenu' => 'pelaporan peringatan',
            'content'   => 'pages/earlywarning/pelaporan_peringatan_v'
        ];
        echo view('template/wrapper_v',$data);
    }
}
