<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends CI_Model {

    public function fetchAll()
    {
        $this->db->select('
            tbl_province.province_id,
            tbl_province.province_th
        ');
        $this->db->from('tbl_province');
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function fetchAumphur($pro_id)
    {
        // 
        // $this->db->where('province_id', $pro_id);
        $this->db->select('
            district_id,
            district_th,
            district_en,
            province_id
        ');
        $this->db->from('tbl_tambon');
        $this->db->where('province_th', $pro_id);
        $this->db->group_by('district_id');
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function fetchTumbon($aumphurId)
    {
        // $this->db->where('district_id', $aumphurId);
        $this->db->select('
            tambon_id,
            tambon_th,
            zipcode,
            district_id
        ');
        $this->db->from('tbl_tambon');
        $this->db->where('district_th', $aumphurId);
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function fetchPostcode($tumbon)
    {
        $this->db->select('
            tambon_id,
            tambon_th,
            zipcode,
            district_id
        ');
        $this->db->from('tbl_tambon');
        $this->db->where('tambon_th', $tumbon);
        $query = $this->db->get();

        if($query->num_rows() > 0 ) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}


?>