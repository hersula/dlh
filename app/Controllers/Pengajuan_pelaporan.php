<?php

namespace App\Controllers;
use App\Models\TypeReportModel as type_report;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\SiteWwtpModel as Site;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as DetailLogger;
use App\Models\CompanyModel as Company;
use App\Models\KecamatanModel as Kecamatan;


class Pengajuan_pelaporan extends BaseController
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
            'menu' => 'pengajuan pelaporan',
            'submenu' => 'pengajuan pelaporan',
            'content'   => 'pages/pengajuan_pelaporan/pengajuan_pelaporan_v'
        ];
        echo view('template/wrapper_v',$data);
    }

    public function getDataTable(){
        $columns     = [
            'siteWWTPID ',
            'company_name',
            'name',
            'address',
            'geolocation',
        ];

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT tbl1.siteWWTPID, tbl2.company_name, tbl1.name, tbl1.address, CONCAT(tbl1.longitude_outfall, ',', tbl1.latitude_outfall) as geolocation, tbl1.status FROM site_wwtp as tbl1 INNER JOIN company as tbl2 on tbl1.companyID = tbl2.company_id WHERE tbl1.companyID = '" . user()->company_id . "'   limit $skip, $limit  ");
            $rows       = $query->getResultArray();

            foreach ($rows as $key => $value) {
                $badge  = "danger";

                if ($value['status'] != 'Open') {
                    $badge  = "success";
                }

                $data[] = [
                    'siteWWTPID'    => $value['siteWWTPID'],
                    'company_name'  => $value['company_name'],
                    'name'          => $value['name'],
                    'address'       => $value['address'],
                    'geolocation'   => $value['geolocation'],
                    'status'        => $value['status'],
                    'badge'         => $badge,
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM site_wwtp as tbl1 INNER JOIN company as tbl2 on tbl1.companyID = tbl2.company_id ");
            $count  = $query->getRowArray();

            return json_encode([
                'draw'              => $this->request->getPost('draw'),
                'recordsTotal'      => count($data),
                'recordsFiltered'   => $count['jml'],
                'data'              => $data,
            ]);
            $db->close();
        }
    }



}