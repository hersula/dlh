<?php

namespace App\Models;

use CodeIgniter\Model;


class SupportDocumentsModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'documents';
    protected $primaryKey           = 'supportDocumentsID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['supportDocumentsID', 'companyID', 'typeLetterID', 'asal_surat', 'no_ijin', 'tgl_ijin', 'instansi', 'lampiran', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];

    protected $validationRules = [
        'supportDocumentsID'        => 'required',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db      = \Config\Database::connect();
    }

    public function _insert_batch($data)
    {
        $table = $this->db->table('documents');
        $insert = $table->insertBatch($data);
        return $insert;
    }

    function _get_all_documents($siteWWTPID)
    {
        
        $builder = $this->db->table('documents');
        $builder->select('*')->where('site_document.siteWWTPID', $siteWWTPID);
        $builder->join('site_document', 'site_document.supportDocumentsID = documents.supportDocumentsID');
        $query = $builder->get();

        return $query->getResultArray();
    }

}
