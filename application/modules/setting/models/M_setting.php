<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_setting extends Parent_Model { 
  
 
    var $nama_tabel = 'sistem';
	var $daftar_field = array('id','nama_apps','author');
	var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_setting(){
      
       $getdata = $this->db->get($this->nama_tabel)->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_apps;  
                $sub_array[] = $row->author;
             
                       
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  ';  
               
                  
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
  } 


      public function fetch_setting_parent(){
      
       $sql = "select a.*,b.nama_komp_biaya,c.nama_pelayanan,d.nama_satuan from m_setting a
              LEFT JOIN m_komp_biaya b on b.id = a.id_komp_biaya
              LEFT JOIN m_jenis_pelayanan c on c.id = a.id_pelayanan
              LEFT JOIN m_satuan d on d.id = a.id_satuan";
               
       $getdata = $this->db->query($sql)->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
              
                $sub_array[] = $row->nama_pelayanan;  
                $sub_array[] = $row->nama_komp_biaya;  
                $sub_array[] = $row->nama_setting;  
                $sub_array[] = $row->nama_satuan;  
                $sub_array[] = $row->id;  
                 
                
               
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }
   
  
   
 
}
