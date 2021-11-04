<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    // for admin
    public function fetchAllMenu()
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(20);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function fetchAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->where('is_active', 1);
        $this->db->limit(20);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($pid)
    {
            $this->db->select('*');
            $this->db->from('tbl_menu');
            $this->db->where('id', $pid);
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->result();
    }

    public function update_isactive($id,$st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'is_active'     => $st,
            'update_date'   => $cur_date
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_menu', $data);
        return $this->db->affected_rows();
    }

    public function menu_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_menu');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function updatefileUpload($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        if($arr['image_cover'] !=''){
            $data = array(
                'name'          => $arr['name'],
                'price'         => $arr['price'],
                'unit_id'       => $arr['unit'],
                'weight'        => $arr['weight'],
                'img_cover'     => $arr['image_cover'],
                'update_date'   => $cur_date
            );
        }else{
            $data = array(
                'name'          => $arr['name'],
                'price'         => $arr['price'],
                'unit_id'       => $arr['unit'],
                'weight'        => $arr['weight'],
                'update_date'   => $cur_date
            );
        }

        $this->db->where('id', $arr['product_id']);
        $this->db->update('tbl_menu', $data);
        return $this->db->affected_rows();
    }
    

}


?>