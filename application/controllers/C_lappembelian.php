<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'lappembelian/formsearch',
			'link'=>'lappembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
