<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayarpiutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'bayarpiutang/databayarpiutang',
			'link'=>'bayarpiutang',
			'list'=>$this->M_pos->list_join('bayarpiutang','pelanggan','byrpPlgnId=plgnId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah1(){
		// $max_id_awal = $this->M_pos->max_id('bayarpiutang','byrpNoFaktur','byrpId','DESC');
		// if (empty($max_id_awal)) {
		// 	$max_id_awal = "BRT-0000";
		// }else{
		// 	$max_id_awal = $max_id_awal->byrpNoFaktur;
		// }
        
  //       $cek_id = explode("-", $max_id_awal);
  //       // var_dump($cek_id);
  //       // die();
  //       if ($cek_id[0] != 'BRP') {
  //           $nofaktur = "BRP-0001";
  //       }else{
  //           $nofaktur = $this->M_pos->autonumber($max_id_awal,4,4);
  //       }
		$nofaktur=$this->M_pos->kode_bayarpiutang();
		$data=array(
			'page'=>'bayarpiutang/formtambah1',
			'link'=>'bayarpiutang',
			// 'script'=>'script/bayarpiutang',
			'nofaktur'=>$nofaktur,
			'pelanggan'=>$this->M_pos->list_data_all('pelanggan'),	
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah2(){
		$idpelanggan=$this->input->post('byrpPlgnId',true);
		$query="SELECT * FROM penjualan where pnjlPlgnId='$idpelanggan' and pnjlSisaBayar>0";
		$data=array(
			'page'=>'bayarpiutang/formtambah2',
			'link'=>'bayarpiutang',
			'script'=>'script/bayarpiutang',
			// 'penjualan'=>$this->M_pos->list_data_where('pnjlPlgnId',@$_POST['byrpPlgnId'],'penjualan')->result(),
			'penjualan'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array(
			'list'=>$this->M_pos->list_join('detbayarpiutang_temp','penjualan','dbypPnjlId=pnjlId')
		);
		$this->load->view('bayarpiutang/datadetailtemp',$data);
	}

	public function formdetail($byrpId){
		$data=array(
			'page'=>'bayarpiutang/detailbayarpiutang',
			'link'=>'bayarpiutang',
			'list'=>$this->M_pos->list_join2_where('bayarpiutang','detbayarpiutang','byrpId=dbypByrpId','pelanggan','byrpPlgnId=plgnId','',array('byrpId'=>$byrpId),'')
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function kwitansi($dbypId){
		$query = "SELECT * FROM bayarpiutang JOIN detbayarpiutang ON bayarpiutang.byrpId = detbayarpiutang.dbypByrpId JOIN pelanggan ON bayarpiutang.byrpPlgnId = pelanggan.plgnId WHERE dbypId = $dbypId";
		$data=array(
			'faktur'=>$this->M_pos->kueri($query)->row(),
		);
		$this->load->view('bayarpiutang/kwitansi',$data);
	}

	public function tambahdetbayarpiutang(){

		$dbypPnjlId=$this->input->post('dtpbBrngId',true);
	    $dbypBayar=$this->input->post('dtpbJumlah',true);  
	    //$dtpbJumlah=$this->input->post('dtpbJumlah',true); 
	    // $createdby=$this->session->userdata('userNama');
		$createdby=$this->M_pos->usercreated();
		$pilihanbayar=$this->input->post('pilihanbayar',true);
	    
	    $data=array(
	        'dbypPnjlId'=>$dbypPnjlId,
	        'dbypBayar'=>$dbypBayar,
	        //'dtpbJumlah'=>$dtpbJumlah,
			'dbypCreatedBy'=>$createdby,
			'pilihanbayar'=>$pilihanbayar,
	    );
	    $simpandetailtemp=$this->M_pos->simpan_data($data,'detbayarpiutang_temp');
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

	public function hapusdetail($dbypId){
		$hapusdetailtemp=$this->M_pos->hapus('dbypId',$dbypId,'detbayarpiutang_temp');
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
	    $query="SELECT COALESCE((sum(dbypBayar)),0) as total from detbayarpiutang_temp where dbypCreatedBy='$createdby'";
	    //cek apakah data kosong? jika ada isi lanjutkan
	    $pmblTotalBayaPiutang=$this->M_pos->kueri($query)->row()->total;

	    if($pmblTotalBayaPiutang==0){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
	        );
	        redirect(base_url().'c_bayarpiutang/formtambah2'); //location
	    }
	    else{
	     // $byruNoFaktur=$this->input->post('pmblKode',true);
	     $byrpTanggal=date_format(date_create($this->input->post('byrpTanggal',true)),"Y-m-d");
	     $byrpPlgnId=$this->input->post('byrpPlgnId',true);
	     $byrpTotalBayar=$pmblTotalBayaPiutang;
	     $byrpKet=$this->input->post('pmblKet',true);
	   	 $nofaktur=$this->M_pos->kode_bayarpiutang();
	     //data untk simpan ke tabel pembelian
	     $databayarpiutang=array(
	        'byrpNoFaktur'=>$nofaktur,
	        'byrpTanggal'=>$byrpTanggal,
	        'byrpPlgnId'=>$byrpPlgnId,
	        'byrpTotalBayar'=>$byrpTotalBayar,
	        'byrpKet'=>$byrpKet,
	     );
	     // var_dump($databayarutang);
	     // die();
	      //simpan ke pembelian
	     $simpanbayarpiutang=$this->M_pos->simpan_data($databayarpiutang,'bayarpiutang');
	     $byrpId = $this->db->insert_id();

	      $querytemp="SELECT * FROM detbayarpiutang_temp where dbypCreatedBy='$createdby'";
	     //data untuk simpan ke tabel det pembelian
	      $bayarpiutang_temp=$this->M_pos->kueri($querytemp)->result();
	      $i=0;
	      foreach ($bayarpiutang_temp as $row) {
	         $ins[$i]['dbypByrpId']         = $byrpId;
	         $ins[$i]['dbypPnjlId']         = $row->dbypPnjlId;
			 $ins[$i]['dbypBayar']          = $row->dbypBayar;
			 $ins[$i]['pilihanbayar']       = $row->pilihanbayar;
	         $i++;  
	      } 

	     //simpan ke det pembelian
	     $simpandet=$this->M_pos->insertbatch('detbayarpiutang',$ins);
	     //hapus det pembelian temp
	     $hapustem=$this->M_pos->hapus('dbypCreatedBy',$createdby,'detbayarpiutang_temp');

	     if($simpanbayarpiutang && $simpandet && $hapustem){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
	        );
	        redirect(base_url().'c_bayarpiutang'); //location
	     }
	     else{
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
	        );
	        redirect(base_url().'c_bayarpiutang'); //location
	     }
	    }
	}

	public function hapusall($nofaktur){
    $hapusdet=$this->M_pos->hapus('dbypId',$nofaktur,'detbayarpiutang');
    $hapusbayarpiutang=$this->M_pos->hapus('byrpId',$nofaktur,'bayarpiutang');
    
    if($hapusbayarpiutang && $hapusdet){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_bayarpiutang'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_bayarpiutang'); //location
     }      
   }

	public function get_penjualan($pnjlId){
		$data=$this->M_pos->ambil('pnjlId',$pnjlId,'penjualan')->row_array();
        echo json_encode($data);
	}

}
