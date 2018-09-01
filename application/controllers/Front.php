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

	public function authpelanggan(){
		$namauser=$this->input->post('namauser',true);
    	$password=md5($this->input->post('password',true));
    	$where=array(
          'plgnNamaUser'=>$namauser,
          'plgnPassword'=>$password,
    	);
    	$cek=$this->M_pos->cek_login_pelanggan($where)->num_rows();
    	

    	if($cek!=0){
      	$data_session = array(
          'Nama' => $this->M_pos->cek_login_pelanggan($where)->row()->plgnNama,
          'Hakakses'=> "pelanggan",
          'Id'=>$this->M_pos->cek_login_pelanggan($where)->row()->plgnId,
          'status' => "login",  
      	);
      
      	$this->session->set_userdata($data_session);
      		echo '<script>alert("Selamat Datang "'.$namauser.')</script>';
      		echo'<script>window.location.href="'.base_url().'";</script>';
    	}
    	else{
      		echo '<script>alert("Maaf, Nama User / Password Anda Salah")</script>';
      		echo'<script>window.location.href="'.base_url().'";</script>';
    	}
	}

	public function logout(){
		session_destroy();
        echo 'please wait..';
        echo'<script>window.location.href="'.base_url().'";</script>';
	}

	public function orderproduk(){
		$Id=$this->M_pos->cekidpelanggan();
		$query="SELECT * FROM orderpenjualan WHERE opnjPlgnId='$Id' ORDER BY opnjId DESC";
		$data=array(
		   'page'=>'front/orderproduk',
		   'link'=>'orderproduk',
		   'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/front/wrapper',$data);
	}

	public function cart(){
		$Id=$this->M_pos->cekidpelanggan();
		$query="SELECT * FROM detorderpenjualan_temp JOIN barang on dopjBrngId=brngId WHERE dopjCreatedBy='$Id' ORDER BY dopjBrngId DESC";
		$data=array(
		   'page'=>'front/cart',
		   'link'=>'cart',
		   'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/front/wrapper',$data);
	}
}