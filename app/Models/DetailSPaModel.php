<?php

namespace App\Models;

use CodeIgniter\Model;


class DetailSPaModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_detail_spa';
    protected $primaryKey           = 'detailSpaID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['detailSpaID', 'siteWWTPID', 'debit_spa', 'kordinat_spa', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];
    
    protected $validationRules = [
        'detailSpaID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('site_detail_spa');
        $insert = $table->insertBatch($data);
        return $insert;
    }

}
