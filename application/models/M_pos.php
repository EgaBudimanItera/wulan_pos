<?php

class M_pos extends CI_Model {

    function simpan_data($data, $table){
        $this->db->insert($table, $data);
        return true;
    }

    function kueri($query){
        return $this->db->query($query);
    }
    
    function insertbatch($table,$insert) {
         $this->db->insert_batch($table,$insert);
         return true;
    }

    function list_data_all($table){
         return $query = $this->db->get($table)->result();  
    }

    function cek_login($where){      
        return $this->db->get_where('users',$where);
    }

    function cek_login_pelanggan($where){      
        return $this->db->get_where('pelanggan',$where);
    }

    function list_data_where($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    function count($table){
        return $query = $this->db->get($table);
    }
    
    function hapus($param_id, $id, $table){
        $this->db->delete($table, array($param_id => $id)); 
        return true;
    }
    
    function ambil($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    function ambil_new($param, $table){
        return $this->db->get_where($table, $param);
    }
    
    function update($param_id, $id, $table, $data){       
        $this->db->where($param_id, $id);
        $this->db->update($table, $data); 
        return true;
    }

    function usercreated(){
        $createdby=$this->session->userdata('userNama');
        return $createdby;
    }

    function cekidpelanggan(){
        $Id=$this->session->userdata('Id');
        return $Id;
    }

    function list_join($table1, $table2, $param1){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1);
        return $query = $this->db->get()->result();
    }

    function list_join2($table1, $table2, $param1,$table3, $param2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1);
        $this->db->join($table3, $param2);
        return $query = $this->db->get()->result();
    }

    function list_join2_where($table1, $table2, $param1, $table3, $param2, $mode='', $key='', $db=''){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1);
        $this->db->join($table3, $param2);
        if($key!=''){            
            $this->db->where($key);
        }
        return $query = $this->db->get()->result();
    }
    
    function list_join_where($table1, $table2, $param1, $mode='', $key='', $db=''){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1, $mode);
        if($key!=''){            
            $this->db->where($key);
        }
        return $query = $this->db->get();
    }

    function kode_barang(){
        //K002
        $this->db->select('Right(brngKode,3) as kode',false);
        
        $this->db->order_by('brngKode','desc');
        $this->db->limit(1);
        $query = $this->db->get('barang');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "B".$kodemax;
        return $kodejadi;
    }

    function kode_pelanggan(){
        //K002
        $this->db->select('Right(plgnKode,3) as kode',false);
        
        $this->db->order_by('plgnKode','desc');
        $this->db->limit(1);
        $query = $this->db->get('pelanggan');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "P".$kodemax;
        return $kodejadi;
    }

    function kode_supplier(){
        //K002
        $this->db->select('Right(splrKode,3) as kode',false);
        
        $this->db->order_by('splrKode','desc');
        $this->db->limit(1);
        $query = $this->db->get('supplier');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi  = "S".$kodemax;
        return $kodejadi;
    }

    function kode_penjualan(){
        //K002
        $this->db->select('Right(pnjlNoFaktur,4) as kode',false);
        
        $this->db->order_by('pnjlId','desc');
        $this->db->limit(1);
        $query = $this->db->get('penjualan');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "PJ".date("my").$kodemax;
        return $kodejadi;
    }

    function kode_bayarutang(){
        //K002
        $this->db->select('Right(byruNoFaktur,4) as kode',false);
        
        $this->db->order_by('byruId','desc');
        $this->db->limit(1);
        $query = $this->db->get('bayarutang');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "BU".date("my").$kodemax;
        return $kodejadi;
    }

    function kode_bayarpiutang(){
        //K002
        $this->db->select('Right(byrpNoFaktur,4) as kode',false);
        
        $this->db->order_by('byrpId','desc');
        $this->db->limit(1);
        $query = $this->db->get('bayarpiutang');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "BP".date("my").$kodemax;
        return $kodejadi;
    }

    function kode_returbeli(){
        //K002
        $this->db->select('Right(rtpbNoFaktur,4) as kode',false);
        
        $this->db->order_by('rtpbId','desc');
        $this->db->limit(1);
        $query = $this->db->get('returpembelian');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "RB".date("my").$kodemax;
        return $kodejadi;
    }

    function kode_returjual(){
        //K002
        $this->db->select('Right(rtpjNoFaktur,4) as kode',false);
        
        $this->db->order_by('rtpjId','desc');
        $this->db->limit(1);
        $query = $this->db->get('returpenjualan');

        if($query->num_rows()<>0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;

        }
        $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
        $kodejadi  = "RJ".date("my").$kodemax;
        return $kodejadi;
    }

    public function terbilang ($angka) {
        $angka = (float)$angka;
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) { return sprintf('Seratus %s', $this->terbilang($angka - 100));
        } else if ($angka < 1000) { $hasil_bagi = (int)($angka / 100); $hasil_mod = $angka % 100; return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->terbilang($hasil_mod)));
        } else if ($angka < 2000) { return trim(sprintf('Seribu %s', $this->terbilang($angka - 1000)));
        } else if ($angka < 1000000) { $hasil_bagi = (int)($angka / 1000); $hasil_mod = $angka % 1000; return sprintf('%s Ribu %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod));
        } else if ($angka < 1000000000) { $hasil_bagi = (int)($angka / 1000000); $hasil_mod = $angka % 1000000; return trim(sprintf('%s Juta %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) { $hasil_bagi = (int)($angka / 1000000000); $hasil_mod = fmod($angka, 1000000000); return trim(sprintf('%s Milyar %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) { $hasil_bagi = $angka / 1000000000000; $hasil_mod = fmod($angka, 1000000000000); return trim(sprintf('%s Triliun %s', $this->terbilang($hasil_bagi), $this->terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }

    function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
 
    // mengambil nilai kode ex: KNS0015 hasil KNS
    $kode = substr($id_terakhir, 0, $panjang_kode);
 
    // mengambil nilai angka
    // ex: KNS0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
 
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
 
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
 
    return $id_baru;
    }

    function max_id($table,$field,$field2,$param){
        $this->db->select($field);
        $this->db->from($table);
        $this->db->order_by($field2,$param);
        $this->db->limit(1);
        return $query = $this->db->get()->row();

    }

    function kueri_terakhir(){
        return $this->db->last_query();
    }

    
}