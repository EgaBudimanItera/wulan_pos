<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM pelanggan";
		$data=array(
			'page'=>'lappenjualan/formsearch',
			'link'=>'lappenjualan',
			'pelanggan'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $plgnId = $this->input->post('plgnId');
	  if (empty($plgnId)) {
		 $query="SELECT * from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on(dtpjBrngId=brngId) join pelanggan on(pnjlPlgnId=plgnId) where  pnjlTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  }else{
		 $query="SELECT * from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on(dtpjBrngId=brngId) join pelanggan on(pnjlPlgnId=plgnId) where  pnjlTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and penjualan.pnjlPlgnId = $plgnId";
	  }
	  
	  $data=array(
			'page'=>'lappenjualan/lihatdata',
			'link'=>'lappenjualan',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
			'pnjlPlgnId'=>$plgnId,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($dari,$hingga,$plgnId){
	  $daritanggal=$dari;
	  $hinggatanggal=$hingga;
	  $plgnId = $plgnId;
	  if (empty($plgnId)) {
		 $query="SELECT * from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on(dtpjBrngId=brngId) join pelanggan on(pnjlPlgnId=plgnId) where  pnjlTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  }else{
		 $query="SELECT * from detpenjualan join penjualan on(dtpjPnjlId=pnjlId) join barang on(dtpjBrngId=brngId) join pelanggan on(pnjlPlgnId=plgnId) where  pnjlTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and penjualan.pnjlPlgnId = $plgnId";
	  }
	  $data=array(
			
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

	  $this->load->view('lappenjualan/cetak',$data);
	}
}
