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
            'name ',
            'tipe_pelaporan',
            'status',
            'crt_at',
        ];

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $site_id = $this->request->getPost("site_id");
            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT site_wwtp.name, tipe_pelaporan,report_hd.status,report_hd.crt_at FROM report_hd JOIN site_wwtp ON site_wwtp.siteWWTPID = report_hd.siteWWTPID WHERE report_hd.siteWWTPID = '$site_id' limit $skip, $limit  ");
            $rows       = $query->getResultArray();

            foreach ($rows as $key => $value) {
                $badge  = "danger";

                if ($value['status'] != 'Open') {
                    $badge  = "success";
                }

                $data[] = [
                    'name'              => $value['name'],
                    'tipe_pelaporan'    => $value['tipe_pelaporan'],
                    'status'              => $value['status'],
                    'crt_at'           => $value['crt_at'],
                    'badge'             => $badge,
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM report_hd WHERE  report_hd.siteWWTPID = '$site_id'");
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