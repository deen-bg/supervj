<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function fetchAll(){
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;

        } else {
            return false;
        }

    }
   
    // create
    public function create($getArr){
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
       
        $ip = $this->input->ip_address();
    
            $data = array(
                'title'         => $getArr['title'],
                'c_email'       => $getArr['email'],
                'c_message'     => $getArr['message'],
                'create_date'   =>$cur_date,
                'ip'            =>$ip,
            );
            $this->db->insert('tbl_contact', $data);
            $result =$this->db->affected_rows();
            if ($result > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
    }

    // // destroy
    // public function destroy($getID){
    //     // $sql = "UPDATE tbl_service SET is_active = '0' WHERE id = {$_POST['pid']}";

    //     $data = array(
    //         'is_active' => '0'
    //     );
    //     $this->db->where('id', $getID);
    //     $this->db->update('tbl_service', $data);
    //     $result =$this->db->affected_rows();

    //     if ($result > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }

    // }
}


?>