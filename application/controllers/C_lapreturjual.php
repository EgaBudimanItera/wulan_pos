<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapreturjual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'lapreturjual/formsearch',
			'link'=>'lapreturjual'
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){	
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			'page'=>'lapreturjual/lihatdata',
			'link'=>'lapreturjual',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($dari,$hingga){
	  $daritanggal=$dari;
	  $hinggatanggal=$hingga;
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  $data=array(
			
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

	  $this->load->view('lapreturjual/cetak',$data);
	}
}
