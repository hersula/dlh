<?php

namespace App\Models;

use CodeIgniter\Model;


class WaterSourcesModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'water_sources';
    protected $primaryKey           = 'sourcesID';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['sourcesID', 'name', 'jumlah_kordinat'];
    
    protected $validationRules = [
        'sourcesID'        => 'required',
    ];

}
