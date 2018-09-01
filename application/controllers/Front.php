<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
	  $data=array(
	     'page'=>'front/beranda',
	     'link'=>'beranda'
      );
      $this->load->view('partials/front/wrapper',$data);
	}

	public function loginpelanggan(){
	  $data=array(
	     'page'=>'front/loginpelanggan',
	     'link'=>'loginpelanggan'
      );
      $this->load->view('partials/front/wrapper',$data);	
	}

	public function produk(){
	  $data=array(
	     'page'=>'front/produk',
	     'link'=>'produk',
	     'listbarang'=>$this->M_pos->list_data_all('barang'),
      );
      $this->load->view('partials/front/wrapper',$data);	
	}
}