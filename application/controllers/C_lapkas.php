<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapkas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lapkas/formsearch',
			'link'=>'lapkas'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
