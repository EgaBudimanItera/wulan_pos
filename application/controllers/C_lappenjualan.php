<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lappenjualan/formsearch',
			'link'=>'lappenjualan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on(dtpjBrngId=brngId) join pelanggan on(pnjlPlgnId=plgnId) where  pnjlTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lappenjualan/lihatdata',
			'link'=>'lappenjualan',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
