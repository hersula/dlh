<?php

namespace App\Models;

use CodeIgniter\Model;


class SiteWwtpModel extends Model
{
    protected $db;
    protected $DBGroup              = 'default';
    protected $table                = 'site_wwtp';
    protected $primaryKey           = 'siteWWTPID';
    protected $useAutoIncrement     = false;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;

    protected $allowedFields = [
        'siteWWTPID', 'companyID', 'typeReportID', 'name', 'address', 'debit', 'longitude_outlet', 'latitude_outlet', 'longitude_outfall', 'latitude_outfall', 'status', 'crt_by', 'crt_at', 
        'upd_by', 'upd_at', 'del_by', 'del_at', 'confirmation_by', 'confirmation_at'
    ];

    function _get_users()
    {
        $builder = $this->db->table('users');
        return $builder->where('company_id', user()->company_id)->get()->getResultArray();
        // return $builder->get()->getResultArray();
    }

    function _validasi_wwtp($id)
    {
   
        $this->db->transBegin();

        $querySiteWWTP = "SELECT siteWWTPID from site_wwtp WHERE siteWWTPID = ?";
        $findById = $this->db->query($querySiteWWTP,$id);
        $queryLogger = "SELECT loggerID from logger WHERE siteWWTPID = ?";
        $findByIdLogger = $this->db->query($queryLogger,$id);

        if($findById->getNumRows() > 0 && $findByIdLogger->getNumRows() > 0){
            try
            {
                $query_siteWWTP = $this->db->table('site_wwtp');
                $query_siteWWTP->set('status', 'Approve');
                $query_siteWWTP->set('confirmation_by', user_id());
                $query_siteWWTP->set('confirmation_at', convertDateSQL());
                $query_siteWWTP->where('siteWWTPID', $id);
                $query_siteWWTP->update();
                // LOGGER
                $query_logger = $this->db->table('logger');
                $query_logger->set('status', 'Approve');
                $query_logger->where('siteWWTPID',$id);
                $query_logger->update();

                if ($this->db->transStatus() === false) {
                    $this->db->transRollback();
                }
                else {
                    $this->db->transCommit();;
                    return $this->db->transStatus();
                }
                
            }
            catch(\Exception $e){
                $this->db->transRollback();
                return false;
            }
        }
        else {
            return false;
        }

       

        // if ($this->db->transStatus() === false) {
        //     $this->db->transRollback();
        // }
        // else {
        //     $this->db->transCommit();
        //     return $this->db->transStatus();
        // }
        
    }

    function _find_all_site()
    {
        $companyID = user()->company_id;
        $builder = $this->db->table('site_wwtp');

        $where = [
            'status'    => 'Approve'
        ];

        helper("auth");
        if(!in_groups("development") && !in_groups("superadmin")){
            $where["companyID"] = $companyID;
            
        }

        $builder->select('site_wwtp.*, company.company_name')->where($where);
        $builder->join('company', 'company.company_id = site_wwtp.companyID');
        $query = $builder->get();

        return $query->getResultArray();
    }
}
