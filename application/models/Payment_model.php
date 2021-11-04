<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    // display all is active=1
    public function update_slip($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");

        $data = array(
            'slip'    => $arr['image_cover'],
            'update_date'   => $cur_date
        );

        $this->db->where('id', $arr['order_id']);
        $this->db->update('tbl_order', $data);
        return $this->db->affected_rows();
    }

    public function check_payment($action,$fname,$tel)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('customer', $fname);
        $this->db->where('order_tel', $tel);
        $query = $this->db->get();

        return $query->result();

    }

    public function payment_history($tel,$name)
    {

        $this->db->select('
            odo.*, 
            SUM(tod.qty) AS p_qty, 
            tod.product_name,
            tod.subtotal,
            tod.subtotal,
            tod.qty,
            TIMESTAMPDIFF(day, odo.create_date, NOW()) AS Days,
            TIMESTAMPDIFF(hour, odo.create_date, NOW()) AS Hours,
            TIMESTAMPDIFF(minute, odo.create_date, NOW()) AS Minutes'
        );
        $this->db->from('tbl_order AS odo');
        $this->db->join('tbl_order_desc AS tod', 'odo.id = tod.order_id', 'inner');
        $this->db->where('odo.order_tel', $tel);
        $this->db->where('odo.customer', $name);
        $this->db->group_by('odo.id');
        $query = $this->db->get();
        return $query->result_array();

    }

}

?>