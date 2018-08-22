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

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'returpembelian/detailreturpembelian',
			'link'=>'returpembelian',
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

	public function get_detpembelian($brngId){
		$data=$this->M_pos->list_join_where('detpembelian','barang','dtpbBrngId=brngId','',array('dtpbBrngId'=>$brngId),'')->row_array();
        echo json_encode($data);
	}

}
