<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class customer extends Parent_Controller {
 
  var $nama_tabel = 'customer';
  var $daftar_field = array('id','nama','alamat','telp','email','blok','id_daya');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_customer'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'customer/customer_view';
		$this->load->view('template_view',$data);		
   
	}
 	 

  	public function fetch_customer(){  
       $getdata = $this->m_customer->fetch_customer();
       echo json_encode($getdata);   
	}

	public function fetch_treatment(){  
		$getdata = $this->m_customer->fetch_treatment();
		echo json_encode($getdata);   
	}
	  
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$this->db->select('*,m_customer.id as id_customer');
		$this->db->from('m_customer');
		$this->db->join('m_treatment', 'm_treatment.id = m_customer.id_treatment');
		$this->db->join('m_treatment_detail', 'm_treatment_detail.id_treatment = m_treatment.id');
		$this->db->where('m_customer.id',$id);
		$query = $this->db->get()->row();
		   
		echo json_encode($query,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('m_customer');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){  
    	$data_form = $this->m_customer->array_from_post($this->daftar_field); 
    	$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
   		$simpan_data = $this->m_customer->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 
  
       


}
