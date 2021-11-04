<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function fetchAll(){
       
        $this->db->select('*');
        $this->db->from('tbl_contactcon');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return array();
        } 
    }

    public function update($arr)
    {  
        $data = array(
            'fbicon'    => $arr['fb_link'],
            'igicon'    => $arr['ig_link'],
            'licon'     => $arr['line_link'],
            'picon'     => $arr['tel']
        );
    
        $this->db->where('id', $arr['social_id']);
        $this->db->update('tbl_contactcon', $data);
        return $this->db->affected_rows();
    }
}

?>