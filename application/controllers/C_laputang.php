<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laputang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM supplier";
		$data=array(
			'page'=>'laputang/formsearch',
			'link'=>'laputang',
			'supplier'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  $splrId=$this->input->post('splrId',true);
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * FROM hutang where htngSplrId='$splrId' and htngTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'laputang/lihatdata',
			'link'=>'laputang',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'splrId'=>$splrId,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
