<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappiutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM pelanggan";
		$data=array(
			'page'=>'lappiutang/formsearch',
			'link'=>'lappiutang',
			'pelanggan'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  $plgnId=$this->input->post('plgnId',true);
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * FROM piutang where ptngPlgnId='$plgnId' and ptngTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lappiutang/lihatdata',
			'link'=>'lappiutang',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'plgnId'=>$plgnId,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
