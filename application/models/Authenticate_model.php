<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate_model extends CI_Model {

    public function checkLoggedIn($usename,$passwd){

        $hash = password_hash($passwd, PASSWORD_DEFAULT);
        
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('username', $usename);
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            $checkLogin = $query->result_array();
            
            if (password_verify(@$passwd,$checkLogin[0]['password']))
            {
                // match
                $this->session->set_userdata('user_id',$checkLogin[0]['id']);
                $this->session->set_userdata('full_name',$checkLogin[0]['full_name']);
                $this->session->set_userdata('user',$checkLogin[0]['username']);
                $this->session->set_userdata('createdate',$checkLogin[0]['create_date']);
                $this->session->set_userdata('is_user_logged_in',TRUE);
                
                $dataArr =array(
                   "message"   => 'success',
                   "status"    => '200',
                   "_token"    => $this->security->get_csrf_hash()
                );
            } else {
                // not match
                $dataArr =array(
                   "message" => 'error',
                   "status" => '400',
                   "_token"    => $this->security->get_csrf_hash()
               );
           }
        } else {
            $dataArr =array(
               "message" => 'error',
               "status" => '400',
               "_token"    => $this->security->get_csrf_hash()
           );
        }
        return $dataArr;
    }

}


?>