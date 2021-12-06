<?php

namespace App\Controllers;
use App\Models\SiteWwtpModel as Site;
use App\Models\TypeReportModel as type_report;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Analisa_outfall extends BaseController
{

    public function __construct()
    {
        $this->siteDB = new Site;
        $this->type_report = new type_report;
    }

    public function index()
    {
        $data = [
            'site'  => $this->siteDB->_find_all_site(),
            'type_report'  => $this->type_report->findAll(),
            'menu' => 'data analisa',
            'submenu' => 'data outfall',
            'content'   => 'pages/analisa/analisa-outfall_v'
        ];
        echo view('template/wrapper_v',$data);
    }

    public function insert_outfall()
    {
        $siteWWTPID = $this->request->getPost('site');
        foreach($this->request->getPost('type_report') as $key=>$value){
            $data[]= [
                'outfall_id'      => generateHash(),
                'siteWWTPID'        => $siteWWTPID,
                'tgl_pelaporan'     => convertDateSQL(),
                'tipe_pelaporan'     => $this->request->getPost('type_report')[$key],
                'nama_laboratorium'  => $this->request->getPost('nama_lab')[$key],
                'nomor_akreditasi_lab'  => $this->request->getPost('nomor_akreditasi_lab')[$key],
                'nomor_sampling'  => $this->request->getPost('nomor_sampling')[$key],
                'jenis_sampling'  => $this->request->getPost('jenis_sampling')[$key],
                'tgl_start_sampling'  => convertDate($this->request->getPost('tanggal_start_sampling')[$key]),
                'tgl_end_sampling'  => convertDate($this->request->getPost('tanggal_end_sampling')[$key]),
                'tgl_pengambilan'  => convertDate($this->request->getPost('tanggal_pengambilan')[$key]),
                'tgl_diterima'  => convertDate($this->request->getPost('tanggal_diterima')[$key]),
                'titik_kordinat'  => $this->request->getPost('titik_kordinat')[$key],
                'crt_at'  =>convertDateSQL() ,
                'crt_by'  =>user_id() ,
            ];
        }

        $db      = \Config\Database::connect();

        $builder = $db->table('outfall_hd');
        $builder->insertBatch($data);
        // Success!
        return redirect()->route('analisa-outfall')->with('message', 'Tambah Pelaporan outfall Berhasil');
    }

    public function get_datatable_data_outfall()
    {
        $siteWWTPID = "c29e1218bb78452b10b3a55b8759752d";

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
            $query      = $db->query("SELECT type_report.name as tipe_pelaporan,outfall_hd.tgl_pelaporan,outfall_hd.tgl_start_sampling,outfall_hd.tgl_end_sampling, company.company_name as nama_industri,site_wwtp.name as nama_wwtp FROM outfall_hd JOIN site_wwtp ON site_wwtp.siteWWTPID = outfall_hd.siteWWTPID JOIN company ON company.company_id = site_wwtp.companyID  JOIN type_report ON type_report.typeReportID = outfall_hd.tipe_pelaporan limit $skip, $limit");
            $rows       = $query->getResultArray();

            foreach ($rows as $key => $value) {
            
                $data[] = [
                   
                    'tipe_pelaporan'  => $value['tipe_pelaporan'],
                    'tgl_pelaporan'      => $value['tgl_pelaporan'],
                    'tgl_start_sampling' => $value['tgl_start_sampling'],
                    'tgl_end_sampling' => $value['tgl_end_sampling'],
                    'nama_industri' => $value['nama_industri'],
                    'nama_wwtp' => $value['nama_wwtp'],
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM outfall_hd");
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

    public function export_data_outfall()
    {
        $siteWWTPID = $this->request->uri->getSegment(2);
        $spreadsheet   = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Laporan outfall';
        $sheet->setCellValue('A1', Date("M Y"));

        $i = 0; $col = 2;
        $temp = array('E', 'F', 'G', 'H', 'I', 'J', 'K', 'L');

        $sheet->setCellValue('A'.$col, "No");
        $sheet->setCellValue('B'.$col, "Nama Industri");
        $sheet->setCellValue('C'.$col, "Nama Titik Penaatan");
        $sheet->setCellValue('D'.$col, "Tipe Pelaporan");
        $sheet->setCellValue('E'.$col, "Tanggal Pelaporan");
        $sheet->setCellValue('F'.$col, "Nama Laboratorium");
        $sheet->setCellValue('G'.$col, "Nomor Akreditasi Lab");
        $sheet->setCellValue('H'.$col, "Nomor Sampling");
        $sheet->setCellValue('I'.$col, "Jenis Sampling");
        $sheet->setCellValue('J'.$col, "Tanggal Sampling");
        $sheet->setCellValue('K'.$col, "Tanggal Pengambilan");
        $sheet->setCellValue('L'.$col, "Tanggal Diterima");
        $sheet->setCellValue('M'.$col, "Titik Koridinat");
       

        $db = \Config\Database::connect();

        $data       = array();
        $query      = $db->query("SELECT type_report.name as tipe_pelaporan,outfall_hd.tgl_pelaporan,outfall_hd.tgl_start_sampling,outfall_hd.tgl_end_sampling, company.company_name as nama_industri,site_wwtp.name as nama_wwtp,outfall_hd.nama_laboratorium,outfall_hd.nomor_akreditasi_lab,outfall_hd.nomor_sampling,outfall_hd.jenis_sampling,outfall_hd.tgl_pengambilan,outfall_hd.tgl_diterima,outfall_hd.titik_kordinat FROM outfall_hd JOIN site_wwtp ON site_wwtp.siteWWTPID = outfall_hd.siteWWTPID JOIN company ON company.company_id = site_wwtp.companyID  JOIN type_report ON type_report.typeReportID = outfall_hd.tipe_pelaporan WHERE outfall_hd.siteWWTPID = '$siteWWTPID' ");

        $data       = $query->getResultArray();

        $i = 0; $no = 1; $col++;
        $temp = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M');
        foreach($data as $row){
            $sheet->setCellValue($temp[$i].$col, $no); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['nama_industri']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['nama_wwtp']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tipe_pelaporan']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tgl_pelaporan']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tgl_start_sampling'].'/'.$row['tgl_end_sampling']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['nama_laboratorium']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['nomor_akreditasi_lab']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['nomor_sampling']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['jenis_sampling']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tgl_pengambilan']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['tgl_diterima']); $i++;
            $sheet->setCellValue($temp[$i].$col, $row['titik_kordinat']); $i++;

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
}
