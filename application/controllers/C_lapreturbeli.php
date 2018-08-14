<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapreturbeli extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lapreturbeli/formsearch',
			'link'=>'lapreturbeli'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * from detreturpembelian join returpembelian on(drpbRtpbId=rtpbId) join barang on(drpbBrngId=brngId) join pembelian on(rtpbPmblId=pmblId) join supplier on(pmblSplrId=splrId)  where  rtpbTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lapreturbeli/lihatdata',
			'link'=>'lapreturbeli',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
