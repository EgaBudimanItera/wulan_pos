<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$this->load->view('admin/formlogin');
	}

	public function loginadmin(){
    $namauser=$this->input->post('userNama',true);
    $password=md5($this->input->post('userPassword',true));
    $where=array(
          'userNama'=>$namauser,
          'userPassword'=>$password,
    );
    $cek=$this->M_pos->cek_login($where)->num_rows(); 
    if($cek!=0){
      $data_session = array(
          'userNama' => $namauser,
          'userHakakses'=>$this->M_pos->cek_login($where)->row()->userHakakses,
          'userId'=>$this->M_pos->cek_login($where)->row()->userId,
          'status' => "login",  
      );

      $this->session->set_userdata($data_session);
      echo '<script>alert("Selamat Datang "'.$namauser.')</script>';
      echo'<script>window.location.href="'.base_url().'c_dashboard";</script>';
    }
    else{
      echo '<script>alert("Maaf, Nama User / Password Anda Salah")</script>';
      echo'<script>window.location.href="'.base_url().'c_admin";</script>';
    }
  }
}