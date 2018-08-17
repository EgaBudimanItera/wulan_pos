<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
        
         // var_dump($max_id);
         // die();
		$data=array(
			'page'=>'penjualan/datapenjualan',
			'link'=>'penjualan',
			'list'=>$this->M_pos->list_join('penjualan','pelanggan','pnjlPlgnId=plgnId'),
            
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function formtambah(){
        // $max_id_awal = $this->M_pos->max_id('penjualan','pnjlNoFaktur','pnjlId','DESC');
        // $max_id_awal = $max_id_awal->pnjlNoFaktur;
        
        // $cek_id = explode("-", $max_id_awal);
        // // var_dump($cek_id);
        // // die();
        // if ($cek_id[0] != 'PENJ') {
        //     $nofaktur = "PENJ-0001";
        // }else{
        //     $nofaktur = $this->M_pos->autonumber($max_id_awal,5,4);
        // }
        $nofaktur=$this->M_pos->kode_penjualan();
		$query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
		$data=array(
			'page'=>'penjualan/formtambah',
			'link'=>'penjualan',
			'script'=>'script/penjualan',
			'pelanggan'=>$this->M_pos->list_data_all('pelanggan'),
			'barang'=>$this->M_pos->kueri($query)->result(),
            'nofaktur'=>$nofaktur,
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tabeldetailtemp(){
		$query="SELECT * FROM detpenjualan_temp join barang on(dtpjBrngId=brngId)";
		$data=array(
			'list'=>$this->M_pos->kueri($query)->result(),
		);
		$this->load->view('penjualan/datadetailtemp',$data);
	}

	public function formdetail($nofaktur){
		$data=array(
			'page'=>'penjualan/detailpenjualan',
			'link'=>'penjualan',
			
		);
		$this->load->view('partials/back/wrapper',$data);
	}

	public function tambahpenjualandet(){
        $dtpjBrngId=$this->input->post('dtpjBrngId',true);
        $dtpjJumlah=$this->input->post('dtpjJumlah',true);  
        $dtpjHarga=$this->input->post('dtpjHarga',true); 
        // $createdby=$this->session->userdata('userNama');
        $createdby=$this->M_pos->usercreated();
        $sisastok=$this->M_pos->ambil('brngId',$dtpjBrngId,'barang')->row()->brngStokAkhir;
        if($dtpjJumlah>$sisastok){
          $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah Karena Stok Kurang!</div>'
           );
          echo json_encode(array('status'=>'fail'));
        }
        else{
           $data=array(
            'dtpjBrngId'=>$dtpjBrngId,
            'dtpjJumlah'=>$dtpjJumlah,
            'dtpjHarga'=>$dtpjHarga,
            'dtpjCreatedBy'=>$createdby,
            );
            $simpandetailtemp=$this->M_pos->simpan_data($data,'detpenjualan_temp');
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
   }

   public function hapusdetail($dtpjId){

   	$hapusdetailtemp=$this->M_pos->hapus('dtpjId',$dtpjId,'detpenjualan_temp');
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
    $query="SELECT COALESCE((sum(dtpjJumlah*dtpjHarga)),0) as total from detpenjualan_temp where dtpjCreatedBy='$createdby'";
    //cek apakah data kosong? jika ada isi lanjutkan
    $pnjlTotalJual=$this->M_pos->kueri($query)->row()->total;

    if($pnjlTotalJual==0){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
        );
        redirect(base_url().'c_penjualan/formtambah'); //location
    }
    else{
     $pnjlUangMuka=$this->input->post('pnjlUangMuka',true);
     $pnjlDiskon=$this->input->post('pnjlDiskon',true);
     $pnjlOngkir=$this->input->post('pnjlOngkir',true);
     $pnjlSisaBayar=$pnjlTotalJual-$pnjlUangMuka-$pnjlDiskon+$pnjlOngkir;
     $pnjlTanggal=date_format(date_create($this->input->post('pnjlTanggal',true)),"Y-m-d");
     $pnjlJatuhTempo=strtotime('30 days',strtotime($pnjlTanggal));
     $pnjlJatuhTempo=date('Y-m-d',$pnjlJatuhTempo);
     //data untk simpan ke tabel penjualan
     $pnjlNoFaktur=$this->M_pos->kode_penjualan();
     $datapenjualan=array(
        'pnjlNoFaktur'=>$pnjlNoFaktur,
        'pnjlTanggal'=>$pnjlTanggal,
        'pnjlPlgnId'=>$this->input->post('pnjlPlgnId',true),
        'pnjlKet'=>$this->input->post('pnjlKet',true),
        'pnjlTotalJual'=>$pnjlTotalJual,
        'pnjlUangMuka'=>$pnjlUangMuka,
        'pnjlDiskon'=>$pnjlDiskon,
        'pnjlOngkir'=>$pnjlOngkir,
        'pnjlSisaBayar'=>(string) $pnjlSisaBayar ,
        'pnjlJatuhTempo'=>$pnjlJatuhTempo,
     );


      //simpan ke penjualan
     $simpanpenjualan=$this->M_pos->simpan_data($datapenjualan,'penjualan');

     $pnjlId = $this->db->insert_id();

      $querytemp="SELECT * FROM detpenjualan_temp where dtpjCreatedBy='$createdby'";
     //data untuk simpan ke tabel det penjualan
      $penjualan_temp=$this->M_pos->kueri($querytemp)->result();
      $i=0;
      foreach ($penjualan_temp as $row) {
         $ins[$i]['dtpjPnjlId']          = $pnjlId;
         $ins[$i]['dtpjBrngId']          = $row->dtpjBrngId;
         $ins[$i]['dtpjJumlah']          = $row->dtpjJumlah;
         $ins[$i]['dtpjHarga']           = $row->dtpjHarga;
         //$ins[$i]['dtpjDiskon']          = $row->dtpjDiskon;
         $i++;  
      } 

     //simpan ke det penjualan
     $simpandet=$this->M_pos->insertbatch('detpenjualan',$ins);
     //hapus det penjualan temp
     $hapustem=$this->M_pos->hapus('dtpjCreatedBy',$createdby,'detpenjualan_temp');

     if($simpanpenjualan && $simpandet && $hapustem){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
        );
        redirect(base_url().'c_penjualan'); //location
     }
     else{
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
        );
        redirect(base_url().'c_penjualan'); //location
     }
    }
   }

   public function hapusall($nofaktur){
    $hapusdet=$this->M_pos->hapus('dtpjPnjlId',$nofaktur,'detpenjualan');
    $hapuspenjualan=$this->M_pos->hapus('pnjlId',$nofaktur,'penjualan');
    
    if($hapuspenjualan && $hapusdet){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_penjualan'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_penjualan'); //location
     }      
   }

}
