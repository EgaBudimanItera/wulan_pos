<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapstok extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
		$data=array(
			'page'=>'lapstok/formsearch',
			'link'=>'lapstok',
			'barang'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  $brngId=$this->input->post('brngId',true);
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * FROM stok join barang on(stokBrngId=brngId) where stokBrngId='$brngId' and stokTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lapstok/lihatdata',
			'link'=>'lapstok',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'brngId'=>$brngId,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($brngId,$dari,$hingga){

	}

}
