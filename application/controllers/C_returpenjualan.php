<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_returpenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'returpenjualan/datareturpenjualan',
			'link'=>'returpenjualan',
			'list'=>$this->M_pos->list_join2('returpenjualan','penjualan','rtpjPnjlId=pnjlId','pelanggan','pnjlPlgnId=plgnId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function pilihpenjualan(){
		$data=array(
			'page'=>'returpenjualan/pilihpenjualan',
			'link'=>'returpenjualan',
			'list'=>$this->M_pos->list_join('penjualan','pelanggan','pnjlPlgnId=plgnId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah($nofaktur){
		$query="SELECT *,COALESCE((select drpjJumlah from detreturpenjualan_temp,detpenjualan where drpjBrngId=dtpjBrngId and drpjPnjlId=dtpjPnjlId),0) as jumlahreturtemp ,COALESCE((select drpjJumlah from detreturpenjualan,detpenjualan where drpjBrngId=dtpjBrngId and drpjRtpjId=dtpjPnjlId),0) as jumlahretur from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on (dtpjBrngId=brngId) where pnjlNoFaktur='$nofaktur' ";
		$data=array(
			'page'=>'returpenjualan/formtambah',
			'link'=>'returpenjualan',
			'script'=>'script/returpenjualan',
			'list'=>$this->M_pos->ambil('pnjlNoFaktur',$nofaktur,'penjualan')->row(),
			'list_retur'=> $this->M_pos->kueri($query)->result(),
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahdetreturpenjualan(){

		$drpjPnjlId=$this->input->post('drpjPnjlId',true);
	    $drpjBrngId=$this->input->post('drpjBrngId',true);  
	    $drpjJumlah=$this->input->post('drpjJumlah',true); 
	    // $createdby=$this->session->userdata('userNama');
	    $createdby=$this->M_pos->usercreated();
	    
	    $data=array(
	        'drpjPnjlId'=>$drpjPnjlId,
	        'drpjBrngId'=>$drpjBrngId,
	        'drpjJumlah'=>$drpjJumlah,
	        'drpjCreatedby'=>$createdby,
	    );

	    //var_dump($data);
	    // die();
	    $simpandetailtemp=$this->M_pos->simpan_data($data,'detreturpenjualan_temp');
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

	public function simpanall(){

		$createdby=$this->M_pos->usercreated();
	    $query="SELECT COALESCE((sum(drpjJumlah)),0)*brngHpp as total from detreturpenjualan_temp join barang on drpjBrngId=brngId where drpjCreatedby='$createdby'";
	    //cek apakah data kosong? jika ada isi lanjutkan
	    $pnjlTotalReturPenjualan=$this->M_pos->kueri($query)->row()->total;

	    if($pnjlTotalReturPenjualan==0){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
	        );
	        redirect(base_url().'C_returpenjualan/formtambah/'.$this->input->post('rtpjNoFaktur',true)); //location
	    }
	    else{
	     // $byruNoFaktur=$this->input->post('pnjlKode',true);
	     $rtpjNoFaktur=$this->input->post('rtpjNoFaktur',true);
	     $rtpjTanggal=$this->input->post('rtpjTanggal',true);
	     $rtpjPnjlId=$this->input->post('pnjlId',true);
	     $rtpjPlgnId=$this->input->post('pnjlPlgnId',true);
	     $rtpjNilai=$pnjlTotalReturPenjualan;
	     $rtpjKet=$this->input->post('rtpjKet',true);
	   	 if ($this->input->post('pnjlSisaBayar',true) == '0') {
	   	 	$rtpjStatus = 'T';
	   	 }else{
	   	 	$rtpjStatus = 'K';
	   	 }
	     //data untk simpan ke tabel penjualan
	     $datareturpenjualan=array(
	        'rtpjNoFaktur'=>$rtpjNoFaktur,
	        'rtpjTanggal'=>date("Y-m-m", strtotime($rtpjTanggal)),
	        'rtpjPnjlId'=>$rtpjPnjlId,
	        'rtpjPlgnId'=>$rtpjPlgnId,
	        'rtpjNilai'=>$rtpjNilai,
	        'rtpjKet'=>$rtpjKet,
	        'rtpjStatus'=>$rtpjStatus,
	     );
	      //var_dump($datareturpenjualan);
	      //die();
	      //simpan ke penjualan
	     $detreturpenjualan=$this->M_pos->simpan_data($datareturpenjualan,'returpenjualan');
	     $drpjId = $this->db->insert_id();

	      $querytemp="SELECT * FROM detreturpenjualan_temp where drpjCreatedby='$createdby'";
	     //data untuk simpan ke tabel det penjualan
	      $detreturpenjualan_temp=$this->M_pos->kueri($querytemp)->result();
	      $i=0;
	      foreach ($detreturpenjualan_temp as $row) {
	         $ins[$i]['drpjRtpjId']         = $drpjId;
	         $ins[$i]['drpjBrngId']         = $row->drpjBrngId;
	         $ins[$i]['drpjJumlah']          = $row->drpjJumlah;
	         $i++;  
	      } 

	     //simpan ke det penjualan
	     $simpandet=$this->M_pos->insertbatch('detreturpenjualan',$ins);
	     //hapus det penjualan temp
	     $hapustem=$this->M_pos->hapus('drpjCreatedby',$createdby,'detreturpenjualan_temp');

	     if($detreturpenjualan && $simpandet && $hapustem){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Retur Berhasil </div>'
	        );
	        redirect(base_url().'C_returpenjualan'); //location
	     }
	     else{
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Retur Gagal </div>'
	        );
	        redirect(base_url().'C_returpenjualan'); //location
	     }
	    }
	}


	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('returpenjualan/datadetailtemp',$data);
	}

	public function formdetail($drpjId){
		$data=array(
			'page'=>'returpenjualan/detailreturpenjualan',
			'link'=>'returpenjualan',
			'list'=>$this->M_pos->list_join2_where('returpenjualan','detreturpenjualan','rtpjId=drpjRtpjId','barang','drpjBrngId=brngId','',array('drpjId'=>$drpjId),''),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function get_detpenjualan($brngId){
		$data=$this->M_pos->list_join_where('detpenjualan','barang','dtpjBrngId=brngId','',array('dtpjBrngId'=>$brngId),'')->row_array();
        echo json_encode($data);
	}

}
