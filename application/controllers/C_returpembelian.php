<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_returpembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'returpembelian/datareturpembelian',
			'link'=>'returpembelian',
			'list'=>$this->M_pos->list_join2('returpembelian','pembelian','rtpbPmblId=pmblId','supplier','pmblSplrId=splrId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function pilihpembelian(){
		$data=array(
			'page'=>'returpembelian/pilihpembelian',
			'link'=>'returpembelian',
			'list'=>$this->M_pos->list_join('pembelian','supplier','pmblSplrId=splrId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah($nofaktur){
		$query="SELECT *,COALESCE((select drpbJumlah from detreturpembelian_temp,detpembelian where drpbBrngId=dtpbBrngId and drpbPmblId=dtpbPmblId),0) as jumlahreturtemp ,COALESCE((select drpbJumlah from detreturpembelian,detpembelian where drpbBrngId=dtpbBrngId and drpbRtpbId=dtpbPmblId),0) as jumlahretur from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on (dtpbBrngId=brngId) where pmblNoFaktur='$nofaktur' ";
		$data=array(
			'page'=>'returpembelian/formtambah',
			'link'=>'returpembelian',
			'script'=>'script/returpembelian',
			'list'=>$this->M_pos->ambil('pmblNoFaktur',$nofaktur,'pembelian')->row(),
			'list_retur'=> $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array(
		);
		$this->load->view('returpembelian/datadetailtemp',$data);
	}

	public function formdetail($rtpbId){
		$data=array(
			'page'=>'returpembelian/detailreturpembelian',
			'link'=>'returpembelian',
			'list'=>$this->M_pos->list_join2_where('returpembelian','detreturpembelian','rtpbId=drpbRtpbId','barang','drpbBrngId=brngId','',array('rtpbId'=>$rtpbId),''),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahdetreturpembelian(){

		$drpbPmblId=$this->input->post('drpbPmblId',true);
	    $drpbBrngId=$this->input->post('drpbBrngId',true);  
	    $drpbJumlah=$this->input->post('drpbJumlah',true); 
	    // $createdby=$this->session->userdata('userNama');
	    $createdby=$this->M_pos->usercreated();
	    
	    $data=array(
	        'drpbPmblId'=>$drpbPmblId,
	        'drpbBrngId'=>$drpbBrngId,
	        'drpbJumlah'=>$drpbJumlah,
	        'drpbCreatedby'=>$createdby,
	    );

	    // var_dump($data);
	    // die();
	    $simpandetailtemp=$this->M_pos->simpan_data($data,'detreturpembelian_temp');
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
	    $query="SELECT COALESCE((sum(drpbJumlah)),0)*brngHpp as total from detreturpembelian_temp join barang on drpbBrngId=brngId where drpbCreatedby='$createdby'";
	    //cek apakah data kosong? jika ada isi lanjutkan
	    $pmblTotalReturPembelian=$this->M_pos->kueri($query)->row()->total;

	    if($pmblTotalReturPembelian==0){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
	        );
	        redirect(base_url().'C_returpembelian/formtambah/'.$this->input->post('rtpbNoFaktur',true)); //location
	    }
	    else{
	     // $byruNoFaktur=$this->input->post('pmblKode',true);
	     $rtpbNoFaktur=$this->input->post('rtpbNoFaktur',true);
	     $rtpbTanggal=$this->input->post('rtpbTanggal',true);
	     $rtpbPmblId=$this->input->post('pmblId',true);
	     $rtpbSplrId=$this->input->post('pmblSplrId',true);
	     $rtpbNilai=$pmblTotalReturPembelian;
	     $rtpbKet=$this->input->post('rtpbKet',true);
	   	 if ($this->input->post('pmblSisaBayar',true) == '0') {
	   	 	$rtpbStatus = 'T';
	   	 }else{
	   	 	$rtpbStatus = 'K';
	   	 }
	     //data untk simpan ke tabel pembelian
	     $datareturpembelian=array(
	        'rtpbNoFaktur'=>$rtpbNoFaktur,
	        'rtpbTanggal'=>date("Y-m-m", strtotime($rtpbTanggal)),
	        'rtpbPmblId'=>$rtpbPmblId,
	        'rtpbSplrId'=>$rtpbSplrId,
	        'rtpbNilai'=>$rtpbNilai,
	        'rtpbKet'=>$rtpbKet,
	        'rtpbStatus'=>$rtpbStatus,
	     );
	      //var_dump($datareturpembelian);
	      //die();
	      //simpan ke pembelian
	     $detreturpembelian=$this->M_pos->simpan_data($datareturpembelian,'returpembelian');
	     $drpbId = $this->db->insert_id();

	      $querytemp="SELECT * FROM detreturpembelian_temp where drpbCreatedby='$createdby'";
	     //data untuk simpan ke tabel det pembelian
	      $detreturpembelian_temp=$this->M_pos->kueri($querytemp)->result();
	      $i=0;
	      foreach ($detreturpembelian_temp as $row) {
	         $ins[$i]['drpbRtpbId']         = $drpbId;
	         $ins[$i]['drpbBrngId']         = $row->drpbBrngId;
	         $ins[$i]['drpbJumlah']          = $row->drpbJumlah;
	         $i++;  
	      } 

	     //simpan ke det pembelian
	     $simpandet=$this->M_pos->insertbatch('detreturpembelian',$ins);
	     //hapus det pembelian temp
	     $hapustem=$this->M_pos->hapus('drpbCreatedby',$createdby,'detreturpembelian_temp');

	     if($detreturpembelian && $simpandet && $hapustem){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Retur Berhasil </div>'
	        );
	        redirect(base_url().'C_returpembelian'); //location
	     }
	     else{
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Retur Gagal </div>'
	        );
	        redirect(base_url().'C_returpembelian'); //location
	     }
	    }
	}

	public function get_detpembelian($brngId){
		$data=$this->M_pos->list_join_where('detpembelian','barang','dtpbBrngId=brngId','',array('dtpbBrngId'=>$brngId),'')->row_array();
        echo json_encode($data);
	}

}
