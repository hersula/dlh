<?php

namespace App\Controllers;

use App\Models\SiteWwtpModel as Site;

class Data_user extends BaseController
{
    public function index()
    {
        $data = [
            'menu' => 'data user',
            'submenu' => 'data user',
            'content'   => 'pages/admin_panel/data_user_v'
        ];
        echo view('template/wrapper_v',$data);
    }
    
    public function edit_wwtp($id)
    {
        $data = [
            'menu' => 'data user',
            'submenu' => 'data user',
            'content'   => 'pages/admin_panel/edit_user_wwtp_v'
        ];
        echo view('template/wrapper_v',$data);
    }

    public function get_datatable_data_user()
    {
        $columns     = [
            'companyID',
            'companyName',
            'companyAddress',
            'companyEmail',
            'type_industry',
            'crt_at',
        ];
        
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();

            $data       = array();
            $orderBy    = $columns[$this->request->getPost('order[0][column]')];
            $skip       = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $query      = $db->query("SELECT company.company_id,company.company_name,company.company_address,company.company_email,company.type_industry, registration.crt_at FROM company JOIN registration ON registration.registration_id = company.registration_id limit $skip, $limit");
            $rows       = $query->getResultArray();
            foreach ($rows as $key => $value) {
            
                $data[] = [
                   
                    'companyID'  => $value['company_id'],
                    'companyName'  => $value['company_name'],
                    'companyAddress'      => $value['company_address'],
                    'companyEmail' => $value['company_email'],
                    'type_industry' => $value['type_industry'],
                    'crt_at' => $value['crt_at'],
                ];
            }

            $query  = $db->query("SELECT count(*) as jml FROM company");
            $count  = $query->getRowArray();

            return json_encode([
                'draw'              => $this->request->getPost('draw'),
                'recordsTotal'      => count($data),
                'recordsFiltered'   => $count['jml'],
                'data'              => $data,
            ]);
            $db->close();
        }
    }

    public function get_detailcompany()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getPost('company_id');

        $query      = $db->query("SELECT company.company_id,company.company_name,company.company_address,company.company_email,company.company_phone,company.type_industry,company.post_code,provinces.name as provinces_name,provinces.id as provinces_id, regencies.id as regencies_id, regencies.name as regencies_name, districts.id as districts_id,districts.name as districts_name,villages.id AS villages_id, villages.name as villages_name FROM company JOIN provinces ON provinces.id = company.provinces_id JOIN regencies ON regencies.id = company.regencies_id JOIN districts ON districts.id = company.districts_id JOIN villages ON villages.id = company.villages_id  WHERE company_id = '$id'");

        $rows       = $query->getResultArray();

        $query      = $db->query("SELECT site_wwtp.name as site_name ,site_wwtp.siteWWTPID as site_id from site_wwtp WHERE companyID='$id'");
       

        $site_wwtp = $query->getResultArray();
        $data = [
            'company_detail'   => $rows,
            'site_wwtp'         => $site_wwtp
        ];
        return json_encode($data);
    }

    public function get_site_wwtp_user(){
        $db = \Config\Database::connect();
        $id = $this->request->getPost('wwtp_id');

        $query      = $db->query("SELECT site_wwtp.name as name_wwtp,site_wwtp.address as site_address,site_wwtp.longitude_outlet,site_wwtp.latitude_outlet,site_wwtp.longitude_outfall,site_wwtp.latitude_outfall,users.email,users.position,users.phone,users.name,users.level from site_user JOIN site_wwtp ON site_wwtp.siteWWTPID = site_user.siteWWTPID JOIN users ON users.id = site_user.usersID WHERE site_wwtp.siteWWTPID ='$id' ");
        $rows       = $query->getResultArray();

        return json_encode($rows);
    }
}
