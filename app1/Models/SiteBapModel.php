<?php

namespace App\Models;

use CodeIgniter\Model;


class SiteBapModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_bap';
    protected $primaryKey           = 'bapID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['bapID', 'siteWWTPID', 'badan_jenis_air', 'nama_bja', 'upstream', 'downstream', 'crt_by', 'crt_at', 'upd_by', 'upd_at', 'del_by', 'del_at'];
    
    protected $validationRules = [
        'bapID'        => 'required',
    ];

    function _get_bap($siteWWTPID)
    {
        
        $builder = $this->db->table('site_bap');
        $builder->select('site_bap.*, water_sources.name as lokasi_bap, water_sources.jumlah_kordinat as kordinat_bap')->where('siteWWTPID', $siteWWTPID);
        $builder->join('water_sources', 'water_sources.sourcesID = site_bap.badan_jenis_air');
        $query = $builder->get();

        return $query->getResultArray();
    } 
}
