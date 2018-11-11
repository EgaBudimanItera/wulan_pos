<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'users/datausers',
			'link'=>'users',
			'list' => $this->M_pos->list_data_all('users'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'users/formtambah',
			'link'=>'users'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($userId){
		$data=array(
			'page'=>'users/formubah',
			'link'=>'users',
			'users' => $this->M_pos->ambil('userId',$userId,'users')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formreset($userId){
		$data=array(
			'page'=>'users/formreset',
			'link'=>'users',
			'users' => $this->M_pos->ambil('userId',$userId,'users')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_users(){
		$data = array(
			'userNama' => $this->input->post('userNama', true),
			'userPassword' => $this->input->post('userPassword', true),
			'userHakAkses' => $this->input->post('userHakAkses', true),
		);

		$simpan = $this->M_pos->simpan_data($data,'users');
		if($simpan){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
                redirect(c_users);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
                redirect(c_users/formtambah);
            }
	}

	public function ubah_users($userId){

		if (empty($this->input->post('userPassword', true))) {
			$data = array(
			'userNama' => $this->input->post('userNama', true),
			'userHakAkses' => $this->input->post('userHakAkses', true),
		);
		}else{

			$data = array(
			'userNama' => $this->input->post('userNama', true),
			'userPassword' => md5($this->input->post('userPassword', true)),
			'userHakAkses' => $this->input->post('userHakAkses', true),
		);
		}

		$ubah = $this->M_pos->update('userId',$userId,'users',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
                redirect(c_users);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
                redirect(c_users/formubah/$userId);
            }
		
	}

	public function reset_users($userId){

		if (empty($this->input->post('userPassword', true))) {
			$data = array(
			'userNama' => $this->input->post('userNama', true),
			'userHakAkses' => $this->input->post('userHakAkses', true),
		);
		}else{

			$data = array(
			'userNama' => $this->input->post('userNama', true),
			'userPassword' => md5($this->input->post('userPassword', true)),
			'userHakAkses' => $this->input->post('userHakAkses', true),
		);
		}

		$ubah = $this->M_pos->update('userId',$userId,'users',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
                redirect(base_url());
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
                redirect(base_url());
            }
		
	}

	public function hapus_users($userId){

		$hapus = $this->M_pos->hapus('userId',$userId,'users');

		if($hapus){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_users);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_users/datausers);
            }

	}

}
