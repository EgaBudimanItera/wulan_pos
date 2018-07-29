<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_returpembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data=array(
			'page'=>'returpembelian/datareturpembelian',
			'link'=>'returpembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function pilihpembelian(){
		$data=array(
			'page'=>'returpembelian/pilihpembelian',
			'link'=>'returpembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah($nofaktur){
		$data=array(
			'page'=>'returpembelian/formtambah',
			'link'=>'returpembelian',
			'script'=>'script/returpembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('returpembelian/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'returpembelian/detailreturpembelian',
			'link'=>'returpembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
