<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');
 
class report extends Parent_Controller {
 
    var $nama_tabel = 't_payment';
    var $daftar_field = array('id','id_customer','last_use_kwh','current_use_kwh','used_kwh','report','date_report','status','due_date');
    var $primary_key = 'id';
  
 	public function __construct(){
		 
 		parent::__construct();
		 $this->load->model('m_report'); 
		 $this->load->library("pdf");
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report/report_view';
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
		$data = $this->db->query("select * from t_payment where id_customer = '".$id."' order by id desc");
		if($data->num_rows() > 0){
			$res = $data->row();
		}else{
		  
			$res = array('last_use_kwh'=>0,'current_use_kwh'=>0,'date_report'=>'','due_date'=>'');
		}
 
		echo json_encode($res,TRUE);
	}


	public function print_invoice(){
		$id = $this->uri->segment(3);
		$sql = $this->db->query("select a.*,b.*,c.* from t_payment a
		left join customer b on b.id = a.id_customer 
		left join daya c on c.id = b.id_daya
		where a.id = '".$id."' ")->row();

		$this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(true, 'aku', 'kau');
        $this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
        $this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // add a page
        $this->pdf->AddPage("L", "A5");
        // set font
		$this->pdf->SetFont("helvetica", "", 9);
		$data['list'] = $sql;
        $html = $this->load->view('report/report_invoice', $data, true);

        $this->pdf->writeHTML($html, true, false, true, false, "");
        ob_end_clean();
        $this->pdf->Output("Employee Information.pdf", "I");
        //$this->pdf->Output(base_url('store_files/').'/'.$no_order.'pdf', 'I')
	}
	  
	public function setreport(){
		$id = $this->uri->segment(3);  
		$arr = array('status'=>1,'date_report'=>date('Y-m-d'));
    	$update = $this->db->set($arr)->where('id',$id)->update('t_payment');
    	 
    	if($update){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}

  	public function fetch_report_tagihan(){  
       $getdata = $this->m_report->fetch_report_tagihan();
       echo json_encode($getdata);   
	}

	public function fetch_report_pendapatan(){  
		$getdata = $this->m_report->fetch_report_pendapatan();
		echo json_encode($getdata);   
	 }

	public function says(){
		$ipay = $this->uri->segment(3);
		echo "Terbilang : ".kekata($ipay)." rupiah";
	}

	public function fetch_daya(){  
		$getdata = $this->m_report->fetch_daya();
		echo json_encode($getdata);   
	}
	  
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$this->db->select('*,daya.id as iddaya, daya.kapasitas_daya as daya');
		$this->db->from('report');
		$this->db->join('daya', 'daya.id = report.id_daya');
		 
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
    	$data_form = $this->m_report->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
		$data_form['due_date'] = date('Y-m-d');
		$data_form['status'] = 2;
   		$simpan_data = $this->m_report->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 
  
       


}
