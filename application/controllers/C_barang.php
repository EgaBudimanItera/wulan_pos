<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
		$this->load->library('upload');
		$this->load->library('image_lib');
	}

	public function index(){
		$query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
		$data=array(
			'page'=>'barang/databarang',
			'link'=>'barang',
			'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'barang/formtambah',
			'link'=>'barang',
			'list_satuan' => $this->M_pos->list_data_all('satuan'),
			'brngKode'=>$this->M_pos->kode_barang(),
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

		
		if (!is_uploaded_file($_FILES['brngGambar']['tmp_name'])) {

			$brngKode=$this->input->post('brngKode',true);
			$data = array(
				'brngKode' => $brngKode,
				'brngNama' => $this->input->post('brngNama', true),
				'brngStunId' => $this->input->post('brngStunId', true),
				'brngHpp' => $this->input->post('brngHpp', true),
				'brngHargaJual' => $this->input->post('brngHargaJual', true),
				'brngStokAkhir' => 0,
			);
			$simpan = $this->M_pos->simpan_data($data,'barang');
			if($simpan){
	                $this->session->set_flashdata(
	                'msg', 
	                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
	            );
	                redirect(c_barang);
	            }else{
	                $this->session->set_flashdata(
	                'msg', 
	                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
	            );
	                redirect(c_barang/formtambah);
	            }

		}else{

			$config ['upload_path'] = './assets/file_upload';
            $config ['allowed_types'] = 'jpg|jpeg|png|PNG|JPG|JPEG';
            $config ['max_size'] = '1024';

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('brngGambar')){
                $error = $this->upload->display_errors();
                // var_dump($error);
                // die();

                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> '.$error.' </div>' );
               
                }else{
                	$upload_data = $this->upload->data();

					$brngKode=$this->M_pos->kode_barang();
					$data = array(
						'brngKode' => $brngKode,
						'brngNama' => $this->input->post('brngNama', true),
						'brngStunId' => $this->input->post('brngStunId', true),
						'brngHpp' => $this->input->post('brngHpp', true),
						'brngHargaJual' => $this->input->post('brngHargaJual', true),
						'brngStokAkhir' => '0',
						'brngGambar'=>$upload_data['file_name']
					);

					$simpan = $this->M_pos->simpan_data($data,'barang');
					if($simpan){
			                $this->session->set_flashdata(
			                'msg', 
			                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
			            );
			                redirect(c_barang);
			            }else{
			                $this->session->set_flashdata(
			                'msg', 
			                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal disimpan !</div>'
			            );
			                redirect(c_barang/formtambah);
			            }
	        	}

		}

		
	}

	public function ubah_barang($brngId){
		if (!is_uploaded_file($_FILES['brngGambar']['tmp_name'])) {
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
	                $this->session->set_flashdata(
	                'msg', 
	                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
	            );
	                redirect(c_barang);
	            }else{
	                 $this->session->set_flashdata(
	                'msg', 
	                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
	            );
	                redirect(c_barang/formubah/$brngId);
	            }
		}else{

			$config ['upload_path'] = './assets/file_upload';
            $config ['allowed_types'] = 'jpg|jpeg|png|PNG|JPG|JPEG';
            $config ['max_size'] = '1024';

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('brngGambar')){
                $error = $this->upload->display_errors();
                // var_dump($error);
                // die();

                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a> '.$error.' </div>' );
            }else{
            	$upload_data = $this->upload->data();
            	$data = array(
				'brngKode' => $this->input->post('brngKode', true),
				'brngNama' => $this->input->post('brngNama', true),
				'brngStunId' => $this->input->post('brngStunId', true),
				'brngHpp' => $this->input->post('brngHpp', true),
				'brngHargaJual' => $this->input->post('brngHargaJual', true),
				'brngStokAkhir' => $this->input->post('brngStokAkhir', true),
				'brngGambar'=>$upload_data['file_name']
				);

				$ubah = $this->M_pos->update('brngId',$brngId,'barang',$data);
				// var_dump($ubah);
				// die();

				if($ubah){
		                $this->session->set_flashdata(
		                'msg', 
		                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diubah !</div>'
		            );
		                redirect(c_barang);
		            }else{
		                 $this->session->set_flashdata(
		                'msg', 
		                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal diubah !</div>'
		            );
		                redirect(c_barang/formubah/$brngId);
		            }


            }

		}
		
		
	}

	public function hapus_barang($brngId){

		$hapus = $this->M_pos->hapus('brngId',$brngId,'barang');

		if($hapus){
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
            );
                redirect(c_barang);
            }else{
                 $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
            );
                redirect(c_barang/databarang);
            }

	}

	public function getbarang($brngId){
		$data=$this->M_pos->ambil('brngId',$brngId,'barang')->row_array();
        echo json_encode($data);
	}

}
