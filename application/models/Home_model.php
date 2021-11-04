<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    // query all slide
    public function getAll(){

        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;

        } else {
            return false;
        }



    }

    // public function checkLoggedIn($usename,$passwd){
    //     $passw = md5($passwd);

    //     $this->db->select('*');
    //     $this->db->from('administrator');
    //     $this->db->where('username', $usename);
    //     $this->db->where('password', $passw);
    //     $query = $this->db->get();

    //     if($query->num_rows() > 0){
    //         $result = $query->result_array();
    //         $access = $result[0]['access'];
        
    //         $_SESSION['username'] = $usename;
    //         $_SESSION['password'] = $passw;

    //         $logtime = time(); // php 7.3.7 เลิกใช้งาน mktime(); แล้ว
    //         $_SESSION['a1'] = $access[0];
    //         $_SESSION['a2'] = $access[1];
    //         $_SESSION['a3'] = $access[2];
    //         $_SESSION['a4'] = $access[3];
    //         $_SESSION['a5'] = $access[4];
    //         $_SESSION['a6'] = $access[5];
    //         $_SESSION['logtime'] = $logtime;
    //         $getDate=date("Y-m-d H:i:s");
    //         // update status
    //         $data = array(
    //             'status' => '6',
    //         );
    //         $this->db->where('username', $usename);
    //         $this->db->update('administrator', $data);
    //         // save log
    //         $data2 = array(
    //             'username' => $usename,
    //             'time_in' => $getDate,
    //             'logtime' => $logtime
    //         );
    //        $this->db->insert('log_user', $data2);
                
    //         $dataArr =array(
    //             "message" => 'success',
    //             "status" => '200'
    //         );
    //         return $dataArr;

    //     } else {
    //         $dataArr =array(
    //             "message" => 'error',
    //             "status" => '400'
    //         );
    //         return $dataArr;
    //     } 
    // }

}


?>