<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayarutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'bayarutang/databayarutang',
			'link'=>'bayarutang'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah1(){
		$data=array(
			'page'=>'bayarutang/formtambah1',
			'link'=>'bayarutang',
			// 'script'=>'script/bayarutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah2(){
		$data=array(
			'page'=>'bayarutang/formtambah2',
			'link'=>'bayarutang',
			'script'=>'script/bayarutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('bayarutang/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'bayarutang/detailbayarutang',
			'link'=>'bayarutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
