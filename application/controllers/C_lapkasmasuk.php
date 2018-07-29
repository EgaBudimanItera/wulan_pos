<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapkasmasuk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lapkasmasuk/formsearch',
			'link'=>'lapkasmasuk'
		);
		$this->load->view('partials/back/wrapper',$data);
	}
}
