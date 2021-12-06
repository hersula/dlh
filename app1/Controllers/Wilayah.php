<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProvinsiModel as ProvinsiDB;
use App\Models\KabkotModel as KabkotDB;
use App\Models\KecamatanModel as KecamatanDB;
use App\Models\DesaModel as DesaDB;

class Wilayah extends BaseController
{
    public function index()
    {
        //
    }

    public function provinsi_findAll()
    {
        $pronvinsiDB = new ProvinsiDB;
        return $pronvinsiDB->findAll();
    }
    public function kabkot_findById($id)
    {
        $kabkotDB = new KabkotDB;
        return json_encode($kabkotDB->where('province_id', $id)->findAll());
    }
    public function kecamatan_findById($id)
    {
        $kecamatanDB = new KecamatanDB;
        return json_encode($kecamatanDB->where('regency_id', $id)->findAll());
    }
    public function desa_findById($id)
    {
        $desaDB = new DesaDB;
        return json_encode($desaDB->where('district_id', $id)->findAll());
    }
}
