<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data=array(
			'page'=>'pelanggan/datapelanggan',
			'link'=>'pelanggan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'pelanggan/formtambah',
			'link'=>'pelanggan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($plgnId){
		$data=array(
			'page'=>'pelanggan/formubah',
			'link'=>'pelanggan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
