<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_customer extends Parent_Model { 
  
 
    var $nama_tabel = 'customer';
    var $daftar_field = array('id','nama','alamat','telp','email','blok','id_daya');
    var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_treatment(){
     $this->db->select('*,m_treatment.id as id_treatment,m_treatment_detail.id as id_treatment_detail');
     $this->db->from('m_treatment');
     $this->db->join('m_treatment_detail', 'm_treatment_detail.id_treatment = m_treatment.id');
     $query = $this->db->get()->result();
    
     $data = array();  
  
         foreach($query as $row)  
         {  
              $sub_array = array(); 
              $sub_array[] = $row->nama_treatment; 
              $sub_array[] = $row->child_treatment; 
              $sub_array[] = $row->detail_treatment;  
              $sub_array[] = $row->id_treatment;   
              $sub_array[] = $row->id_treatment_detail;    
              $data[] = $sub_array;   
         }  
        
     return $output = array("data"=>$data);
  }
 
  public function fetch_customer(){
     $this->db->select('*,m_customer.id as id_customer');
     $this->db->from('m_customer');
     $this->db->join('m_treatment', 'm_treatment.id = m_customer.id_treatment');
     $this->db->join('m_treatment_detail', 'm_treatment_detail.id_treatment = m_treatment.id');
     $query = $this->db->get()->result();
      
       $data = array();  
       $no = 1;
           foreach($query as $row)  
           {  
                $sub_array = array();
                $sub_array[] = $no;
                $sub_array[] = $row->nama;
                $sub_array[] = $row->telp;
                $sub_array[] = $row->jam_operasional; 
                $sub_array[] = '<a href="javascript:void(0)" id="delete" class="btn btn-info btn-xs waves-effect" onclick="Detail_Data('.$row->id_customer.');" > <i class="material-icons">aspect_ratio</i> Detail </a> &nbsp; 
                                <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id_customer.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id_customer.');" > <i class="material-icons">delete</i> Hapus </a>';  
                
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }

 
 
}