<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
	  $data=array(
	     'page'=>'front/beranda',
	     'link'=>'beranda'
      );
      $this->load->view('partials/front/wrapper',$data);
	}

	public function loginpelanggan(){
	  $data=array(
	     'page'=>'front/loginpelanggan',
	     'link'=>'loginpelanggan'
      );
      $this->load->view('partials/front/wrapper',$data);	
	}

	public function produk(){
	  $data=array(
	     'page'=>'front/produk',
	     'link'=>'produk',
	     'listbarang'=>$this->M_pos->list_data_all('barang'),
      );
      $this->load->view('partials/front/wrapper',$data);	
	}

	public function authpelanggan(){
		$namauser=$this->input->post('namauser',true);
    	$password=md5($this->input->post('password',true));
    	$where=array(
          'plgnNamaUser'=>$namauser,
          'plgnPassword'=>$password,
    	);
    	$cek=$this->M_pos->cek_login_pelanggan($where)->num_rows();
    	

    	if($cek!=0){
      	$data_session = array(
          'Nama' => $this->M_pos->cek_login_pelanggan($where)->row()->plgnNama,
          'Hakakses'=> "pelanggan",
          'Id'=>$this->M_pos->cek_login_pelanggan($where)->row()->plgnId,
          'status' => "login",  
      	);
      
      	$this->session->set_userdata($data_session);
      		echo '<script>alert("Selamat Datang "'.$namauser.')</script>';
      		echo'<script>window.location.href="'.base_url().'";</script>';
    	}
    	else{
      		echo '<script>alert("Maaf, Nama User / Password Anda Salah")</script>';
      		echo'<script>window.location.href="'.base_url().'";</script>';
    	}
	}

	public function logout(){
		session_destroy();
        echo 'please wait..';
        echo'<script>window.location.href="'.base_url().'";</script>';
	}

	public function orderproduk(){
		$Id=$this->M_pos->cekidpelanggan();
		$query="SELECT * FROM orderpenjualan WHERE opnjPlgnId='$Id' ORDER BY opnjId DESC";
		$data=array(
		   'page'=>'front/orderproduk',
		   'link'=>'orderproduk',
		   'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/front/wrapper',$data);
	}

	public function cart(){
		$Id=$this->M_pos->cekidpelanggan();
		$query="SELECT * FROM detorderpenjualan_temp JOIN barang on dopjBrngId=brngId WHERE dopjCreatedBy='$Id' ORDER BY dopjBrngId DESC";
		$data=array(
		   'page'=>'front/cart',
		   'link'=>'cart',
		   'list' => $this->M_pos->kueri($query)->result(),
		);
		$this->load->view('partials/front/wrapper',$data);
	}


	public function simpanorder_temp(){
		$dopjBrngId=$this->input->post('dopjBrngId',true);
        $dopjJumlah=$this->input->post('dopjJumlah',true);  
        $dopjHarga=$this->input->post('dopjHarga',true); 
        $dopjDiskon=$this->input->post('dopjDiskon',true);//set 0 aja waktu di post
        $dopjCreatedBy=$this->M_pos->cekidpelanggan();

        $data=array(
            'dopjBrngId'=>$dopjBrngId,
            'dopjJumlah'=>$dopjJumlah,
            'dopjHarga'=>$dopjHarga,
            'dopjDiskon'=>$dopjDiskon,
            'dopjCreatedBy'=>$dopjCreatedBy,
        );
        $simpandetailtemp=$this->M_pos->simpan_data($data,'detorderpenjualan_temp');
        if($simpandetailtemp){
            // $this->session->set_flashdata(
            //     'msg', 
            //     '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil ditambah !</div>'
            // );
          echo'<script>location.reload();</script>';
            redirect(base_url().'front/produk'); //location
         }else{
           // $this->session->set_flashdata(
           //      'msg', 
           //      '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah !</div>'
           //  );
          
           redirect(base_url().'front/produk'); //location
         }  

	}

	public function simpanallorder(){
		$dopjCreatedBy=$this->M_pos->cekidpelanggan();
    	$query="SELECT COALESCE((sum(dopjJumlah*dopjHarga)),0) as total from detorderpenjualan_temp where dopjCreatedBy='$dopjCreatedBy'";
    	//cek apakah data kosong? jika ada isi lanjutkan
    	$opnjTotalOrder=$this->M_pos->kueri($query)->row()->total;

    	if($opnjTotalOrder==0){
    	   $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
        	);
        	redirect(base_url().'front/produk'); //location
    	}else{
    	   	$opnjNoFaktur=$this->M_pos->kode_order();
    	   	$opnjTanggal=date('Y-m-d');
    	   	$opnjPlgnId=$dopjCreatedBy;
    	   	$opnjKet='Order Produk';
    	   	$onpjStatusOrder='Order';
    	   	$onpjPnjlId='';

    	   	$dataorder=array(
    	   	   'opnjNoFaktur'=>$opnjNoFaktur,
    	   	   'opnjKet'=>$opnjKet,
    	   	   'opnjTanggal'=>$opnjTanggal,
    	   	   'opnjPlgnId'=>$opnjPlgnId,
    	   	   'opnjStatusOrder'=>$onpjStatusOrder,
    	   	   'opnjPnjlId'=>$onpjPnjlId,
    	   	   'opnjTotalOrder'=>$opnjTotalOrder,
    	   	);
    	   	  //simpan ke orderpenjualan
     		$simpanorder=$this->M_pos->simpan_data($dataorder,'orderpenjualan');
     		$opnjId = $this->db->insert_id();

     		$querytemp="SELECT * FROM detorderpenjualan_temp where dopjCreatedBy='$dopjCreatedBy'";
		    //data untuk simpan ke tabel det pembelian
		    $order_temp=$this->M_pos->kueri($querytemp)->result();
		    $i=0;
		    foreach ($order_temp as $row) {
	         $ins[$i]['dopjOpnjId']          = $opnjId;
	         $ins[$i]['dopjBrngId']          = $row->dopjBrngId;
	         $ins[$i]['dopjJumlah']          = $row->dopjJumlah;
	         $ins[$i]['dopjHarga']           = $row->dopjHarga;
	         $ins[$i]['dopjDiskon']          = $row->dopjDiskon;
	         $i++;  
		    } 
		    //simpan ke det pembelian
     		$simpandet=$this->M_pos->insertbatch('detorderpenjualan',$ins);
     		//hapus det pembelian temp
     		$hapustem=$this->M_pos->hapus('dopjCreatedBy',$dopjCreatedBy,'detorderpenjualan_temp');
     		if($simpanorder && $simpandet && $hapustem){
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Order Produk Berhasil </div>'
	        );
	        redirect(base_url().'front/produk'); //location
	     	}
	     	else{
	        $this->session->set_flashdata(
	            'msg', 
	            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Order Produk Gagal </div>'
	        );
	        redirect(base_url().'front/produk'); //location
	     	}
    	
    	}
	}
  public function hapusdetail($dopjId){

    $hapusdetailtemp=$this->M_pos->hapus('dopjId',$dopjId,'detorderpenjualan_temp');
    if($hapusdetailtemp){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'front/cart');
        //echo json_encode(array('status'=>'success'));
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'front/cart');
       //echo json_encode(array('status'=>'fail'));
     }      
   }
}