<?php

class M_pos extends CI_Model {

    function simpan_data($data, $table){
        $this->db->insert($table, $data);
        return true;
    }

    function kueri($query){
        return $this->db->query($query);
    }
    
    function list_data_all($table){
         return $query = $this->db->get($table)->result();  
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

    function list_join_where($table1, $table2, $param1, $mode='', $key='', $db=''){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $param1, $mode);
        if($key!=''){            
            $this->db->where($key);
        }
        return $query = $this->db->get()->result();
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
        $kodejadi  = "B".$kodemax;
        return $kodejadi;
    }
}