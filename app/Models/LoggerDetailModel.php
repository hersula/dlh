<?php

namespace App\Models;

use CodeIgniter\Model;


class LoggerDetailModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'logger_detail';
    protected $primaryKey           = 'detailLoggerID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['detailLoggerID', 'loggerID', 'parameterID', 'parameter', 'parameter_asal', 'min', 'max', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];

    protected $validationRules = [
        'detailLoggerID'        => 'required',
    ];


    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('logger_detail');
        $insert = $table->insertBatch($data);
        return $insert;
    }

    function _get_parameter($loggerID, $parameter_asal, $data_harian)
    {   
        $builder = $this->db->table('logger_detail');

        $where = [
            'logger_detail.loggerID' => $loggerID,
            'parameter_asal' => $parameter_asal,
            'master_parameter.harian >=' => $data_harian,
        ];
        $builder->select('logger_detail.parameter')->where($where);
        $builder->join('master_parameter', 'master_parameter.parameterID = logger_detail.parameterID');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
