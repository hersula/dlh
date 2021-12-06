<?php
namespace App\Controllers;

use App\Models\SiteWwtpModel as Site;
use App\Models\TypeReportModel as type_report;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as DetailLogger;

class Analisa_downstream extends BaseController
{
    public function __construct()
    {
        $this->siteDB = new Site;
        $this->type_report = new type_report;
        $this->Logger = new Logger;
        $this->DetailLogger = new DetailLogger;
    }

    public function index()
    {
        $data = [
            'site'          => $this->siteDB->_find_all_site(),
            'type_report'   => $this->type_report->findAll(),
            'menu'          => 'data analisa',
            'submenu'       => 'data downstream',
            'content'       => 'pages/analisa/analisa-downstream_v'
        ];
        echo view('template/wrapper_v',$data);
    }
    
    public function insert_downstream()
    {
        $siteWWTPID  = $this->request->getPost('site');
        $downstream_id   = generateHash();
        $header = [
            'downstream_id'         => $downstream_id,
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
                'downstream_id'         => $downstream_id,
                'downstream_dt_id'      => generateHash(),
                'nilai'             => $this->request->getPost('parameter_val')[$key],
                'parameter'         => $this->request->getPost('parameter')[$key],
            ];
        }

        $db      = \Config\Database::connect();

        $builder = $db->table('downstream_hd');
        $builder->insert($header);

        $builder = $db->table('downstream_dt');
        $builder->insertBatch($detail);

        // Success!
        return redirect()->route('analisa-downstream')->with('message', 'Tambah Pelaporan downstream Berhasil');
    }

    public function get_datatable_data_downstream()
    {
        $siteWWTPID = $this->request->getPost('site');
        $logger     = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMBAP', 0);

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
            $query      = $db->query("SELECT downstream_id, type_report.name as tipe_pelaporan,downstream_hd.tgl_pelaporan, 
                            downstream_hd.tgl_start_sampling,downstream_hd.tgl_end_sampling, 
                            company.company_name as nama_industri,site_wwtp.name as nama_wwtp 
                            FROM downstream_hd JOIN site_wwtp 
                            ON site_wwtp.siteWWTPID = downstream_hd.siteWWTPID 
                            JOIN company ON company.company_id = site_wwtp.companyID  
                            JOIN type_report ON type_report.typeReportID = downstream_hd.tipe_pelaporan 
                            WHERE downstream_hd.siteWWTPID = '$siteWWTPID' 
                            limit $skip, $limit");
            $rows       = $query->getResultArray();

            $i = 0;
            foreach ($rows as $key => $value) {
                $data[$i] = [
                    'tipe_pelaporan'  => $value['tipe_pelaporan'],
                    'tgl_pelaporan'      => $value['tgl_pelaporan'],
                    'tgl_start_sampling' => $value['tgl_start_sampling'],
                    'tgl_end_sampling' => $value['tgl_end_sampling'],
                    'nama_industri' => $value['nama_industri'],
                    'nama_wwtp' => $value['nama_wwtp'],
                ];

                foreach ($detailLogger as $row) {
                    $data[$i][$row['parameter']] = $this->get_detail($value['downstream_id'], $row['parameter']);
                }

                $i++;
            }

            $query  = $db->query("SELECT count(*) as jml FROM downstream_hd");
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

    public function get_detail($downstream_id, $parameter)
    {
        $val = 0;

        $db = \Config\Database::connect();

        $query = $db->query("select nilai from downstream_dt where downstream_id = '$downstream_id' and parameter = '$parameter'");
        $row   = $query->getRowArray();
        $val   = $row["nilai"];

        return $val;
    }

    public function get_columns()
    {
        $siteWWTPID   = $this->request->getPost('siteWWTPID');
        $logger       = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMBAP', 0);
        $columns      = array();

        foreach ($detailLogger as $row) {
            $columns[]    = $row['parameter'];
        }

        echo json_encode($columns);
    }

    function get_parameter_downstream()
    {
        $siteWWTPID = $this->request->getPost('siteWWTPID');

        $loggerID = $this->Logger->where('siteWWTPID', $siteWWTPID)->findColumn('loggerID');
        $detailLogger = $this->DetailLogger->_get_parameter($loggerID, 'BMBAP', 0);

        echo json_encode($detailLogger);
    }

    public function export_data_downstream()
    {
        $siteWWTPID = $this->request->uri->getSegment(2);
        $logger     = $this->Logger->_get_logger($siteWWTPID);
        $detailLogger = $this->DetailLogger->_get_parameter($logger[0]['loggerID'], 'BMBAP', 0);
        
        $spreadsheet   = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan downstream';
        $sheet->setCellValue('A1', Date("M Y"));

        $i = 13;
        $col = 2;
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

        $db = \Config\Database::connect();

        $data       = array();
        $query      = $db->query("SELECT downstream_id, type_report.name as tipe_pelaporan,downstream_hd.tgl_pelaporan,downstream_hd.tgl_start_sampling,
                        downstream_hd.tgl_end_sampling, company.company_name as nama_industri,site_wwtp.name as nama_wwtp,downstream_hd.nama_laboratorium,
                        downstream_hd.nomor_akreditasi_lab,downstream_hd.nomor_sampling,downstream_hd.jenis_sampling,downstream_hd.tgl_pengambilan,
                        downstream_hd.tgl_diterima,downstream_hd.titik_kordinat 
                        FROM downstream_hd 
                        JOIN site_wwtp 
                        ON site_wwtp.siteWWTPID = downstream_hd.siteWWTPID 
                        JOIN company 
                        ON company.company_id = site_wwtp.companyID  
                        JOIN type_report 
                        ON type_report.typeReportID = downstream_hd.tipe_pelaporan 
                        WHERE downstream_hd.siteWWTPID = '$siteWWTPID' ");

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
                $sheet->setCellValue($temp[$i].$col, $this->get_detail($row['downstream_id'], $det['parameter']));
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
}

