<?php

namespace App\Models;

use CodeIgniter\Model;


class UserSiteModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_user';
    protected $primaryKey           = 'siteUsersID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['siteUsersID', 'siteWWTPID', 'usersID', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];

    protected $validationRules = [
        'siteUsersID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('site_user');
        $insert = $table->insertBatch($data);
        return $insert;
    }

    function _get_site_user($siteWWTPID)
    {
        
        $builder = $this->db->table('site_user');
        $builder->select('site_user.*, users.name, users.email')->where('siteWWTPID', $siteWWTPID);
        $builder->join('users', 'users.id = site_user.usersID');
        $query = $builder->get();

        return $query->getResultArray();
    }

}
