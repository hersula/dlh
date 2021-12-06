<?php

namespace App\Models;

use CodeIgniter\Model;


class UserGroupModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'auth_groups_users';
    protected $primaryKey           = false;
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['group_id', 'user_id'];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert($data)
    {
        $table = $this->db->table('auth_groups_users');
        $insert = $table->insert($data);
        return $insert;
    }
}
