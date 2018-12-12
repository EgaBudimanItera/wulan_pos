<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'supplier/datasupplier',
			'link'=>'supplier',
			'list' => $this->M_pos->list_data_all('supplier'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'supplier/formtambah',
			'link'=>'supplier',
			'splrKode'=>$this->M_pos->kode_supplier(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($splrId){
		$data=array(
			'page'=>'supplier/formubah',
			'link'=>'supplier',
			'supplier' => $this->M_pos->ambil('splrId',$splrId,'supplier')->row(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_supplier(){
		$data = array(
			'splrKode' => $this->M_pos->kode_supplier(),
			'splrNama' => $this->input->post('splrNama', true),
			
			'splrTelp1' => $this->input->post('splrTelp1', true),
			'splrTelp2' => $this->input->post('splrTelp2', true),
			'splrAlamat' => $this->input->post('splrAlamat', true),
			'splrHutang' => 0,
		);

		$simpan = $this->M_pos->simpan_data($data,'supplier');
		if($simpan){
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(c_supplier);
        }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
            );
           redirect(c_supplier/formtambah);
        }
	}

	public function ubah_supplier($splrId){

		$data = array(
			'splrKode' => $this->input->post('splrKode', true),
			'splrNama' => $this->input->post('splrNama', true),
			
			'splrTelp1' => $this->input->post('splrTelp1', true),
			'splrTelp2' => $this->input->post('splrTelp2', true),
			'splrAlamat' => $this->input->post('splrAlamat', true),
			'splrHutang' => $this->input->post('splrHutang', true),
		);

		$ubah = $this->M_pos->update('splrId',$splrId,'supplier',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
            );
                redirect(c_supplier);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
            );
                redirect(c_supplier/formubah/$splrId);
            }
		
	}

	public function hapus_supplier($splrId){

		$hapus = $this->M_pos->hapus('splrId',$splrId,'supplier');

		if($hapus){
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_supplier);
            }else{
                $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_supplier/datasupplier);
            }

	}

}
