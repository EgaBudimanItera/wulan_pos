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
			'link'=>'pembelian',
            'list'=>$this->M_pos->list_join('pembelian','supplier','pmblSplrId=splrId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
		$query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
        $data=array(
			'page'=>'pembelian/formtambah',
			'link'=>'pembelian',
			'script'=>'script/pembelian',
			'supplier'=>$this->M_pos->list_data_all('supplier'),
			'barang'=>$this->M_pos->kueri($query)->result(),
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
		$query="SELECT * FROM detpembelian join barang on(dtpbBrngId=brngId) WHERE dtpbPmblId='$nofaktur'";
        $data=array(
			'page'=>'pembelian/detailpembelian',
			'link'=>'pembelian',
            'list'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahpembeliandet(){
        $dtpbBrngId=$this->input->post('dtpbBrngId',true);
        $dtpbJumlah=$this->input->post('dtpbJumlah',true);  
        $dtpbHarga=$this->input->post('dtpbHarga',true); 
        // $createdby=$this->session->userdata('userNama');
        $createdby=$this->M_pos->usercreated();
        
        $data=array(
            'dtpbBrngId'=>$dtpbBrngId,
            'dtpbJumlah'=>$dtpbJumlah,
            'dtpbHarga'=>$dtpbHarga,
            'dtpbCreatedBy'=>$createdby,
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
    
    $createdby=$this->M_pos->usercreated();
    $query="SELECT COALESCE((sum(dtpbJumlah*dtpbHarga)),0) as total from detpembelian_temp where dtpbCreatedBy='$createdby'";
    //cek apakah data kosong? jika ada isi lanjutkan
    $pmblTotalBeli=$this->M_pos->kueri($query)->row()->total;

    if($pmblTotalBeli==0){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
        );
        redirect(base_url().'c_pembelian/formtambah'); //location
    }
    else{
     $pmblUangMuka=$this->input->post('pmblUangMuka',true);
     $pmblDiskon=$this->input->post('pmblDiskon',true);
     $pmblOngkir=$this->input->post('pmblOngkir',true);
     $pmblSisaBayar=$pmblTotalBeli-$pmblUangMuka-$pmblDiskon+$pmblOngkir;
     $pmblTanggal=date_format(date_create($this->input->post('pmblTanggal',true)),"Y-m-d");
     $pmblJatuhTempo=strtotime('30 days',strtotime($pmblTanggal));
     $pmblJatuhTempo=date('Y-m-d',$pmblJatuhTempo);
     //data untk simpan ke tabel pembelian
     $datapembelian=array(
        'pmblNoFaktur'=>$this->input->post('pmblNoFaktur',true),
        'pmblTanggal'=>$pmblTanggal,
        'pmblSplrId'=>$this->input->post('pmblSplrId',true),
        'pmblKet'=>$this->input->post('pmblKet',true),
        'pmblTotalBeli'=>$pmblTotalBeli,
        'pmblUangMuka'=>$pmblUangMuka,
        'pmblDiskon'=>$pmblDiskon,
        'pmblOngkir'=>$pmblOngkir,
        'pmblSisaBayar'=>(string) $pmblSisaBayar ,
        'pmblJatuhTempo'=>$pmblJatuhTempo,
     );
      //simpan ke pembelian
     $simpanpembelian=$this->M_pos->simpan_data($datapembelian,'pembelian');
     $pmblId = $this->db->insert_id();

      $querytemp="SELECT * FROM detpembelian_temp where dtpbCreatedBy='$createdby'";
     //data untuk simpan ke tabel det pembelian
      $pembelian_temp=$this->M_pos->kueri($querytemp)->result();
      $i=0;
      foreach ($pembelian_temp as $row) {
         $ins[$i]['dtpbPmblId']          = $pmblId;
         $ins[$i]['dtpbBrngId']          = $row->dtpbBrngId;
         $ins[$i]['dtpbJumlah']          = $row->dtpbJumlah;
         $ins[$i]['dtpbHarga']           = $row->dtpbHarga;
         $ins[$i]['dtpbDiskon']          = $row->dtpbDiskon;
         $i++;  
      } 

     //simpan ke det pembelian
     $simpandet=$this->M_pos->insertbatch('detpembelian',$ins);
     //hapus det pembelian temp
     $hapustem=$this->M_pos->hapus('dtpbCreatedBy',$createdby,'detpembelian_temp');

     if($simpanpembelian && $simpandet && $hapustem){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
        );
        redirect(base_url().'c_pembelian'); //location
     }
     else{
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
        );
        redirect(base_url().'c_pembelian'); //location
     }
    }
   }

   public function hapusall($nofaktur){
    $hapusdet=$this->M_pos->hapus('dtpbPmblId',$nofaktur,'detpembelian');
    $hapuspembelian=$this->M_pos->hapus('pmblId',$nofaktur,'pembelian');
    
    if($hapuspembelian && $hapusdet){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_pembelian'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_pembelian'); //location
     }      
   }
}
