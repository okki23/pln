<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_customer extends Parent_Model { 
  
 
    var $nama_tabel = 'customer';
    var $daftar_field = array('id','id_pelanggan','nama','alamat','telp','email','blok','id_daya');
    var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_daya(){
     
     $query = $this->db->get('daya')->result();
    
     $data = array();  
  
         foreach($query as $row)  
         {  
              $sub_array = array(); 
              $sub_array[] = $row->kapasitas_daya; 
              $sub_array[] = $row->abodemen; 
              $sub_array[] = $row->admin;  
              $sub_array[] = $row->base_kwh;  
              $sub_array[] = $row->id;   
 
              $data[] = $sub_array;   
         }  
        
     return $output = array("data"=>$data);
  }
 
  public function fetch_customer(){
 
     $this->db->select('customer.*,daya.kapasitas_daya as daya,daya.abodemen,daya.admin,daya.base_kwh,daya.kapasitas_daya');
     $this->db->from('customer');
     $this->db->join('daya', 'daya.id = customer.id_daya');
      
     $query = $this->db->get()->result();
      //echo $this->db->last_query();
       $data = array();  
     
           foreach($query as $row)  
           {  
                $sub_array = array();
               
                $sub_array[] = $row->id_pelanggan;
                $sub_array[] = $row->nama;
                $sub_array[] = $row->alamat;
                $sub_array[] = $row->email; 
                $sub_array[] = $row->telp;
                $sub_array[] = $row->blok;
                $sub_array[] = $row->daya;  
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
                                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $sub_array[] = $row->id;
                $sub_array[] = $row->abodemen; 
                $sub_array[] = $row->admin;  
                $sub_array[] = $row->base_kwh;  
                $data[] = $sub_array;  
            
           }  
          
       return $output = array("data"=>$data);
        
    }

 
 
}
