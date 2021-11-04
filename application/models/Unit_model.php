<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {

    // for admin
    public function fetchAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetchActive()
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $this->db->where('is_active', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_isactive($id,$st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        $data = array(
            'is_active'     => $st
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_unit', $data);
        return $this->db->affected_rows();
    }

}


?>