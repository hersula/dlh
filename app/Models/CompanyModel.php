<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'company';
    protected $primaryKey           = 'company_id';
    protected $useAutoIncrement     = false;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;

    protected $allowedFields = [
        'company_id','registration_id', 'company_name','company_address','company_email','provinces_id','regencies_id', 'districts_id', 'villages_id', 'post_code', 'company_phone', 'type_industry',
        'crt_at', 'crt_by', 'upd_at', 'upd_by', 'del_at', 'del_by'
    ];

    protected $validationRules = [
        'company_id '             => 'required',
        'registration_id '             => 'required',
        'company_name'           => 'required',
        'company_address'         => 'required',
        'company_email'          => 'required',
        'provinces_id'                => 'required',
        'regencies_id'                  => 'required',
        'districts_id'               => 'required',
        'villages_id'                    => 'required',
        'post_code'                  => 'required',
        'company_phone'                   => 'required',
        'type_industry'            => 'required',
    ];
}
