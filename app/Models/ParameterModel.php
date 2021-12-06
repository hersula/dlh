<?php

namespace App\Models;

use CodeIgniter\Model;


class ParameterModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'master_parameter';
    protected $primaryKey           = 'parameterID';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['parameterID', 'parameter', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];
    
    protected $validationRules = [
        'parameterID'        => 'required',
    ];

}
