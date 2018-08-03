<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'pembelian/datapembelian',
			'link'=>'pembelian'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$data=array(
			'page'=>'pembelian/formtambah',
			'link'=>'pembelian',
			'script'=>'script/pembelian',
			'supplier'=>$this->M_pos->list_data_all('supplier'),
			'barang'=>$this->M_pos->list_data_all('barang'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$query="SELECT * FROM detpembelian_temp join barang on(dtpbBrngId=brngId)";
		$data=array(
		   'list'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('pembelian/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'pembelian/detailpembelian',
			'link'=>'pembelian',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahpembeliandet(){
        $dtpbBrngId=$this->input->post('dtpbBrngId',true);
        $dtpbJumlah=$this->input->post('dtpbJumlah',true);  
        $dtpbHarga=$this->input->post('dtpbHarga',true); 
        $dtpbCreatedBy=$this->session->userdata('userNama');
        
        $data=array(
            'dtpbBrngId'=>$dtpbBrngId,
            'dtpbJumlah'=>$dtpbJumlah,
            'dtpbHarga'=>$dtpbHarga,
            'dtpbCreatedBy'=>$dtpbCreatedBy,
        );
        $simpandetailtemp=$this->M_pos->simpan_data($data,'detpembelian_temp');
        if($simpandetailtemp){
            $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil ditambah !</div>'
            );
            echo json_encode(array('status'=>'success'));
         }else{
           $this->session->set_flashdata(
                'msg', 
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah !</div>'
            );
           echo json_encode(array('status'=>'fail'));
         }
   }

   public function hapusdetail($dtpbId){

   	$hapusdetailtemp=$this->M_pos->hapus('dtpbId',$dtpbId,'detpembelian_temp');
    if($hapusdetailtemp){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        echo json_encode(array('status'=>'success'));
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       echo json_encode(array('status'=>'fail'));
     }		
   }

   public function simpanall(){
     
     //cek apakah data kosong? jika ada isi lanjutkan

     //data untk simpan ke tabel pembelian
     $datapembelian=array();

     //data untuk simpan ke tabel det pembelian
     $datadetpembelian=array();

     //simpan ke pembelian

     //simpan ke det pembelian

     //hapus det pembelian temp

   }
}
