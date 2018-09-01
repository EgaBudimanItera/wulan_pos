s<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_orderpenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'orderpenjualan/dataorder',
			'link'=>'orderpenjualan',
			'list'=>$this->M_pos->list_join('orderpenjualan','pelanggan','opnjPlgnId=plgnId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

    public function formdetail($nofaktur){
        $query="SELECT * FROM detorderpenjualan join barang on(dopjBrngId=brngId) WHERE dopjOpnjId='$nofaktur'";
        $data=array(
            'page'=>'orderpenjualan/detailorder',
            'link'=>'orderpenjualan',
            'list'=>$this->M_pos->kueri($query)->result(),
            'opnjId'=>$nofaktur,
        );
        $this->load->view('partials/back/wrapper',$data);
    }

    public function terimaorder($nofaktur){
       //simpan ke penjualan
       //simpan ke detpenjualan
       //update order penjuala
        //1.ubah status dari Order -> Sales
        //2.ubah opnjPnjlId dari '' -> pnjlId
    }
}
