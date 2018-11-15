<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_orderpenjualan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_pos');
	}

	public function index(){
		$query="SELECT * FROM orderpenjualan join pelanggan on opnjPlgnId=plgnId where opnjStatusOrder='order'";
        $data=array(
			'page'=>'orderpenjualan/dataorder',
			'link'=>'orderpenjualan',
			'list'=>$this->M_pos->kueri($query)->result(),
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
            'o'=>$this->M_pos->kueri("SELECT * FROM orderpenjualan WHERE opnjId='$nofaktur'")->row(),
        );
        $this->load->view('partials/back/wrapper',$data);
    }

    public function terimaorder($nofaktur){
       //simpan ke penjualan
        $orderpenjualan=$this->M_pos->kueri("SELECT * FROM orderpenjualan WHERE opnjId='$nofaktur'")->row();
        $pnjlTanggal=date("Y-m-d", strtotime($orderpenjualan->opnjTanggal));
        $pnjlJatuhTempo=strtotime('30 days',strtotime($pnjlTanggal));
        $pnjlJatuhTempo=date("Y-m-d",$pnjlJatuhTempo);
        $pnjlNoFaktur=$this->M_pos->kode_penjualan();
        $datapenjualan=array(
            'pnjlNoFaktur'=>$pnjlNoFaktur,
            'pnjlTanggal'=>date("Y-m-d", strtotime($orderpenjualan->opnjTanggal)),
            'pnjlPlgnId'=>$orderpenjualan->opnjPlgnId,
            'pnjlKet'=>$orderpenjualan->opnjKet,
            'pnjlTotalJual'=>$orderpenjualan->opnjTotalOrder,
            'pnjlUangMuka'=>'',
            'pnjlDiskon'=>'',
            'pnjlOngkir'=>'',
            'pnjlSisaBayar'=>$orderpenjualan->opnjTotalOrder ,
            'pnjlJatuhTempo'=>$pnjlJatuhTempo,
         );
        //var_dump($datapenjualan);
        //die();
        $simpanpenjualan=$this->M_pos->simpan_data($datapenjualan,'penjualan');


       //simpan ke detpenjualan
        $pnjlId = $this->db->insert_id();
        $detorderpenjualan=$this->M_pos->kueri("SELECT * FROM detorderpenjualan WHERE dopjOpnjId='$nofaktur'")->result();
        
        $i=0;
        foreach ($detorderpenjualan as $row) {
         $ins2[$i]['dtpjPnjlId']          = $pnjlId;
         $ins2[$i]['dtpjBrngId']          = $row->dopjBrngId;
         $ins2[$i]['dtpjJumlah']          = $row->dopjJumlah;
         $ins2[$i]['dtpjHarga']           = $row->dopjHarga;
         $ins2[$i]['dtpjDiskon']          = $row->dopjDiskon;
         $i++;  
      } 
      $simpandet=$this->M_pos->insertbatch('detpenjualan',$ins2);
       //update order penjuala
      //1.ubah status dari Order -> Sales
        //2.ubah opnjPnjlId dari '' -> pnjlId
      $data=array(
        'opnjStatusOrder'=>'Sales',
        'opnjPnjlId'=>$pnjlId);
      $ubah = $this->M_pos->update('opnjId',$nofaktur,'orderpenjualan',$data);

      if($simpanpenjualan && $detorderpenjualan && $simpandet && $ubah){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
        );
        redirect(base_url().'c_orderpenjualan'); //location
     }
     else{
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
        );
        redirect(base_url().'c_orderpenjualan'); //location
     }


        
    }

    public function formtambah(){
        
        $nofaktur=$this->M_pos->kode_penjualan();
        $query="SELECT * FROM barang join satuan on(brngStunId=stunId)";
        $data=array(
            'page'=>'orderpenjualan/formtambah',
            'link'=>'orderpenjualan',
            'script'=>'script/orderpenjualan',
            'pelanggan'=>$this->M_pos->list_data_all('pelanggan'),
            'barang'=>$this->M_pos->kueri($query)->result(),
            'nofaktur'=>$nofaktur,
        );
        $this->load->view('partials/back/wrapper',$data);
    }

    public function tabeldetailtemp(){
        $query="SELECT * FROM detorderpenjualan_temp join barang on(dopjBrngId=brngId)";
        $data=array(
            'list'=>$this->M_pos->kueri($query)->result(),
        );
        $this->load->view('orderpenjualan/datadetailtemp',$data);
    }

    public function tambahorderpenjualandet(){
        $dopjBrngId=$this->input->post('dopjBrngId',true);
        $dopjJumlah=$this->input->post('dopjJumlah',true);  
        $dopjHarga=$this->input->post('dopjHarga',true);
        $dopjDiskon=$this->input->post('dopjDiskon',true); 
        $createdby=$this->session->userdata('userNama');
        //$createdby=$this->M_pos->usercreated();
        $sisastok=$this->M_pos->ambil('brngId',$dopjBrngId,'barang')->row()->brngStokAkhir;
        if($dopjJumlah>$sisastok){
          $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal ditambah Karena Stok Kurang!</div>'
           );
          echo json_encode(array('status'=>'fail'));
        }
        else{
           $data=array(
            'dopjBrngId'=>$dopjBrngId,
            'dopjJumlah'=>$dopjJumlah,
            'dopjHarga'=>$dopjHarga,
            'dopjDiskon'=>$dopjDiskon,
            'dopjCreatedBy'=>$createdby,
            );
            $simpandetailtemp=$this->M_pos->simpan_data($data,'detorderpenjualan_temp');
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

   public function hapusdetail($dopjId){

    $hapusdetailtemp=$this->M_pos->hapus('dopjId',$dopjId,'detorderpenjualan_temp');
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
    $query="SELECT COALESCE((sum(dopjJumlah*dopjHarga)),0) as total from detorderpenjualan_temp where dopjCreatedBy='$createdby'";
    //cek apakah data kosong? jika ada isi lanjutkan
    $pnjlTotalJual=$this->M_pos->kueri($query)->row()->total;

    if($pnjlTotalJual==0){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Gagal Karena Data Kosong </div>'
        );
        redirect(base_url().'c_orderpenjualan/formtambah'); //location
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
     // $datapenjualan=array(
     //    'pnjlNoFaktur'=>$pnjlNoFaktur,
     //    'pnjlTanggal'=>$pnjlTanggal,
     //    'pnjlPlgnId'=>$this->input->post('pnjlPlgnId',true),
     //    'pnjlKet'=>$this->input->post('pnjlKet',true),
     //    'pnjlTotalJual'=>$pnjlTotalJual,
     //    'pnjlUangMuka'=>$pnjlUangMuka,
     //    'pnjlDiskon'=>$pnjlDiskon,
     //    'pnjlOngkir'=>$pnjlOngkir,
     //    'pnjlSisaBayar'=>(string) $pnjlSisaBayar ,
     //    'pnjlJatuhTempo'=>$pnjlJatuhTempo,
     // );

     
     //  //simpan ke penjualan
     // $simpanpenjualan=$this->M_pos->simpan_data($datapenjualan,'penjualan');

     //$pnjlId = $this->db->insert_id();
     
     $dataorderpenjualan=array(
        'opnjNoFaktur'=>$pnjlNoFaktur,
        'opnjTanggal'=>$pnjlTanggal,
        'opnjPlgnId'=>$this->input->post('pnjlPlgnId',true),
        'opnjKet'=>$this->input->post('pnjlKet',true),
        'opnjTotalOrder'=>$pnjlTotalJual,
        'opnjStatusOrder'=>'Order',
        'opnjPnjlId'=>'',
     );

     $simpanorderpenjualan=$this->M_pos->simpan_data($dataorderpenjualan,'orderpenjualan');

     $pnjlId = $this->db->insert_id();

      $querytemp="SELECT * FROM detorderpenjualan_temp where dopjCreatedBy='$createdby'";
     //data untuk simpan ke tabel det penjualan
      $orderpenjualan_temp=$this->M_pos->kueri($querytemp)->result();
      $i=0;
      foreach ($orderpenjualan_temp as $row) {
         $ins[$i]['dopjOpnjId']          = $pnjlId;
         $ins[$i]['dopjBrngId']          = $row->dopjBrngId;
         $ins[$i]['dopjJumlah']          = $row->dopjJumlah;
         $ins[$i]['dopjHarga']           = $row->dopjHarga;
         $ins[$i]['dopjDiskon']          = $row->dopjDiskon;
         $i++;  
      }

      // foreach ($orderpenjualan_temp as $row) {
      //    $ins2[$i]['dtpjPnjlId']          = $pnjlId;
      //    $ins2[$i]['dtpjBrngId']          = $row->dopjBrngId;
      //    $ins2[$i]['dtpjJumlah']          = $row->dopjJumlah;
      //    $ins2[$i]['dtpjHarga']           = $row->dopjHarga;
      //    $ins2[$i]['dtpjDiskon']          = $row->dopjDiskon;
      //    $i++;  
      // } 

     //simpan ke det penjualan
     //$simpandet=$this->M_pos->insertbatch('detpenjualan',$ins2);

     $simpandet=$this->M_pos->insertbatch('detorderpenjualan',$ins);
     //hapus det penjualan temp
     $hapustem=$this->M_pos->hapus('dopjCreatedBy',$createdby,'detorderpenjualan_temp');

     if($simpanorderpenjualan && $simpandet && $hapustem){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Succes</strong> Simpan Data Penjualan Berhasil </div>'
        );
        redirect(base_url().'c_orderpenjualan'); //location
     }
     else{
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Warning!</strong> Simpan Data Penjualan Gagal </div>'
        );
        redirect(base_url().'c_orderpenjualan'); //location
     }
    }
   }

   public function hapusall($nofaktur){
    $hapusdet=$this->M_pos->hapus('dopjOpnjId',$nofaktur,'detorderpenjualan');
    $hapuspenjualan=$this->M_pos->hapus('opnjId',$nofaktur,'orderpenjualan');
    
    if($hapuspenjualan && $hapusdet){
        $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil dihapus !</div>'
        );
        redirect(base_url().'c_orderpenjualan'); //location
     }else{
       $this->session->set_flashdata(
            'msg', 
            '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Peringatan!</strong> Data gagal dihapus !</div>'
        );
       redirect(base_url().'c_orderpenjualan'); //location
     }      
   }

   public function invoice($nofaktur){
        $query="SELECT * FROM detorderpenjualan join barang on(dopjBrngId=brngId) WHERE dopjOpnjId='$nofaktur'";
        $query2="SELECT *FROM orderpenjualan WHERE opnjId='$nofaktur'";
        $data=array(
            'list'=>$this->M_pos->kueri($query)->result(),
            'nofaktur'=>$this->M_pos->kueri($query2)->row(),
        );

        $this->load->view('orderpenjualan/invoice',$data);
   }
}
