<?php

class M_pos extends CI_Model {

    function simpan_data($data, $table){
        $this->default->insert($table, $data);
        return true;
    }

    function kueri($query){
        return $this->default->query($query);
    }
    
    function list_data_all($table){
         return $query = $this->default->get($table)->result();  
    }

    function list_data_where($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }

    function count($table){
        return $query = $this->default->get($table);
    }
    
     function ambil($param_id, $id, $table){
       return $this->db->get_where($table, array($param_id => $id));
    }
    
}