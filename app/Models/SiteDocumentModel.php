<?php

namespace App\Models;

use CodeIgniter\Model;


class SiteDocumentModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_document';
    protected $primaryKey           = 'siteDocumentID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['siteDocumentID', 'siteWWTPID', 'supportDocumentsID'];
    
    protected $validationRules = [
        'siteDocumentID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('site_document');
        $insert = $table->insertBatch($data);
        return $insert;
    }

    public function _get_documents()
    {
        $builder = $this->db->table('documents');
        $data = [
            'companyID' => user()->company_id,
            'asal_surat' => 'ijin',
        ];

        return $builder->where($data)->orderBy('crt_at', 'DESC')->get()->getResultArray();
    }

}
