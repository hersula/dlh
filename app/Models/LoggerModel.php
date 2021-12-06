<?php

namespace App\Models;

use CodeIgniter\Model;


class LoggerModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'logger';
    protected $primaryKey           = 'loggerID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['loggerID', 'siteWWTPID', 'nama_logger', 'status', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];

    protected $validationRules = [
        'loggerID'        => 'required',
    ];

    function _get_logger($siteWWTPID)
    {
        $builder = $this->db->table('site_wwtp');

        $where = [
            'site_wwtp.siteWWTPID' => $siteWWTPID,
        ];
        $builder->select('*')->where($where);
        $builder->join('logger', 'logger.siteWWTPID = site_wwtp.siteWWTPID');
        $query = $builder->get();

        return $query->getResultArray();
    }

}
