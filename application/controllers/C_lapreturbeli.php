<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapreturbeli extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'lapreturbeli/formsearch',
			'link'=>'lapreturbeli'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
