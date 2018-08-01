<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'barang/databarang',
			'link'=>'barang',
			'list' => $this->M_pos->list_join_where('satuan','barang','satuan.stunId=barang.brngStunId','','',''),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'barang/formtambah',
			'link'=>'barang',
			'list_satuan' => $this->M_pos->list_data_all('satuan'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formubah($brngId){
		$data=array(
			'page'=>'barang/formubah',
			'link'=>'barang',
			'barang' => $this->M_pos->ambil('brngId',$brngId,'barang')->row(),
			'list_satuan' => $this->M_pos->list_data_all('satuan'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambah_barang(){
		$data = array(
			'brngKode' => $this->input->post('brngKode', true),
			'brngNama' => $this->input->post('brngNama', true),
			'brngStunId' => $this->input->post('brngStunId', true),
			'brngHpp' => $this->input->post('brngHpp', true),
			'brngHargaJual' => $this->input->post('brngHargaJual', true),
			'brngStokAkhir' => $this->input->post('brngStokAkhir', true),
		);

		$simpan = $this->M_pos->simpan_data($data,'barang');
		if($simpan){
                $this->session->set_flashdata('msg', 'data berhasil disimpan !');
                redirect(c_barang);
            }else{
                $this->session->set_flashdata('msg', 'data gagal disimpan !');
                redirect(c_barang/formtambah);
            }
	}

	public function ubah_barang($brngId){

		$data = array(
			'brngKode' => $this->input->post('brngKode', true),
			'brngNama' => $this->input->post('brngNama', true),
			'brngStunId' => $this->input->post('brngStunId', true),
			'brngHpp' => $this->input->post('brngHpp', true),
			'brngHargaJual' => $this->input->post('brngHargaJual', true),
			'brngStokAkhir' => $this->input->post('brngStokAkhir', true),
		);

		$ubah = $this->M_pos->update('brngId',$brngId,'barang',$data);
		// var_dump($ubah);
		// die();

		if($ubah){
                $this->session->set_flashdata('msg', 'data berhasil dirubah !');
                redirect(c_barang);
            }else{
                $this->session->set_flashdata('msg', 'data gagal dirubah !');
                redirect(c_barang/formubah/$brngId);
            }
		
	}

	public function hapus_barang($brngId){

		$hapus = $this->M_pos->hapus('brngId',$brngId,'barang');

		if($hapus){
                $this->session->set_flashdata('msg', 'data berhasil dihapus !');
                redirect(c_barang);
            }else{
                $this->session->set_flashdata('msg', 'data gagal dihapus !');
                redirect(c_barang/databarang);
            }

	}

}
