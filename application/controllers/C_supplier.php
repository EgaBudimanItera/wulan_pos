<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'supplier/datasupplier',
			'link'=>'supplier'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'supplier/formtambah',
			'link'=>'supplier'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($splrId){
		$data=array(
			'page'=>'supplier/formubah',
			'link'=>'supplier'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
