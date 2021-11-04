<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends CI_Model {

    public function fetchAll(){
        
        $this->db->select('*');
        $this->db->from('tbl_linky');
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function update($name,$link,$id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
    
        $data = array(
            'name_y'        => $name,
            'link_y'        => $link,
            'update_date'   => $cur_date
        );
    
        $this->db->where('id', $id);
        $this->db->update('tbl_linky', $data);
        return $this->db->affected_rows();
    }
    public function socialLink()
    {
        $this->db->select('*');
        $this->db->from('tbl_contactcon');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>