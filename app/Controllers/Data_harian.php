<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\SiteWwtpModel as Site;
use App\Models\CompanyModel as Company;
use App\Models\KecamatanModel as Kecamatan;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as DetailLogger;

class Data_harian extends BaseController
{
    public function __construct()
    {
        $this->siteDB = new Site;
        $this->companyDB = new Company;
        $this->kecamatanDB = new Kecamatan;
        $this->Logger = new Logger;
        $this->DetailLogger = new DetailLogger;
    }

    public function index()
    {
        $data = [
            'site'      => $this->siteDB->_find_all_site(),
            'kecamatan' => $this->kecamatanDB->_get_kecamatan(),
            'company'   => $this->companyDB->_get_company(),
            'menu'      => 'data masuk',
            'submenu'   => 'data harian',
            'content'   => 'pages/data_masuk/data-harian_v'
        ];
        
        echo view('template/wrapper_v', $data);
    }

    public function get_datatable_data_harian()
    {
        $siteWWTPID   = $this->request->getPost('site');
        $logger       = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 1);

        $columns     = [
            'siteWWTPID',
            'tgl_pelaporan',
        ];
        
        foreach($detailLogger as $row){
            $columns[] = $row['parameter'];
        }

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT tb1.*, tb3.name FROM daily_data_$siteWWTPID as tb1 inner join logger as tb2
            on tb1.loggerID = tb2.loggerID inner join site_wwtp as tb3 on tb2.siteWWTPID = tb3.siteWWTPID limit $skip, $limit");
            $rows       = $query->getResultArray();

            $i = 0;
            foreach ($rows as $key => $value) {
                $data[$i] = [
                    'siteWWTPID'    => $siteWWTPID,
                    'daily_dataID'  => $value['daily_dataID'],
                    'site_name'     => $value['name'],
                    'tgl_pelaporan' => $value['tgl_pelaporan'],
                ];

                foreach($detailLogger as $row){
                    $data[$i][$row['parameter']] = $value[$row['parameter']];
                }
                
                $i++;
            }

            $query  = $db->query("SELECT count(*) as jml FROM daily_data_$siteWWTPID");
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

    public function get_columns(){
        $siteWWTPID   = $this->request->getPost('siteWWTPID');
        $logger       = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 1);

        foreach($detailLogger as $row){
            $columns[]    = $row['parameter'];
        }

        echo json_encode($columns);
    }

    public function export_data_harian()
    {
        $db = \Config\Database::connect();

        $siteWWTPID = $this->request->uri->getSegment(2);
        $logger     = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 1);

        $data       = array();
        $query      = $db->query("SELECT t1.*, t2.company_name FROM site_wwtp as t1 inner join company as t2 on t1.companyID = t2.company_id where t1.siteWWTPID = '$siteWWTPID'");
        $site       = $query->getRowArray();

        $spreadsheet   = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan Harian '.$site['name'].' '.Date("M Y");
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

        $i = 0; $col = 8;
        $temp = array('E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');

        $sheet->setCellValue('A'.$col, "No");
        $sheet->setCellValue('B'.$col, "DailyDataID");
        $sheet->setCellValue('C'.$col, "LoggerID");
        $sheet->setCellValue('D'.$col, "Tgl Pelaporan");
        foreach ($detailLogger as $row) {
            $sheet->setCellValue($temp[$i].$col, $row["parameter"]);
            $i++;
        }

        $data       = array();
        $query      = $db->query("SELECT * FROM daily_data_$siteWWTPID");
        $data       = $query->getResultArray();

        $i = 0; $no = 1; $col++;
        $temp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');
        foreach($data as $row){
            $sheet->setCellValue($temp[$i].$col, $no); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['daily_dataID']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['loggerID']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tgl_pelaporan']); $i++;

            foreach ($detailLogger as $det) {
                $sheet->setCellValue($temp[$i].$col, $row[$det['parameter']]); $i++;
            }

            $i = 0; $no++; $col++;
        }

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');
        die;
    }

    function get_data_harian()
    {
        $loggerID      = $this->request->getPost('loggerID');
        $detailLogger  = $this->DetailLogger->_get_parameter($loggerID);
        $spreadsheet   = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan Harian';
        $sheet->setCellValue('A1', Date("M Y"));
        $sheet->setCellValue('A2', "Tanggal");

        $i    = 0;
        $row = 2;
        $temp = array("B", "C", "D", "E", "F", "G", "H");
        foreach ($detailLogger as $data) {
            $sheet->setCellValue($temp[$i] . $row, $data['parameter']);
            $i++;
        }

        $row++;
        $number = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        for ($i = 1; $i <= $number; $i++) {
            $sheet->setCellValue('A' . $row, $i);
            $row++;
        }

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');
        die;
        
    }

    function post_data_harian()
    {
        $inputFileName     = FCPATH . "assets\document\Test.xlsx";

        // **  Identify the type of $inputFileName  **/
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);

        /**  Create a new Reader of the type that has been identified  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);

        /**  Convert Spreadsheet Object to an Array for ease of use  **/
        $schdeules = $spreadsheet->getActiveSheet()->toArray();

        echo "<pre>";
        print_r($schdeules);
        echo "</pre>";
    }

    function get_parameter_harian()
    {
        $siteWWTPID = $this->request->getPost('siteWWTPID');

        $loggerID = $this->Logger->where('siteWWTPID', $siteWWTPID)->findColumn('loggerID');
        $detailLogger = $this->DetailLogger->_get_parameter($loggerID, 'BMAL', 1);

        echo json_encode($detailLogger);
    }

    function add_data_harian()
    {
        $result           = array();
        $result['status'] = 'danger';
        $result['reason'] = "Data Tidak Boleh Kosong!";

        $siteWWTPID     = $this->request->getPost('site');
        $logger         = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger   = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 1);

        $data = [
            'daily_dataID'      => generateHash(),
            'loggerID'          => $logger[0]['loggerID'],
            'typeReportID'      => $logger[0]['typeReportID'],
            'tgl_pelaporan'     => $this->request->getPost('tanggal_pelaporan'),
        ];

        foreach ($detailLogger as $row) {
            $data[$row["parameter"]] = $this->request->getPost($row["parameter"]);
        }

        $db      = \Config\Database::connect();

        $builder = $db->table('daily_data_' . $siteWWTPID);

        if($builder->insert($data)){
            $result['status'] = 'success';
            $result['reason'] = "Berhasil Menambah Data!";
        }

        echo json_encode($result);
    }

    function edit_data_harian()
    {
        $result           = array();
        $result['status'] = 'danger';
        $result['reason'] = "Data Tidak Boleh Kosong!";

        $siteWWTPID   = $this->request->getPost('site');
        $logger       = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMAL', 1);
        $daily_dataID = $this->request->getPost('daily_dataID');

        $data = [
            'daily_dataID'      => $daily_dataID,
            'loggerID'          => $logger[0]['loggerID'],
            'typeReportID'      => $logger[0]['typeReportID'],
            'tgl_pelaporan'     => $this->request->getPost('tanggal_pelaporan'),
        ];

        foreach ($detailLogger as $row) {
            $data[$row["parameter"]] = $this->request->getPost($row["parameter"]);
        }
        
        $db      = \Config\Database::connect();

        $builder = $db->table('daily_data_' . $siteWWTPID);
        $builder->set($data);
        $builder->where('daily_dataID', $daily_dataID);
        
        if($builder->update()){
            $result['status'] = 'success';
            $result['reason'] = "Berhasil Merubah Data!";
        }

        echo json_encode($result);
    }

    function get_site($company_id)
    {
        $result  = array();

        $db      = \Config\Database::connect();
    
        $builder = $db->table('site_wwtp');
        $builder->select('*')->where("companyID", $company_id);
        $result = $builder->get();

        echo json_encode($result->getResultArray());
    }
}
