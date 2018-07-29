<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data=array(
			'page'=>'penjualan/datapenjualan',
			'link'=>'penjualan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'penjualan/formtambah',
			'link'=>'penjualan',
			'script'=>'script/penjualan',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('penjualan/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'penjualan/detailpenjualan',
			'link'=>'penjualan',
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}