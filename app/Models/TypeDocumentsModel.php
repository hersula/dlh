<?php

namespace App\Models;

use CodeIgniter\Model;


class TypeDocumentsModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'documents_type';
    protected $primaryKey           = 'typeLetterID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['typeLetterID', 'jenis_surat', 'name'];

    protected $validationRules = [
        'typeLetterID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

}
