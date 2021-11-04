<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    public function fetchAll(){

        $this->db->select('*');
        $this->db->from('tbl_dsc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($serv_id,$serv_dsc)
    {
        $data = array(
            'dsc'    => $serv_dsc
        );
        $this->db->where('id', $serv_id);
        $this->db->update('tbl_dsc', $data);
        return $this->db->affected_rows();
    }
}

?>