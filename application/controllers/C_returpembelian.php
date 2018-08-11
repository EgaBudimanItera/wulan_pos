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
			'list'=>$this->M_pos->list_join('returpembelian','supplier','rtpbSplrId=splrId'),
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
		$data=array(
			'page'=>'returpembelian/formtambah',
			'link'=>'returpembelian',
			'script'=>'script/returpembelian',
			'list'=>$this->M_pos->ambil('pmblNoFaktur',$nofaktur,'pembelian')->row(),
			'list_retur'=> $this->M_pos->kueri("select *,COALESCE((select drpbJumlah from detreturpembelian_temp where drpbBrngId=dtpbBrngId and drpbPmblId=dtpbPmblId),0) as jumlahretur from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on (dtpbBrngId=brngId) where pmblNoFaktur='$nofaktur' ")->result(),
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

	public function get_detpembelian($brngId){
		$data=$this->M_pos->list_join_where('detpembelian','barang','dtpbBrngId=brngId','',array('dtpbBrngId'=>$brngId),'')->row_array();
        echo json_encode($data);
	}

}
