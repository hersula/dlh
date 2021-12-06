<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Error extends BaseController
{
    public function pagenotfoud()
    {
        echo view('errors/notfound');
    }
}
