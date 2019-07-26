<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Dashboard extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_dashboard');
 	}
 

	public function index(){ 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'dashboard/dashboard_view';
		$data['data_h1'] = '';
		
		$data['listbayar'] = $this->db->query("select sum(payment) as total from t_payment where status = 1")->row();
		$data['listhutang'] = $this->db->query("select sum(payment) as total from t_payment where status = 2")->row();
		$data['listplg'] = $this->db->query("select count(id) as total from customer")->row();
		 
		$data['listing'] = $this->db->query("select a.*,b.*,c.* from t_payment a
		left join customer b on b.id = a.id_customer
		left join daya c on c.id = b.id_daya
		where a.date_payment = '".date('Y-m-d')."' ")->result();
		$data['now'] = '';
		$this->load->view('template_view',$data);
	}
}
 