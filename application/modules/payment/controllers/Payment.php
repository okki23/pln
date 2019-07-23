<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');
 
class payment extends Parent_Controller {
 
  var $nama_tabel = 't_payment';
  var $daftar_field = array('id','id_customer','last_use_kwh','current_use_kwh','used_kwh','payment','date_payment');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_payment'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'payment/payment_view';
		$this->load->view('template_view',$data);		
   
	}

	public function fetch_daya_cust(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("select a.*,b.abodemen,b.admin,b.base_kwh,b.kapasitas_daya from customer a
		left join daya b on b.id = a.id_daya where a.id = '".$id."' ")->row(); 
		echo "Kapasitas Daya : ".$data->kapasitas_daya." Abodemen : ".$data->admin." Base KWH : ".$data->base_kwh." "; 
	}

	public function last_payment(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("select * from t_payment where id_customer = '".$id."' order by id desc")->row();
		 
		echo json_encode($data,TRUE);
	}
 	 

  	public function fetch_payment(){  
       $getdata = $this->m_payment->fetch_payment();
       echo json_encode($getdata);   
	}

	public function says(){
		$ipay = $this->uri->segment(3);
		echo "Terbilang : ".kekata($ipay)." rupiah";
	}

	public function fetch_daya(){  
		$getdata = $this->m_payment->fetch_daya();
		echo json_encode($getdata);   
	}
	  
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$this->db->select('*,daya.id as iddaya, daya.kapasitas_daya as daya');
		$this->db->from('payment');
		$this->db->join('daya', 'daya.id = payment.id_daya');
		 
		$query = $this->db->get()->row();
		   
		echo json_encode($query,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('t_payment');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){  
    	$data_form = $this->m_payment->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
		$data_form['date_payment'] = date('Y-m-d');
   		$simpan_data = $this->m_payment->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 
  
       


}
