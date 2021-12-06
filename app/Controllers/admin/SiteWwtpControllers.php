<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User as MythUser;
use App\Models\SiteWwtpModel as Site;
use App\Models\TypeReportModel as TypeReport;
use App\Models\ParameterModel as Parameter;
use Myth\Auth\Models\UserModel as User;
use App\Models\LoggerModel as Logger;
use App\Models\LoggerDetailModel as LoggerDetail;
use App\Models\UserSiteModel as UserSite;
use App\Models\SupportDocumentsModel as SupportDocuments;
use App\Models\TypeDocumentsModel as TypeDocuments;
use App\Models\WaterSourcesModel as WaterSources;
use App\Models\SiteIpalModel as SiteIpal;
use App\Models\SiteBapModel as SiteBap;
use App\Models\SiteDocumentModel as SiteDocument;
use App\Models\DetailSPaModel as DetailSPa;



class SiteWwtpControllers extends BaseController
{
    protected $request;
    
    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');


        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->typeReportDB = new TypeReport;
        $this->parameterDB = new Parameter;

        $this->siteDB = new Site;
        $this->loggerDB = new Logger;
        $this->loggerDetailDB = new LoggerDetail;
        $this->userSiteDB = new UserSite;
        $this->supportDocumentsDB = new SupportDocuments;
        $this->typeDocumentsDB = new TypeDocuments;
        $this->siteIpalDB = new SiteIpal;
        $this->siteBapDB = new SiteBap;
        $this->siteDocumentDB = new SiteDocument;
        $this->waterSourcesDB = new WaterSources;
        $this->spaDB = new DetailSPa;
    }

    public function index()
    {
        $data = [
            'typeReports'           => $this->typeReportDB->findAll(),
            'ijin'                  => $this->typeDocumentsDB->where('jenis_surat', 'ijin')->findAll(),
            'spa'                   => $this->typeDocumentsDB->where('jenis_surat', 'spa')->findAll(),
            'pendukung'             => $this->typeDocumentsDB->where('jenis_surat', 'pendukung')->findAll(),
            'waters'                => $this->waterSourcesDB->findAll(),
            'parameters'            => $this->parameterDB->findAll(),
            'users'                 => $this->siteDB->_get_users(),
            'documents'             => $this->siteDocumentDB->_get_documents(),
            'menu'                  => 'user wwtp',
            'submenu'               => 'user wwtp',
            'content'               => 'pages/site_wwtp/index'
        ];
       
        echo view('template/wrapper_v', $data);
        
        if(isset($_SESSION['data'])){
            unset($_SESSION['data']);
        }
    }
   
    public function index2()
    {
        $data = [
            'typeReports'           => $this->typeReportDB->findAll(),
            'ijin'                  => $this->typeDocumentsDB->where('jenis_surat', 'ijin')->findAll(),
            'pendukung'             => $this->typeDocumentsDB->where('jenis_surat', 'pendukung')->findAll(),
            'waters'                => $this->waterSourcesDB->findAll(),
            'parameters'            => $this->parameterDB->findAll(),
            'users'                 => $this->siteDB->_get_users(),
            'documents'             => $this->siteDB->_get_documents(),
            'menu'                  => 'user wwtp',
            'submenu'               => 'user wwtp',
            'content'               => 'pages/site_wwtp/index2'
        ];
        echo view('template/wrapper_v', $data);
    }

    public function get_titik_penaatan()
    {
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

    public function get_all_titik_penaatan()
    {
        $data                     = array();
        $data['site_wwtp']        = array();
        $data['logger_detail']    = array();
        $data['penanggung_jawab'] = array();
        $data['surat_pendukung']  = array();
        $data['bap']              = array();
        $data['logger']           = array();
        $data['spa_detail']       = array();
        $data['ipal']             = array();

        $siteWWTPID               = $this->request->getPost('siteWWTPID');
        $loggerID                 = $this->loggerDB->where('siteWWTPID', $siteWWTPID)->findAll();
        $data['site_wwtp']        = $this->siteDB->find($siteWWTPID);
        $data['logger_detail']    = $this->loggerDetailDB->where('loggerID', $loggerID["0"]['loggerID'])->findAll();
        $data['penanggung_jawab'] = $this->userSiteDB->_get_site_user($siteWWTPID);
        $data['surat_pendukung']  = $this->supportDocumentsDB->_get_all_documents($siteWWTPID);
        $data['bap']              = $this->siteBapDB->_get_bap($siteWWTPID);
        $data['spa_detail']       = $this->spaDB->where('siteWWTPID', $siteWWTPID)->findAll();
        $data['ipal']             = $this->siteIpalDB->where('siteWWTPID', $siteWWTPID)->find();

        echo json_encode($data);
    }

    public function add_titik_penaatan()
    {
        $data                        = array();
        $data['site_wwtp']           = array();
        $data['logger_detail']       = array();
        $data['penanggung_jawab']    = array();
        $data['surat_pendukung']     = array();
        $data['bap']                 = array();
        $data['logger']              = array();
        $data['spa_detail']          = array();
        // data yang belum di dapatkan
        $companyID      = user()->company_id;
        $usersID        = user_id();
        $siteWWTPID     = generateHash();
        $loggerID       = generateHash();
        $nama_logger    = "Generate by System";
        $siteUsersID    = generateHash();
        $crt_by         = user_id();
        $crt_at         = convertDateSQL();

        $longitude      = $this->request->getPost('longitude');
        $latitude       = $this->request->getPost('latitude');
        // site_wwtp
        $data['site_wwtp']   = [
            'siteWWTPID'            => $siteWWTPID,
            'companyID'             => $companyID,
            'typeReportID'          => $this->request->getPost('typeReportID'),
            'name'                  => $this->request->getPost('name'),
            'address'               => $this->request->getPost('address'),
            'debit'                 => $this->request->getPost('debit'),
            'longitude_outlet'      => $longitude[0],
            'latitude_outlet'       => $latitude[0],
            'longitude_outfall'     => $longitude[1],
            'latitude_outfall'      => $latitude[1],
            'status'                => 'Open',
            'crt_by'                => $crt_by,
            'crt_at'                => $crt_at,
        ];

        //BAP
        $badan_jenis_air   = $this->request->getPost('badan_jenis_air');
        $lokasi_bap        = $this->request->getPost('lokasi_bap');
        $kordinat_bap      = $this->request->getPost('kordinat_bap');
        $nama_bja          = $this->request->getPost('nama_bja');   
        $upstream          = $this->request->getPost('upstream');
        $downstream        = $this->request->getPost('downstream');

        $data['bap'][0]   = [
            'bapID'             => generateHash(),
            'siteWWTPID'        => $siteWWTPID,
            'badan_jenis_air'   => $badan_jenis_air,
            'nama_bja'          => $nama_bja,
            'lokasi_bap'        => $lokasi_bap,
            'kordinat_bap'      => $kordinat_bap,
            'upstream'          => $upstream,
            'downstream'        => $downstream,
            'crt_by'            => $crt_by,
            'crt_at'            => $crt_at,
        ];

        // IPAL
        $nama_ipal          = $this->request->getPost('nama_ipal');
        $sumber_ipal        = $this->request->getPost('sumber_ipal');
        $kapasitas_ipal     = $this->request->getPost('kapasitas_ipal');

        if ($nama_ipal) {
            for ($i = 0; $i < count($nama_ipal); $i++) {
                $data['ipal'][$i] = [
                    'ipalID'            => generateHash(),
                    'siteWWTPID'        => $siteWWTPID,
                    'nama_ipal'         => $nama_ipal[$i],
                    'sumber_ipal'       => $sumber_ipal[$i],
                    'kapasitas_ipal'    => $kapasitas_ipal[$i],
                    'crt_by'            => $crt_by,
                    'crt_at'            => $crt_at,
                ];
            }
        }

        // logger
        $data['logger']   = [
            'loggerID'      => $loggerID,
            'siteWWTPID'    => $siteWWTPID,
            'nama_logger'   => $nama_logger,
            'status'        => 'Open',
            'crt_by'        => $crt_by,
            'crt_at'        => $crt_at,
        ];

        // logger_detail
        $parameter_id    = $this->request->getPost('parameter_id');
        $parameter_name  = $this->request->getPost('parameter_name');
        $parameter_asal  = $this->request->getPost('parameter_asal');
        $minimum         = $this->request->getPost('minimum');
        $maximum         = $this->request->getPost('maximum');
        
        if ($parameter_id) {
            for ($i = 0; $i < count($parameter_id); $i++) {
                $data['logger_detail'][$i] = [
                    'detailLoggerID'    => generateHash(),
                    'loggerID'          => $loggerID,
                    'parameterID'       => $parameter_id[$i],
                    'parameter'         => $parameter_name[$i],
                    'parameter_asal'    => $parameter_asal[$i],
                    'min'               => $minimum[$i],
                    'max'               => $maximum[$i],
                    'crt_by'            => $crt_by,
                    'crt_at'            => $crt_at,
                ];
            }
        }

        // penanggung jawab
        $penanggung_jawab   = $this->request->getPost('penanggung_jawab');
        $nama               = $this->request->getPost('nama_penanggung_jawab');
        $email              = $this->request->getPost('email_penanggung_jawab');
        if ($penanggung_jawab) {
            for ($i = 0; $i < count($penanggung_jawab); $i++) {
                $siteUsersID = generateHash();

                $data['penanggung_jawab'][$i] = [
                    'siteUsersID'   => $siteUsersID,
                    'siteWWTPID'    => $siteWWTPID,
                    'usersID'       => $penanggung_jawab[$i],
                    'nama'          => $nama[$i],
                    'email'         => $email[$i],
                    'crt_by'        => $crt_by,
                    'crt_at'        => $crt_at,
                ];

                $data['site_user'][$i] = [
                    'siteUsersID'   => $siteUsersID, 
                    'siteWWTPID'    => $siteWWTPID,
                    'usersID'       => $penanggung_jawab[$i],
                    'crt_by'        => $crt_by,
                    'crt_at'        => $crt_at,
                ];
            }
        }


        // surat pendukung
        $supportDocumentsID = $this->request->getPost('id');
        $jenis_surat        = $this->request->getPost('jenis_surat');
        $file               = $this->request->getPost('file');
        $no_ijin            = $this->request->getPost('no_ijin');
        $tgl_ijin           = $this->request->getPost('tgl_ijin');
        $instansi           = $this->request->getPost('instansi');
        $asal_surat         = $this->request->getPost('asal_surat');

        if ($no_ijin) {
            for ($i = 0; $i < count($no_ijin); $i++) {
                $supportDocumentsID[$i] = ($supportDocumentsID[$i] == "") ? generateHash() : $supportDocumentsID[$i];

                $data['surat_pendukung'][$i] = [
                    'supportDocumentsID'    => $supportDocumentsID[$i], 
                    'siteWWTPID'            => $siteWWTPID,
                    'companyID'             => $companyID,
                    'asal_surat'            => $asal_surat[$i],
                    'typeLetterID'          => $jenis_surat[$i],
                    'no_ijin'               => $no_ijin[$i],
                    'tgl_ijin'              => convertDate($tgl_ijin[$i]),
                    'instansi'              => $instansi[$i],
                    'lampiran'              => "Belum Dijalankan",
                    'crt_by'                => $crt_by,
                    'crt_at'                => $crt_at,
                ];

                $data['site_document'][$i] = [
                    'siteDocumentID'        => generateHash(),
                    'siteWWTPID'            => $siteWWTPID,
                    'supportDocumentsID'    => $supportDocumentsID[$i],
                ];
            }
        }

        // spa detail
        $kordinat_spa    = $this->request->getPost('kordinat_spa');
        $debit_spa       = $this->request->getPost('debit_spa');

        if ($debit_spa) {
            for ($i = 0; $i < count($debit_spa); $i++) {
                $data['spa_detail'][$i] = [
                    'detailSpaID'   => generateHash(),
                    'siteWWTPID'    => $siteWWTPID,
                    'debit_spa'     => $debit_spa[$i],
                    'kordinat_spa'  => $kordinat_spa[$i],
                    'crt_by'        => $crt_by,
                    'crt_at'        => $crt_at,
                ];
            }
        }

        $_SESSION['data']   = $data;

        // HARUS DI CEK RULES REQUIRED DARI HTML DAN BACKEND
        // $rules = [
        //     'name'              => 'required',
        //     'address'           => 'required',
        //     'typeReportID'      => 'required',
        //     'longitude'         => 'required',
        //     'latitude'          => 'required',
        //     'parameter_id'      => 'required',
        //     'parameter_name'    => 'required',
        //     'minimum'           => 'required',
        //     'maximum'           => 'required',
        //     'penanggung_jawab'  => 'required',
        //     'jenis_surat'       => 'required',
        //     // 'file'              => 'required',
        //     'no_ijin'           => 'required',
        //     'tgl_ijin'          => 'required',
        //     'instansi'          => 'required',
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        $db = \Config\Database::connect();
        try {
            $db->transBegin();
            //site
            $this->siteDB->save($data['site_wwtp']);

            // //bap
            $this->siteBapDB->save($data['bap']);

            //ipal
            $this->siteIpalDB->_insert_batch($data['ipal']);
          

            // logger
            $this->loggerDB->save($data['logger']);
            $this->loggerDetailDB->_insert_batch($data['logger_detail']);

            // site_user
            $this->userSiteDB->_insert_batch($data['site_user']);

            // // document
            foreach($data['surat_pendukung'] as $row){
                if($row['asal_surat'] != 'ijin'){
                    $this->supportDocumentsDB->save($row);
                }
            }

            $this->siteDocumentDB->_insert_batch($data['site_document']);
            $this->spaDB->_insert_batch($data['spa_detail']);

            if ($db->transStatus() === false) {
                $db->transRollback();
            } else {
                $db->transCommit();;
            }
            $db->close();

            // Success!
            return redirect()->route('admin/titik_penaatan')->with('message', 'Tambah Site WWTP Berhasil');
        } catch (\Exception $e) {
            $db->transRollback();
            $db->close();

            // store session
            $_SESSION['data']   = $data;

            return redirect()->route('admin/titik_penaatan')->with('message', 'Error');
        }
    }

    public function edit_titik_penaatan()
    {
        $data                                   = array();
        $data['site_wwtp']                      = array();
        $data['logger_detail']                  = array();
        $data['penanggung_jawab']               = array();
        $data['surat_pendukung']                = array();

        $session_p_jawab['penanggung_jawab']    = array();

        // data yang belum di dapatkan
        $companyID      = user()->company_id;
        $usersID        = user_id();
        $siteWWTPID     = generateHash();
        $loggerID       = generateHash();
        $nama_logger    = "Generate by System";
        $siteUsersID    = generateHash();
        $crt_by         = user_id();
        $crt_at         = convertDateSQL();


        // site_wwtp
        $data['site_wwtp']   = [
            'companyID'     => $companyID,
            'typeReportID'  => $this->request->getPost('typeReportID'),
            'name'          => $this->request->getPost('name'),
            'address'       => $this->request->getPost('address'),
            'longitude'     => $this->request->getPost('longitude'),
            'latitude'      => $this->request->getPost('latitude'),
            'status'        => 'Open',
            'crt_by'        => $crt_by,
            'crt_at'        => $crt_at,
        ];

        // logger
        $data['logger']   = [
            'siteWWTPID'    => $siteWWTPID,
            'nama_logger'   => $nama_logger,
            'status'        => 'Open',
            'crt_by'        => $crt_by,
            'crt_at'        => $crt_at,
        ];

        // logger_detail
        $detailLoggerID    = $this->request->getPost('detailLoggerID');
        $parameter_id    = $this->request->getPost('parameter_id');
        $parameter_name  = $this->request->getPost('parameter_name');
        $minimum         = $this->request->getPost('minimum');
        $maximum         = $this->request->getPost('maximum');

        if ($parameter_id) {
            for ($i = 0; $i < count($parameter_id); $i++) {
                $data['logger_detail'][$i] = [
                    'loggerID'          => $loggerID,
                    'parameterID'       => $parameter_id[$i],
                    'parameter'         => $parameter_name[$i],
                    'min'               => $minimum[$i],
                    'max'               => $maximum[$i],
                    'crt_by'            => $crt_by,
                    'crt_at'            => $crt_at,
                ];
            }
        }

        // penanggung jawab
        $penanggung_jawab    = $this->request->getPost('penanggung_jawab');
        $siteUsersID         = $this->request->getPost('siteUsersID');

        if ($penanggung_jawab) {
            for ($i = 0; $i < count($penanggung_jawab); $i++) {
                $data['penanggung_jawab'][$i] = [
                    'siteWWTPID'    => $siteWWTPID,
                    'usersID'       => $penanggung_jawab[$i],
                    'crt_by'        => $crt_by,
                    'crt_at'        => $crt_at,
                ];
            }
        }

        // surat pendukung
        $jenis_surat           = $this->request->getPost('jenis_surat');
        $supportDocumentsID    = $this->request->getPost('supportDocumentsID');
        $file                  = $this->request->getPost('file');
        $no_ijin               = $this->request->getPost('no_ijin');
        $tgl_ijin              = $this->request->getPost('tgl_ijin');
        $instansi              = $this->request->getPost('instansi');
        $tgl_terbit            = $this->request->getPost('tgl_terbit');
        $tgl_berakhir          = $this->request->getPost('tgl_berakhir');


        if ($no_ijin) {
            for ($i = 0; $i < count($no_ijin); $i++) {
                $data['surat_pendukung'][$i] = [
                    'siteWWTPID'            => $siteWWTPID,
                    'typeLetterID'          => $jenis_surat[$i],
                    'no_ijin'               => $no_ijin[$i],
                    'tgl_ijin'              => convertDate($tgl_ijin[$i]),
                    'instansi'              => $instansi[$i],
                    'tgl_terbit'            => convertDate($tgl_terbit[$i]),
                    'tgl_berakhir'          => convertDate($tgl_berakhir[$i]),
                    'lampiran'              => "Belum Dijalankan",
                    'crt_by'                => $crt_by,
                    'crt_at'                => $crt_at,
                ];
            }
        }

        // HARUS DI CEK RULES REQUIRED DARI HTML DAN BACKEND
        $rules = [
            'name'              => 'required',
            'address'           => 'required',
            'typeReportID'      => 'required',
            'longitude'         => 'required',
            'latitude'          => 'required',
            'parameter_id'      => 'required',
            'parameter_name'    => 'required',
            'minimum'           => 'required',
            'maximum'           => 'required',
            'penanggung_jawab'  => 'required',
            'jenis_surat'       => 'required',
            // 'file'              => 'required',
            'no_ijin'           => 'required',
            'tgl_ijin'          => 'required',
            'instansi'          => 'required',
            'tgl_terbit'        => 'required',
            'tgl_berakhir'      => 'required',
        ];

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        try {
            $db->transBegin();

            $this->siteDB
                ->whereIn('siteWWTPID', $siteWWTPID)
                ->set($data['site_wwtp'])
                ->update();

            $this->loggerDB
                ->whereIn('loggerID', $loggerID)
                ->set($data['logger'])
                ->update();

            $this->userSiteDB
                ->whereIn('siteUsersID', $siteUsersID)
                ->set($data['penanggung_jawab'])
                ->update();

            $this->loggerDetailDB
                ->whereIn('detailLoggerID', $detailLoggerID)
                ->set($data['logger_detail'])
                ->update();

            $this->supportDocumentsDB
                ->whereIn('supportDocumentsID', $supportDocumentsID)
                ->set($data['surat_pendukung'])
                ->update();

            if ($db->transStatus() === false) {
                $db->transRollback();
            } else {
                $db->transCommit();;
            }
            $db->close();

            // Success!
            return redirect()->route('admin/titik_penaatan')->with('message', 'Tambah Site WWTP Berhasil');
        } catch (\Exception $e) {
            $db->transRollback();
            $db->close();
            return redirect()->route('admin/titik_penaatan')->with('message', 'Error');
        }
    }

    public function add_surat()
    {
        $data                           = array();
        $data['supportDocumentsID']     = generateHash();
        $data['companyID']              = user()->company_id;
        $data['typeLetterID']            = $this->request->getPost('typeLetterID');
        $data['no_ijin']                = $this->request->getPost('no_ijin');
        $data['tgl_ijin']               = convertDate($this->request->getPost('tgl_ijin'));
        $data['instansi']               = $this->request->getPost('instansi');
        $data['file']                   = $this->request->getFile('file');
        $data['asal_surat']             = $this->request->getPost('asal_surat');
        $data['lampiran']               = "Belum Dijalankan";
        $data['status']                 = "Open";
        $data['crt_by']                 = user_id();
        $data['crt_at']                 = convertDateSQL();

        $db = \Config\Database::connect();
        try {
            $db->transBegin();

            $this->supportDocumentsDB->save($data);

            if ($db->transStatus() === false) {
                $db->transRollback();
            } else {
                $db->transCommit();;
            }
            $db->close();
            
            $data['status'] = true;
            $data['reason'] = "Berhasil";
        } catch (\Exception $e) {
            $data['status'] = false;
            $data['reason'] = "Gagal";
        }

        echo json_encode($data);
    }


    public function add_new_userSite()
    {
        $nama_pengguna = $this->request->getPost('nama_pengguna');
        $jabatan = $this->request->getPost('jabatan');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $no_tlpn = $this->request->getPost('no_tlpn');
        $password = $this->request->getPost('password');
        $confirmpassword = $this->request->getPost('confirmpassword');
        $users = model(UserModel::class);
        $validation =  \Config\Services::validation();
        $rules = [
            'nama_pengguna'     => 'required',
            'jabatan'           => 'required',
            'email'             => 'required|valid_email|is_unique[users.email]',
            'username'             => 'required|is_unique[users.username]',
            'no_tlpn'           => 'required',
            'password'          => 'required|strong_password',
            'confirmpassword'   => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
        
            return json_encode(['msg'=>$validation->getErrors(),'status'=>500]);
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new MythUser($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();


        // CUSTUME USER FIELD VALUE

        // $user->email = $email;
        $user->name = $nama_pengguna;
        $user->position = $jabatan;
        $user->phone = $no_tlpn;
        $user->company_id = user()->company_id;
        $user->level = 2;
        $user->active = 1;

        $users->db->transBegin();
        try {
			$users->save($user);
            $uid = $users->insertID();
			$users->db->transCommit();
            return json_encode(['msg'=>'ok','data'=>['id'=>$uid,'name'=>$nama_pengguna,'email' =>$email],'status'=>200]);
		} catch (\Exception $e) {
			$users->db->transRollback();
            return json_encode(['msg'=>$users->errors(),'status'=>500]);
		}
        
    }

}
