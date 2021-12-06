<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythUserModel;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;

class UserModel extends MythUserModel
{
    protected $db;
    protected $allowedFields = [
        'email', 'username', 'level', 'position', 'phone', 'name', 'password_hash','company_id', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];

    protected $validationRules = [
        'email'                 => 'required|valid_email|is_unique[users.email,id,{id}]',
        'name'                  => 'required',
        'level'                 => 'required',
        'position'              => 'required',
        'phone'                 => 'required',
        'password_hash'         => 'required',
        'company_id'            => 'required',
    ];

    public function __construct()
    {
        parent::__construct(); 
        $this->db =  \Config\Database::connect();
    }


}
