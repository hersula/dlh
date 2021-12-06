<?php

namespace App\Models;

use CodeIgniter\Model;


class RegistrationModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'registration';
    protected $primaryKey           = 'registration_id';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;

    protected $allowedFields = [
        'registration_id', 'company_name', 'company_address', 'company_email', 'provinces_id', 'regencies_id', 'districts_id', 'villages_id', 
        'post_code', 'company_phone', 'type_industry', 'user_name', 'password', 'name', 'phone', 'email', 'position', 'status', 'confirmation_by', 
        'confirmation_at', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'
    ];

    protected $validationRules = [
        'registration_id'   => 'required',
        'company_name'      => 'required',
        'company_address'   => 'required',
        'company_email'     => 'required|valid_email|is_unique[registration.company_email,registration_id,{registration_id}]',
        'provinces_id'      => 'required',
        'regencies_id'      => 'required',
        'districts_id'      => 'required',
        'post_code'         => 'required',
        'company_phone'     => 'required',
        'type_industry'     => 'required',
        'user_name'         => 'required',
        'password'          => 'required',
        'name'              => 'required',
        'phone'             => 'required',
        'email'             => 'required|valid_email|is_unique[registration.email,registration_id,{registration_id}]',
        'position'          => 'required',
        'status'            => 'required',
        'crt_by'            => 'required',
        'crt_at'            => 'required',
    ];

    public function __construct()
    {
        parent::__construct(); 
        $this->db =  \Config\Database::connect();
    }

    public function _update($data,$id)
    {
        $builder = $this->db->table('registration');
        $builder->set($data);
        $builder->where('registration_id', $id);
        return $builder->update();
    }

    public function _findDetail($id)
    {
        $query = "SELECT company_name,company_address,company_email,provinces_id,regencies_id,districts_id,villages_id,post_code,company_phone,type_industry,user_name,name,phone,email,position,status FROM registration WHERE registration_id =?";
        return $this->db->query($query, [$id])->getResultArray();
    }

    public function _findByID($id)
    {
        $query = "SELECT company_name,company_address,company_email,provinces_id,regencies_id,districts_id,villages_id,post_code,company_phone,type_industry,user_name,name,password,phone,email,position,status FROM registration WHERE registration_id =?";
        return $this->db->query($query, [$id])->getResultArray();
    }

    public function _confirm($id)
    {
        $builder = $this->db->table('registration');
        $builder->set(['status'=>'Accept','confirmation_by'=>user_id(),'confirmation_at'=>date('Y-m-d h:m:s')]);
        $builder->where('registration_id', $id);
        return $builder->update();
    }
}
