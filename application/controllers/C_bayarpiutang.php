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
			'link'=>'bayarpiutang'
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
		$data=array(
			'page'=>'bayarpiutang/formtambah2',
			'link'=>'bayarpiutang',
			'script'=>'script/bayarpiutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array();
		$this->load->view('bayarpiutang/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'bayarpiutang/detailbayarpiutang',
			'link'=>'bayarpiutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

}
