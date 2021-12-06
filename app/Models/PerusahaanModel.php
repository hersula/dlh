<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'perusahaan';
    protected $primaryKey           = 'perusahaanID';
    protected $useAutoIncrement     = false;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;

    protected $allowedFields = [
        'perusahaanID', 'nama_perusahaan','alamat_perusahaan','email_perusahaan','provinsiID','kabkotID', 'kecamatanID', 'desaID', 'kode_pos', 'no_tlpn', 'jenis_industri',
        'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by','konfirmasi_at','konfirmasi_by'
    ];

    protected $validationRules = [
        'perusahaanID '             => 'required',
        'nama_perusahaan'           => 'required',
        'alamat_perusahaan'         => 'required',
        'email_perusahaan'          => 'required',
        'provinsiID'                => 'required',
        'kabkotID'                  => 'required',
        'kecamatanID'               => 'required',
        'desaID'                    => 'required',
        'kode_pos'                  => 'required',
        'no_tlpn'                   => 'required',
        'jenis_industri'            => 'required',
    ];

    
}
