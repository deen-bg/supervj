<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    public function fetchAll(){
       
        $this->db->select('*');
        $this->db->from('tbl_banner');
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
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
       
        $data = array(
            'name'          => $arr['name'],
            'img_cover'     => $arr['image_cover'],
            'update_date'   => $cur_date
        );
    
        $this->db->where('id', $arr['banner_id']);
        $this->db->update('tbl_banner', $data);
        return $this->db->affected_rows();

    }
    // // for admin
    // public function listAll()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_slide');
    //     $this->db->where('is_active', 1);
    //     $this->db->order_by('id', 'ASC');
    //     $query = $this->db->get();

    //     if($query->num_rows() > 0 ) {
    //         return $query->result_array();
    //     } else {
    //         return array();
    //     }
    // }

    // public function create($reqName,$reqLink)
    // {
        
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");

    //     $data = array(
    //         'name'  => $reqName,
    //         'link'  => $reqLink,
    //         'is_recommend'  => '1',
    //         'is_active'     => '1',
    //         'create_date'   => $cur_date,
    //         'update_date'   => $cur_date
    //     );
    //     $this->db->insert('tbl_slide', $data);
    //     $insert_id = $this->db->insert_id();
    //     $result =$this->db->affected_rows();
    //     if ($result > 0) {
    //         return $insert_id;
    //     } else {
    //         return FALSE;
    //     }
    // }

    // public function fileUpload($dataArr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
       
    //     $data = array(
    //         'img_cover'     => $dataArr['image_cover'],
    //         'image_type'    => $dataArr['image_type'],
    //         'file_size'     => $dataArr['file_size'],
    //         'file_path'     => $dataArr['file_path'],
    //         'update_date'   => $cur_date
    //     );
    
    //     $this->db->where('id', $dataArr['banner_id']);
    //     $this->db->update('tbl_slide', $data);

    //     $result =$this->db->affected_rows();
    //     if ($result > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    // public function bannerDsc($getID)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_slide');
    //     $this->db->where('id', $getID);
    //     $this->db->limit(1); 
    //     $query = $this->db->get();

    //     if($query->num_rows() > 0 ) {
    //         return $query->result_array();
    //     } else {
    //         return array();
    //     }
    // }

    // public function updatefileUpload($dataArr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");
    //     if($dataArr['image_cover'] ==''){
    //         // no img
    //         $data = array(
    //             'name'          => $dataArr['banner_name'],
    //             'link'          => $dataArr['banner_link'],
    //             'update_date'   => $cur_date
    //         );
    //         $this->db->where('id', $dataArr['banner_id']);
    //         $this->db->update('tbl_slide', $data);
    
    //         $result =$this->db->affected_rows();
    //         if ($result > 0) {
    //             return TRUE;
    //         } else {
    //             return FALSE;
    //         }
    //     } else {
    //         // y img
    //         $data = array(
    //             'name'          => $dataArr['banner_name'],
    //             'link'          => $dataArr['banner_link'],
    //             'img_cover'     => $dataArr['image_cover'],
    //             'image_type'    => $dataArr['image_type'],
    //             'file_size'     => $dataArr['file_size'],
    //             'file_path'     => $dataArr['file_path'],
    //             'update_date'   => $cur_date
    //         );
    //         $this->db->where('id', $dataArr['banner_id']);
    //         $this->db->update('tbl_slide', $data);
    
    //         $result =$this->db->affected_rows();
    //         if ($result > 0) {
    //             return TRUE;
    //         } else {
    //             return FALSE;
    //         }

    //     }
    // }

    // public function destroy($reqID,$reqSts){

    //     $data = array(
    //         'is_active' => $reqSts
    //     );
    //     $this->db->where('id', $reqID);
    //     $this->db->update('tbl_slide', $data);

    //     $result =$this->db->affected_rows();
    //     if ($result > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }
}

?>