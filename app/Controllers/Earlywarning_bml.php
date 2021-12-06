<?php

namespace App\Controllers;
use App\Models\TypeReportModel as type_report;
use App\Models\SiteWwtpModel as Site;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as DetailLogger;
use App\Models\CompanyModel as Company;
use App\Models\KecamatanModel as Kecamatan;

class Earlywarning_bml extends BaseController
{

    public function __construct()
    {
        $this->siteDB = new Site;
        $this->type_report = new type_report;
        $this->Logger = new Logger;
        $this->DetailLogger = new DetailLogger;
        $this->companyDB = new Company;
        $this->kecamatanDB = new Kecamatan;
    }

    public function index()
    {

        $data = [
            'site'          => $this->siteDB->_find_all_site(),
            'type_report'   => $this->type_report->findAll(),
            'kecamatan'     => $this->kecamatanDB->_get_kecamatan(),
            'company'       => $this->companyDB->_get_company(),
            'menu' => 'peringatan industri',
            'submenu' => 'bml peringatan',
            'content'   => 'pages/earlywarning/bml_peringatan_v'
        ];
        echo view('template/wrapper_v',$data);
    }
}
