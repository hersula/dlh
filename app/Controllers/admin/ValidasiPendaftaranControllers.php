<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use App\Models\RegistrationModel as Registration;
use App\Models\UserModel as User;
use App\Models\CompanyModel as Company;
use App\Models\SiteWwtpModel as SiteWWTP;
use App\Models\LoggerModel as Logger;
use App\Models\UserGroupModel as UserGroupModel;
use App\Models\LoggerDetailModel as DetailLogger;
use App\Controllers\EmailController as Email;

class ValidasiPendaftaranControllers extends BaseController
{
    protected $request;
    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->registrationDB = new Registration;
        $this->userDB = new User;
        $this->companyDB = new Company;
        $this->email = new Email;
        $this->SiteWWTP = new SiteWWTP;
        $this->Logger = new Logger;
        $this->DetailLogger = new DetailLogger;
        $this->UserGroupModel = new UserGroupModel;
        $this->forge = \Config\Database::forge();
    }

    public function index()
    {
        $data = [
            // 'data'              => $this->registration_findAll(),
            'menu'              => 'validasi data',
            'submenu'           => 'validasi pendaftaran',
            'content'           => 'pages/admin_panel/validasi_pendaftaran_v'
        ];

        echo view('template/wrapper_v', $data);
    }

    public function registration_findAll2($page = 1)
    {
        $dataRegistrations = array();
        $registrations = $this->registrationDB->paginate(5, 'registrations', $page);
        foreach ($registrations as $key => $value) {
            $status = "Belum Divalidasi";
            $badge  = "danger";

            if ($value['status'] != 'Open') {
                $status = "Sudah Divalidasi";
                $badge  = "success";
            }


            $dataRegistrations[] = [
                'no'                => ($key + 1),
                'company_name'      => $value['company_name'],
                'company_address'   => $value['company_address'],
                'company_phone'     => $value['company_phone'],
                'email'             => $value['email'],
                'name'              => $value['name'],
                'position'          => $value['position'],
                'crt_at'            => date("d M Y h:i:s", strtotime($value['crt_at'])),
                'status'            => $status,
                'badge'             => $badge,
            ];
        }

        $data = [
            'registrations' => $dataRegistrations,
            'pager'         => $this->registrationDB->pager,
        ];

        return $data;
    }

    public function registration_findAll()
    {
        $columns     = [
            'no',
            'company_name',
            'company_address',
            'company_phone',
            'email',
            'name',
            'position',
            'crt_at',
            'status',
            'badge',
        ];

        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT * FROM registration   limit $skip, $limit  ");
            $rows       = $query->getResultArray();

            foreach ($rows as $key => $value) {
                $badge  = "danger";

                if ($value['status'] != 'Open') {
                    $badge  = "success";
                }

                $data[] = [
                    'no'                => ($key + 1),
                    'registration_id'   => $value['registration_id'],
                    'company_name'      => $value['company_name'],
                    'company_address'   => $value['company_address'],
                    'company_phone'     => $value['company_phone'],
                    'email'             => $value['email'],
                    'name'              => $value['name'],
                    'position'          => $value['position'],
                    'crt_at'            => date("d M Y h:i:s", strtotime($value['crt_at'])),
                    'status'            => $value['status'],
                    'badge'             => $badge,
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM registration ");
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

    public function edit_registration()
    {
        // Get Data Registration
        $registration_id    = $this->request->getPost('registration_id');

        $data   = [
            'registration_id'    => $this->request->getPost('registration_id'),
            'company_name'       => $this->request->getPost('company_name'),
            'company_address'    => $this->request->getPost('company_address'),
            'company_email'      => $this->request->getPost('company_email'),
            'provinces_id'       => $this->request->getPost('provinces_id'),
            'regencies_id'       => $this->request->getPost('regencies_id'),
            'districts_id'       => $this->request->getPost('districts_id'),
            'villages_id'        => $this->request->getPost('villages_id'),
            'post_code'          => $this->request->getPost('post_code'),
            'company_phone'      => $this->request->getPost('company_phone'),
            'type_industry'      => $this->request->getPost('type_industry'),
            'user_name'          => $this->request->getPost('user_name'),
            'password'           => $this->request->getPost('password'),
            'name'               => $this->request->getPost('name'),
            'phone'              => $this->request->getPost('phone'),
            'email'              => $this->request->getPost('email'),
            'position'           => $this->request->getPost('position'),
            'status'             => "Open",
            'crt_by'             => 'System',
            'crt_at'             => date('Y-m-d H:m:s'),
        ];

        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }



        // Validate data registration
        $rules = [
            'company_name'     => 'required',
            'company_address'  => 'required',
            'company_email'    => 'required|valid_email',
            'provinces_id'     => 'required',
            'regencies_id'     => 'required',
            'districts_id'     => 'required',
            'post_code'        => 'required',
            'company_phone'    => 'required',
            'type_industry'    => 'required',
            'user_name'        => 'required',
            'name'             => 'required',
            'phone'            => 'required',
            'email'            => 'required|valid_email',
            'position'         => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->registrationDB->_update($data, $registration_id)) {
            // Success!
            return redirect()->back()->with('message', lang('Berhasil Merubah Data Pendaftaran'));
        } else {
            return redirect()->back()->withInput()->with('errors', "Gagal Merubah Data Pendaftaran");
        }
        // update registration



    }

    public function get_registration_detail()
    {
        if ($this->request->isAJAX()) {
            $registration_id = $this->request->getPost('registration_id');

            $result = $this->registrationDB->_findDetail($registration_id);

            return json_encode($result[0]);
        }
    }

    public function validateRegister()
    {
        if ($this->request->isAJAX()) {


            $registration_id  = $this->request->getPost('registration_id');
            $result = $this->registrationDB->_findByID($registration_id);
            $company = [];
            $user = [];

            foreach ($result as $row) {
                $company['company_id'] = generateHash();
                $company['company_name'] = $row['company_name'];
                $company['company_address'] = $row['company_address'];
                $company['company_email'] = $row['company_email'];
                $company['provinces_id'] = $row['provinces_id'];
                $company['regencies_id'] = $row['regencies_id'];
                $company['districts_id'] = $row['districts_id'];
                $company['villages_id'] = $row['villages_id'];
                $company['post_code'] = $row['post_code'];
                $company['company_phone'] = $row['company_phone'];
                $company['type_industry'] = $row['type_industry'];
                $company['registration_id'] = $registration_id;
                $company['crt_at'] = convertDateSQL();
                $user['name']   = $row['name'];
                $user['phone']   = $row['phone'];
                $user['username']   = $row['user_name'];
                $user['email']   = $row['email'];
                $user['password_hash']   =  \Myth\Auth\Password::hash($row['password']);
                $user['company_id']   =  $company['company_id'];
                $user['position']   = $row['position'];
                $user['status']   = 'Active';
                $user['level']   = 1;
                $user['active']   = 1;
                $user['created_at']   = convertDateSQL();
            }


            $db = \Config\Database::connect();
            try {
                $db->transBegin();
                $this->userDB->save($user);
                $data_usergroup = [
                    'group_id'  => 3,
                    'user_id'   => $this->userDB->getInsertID($user)
                ];
                $this->companyDB->save($company);
                $this->registrationDB->_confirm($registration_id);
            
                $this->UserGroupModel->_insert($data_usergroup);
                $sendEmail =  $this->email->sendEmail("", $user['email'], "Verification Account", "<b>Your accountregistration id :$registration_id now is active. thanks you for register to platform PELAPORAN DLH KABUPATEN BEKASI</b>");

                if (!$sendEmail) {
                    $db->transRollback();
                    return json_encode(['status' => 400, 'msg' => "fialed send email"]);
                }
                $db->transCommit();
                $db->close();
                return json_encode(['status' => 200, 'msg' => "success"]);
            } catch (\Exception $e) {
                $db->transRollback();
                return json_encode(['status' => 400, 'msg' => "fialed"]);
            }
        }
    }

    /*
        ||VALIDASI PENDAFTARAN WWTP ||
    */

    public function vwwtp_index()
    {
        $data = [
            // 'data'              => $this->registration_findAll(),
            'menu'              => 'validasi data',
            'submenu'           => 'validasi pendaftaran wwtp',
            'content'           => 'pages/admin_panel/validasi-wwtp/index'
        ];

        echo view('template/wrapper_v', $data);
    }
    public function get_validasi_wwtp()
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $columns     = [
                'no',
                'company_name',
                'name',
                'crt_at',
                'status',
                'badge',
            ];
            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT company.company_name,site_wwtp.siteWWTPID,site_wwtp.name,site_wwtp.crt_at,site_wwtp.status FROM site_wwtp JOIN company ON company.company_id = site_wwtp.companyID limit $skip, $limit  ");
            $rows       = $query->getResultArray();

            foreach ($rows as $key => $value) {
                $badge  = "danger";

                if ($value['status'] != 'Open') {
                    $badge  = "success";
                }

                $data[] = [
                    'siteWWTPID'        => $value['siteWWTPID'],
                    'company_name'      => $value['company_name'],
                    'name'              => $value['name'],
                    'crt_at'            => date("d M Y h:i:s", strtotime($value['crt_at'])),
                    'status'            => $value['status'],
                    'badge'             => $badge,
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM site_wwtp ");
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

    public function validateRegisterWWTP($id)
    {
        
        $update_status = $this->SiteWWTP->_validasi_wwtp($id);
        if($update_status > 0){
            $loggerID = $this->Logger->where('siteWWTPID',$id)->findColumn('loggerID');
            $detailLogger = $this->DetailLogger->_get_parameter($loggerID);

            // SETTING FIELDS TABLES
            $fields = [
                'daily_dataID'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => 255,
                ],
                'loggerID'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => 255,
                ],
            ];
            
            foreach($detailLogger as $row){
                $fields[$row['parameter']] =  [
                    'type'           => 'VARCHAR',
                    'constraint'     => 255,
                ];
            }
    
            
            $fields['typeReportID'] = [
                'type'           => 'INT',
            ];
            $fields['tgl_pelaporan'] = [
                'type'           => 'DATETIME',
                'null'           => true
            ];

            // CREATE TABLES DAILY_DATA_SITE
            $this->forge->addField($fields);
            $this->forge->addKey('daily_dataID', TRUE);
            $this->forge->createTable("daily_data_$id",TRUE);

            // CREATE TABLES LOG DAILY_DATA_SITE
            $fields['status'] = [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ];

            $daily_logID = ['daily_logID'=> [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ]];
            
            $fields = array_merge($fields,$daily_logID);
            $fields = $daily_logID + $fields;
            $this->forge->addField($fields);
            $this->forge->addKey('daily_logID', TRUE);
            $this->forge->createTable("daily_log_$id",TRUE);

            return json_encode(['msg'=>'success','status'=>200]);
        }
        else {
            return json_encode(['msg'=>'failed','status'=>400]);
        }
        
    }
}
