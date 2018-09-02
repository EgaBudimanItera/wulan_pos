s<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_orderpenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'orderpenjualan/dataorder',
			'link'=>'orderpenjualan',
			'list'=>$this->M_pos->list_join('orderpenjualan','pelanggan','opnjPlgnId=plgnId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

    public function formdetail($nofaktur){
        $query="SELECT * FROM detorderpenjualan join barang on(dopjBrngId=brngId) WHERE dopjOpnjId='$nofaktur'";
        $data=array(
            'page'=>'orderpenjualan/detailorder',
            'link'=>'orderpenjualan',
            'list'=>$this->M_pos->kueri($query)->result(),
            'opnjId'=>$nofaktur,
        );
        $this->load->view('partials/back/wrapper',$data);
    }

    public function terimaorder($nofaktur){
       //simpan ke penjualan
       //simpan ke detpenjualan
       //update order penjuala
        //1.ubah status dari Order -> Sales
        //2.ubah opnjPnjlId dari '' -> pnjlId
    }

    public function formtambah(){
        
        $nofaktur=$this->M_pos->kode_penjualan();
        $query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
        $data=array(
            'page'=>'orderpenjualan/formtambah',
            'link'=>'orderpenjualan',
            'script'=>'script/orderpenjualan',
            'pelanggan'=>$this->M_pos->list_data_all('pelanggan'),
            'barang'=>$this->M_pos->kueri($query)->result(),
            'nofaktur'=>$nofaktur,
        );
        $this->load->view('partials/back/wrapper',$data);
    }

    public function tabeldetailtemp(){
        $query="SELECT * FROM detorderpenjualan_temp join barang on(dopjBrngId=brngId)";
        $data=array(
            'list'=>$this->M_pos->kueri($query)->result(),
        );
        $this->load->view('orderpenjualan/datadetailtemp',$data);
    }

    public function tambahorderpenjualandet(){
        $dopjBrngId=$this->input->post('dopjBrngId',true);
        $dopjJumlah=$this->input->post('dopjJumlah',true);  
        $dopjHarga=$this->input->post('dopjHarga',true);
        $dopjDiskon=$this->input->post('dopjDiskon',true); 
        $createdby=$this->session->userdata('userNama');
        //$createdby=$this->M_pos->usercreated();
        $sisastok=$this->M_pos->ambil('brngId',$dopjBrngId,'barang')->row()->brngStokAkhir;
        if($dopjJumlah>$sisastok){
          $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah Karena Stok Kurang!</div>'
           );
          echo json_encode(array('status'=>'fail'));
        }
        else{
           $data=array(
            'dopjBrngId'=>$dopjBrngId,
            'dopjJumlah'=>$dopjJumlah,
            'dopjHarga'=>$dopjHarga,
            'dopjDiskon'=>$dopjDiskon,
            'dopjCreatedBy'=>$createdby,
            );
            $simpandetailtemp=$this->M_pos->simpan_data($data,'detorderpenjualan_temp');
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
   }

   public function hapusdetail($dopjId){

    $hapusdetailtemp=$this->M_pos->hapus('dopjId',$dopjId,'detorderpenjualan_temp');
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
}
