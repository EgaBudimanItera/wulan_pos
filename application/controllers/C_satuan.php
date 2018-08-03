<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_satuan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'satuan/datasatuan',
			'link'=>'satuan',
			'list' => $this->M_pos->list_data_all('satuan'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'satuan/formtambah',
			'link'=>'satuan'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($stunId){
		$data=array(
			'page'=>'satuan/formubah',
			'link'=>'satuan',
			'satuan' => $this->M_pos->ambil('stunId',$stunId,'satuan')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_satuan(){
		$data = array(
			'stunNama' => $this->input->post('stunNama', true),
			'stunSimbol' => $this->input->post('stunSimbol', true)
		);

		$simpan = $this->M_pos->simpan_data($data,'satuan');
		if($simpan){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
                redirect(c_satuan);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
                redirect(c_satuan/formtambah);
            }
	}

	public function ubah_satuan($stunId){

		$data = array(
			'stunNama' => $this->input->post('stunNama', true),
			'stunSimbol' => $this->input->post('stunSimbol', true)
		);

		$ubah = $this->M_pos->update('stunId',$stunId,'satuan',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
                redirect(c_satuan);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
                redirect(c_satuan/formubah/$stunId);
            }
		
	}

	public function hapus_satuan($stunId){

		$hapus = $this->M_pos->hapus('stunId',$stunId,'satuan');

		if($hapus){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_satuan);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_satuan/datasatuan);
            }

	}

}
