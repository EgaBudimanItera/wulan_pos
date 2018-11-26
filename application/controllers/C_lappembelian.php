<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lappembelian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM supplier";
		$data=array(
			'page'=>'lappembelian/formsearch',
			'link'=>'lappembelian',
			'supplier'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){
	 
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $splrId = $this->input->post('splrId');
	  if (empty($splrId)) {
		  $query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  }else{
		  $query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and pembelian.pmblSplrId = $splrId ";
	  }
	  
	  $data=array(
			'page'=>'lappembelian/lihatdata',
			'link'=>'lappembelian',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'splrId'=>$splrId,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($dari,$hingga,$splrId){
		$daritanggal=$dari;
		$hinggatanggal=$hingga;
		$splrId=$splrId;
	  	if (empty($splrId)) {
		  $query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
		}else{
			$query="SELECT * from detpembelian join pembelian on(dtpbPmblId=pmblId) join barang on(dtpbBrngId=brngId) join supplier on(pmblSplrId=splrId) where  pmblTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and pembelian.pmblSplrId = $splrId ";
		}
	  	$data=array(
			
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

		$this->load->view('lappembelian/cetak',$data);
	}
}
