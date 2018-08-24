<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapkas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lapkas/formsearch',
			'link'=>'lapkas'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * from cash where  cashTanggal BETWEEN '$daritanggal' and '$hinggatanggal' ORDER BY cashId asc";
	  $query2="SELECT * FROM akun where noakun='1110'";
	  $data=array(
			'page'=>'lapkas/lihatdata',
			'link'=>'lapkas',
			'list'=>$this->M_pos->kueri($query)->result(),
			'kas'=>$this->M_pos->kueri($query2)->row()->saldo,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($daritanggal,$hinggatanggal){

		$query="SELECT * from cash where  cashTanggal BETWEEN '$daritanggal' and '$hinggatanggal' ORDER BY cashId asc";
	  	$query2="SELECT * FROM akun where noakun='1110'";
	  	$data=array(
			'list'=>$this->M_pos->kueri($query)->result(),
			'kas'=>$this->M_pos->kueri($query2)->row()->saldo,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

		$this->load->view('lapkas/cetak',$data);

	}
}
