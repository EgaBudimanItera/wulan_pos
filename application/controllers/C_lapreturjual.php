<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lapreturjual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM pelanggan";
		$data=array(
			'page'=>'lapreturjual/formsearch',
			'link'=>'lapreturjual',
			'pelanggan'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function lihat(){	
	  $daritanggal=date_format(date_create($this->input->post('daritanggal',true)),"Y-m-d");
	  $hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),"Y-m-d");
	  $plgnId = $this->input->post('plgnId');
	  if (empty($plgnId)) {
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  }else{
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and returpenjualan.rtpjPlgnId = $plgnId";	  
	  }

	  $data=array(
			'page'=>'lapreturjual/lihatdata',
			'link'=>'lapreturjual',
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			'rtpjPlgnId'=>$plgnId,
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function cetak($dari,$hingga,$plgnId){
	  $daritanggal=$dari;
	  $hinggatanggal=$hingga;
	  $plgnId=$plgnId;
	  if (empty($plgnId)) {
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal'";
	  }else{
	  $query="SELECT * from detreturpenjualan join returpenjualan on(drpjRtpjId=rtpjId) join penjualan on(rtpjPnjlId=pnjlId) join barang on(drpjBrngId=brngId) join pelanggan on(rtpjPlgnId=plgnId)  where  rtpjTanggal BETWEEN '$daritanggal' and '$hinggatanggal' and returpenjualan.rtpjPlgnId = $plgnId";	  
	  }
	  $data=array(
			
			'list'=>$this->M_pos->kueri($query)->result(),
			'jumlah'=>$this->M_pos->kueri($query)->num_rows(),
			
			'daritanggal'=>$daritanggal,
			'hinggatanggal'=>$hinggatanggal,
		);

	  $this->load->view('lapreturjual/cetak',$data);
	}
}
