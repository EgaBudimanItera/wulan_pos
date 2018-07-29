<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapstok extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'lapstok/formsearch',
			'link'=>'lapstok'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
