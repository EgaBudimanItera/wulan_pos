<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bayarutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$data=array(
			'page'=>'bayarutang/databayarutang',
			'link'=>'bayarutang',
			'list'=>$this->M_pos->list_join('bayarutang','supplier','byruSplrId=splrId'),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah1(){
		$max_id_awal = $this->M_pos->max_id('bayarutang','byruNoFaktur','byruId','DESC');
		if (empty($max_id_awal)) {
			$max_id_awal = "BRT-0000";
		}else{
			$max_id_awal = $max_id_awal->byruNoFaktur;
		}
        
        $cek_id = explode("-", $max_id_awal);
        // var_dump($cek_id);
        // die();
        if ($cek_id[0] != 'BRT') {
            $nofaktur = "BRT-0001";
        }else{
            $nofaktur = $this->M_pos->autonumber($max_id_awal,4,4);
        }
		$data=array(
			'page'=>'bayarutang/formtambah1',
			'link'=>'bayarutang',
			// 'script'=>'script/bayarutang',
			'nofaktur'=>$nofaktur,
			'supplier'=>$this->M_pos->list_data_all('supplier'),	
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah2(){
		$data=array(
			'page'=>'bayarutang/formtambah2',
			'link'=>'bayarutang',
			'script'=>'script/bayarutang',
			'pembelian'=>$this->M_pos->list_data_where('pmblSplrId',$_POST['pmblStunId'],'pembelian')->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array(
			'list'=>$this->M_pos->list_data_all('detbayarutang_temp'),
		);
		$this->load->view('bayarutang/datadetailtemp',$data);
	}

	public function formdetail($byruId){
		$data=array(
			'page'=>'bayarutang/detailbayarutang',
			'link'=>'bayarutang',
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function get_pembelian($pmblId){
		$data=$this->M_pos->ambil('pmblId',$pmblId,'pembelian')->row_array();
        echo json_encode($data);
	}

}
