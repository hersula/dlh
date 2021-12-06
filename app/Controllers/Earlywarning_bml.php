<?php

namespace App\Controllers;

class Earlywarning_bml extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'peringatan industri',
            'submenu' => 'bml peringatan',
            'content'   => 'pages/earlywarning/bml_peringatan_v'
        ];
        echo view('template/wrapper_v',$data);
    }
}
