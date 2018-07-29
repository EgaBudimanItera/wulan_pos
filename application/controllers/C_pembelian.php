<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'pembelian/datapembelian',
			'link'=>'pembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'pembelian/formtambah',
			'link'=>'pembelian',
			'script'=>'script/pembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('pembelian/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'pembelian/detailpembelian',
			'link'=>'pembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
