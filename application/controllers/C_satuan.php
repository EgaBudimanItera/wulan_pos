<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_satuan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'satuan/datasatuan',
			'link'=>'satuan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'satuan/formtambah',
			'link'=>'satuan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($stunId){
		$data=array(
			'page'=>'satuan/formubah',
			'link'=>'satuan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
