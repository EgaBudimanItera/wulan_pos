<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayarpiutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data=array(
			'page'=>'bayarpiutang/databayarpiutang',
			'link'=>'bayarpiutang'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah1(){
		$data=array(
			'page'=>'bayarpiutang/formtambah1',
			'link'=>'bayarpiutang',
			// 'script'=>'script/bayarpiutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah2(){
		$data=array(
			'page'=>'bayarpiutang/formtambah2',
			'link'=>'bayarpiutang',
			'script'=>'script/bayarpiutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('bayarpiutang/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'bayarpiutang/detailbayarpiutang',
			'link'=>'bayarpiutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
