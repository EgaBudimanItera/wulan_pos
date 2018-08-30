<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'pelanggan/datapelanggan',
			'link'=>'pelanggan',
			'list' => $this->M_pos->list_data_all('pelanggan'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'pelanggan/formtambah',
			'link'=>'pelanggan',
			'plgnKode'=>$this->M_pos->kode_pelanggan(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($plgnId){
		$data=array(
			'page'=>'pelanggan/formubah',
			'link'=>'pelanggan',
			'pelanggan' => $this->M_pos->ambil('plgnId',$plgnId,'pelanggan')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_pelanggan(){
		$data = array(
			'plgnKode' => $this->M_pos->kode_pelanggan(),
			'plgnNama' => $this->input->post('plgnNama', true),
			'plgnNamaKontak' => $this->input->post('plgnNamaKontak', true),
			'plgnTelp1' => $this->input->post('plgnTelp1', true),
			'plgnTelp2' => $this->input->post('plgnTelp2', true),
			'plgnAlamat' => $this->input->post('plgnAlamat', true),
			'plgnPiutang' => $this->input->post('plgnPiutang', true),
			'plgnNik' => $this->input->post('plgnNik', true),
			'plgnNamaUser' => $this->input->post('plgnNamaUser', true),
			'plgnEmail' => $this->input->post('plgnEmail', true),
			'plgnPassword'=>'123'
		);

		$simpan = $this->M_pos->simpan_data($data,'pelanggan');
		if($simpan){
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
                redirect(c_pelanggan);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
                redirect(c_pelanggan/formtambah);
            }
	}

	public function ubah_pelanggan($plgnId){

		$data = array(
			'plgnKode' => $this->input->post('plgnKode', true),
			'plgnNama' => $this->input->post('plgnNama', true),
			'plgnNamaKontak' => $this->input->post('plgnNamaKontak', true),
			'plgnTelp1' => $this->input->post('plgnTelp1', true),
			'plgnTelp2' => $this->input->post('plgnTelp2', true),
			'plgnAlamat' => $this->input->post('plgnAlamat', true),
			'plgnPiutang' => $this->input->post('plgnPiutang', true),
			'plgnNik' => $this->input->post('plgnNik', true),
			'plgnEmail' => $this->input->post('plgnEmail', true),
		);

		$ubah = $this->M_pos->update('plgnId',$plgnId,'pelanggan',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
                redirect(c_pelanggan);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
                redirect(c_pelanggan/formubah/$plgnId);
            }
		
	}

	public function hapus_pelanggan($plgnId){

		$hapus = $this->M_pos->hapus('plgnId',$plgnId,'pelanggan');

		if($hapus){
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_pelanggan);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_pelanggan/datapelanggan);
            }

	}

}
