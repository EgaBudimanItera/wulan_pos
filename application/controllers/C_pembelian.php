<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
			'link'=>'pembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
