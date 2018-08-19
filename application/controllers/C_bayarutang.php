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
		// $max_id_awal = $this->M_pos->max_id('bayarutang','byruNoFaktur','byruId','DESC');
		// if (empty($max_id_awal)) {
		// 	$max_id_awal = "BRT-0000";
		// }else{
		// 	$max_id_awal = $max_id_awal->byruNoFaktur;
		// }
        
  //       $cek_id = explode("-", $max_id_awal);
  //       // var_dump($cek_id);
  //       // die();
  //       if ($cek_id[0] != 'BRT') {
  //           $nofaktur = "BRT-0001";
  //       }else{
  //           $nofaktur = $this->M_pos->autonumber($max_id_awal,4,4);
  //       }
		$nofaktur=$this->M_pos->kode_bayarutang();
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
			'pembelian'=>$this->M_pos->list_data_where('pmblSplrId',@$_POST['pmblStunId'],'pembelian')->result(),
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$data=array(
			'list'=>$this->M_pos->list_join('detbayarutang_temp','pembelian','dbyuPmblId=pmblId'),
		);
		$this->load->view('bayarutang/datadetailtemp',$data);
	}

	public function formdetail($byruId){
		$data=array(
			'page'=>'bayarutang/detailbayarutang',
			'link'=>'bayarutang',
			'script'=>'script/bayarutang',
			'list'=>$this->M_pos->list_join2_where('bayarutang','detbayarutang','byruId=dbyuByruId','supplier','byruSplrId=splrId','',array('byruId'=>$byruId),'')
		);
		//$this->M_pos->list_join2_where('detbayarutang','supplier','dbyuByruId=splrId','bayarutang','dbyuByruId=byruId','',array('byruId'=>$byruId),'');
		// print_r($this->M_pos->kueri_terakhir());
		// die();
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahdetbayarutang(){

		$dbyuPmblId=$this->input->post('dbypPnjlId',true);
	    $dbyuBayar=$this->input->post('dtpbJumlah',true);  
	    //$dtpbJumlah=$this->input->post('dtpbJumlah',true); 
	    // $createdby=$this->session->userdata('userNama');
	    $createdby=$this->M_pos->usercreated();
	    
	    $data=array(
	        'dbyuPmblId'=>$dbyuPmblId,
	        'dbyuBayar'=>$dbyuBayar,
	        //'dtpbJumlah'=>$dtpbJumlah,
	        'dbyuCreatedBy'=>$createdby,
	    );
	    $simpandetailtemp=$this->M_pos->simpan_data($data,'detbayarutang_temp');
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

	public function hapusdetail($dbyuId){
		$hapusdetailtemp=$this->M_pos->hapus('dbyuId',$dbyuId,'detbayarutang_temp');
	    if($hapusdetailtemp){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
	        );
	        echo json_encode(array('status'=>'success'));
	     }else{
	       $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
	        );
	       echo json_encode(array('status'=>'fail'));
	     }		
	}

	public function simpanall(){

		$createdby=$this->M_pos->usercreated();
	    $query="SELECT COALESCE((sum(dbyuBayar)),0) as total from detbayarutang_temp where dbyuCreatedBy='$createdby'";
	    //cek apakah data kosong? jika ada isi lanjutkan
	    $pmblTotalBayarUtang=$this->M_pos->kueri($query)->row()->total;

	    if($pmblTotalBayarUtang==0){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
	        );
	        redirect(base_url().'c_bayarutang/formtambah2'); //location
	    }
	    else{
	     // $byruNoFaktur=$this->input->post('pmblKode',true);
	     $byruTanggal=$this->input->post('daritanggal',true);
	     $byruSplrId=$this->input->post('dbyuPmblId',true);
	     $byruTotalBayar=$pmblTotalBayarUtang;
	     $byruKet=$this->input->post('pmblKet',true);
	   	 $nofaktur=$this->M_pos->kode_bayarutang();
	     //data untk simpan ke tabel pembelian
	     $databayarutang=array(
	        'byruNoFaktur'=>$nofaktur,
	        'byruTanggal'=>date("Y-m-m", strtotime($byruTanggal)),
	        'byruSplrId'=>$byruSplrId,
	        'byruTotalBayar'=>$byruTotalBayar,
	        'byruKet'=>$byruKet,
	     );
	     // var_dump($databayarutang);
	     // die();
	      //simpan ke pembelian
	     $simpanbayaruutang=$this->M_pos->simpan_data($databayarutang,'bayarutang');
	     $byru = $this->db->insert_id();

	      $querytemp="SELECT * FROM detbayarutang_temp where dbyuCreatedBy='$createdby'";
	     //data untuk simpan ke tabel det pembelian
	      $bayarutang_temp=$this->M_pos->kueri($querytemp)->result();
	      $i=0;
	      foreach ($bayarutang_temp as $row) {
	         $ins[$i]['dbyuByruId']         = $byru;
	         $ins[$i]['dbyuPmblId']         = $row->dbyuPmblId;
	         $ins[$i]['dbyuBayar']          = $row->dbyuBayar;
	         $i++;  
	      } 

	     //simpan ke det pembelian
	     $simpandet=$this->M_pos->insertbatch('detbayarutang',$ins);
	     //hapus det pembelian temp
	     $hapustem=$this->M_pos->hapus('dbyuCreatedBy',$createdby,'detbayarutang_temp');

	     if($simpanbayaruutang && $simpandet && $hapustem){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
	        );
	        redirect(base_url().'c_bayarutang'); //location
	     }
	     else{
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
	        );
	        redirect(base_url().'c_bayarutang'); //location
	     }
	    }
	}

	public function hapusall($nofaktur){
    $hapusdet=$this->M_pos->hapus('dbyuId',$nofaktur,'detbayarutang');
    $hapusbayarutang=$this->M_pos->hapus('byruId',$nofaktur,'bayarutang');
    
    if($hapusbayarutang && $hapusdet){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_bayarutang'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_bayarutang'); //location
     }      
   }

	public function get_pembelian($pmblId){
		$data=$this->M_pos->ambil('pmblId',$pmblId,'pembelian')->row_array();
        echo json_encode($data);
	}

}
