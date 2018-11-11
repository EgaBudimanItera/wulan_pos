<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$this->load->view('admin/formlogin');
	}

	public function loginadmin(){
    $namauser=$this->input->post('userNama',true);
    $password=$this->input->post('userPassword',true);
    $where=array(
          'userNama'=>$namauser,
          'userPassword'=>$password,
    );
    $cek=$this->M_pos->cek_login($where)->num_rows();
    
    if($cek!=0){
      $data_session = array(
          'userNama' => $namauser,
          'userHakakses'=>$this->M_pos->cek_login($where)->row()->userHakAkses,
          'userId'=>$this->M_pos->cek_login($where)->row()->userId,
          'status' => "login",  
      );
      // var_dump($data_session);
      // die(); 
      $this->session->set_userdata($data_session);
      echo '<script>alert("Selamat Datang "'.$namauser.')</script>';
      echo'<script>window.location.href="'.base_url().'c_dashboard";</script>';
    }
    else{
      echo '<script>alert("Maaf, Nama User / Password Anda Salah")</script>';
      echo'<script>window.location.href="'.base_url().'admin";</script>';
    }
  }

  public function logout(){
        session_destroy();
        echo 'please wait..';
        echo'<script>window.location.href="'.base_url().'";</script>';
  }
  
}