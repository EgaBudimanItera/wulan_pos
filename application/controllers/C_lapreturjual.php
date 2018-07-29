<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapreturjual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'lapreturjual/formsearch',
			'link'=>'lapreturjual'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
