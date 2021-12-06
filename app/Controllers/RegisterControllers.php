<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use App\Controllers\Wilayah;
use App\Models\CompanyModel;
use App\Models\RegistrationModel;



class RegisterControllers extends BaseController
{
    protected $auth;
    protected $config;
    protected $session;

    protected $perusahaanDB;
    protected $registrationDB;

    public function __construct()
    {
        
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');

        // $this->perusahaanDB = new PerusahaanModel();
        $this->registrationDB = new RegistrationModel();
        
    }

    public function index()
    {

        // check if already logged in.
        if ($this->auth->check()) {
            return redirect()->back();
        }

        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }


        $provinsi = new Wilayah;
        $data = [
            'config' => $this->config,
            'provinsi'  => $provinsi->provinsi_findAll()
        ];

        return $this->_render($this->config->views['register'], $data);
    }

    /**
     * Attempt to register a new user.
     */
    public function attemptRegister2()
    {

        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
        $email_perusahaan = $this->request->getPost('email_perusahaan');
        $provinsi = $this->request->getPost('provinsi');
        $kabkot = $this->request->getPost('kabkot');
        $kecamatan = $this->request->getPost('kecamatan');
        $desa = $this->request->getPost('desa');
        $kodePos = $this->request->getPost('kodePos');
        $noTlpn = $this->request->getPost('noTlpn');
        $jenisIndustri = $this->request->getPost('jenisIndustri');

        // AKUN USER ADMIN
        $nama_pengguna = $this->request->getPost('nama_pengguna');
        $jabatan = $this->request->getPost('jabatan');
        $email = $this->request->getPost('email');
        $no_tlpn = $this->request->getPost('no_tlpn');
        $password = $this->request->getPost('password');
        $penanggung_jawab = $this->request->getPost('penanggung_jawab');

        $data_perusahaan = [
            "perusahaanID" => generateHash(),
            "nama_perusahaan" => $nama_perusahaan,
            "alamat_perusahaan" => $alamat_perusahaan,
            "email_perusahaan" => $email_perusahaan,
            "provinsiID" => $provinsi,
            "kabkotID" => $kabkot,
            "kecamatanID" => $kecamatan,
            "desaID" => $desa,
            "kode_pos" => $kodePos,
            "no_tlpn" => $noTlpn,
            "jenis_industri" => $jenisIndustri,
            "created_at" => date('Y-m-d H:m:s'),
        ];
       
       
        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = [
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // VALIDASI DATA PERUSAHAAN
        $rules = [
            'nama_perusahaan'     => 'required',
            'alamat_perusahaan'        => 'required',
            'email_perusahaan'        => 'required',
            'provinsi'        => 'required',
            'kabkot'        => 'required',
            'kecamatan'        => 'required',
            'desa'        => 'required',
            'kodePos'        => 'required',
            'noTlpn'        => 'required',
            'jenisIndustri'        => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // VALIDASI DATA USER
        $rules = [
            'nama_pengguna'   => 'required',
            'jabatan'        => 'required',
            'no_tlpn'        => 'required',
            'penanggung_jawab'        => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();


        // CUSTUME USER FIELD VALUE

        $user->nama_lengkap = $nama_pengguna;
        $user->penanggung_jawab = $penanggung_jawab;
        $user->jabatan = $jabatan;
        $user->no_tlpn = $no_tlpn;


        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }
        // if (!$users->save($user)) {
        //     return redirect()->back()->withInput()->with('errors', $users->errors());
        // }
        
        $users->db->transBegin();
        try {
			$users->save($user);
            $this->perusahaanDB->save($data_perusahaan);
			$users->db->transCommit();
		} catch (\Exception $e) {
			$users->db->transRollback();
            return redirect()->back()->withInput()->with('errors', $users->errors());
		}
        
        // INSERT PERUSAHAAN
        $this->perusahaanDB->save($data_perusahaan);

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->route('login')->with('message', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    }

    public function attemptRegister()
    {
        // Get Data Registration
        $data   = [
            'registration_id'    => generateHash(),
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

        $registration = model(RegistrationModel::class);

        // Validate data registration
        $rules = [
            'company_name'     => 'required',
            'company_address'  => 'required',
            'company_email'    => 'required|valid_email|is_unique[registration.company_email]',
            'provinces_id'     => 'required',
            'regencies_id'     => 'required',
            'districts_id'     => 'required',
            'post_code'        => 'required',
            'company_phone'    => 'required',
            'type_industry'    => 'required',
            'user_name'        => 'required',
            'password'         => 'required|strong_password',
            'pass_confirm'     => 'required|matches[password]',
            'name'             => 'required',
            'phone'            => 'required',
            'email'            => 'required|valid_email|is_unique[registration.email]',
            'position'         => 'required',
        ];
        

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Insert registration
        $this -> registrationDB -> save($data);
       
        // Success!
        return redirect()->route('login')->with('message', lang('Auth.registerSuccess'));
    }



    protected function _render(string $view, array $data = [])
    {
        return view($view, $data);
    }
    
    
}
