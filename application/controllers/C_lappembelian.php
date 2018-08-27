<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lappembelian/formsearch',
			'link'=>'lappembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	 
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lappembelian/lihatdata',
			'link'=>'lappembelian',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($dari,$hingga){
		$daritanggal=$dari;
	  	$hinggatanggal=$hingga;
	  	$query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  	$data=array(
			
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

		$this->load->view('lappembelian/cetak',$data);
	}
}
