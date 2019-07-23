<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_payment extends Parent_Model { 
  
 
    var $nama_tabel = 't_payment';
    var $daftar_field = array('id','id_customer','last_use_kwh','current_use_kwh','used_kwh','payment','date_payment');
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
 
  public function fetch_payment(){
 
     $query = $this->db->query("select a.*,b.blok,b.nama,c.kapasitas_daya,c.admin,c.abodemen,c.base_kwh from t_payment a
     left join customer b on b.id = a.id_customer
     left join daya c on c.id = b.id_daya")->result(); 
   
       $data = array();  
     
           foreach($query as $row)  
           {  
                $sub_array = array();
               
                $sub_array[] = $row->nama;
                $sub_array[] = $row->blok;
                $sub_array[] = $row->kapasitas_daya; 
                $sub_array[] = $row->last_use_kwh;
                $sub_array[] = $row->current_use_kwh;
                $sub_array[] = $row->used_kwh;
                $sub_array[] = "Rp. ".number_format($row->payment);  
                $sub_array[] = '<a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                
                $data[] = $sub_array;  
            
           }  
          
       return $output = array("data"=>$data);
        
    }

 
 
}
