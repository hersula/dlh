<?php

namespace App\Models;

use CodeIgniter\Model;


class SiteIpalModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_ipal';
    protected $primaryKey           = 'ipalID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['ipalID', 'siteWWTPID', 'nama_ipal', 'sumber_ipal', 'kapasitas_ipal', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];
    
    protected $validationRules = [
        'ipalID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('site_ipal');
        $insert = $table->insertBatch($data);
        return $insert;
    }
}
