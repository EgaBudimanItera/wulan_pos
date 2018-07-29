<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'barang/databarang',
			'link'=>'barang'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'barang/formtambah',
			'link'=>'barang'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($brngId){
		$data=array(
			'page'=>'barang/formubah',
			'link'=>'barang'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
