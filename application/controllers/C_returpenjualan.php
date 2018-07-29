<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_returpenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'returpenjualan/datareturpenjualan',
			'link'=>'returpenjualan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function pilihpenjualan(){
		$data=array(
			'page'=>'returpenjualan/pilihpenjualan',
			'link'=>'returpenjualan',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah($nofaktur){
		$data=array(
			'page'=>'returpenjualan/formtambah',
			'link'=>'returpenjualan',
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('returpenjualan/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'returpenjualan/detailreturpenjualan',
			'link'=>'returpenjualan',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
