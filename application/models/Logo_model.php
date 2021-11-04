<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo_model extends CI_Model {

    public function fetchActive(){
       
        $this->db->select('*');
        $this->db->from('tbl_logos');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
        
    }
}

?>