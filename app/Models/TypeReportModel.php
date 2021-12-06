<?php

namespace App\Models;

use CodeIgniter\Model;


class TypeReportModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'type_report';
    protected $primaryKey           = 'typeReportID';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['typeReportID', 'name', 'total_report', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];

    protected $validationRules = [
        'typeReportID'        => 'required',
    ];

}
