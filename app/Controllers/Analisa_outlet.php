<?php

namespace App\Controllers;

use App\Models\SiteWwtpModel as Site;
use App\Models\TypeReportModel as type_report;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as DetailLogger;
use App\Models\CompanyModel as Company;
use App\Models\KecamatanModel as Kecamatan;

class Analisa_outlet extends BaseController
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
            'menu'          => 'data analisa',
            'submenu'       => 'data outlet',
            'content'       => 'pages/analisa/analisa-outlet_v'
        ];

        echo view('template/wrapper_v', $data);
    }

    public function get_datatable_data_outlet()
    {
        $siteWWTPID = $this->request->getPost('site');
        $logger     = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 0);

        $columns     = [
            'tipe_pelaporan',
            'tgl_pelaporan',
            'tgl_start_sampling',
            'tgl_end_sampling',
            'nama_industri',
            'nama_wwtp',
        ];

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT outlet_hd.*, type_report.name as tipe_pelaporan, company.company_name as nama_industri,site_wwtp.name as nama_wwtp 
                            FROM outlet_hd JOIN site_wwtp 
                            ON site_wwtp.siteWWTPID = outlet_hd.siteWWTPID 
                            JOIN company ON company.company_id = site_wwtp.companyID  
                            JOIN type_report ON type_report.typeReportID = outlet_hd.tipe_pelaporan 
                            WHERE outlet_hd.siteWWTPID = '$siteWWTPID' 
                            limit $skip, $limit");
            $rows       = $query->getResultArray();

            $i = 0;
            foreach ($rows as $key => $value) {
                $data[$i] = [
                    'outlet_id'               => $value['outlet_id'],
                    'site_name'              => $value['nama_wwtp'],
                    'tgl_pelaporan'          => $value['tgl_pelaporan'],
                    'tipe_pelaporan'         => $value['tipe_pelaporan'],
                    'nama_lab'               => $value['nama_laboratorium'],
                    'nomor_akreditasi_lab'   => $value['nomor_akreditasi_lab'],
                    'nomor_sampling'         => $value['nomor_sampling'],
                    'jenis_sampling'         => $value['jenis_sampling'],
                    'tgl_start_sampling'     => $value['tgl_start_sampling'],
                    'tgl_end_sampling'       => $value['tgl_end_sampling'],
                    'tgl_pengambilan'        => $value['tgl_pengambilan'],
                    'tgl_diterima'           => $value['tgl_diterima'],
                    'titik_kordinat'         => $value['titik_kordinat'],
                    'nama_industri'          => $value['nama_industri'],
                    'nama_wwtp'              => $value['nama_wwtp'],
                ];

                foreach ($detailLogger as $row) {
                    $data[$i][$row['parameter']] = $this->get_detail($value['outlet_id'], $row['parameter']);
                }

                $i++;
            }

            $query  = $db->query("SELECT count(*) as jml FROM outlet_hd");
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

    public function get_detail($outlet_id, $parameter)
    {
        $val = 0;

        $db = \Config\Database::connect();

        $query = $db->query("select nilai from outlet_dt where outlet_id = '$outlet_id' and parameter = '$parameter'");
        $row   = $query->getRowArray();
        $val   = $row["nilai"];

        return $val;
    }

    public function export_data_outlet()
    {
        $db = \Config\Database::connect();

        $siteWWTPID = $this->request->uri->getSegment(2);
        $logger     = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 0);
        
        $data       = array();
        $query      = $db->query("SELECT t1.*, t2.company_name FROM site_wwtp as t1 inner join company as t2 on t1.companyID = t2.company_id where t1.siteWWTPID = '$siteWWTPID'");
        $site       = $query->getRowArray();

        $spreadsheet   = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan Outlet '.$site['name'].' '.Date("M Y");
        $sheet->setCellValue('B1', 'Nama Titik Penaatan');
        $sheet->setCellValue('C1', ': '.$site['name']);
        $sheet->setCellValue('B2', "Tanggal Pelaporan");
        $sheet->setCellValue('C2', ': '.Date("M Y"));
        $sheet->setCellValue('B3', 'Alamat');
        $sheet->setCellValue('C3', ': '.$site['address']);
        $sheet->setCellValue('B4', 'Nama Perusahaan');
        $sheet->setCellValue('C4', ': '.$site['company_name']);
        $sheet->setCellValue('B5', 'ID');
        $sheet->setCellValue('C5', ': '.$site['siteWWTPID']);

        $i = 13; $col = 8;
        $temp = range('A', 'Z');

        $sheet->setCellValue('A' . $col, "No");
        $sheet->setCellValue('B' . $col, "Nama Industri");
        $sheet->setCellValue('C' . $col, "Nama Titik Penaatan");
        $sheet->setCellValue('D' . $col, "Tipe Pelaporan");
        $sheet->setCellValue('E' . $col, "Tanggal Pelaporan");
        $sheet->setCellValue('F' . $col, "Nama Laboratorium");
        $sheet->setCellValue('G' . $col, "Nomor Akreditasi Lab");
        $sheet->setCellValue('H' . $col, "Nomor Sampling");
        $sheet->setCellValue('I' . $col, "Jenis Sampling");
        $sheet->setCellValue('J' . $col, "Tanggal Sampling");
        $sheet->setCellValue('K' . $col, "Tanggal Pengambilan");
        $sheet->setCellValue('L' . $col, "Tanggal Diterima");
        $sheet->setCellValue('M' . $col, "Titik Koridinat");

        foreach ($detailLogger as $row) {
            $sheet->setCellValue($temp[$i].$col, $row["parameter"]);
            $i++;
        }

        $data       = array();
        $query      = $db->query("SELECT outlet_id, type_report.name as tipe_pelaporan,outlet_hd.tgl_pelaporan,outlet_hd.tgl_start_sampling,
                        outlet_hd.tgl_end_sampling, company.company_name as nama_industri,site_wwtp.name as nama_wwtp,outlet_hd.nama_laboratorium,
                        outlet_hd.nomor_akreditasi_lab,outlet_hd.nomor_sampling,outlet_hd.jenis_sampling,outlet_hd.tgl_pengambilan,
                        outlet_hd.tgl_diterima,outlet_hd.titik_kordinat 
                        FROM outlet_hd 
                        JOIN site_wwtp 
                        ON site_wwtp.siteWWTPID = outlet_hd.siteWWTPID 
                        JOIN company 
                        ON company.company_id = site_wwtp.companyID  
                        JOIN type_report 
                        ON type_report.typeReportID = outlet_hd.tipe_pelaporan 
                        WHERE outlet_hd.siteWWTPID = '$siteWWTPID' ");

        $data       = $query->getResultArray();
        
        $i = 0;
        $no = 1;
        $col++;
        foreach ($data as $row) {
            $sheet->setCellValue($temp[$i] . $col, $no);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['nama_industri']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['nama_wwtp']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['tipe_pelaporan']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['tgl_pelaporan']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['tgl_start_sampling'] . '/' . $row['tgl_end_sampling']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['nama_laboratorium']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['nomor_akreditasi_lab']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['nomor_sampling']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['jenis_sampling']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['tgl_pengambilan']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['tgl_diterima']);
            $i++;
            $sheet->setCellValue($temp[$i] . $col, $row['titik_kordinat']);
            $i++;

            foreach ($detailLogger as $det) {
                $sheet->setCellValue($temp[$i].$col, $this->get_detail($row['outlet_id'], $det['parameter']));
                $i++;
            }

            $i = 0;
            $no++;
            $col++;
        }

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');
        die;
    }

    public function get_columns()
    {
        $siteWWTPID   = $this->request->getPost('siteWWTPID');
        $logger       = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 0);
        $columns      = array();

        foreach ($detailLogger as $row) {
            $columns[]    = $row['parameter'];
        }

        echo json_encode($columns);
    }

    function get_parameter_outlet()
    {
        $siteWWTPID = $this->request->getPost('siteWWTPID');

        $loggerID = $this->Logger->where('siteWWTPID', $siteWWTPID)->findColumn('loggerID');
        $detailLogger = $this->DetailLogger->_get_parameter($loggerID, 'BMAL', 0);

        echo json_encode($detailLogger);
    }

    public function insert_outlet()
    {
        $result           = array();
        $result['status'] = 'danger';
        $result['reason'] = "Data Tidak Boleh Kosong!";

        $siteWWTPID  = $this->request->getPost('site');
        $outlet_id   = generateHash();
        $header = [
            'outlet_id'             => $outlet_id,
            'siteWWTPID'            => $siteWWTPID,
            'tgl_pelaporan'         => convertDateSQL(),
            'tipe_pelaporan'        => $this->request->getPost('type_report'),
            'nama_laboratorium'     => $this->request->getPost('nama_lab'),
            'nomor_akreditasi_lab'  => $this->request->getPost('nomor_akreditasi_lab'),
            'nomor_sampling'        => $this->request->getPost('nomor_sampling'),
            'jenis_sampling'        => $this->request->getPost('jenis_sampling'),
            'tgl_start_sampling'    => convertDate($this->request->getPost('tanggal_start_sampling')),
            'tgl_end_sampling'      => convertDate($this->request->getPost('tanggal_end_sampling')),
            'tgl_pengambilan'       => convertDate($this->request->getPost('tanggal_pengambilan')),
            'tgl_diterima'          => convertDate($this->request->getPost('tanggal_diterima')),
            'titik_kordinat'        => $this->request->getPost('titik_kordinat'),
            'crt_at'                => convertDateSQL(),
            'crt_by'                => user_id(),
        ];

        $detail = array();
        foreach ($this->request->getPost('parameter') as $key => $value) {
            $detail[] = [
                'outlet_id'         => $outlet_id,
                'outlet_dt_id'      => generateHash(),
                'nilai'             => $this->request->getPost('parameter_val')[$key],
                'parameter'         => $this->request->getPost('parameter')[$key],
            ];
        }

        $db      = \Config\Database::connect();
        $status  = true;
        $bagian  = "";

        $builder = $db->table('outlet_hd');
        if(!$builder->insert($header)){
            $status = false;
            $bagian = " Header ";
        }

        $builder = $db->table('outlet_dt');
        if(!$builder->insertBatch($detail)){
            $status = false;
            $bagian = " Detail ";
        }

        if($status){
            $result['status'] = 'success';
            $result['reason'] = "Berhasil Menambah Data!";
        }
        else{
            $result['status'] = 'danger';
            $result['reason'] = "Gagal Menambah Data!";
            $result['reason'] = "Gagal Menambah Data ($bagian)!";
        }

        
        $result['header'] = $header;
        $result['detail'] = $detail;

        echo json_encode($result);
    }

     public function update_outlet()
    {
        $result           = array();
        $result['status'] = 'danger';
        $result['reason'] = "Data Tidak Boleh Kosong!";

        $siteWWTPID    = $this->request->getPost('site');
        $outlet_id   = $this->request->getPost('outlet_id');
        $header = [
            'outlet_id'             => $outlet_id,
            'siteWWTPID'            => $siteWWTPID,
            'tgl_pelaporan'         => convertDateSQL(),
            'tipe_pelaporan'        => $this->request->getPost('type_report'),
            'nama_laboratorium'     => $this->request->getPost('nama_lab'),
            'nomor_akreditasi_lab'  => $this->request->getPost('nomor_akreditasi_lab'),
            'nomor_sampling'        => $this->request->getPost('nomor_sampling'),
            'jenis_sampling'        => $this->request->getPost('jenis_sampling'),
            'tgl_start_sampling'    => convertDate($this->request->getPost('tgl_start_sampling')),
            'tgl_end_sampling'      => convertDate($this->request->getPost('tgl_end_sampling')),
            'tgl_pengambilan'       => convertDate($this->request->getPost('tgl_pengambilan')),
            'tgl_diterima'          => convertDate($this->request->getPost('tgl_diterima')),
            'titik_kordinat'        => $this->request->getPost('titik_kordinat'),
            'crt_at'                => convertDateSQL(),
            'crt_by'                => user_id(),
        ];

        $db      = \Config\Database::connect();
        $status  = true;
        $bagian = "";

        $builder = $db->table('outlet_hd');
        $builder->set($header);
        $builder->where('outlet_id', $outlet_id);
        if(!$builder->update()){
            $status = false;
            $bagian = " Header ";
        }

        $detail         = array();
        foreach ($this->request->getPost('parameter') as $key => $value) {
            $detail = [
                'outlet_id'         => $outlet_id,
                'nilai'             => $this->request->getPost('parameter_val')[$key],
                'parameter'         => $this->request->getPost('parameter')[$key],
            ];
            $query = $db->query("UPDATE outlet_dt set nilai = '".$detail['nilai']."' WHERE parameter = '".$detail['parameter']."' and outlet_id = '".$detail['outlet_id']."'");
            if(!$query){
                $status = false;
                $bagian = " Detail ";
            }

        }

        if($status){
            $result['status'] = 'success';
            $result['reason'] = "Berhasil Merubah Data!";
        }
        else{
            $result['status'] = 'danger';
            $result['reason'] = "Gagal Merubah Data ($bagian)!";
        }

        echo json_encode($result);
    }

}
