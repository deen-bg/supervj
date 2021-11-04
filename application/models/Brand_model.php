<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {

    public function fetchAll(){
       
        $this->db->select('*');
        $this->db->from('tbl_name_sale');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
        
    }
    public function fetchAdd(){
       
        $this->db->select('*');
        $this->db->from('tbl_address');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function fetchLogo()
    {
        $this->db->select('*');
        $this->db->from('tbl_logos');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_logo($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'name'          => $arr['name'],
            'img_cover'     => $arr['image_cover'],
            'update_date'   => $cur_date
        );
    
        $this->db->where('id', $arr['logo_id']);
        $this->db->update('tbl_logos', $data);
        return $this->db->affected_rows();
    }

    public function fetchBrandName()
    {
        $this->db->select('*');
        $this->db->from('tbl_name_sale');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_brandname($name,$br_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'name'          => $name,
            'update_date'   => $cur_date
        );
    
        $this->db->where('id', $br_id);
        $this->db->update('tbl_name_sale', $data);
        return $this->db->affected_rows();

    }
}

?>