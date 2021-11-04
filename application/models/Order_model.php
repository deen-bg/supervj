
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function fetchAll()
    {
        $this->db->select('*,TIMESTAMPDIFF(day, tbl_order.create_date, NOW()) AS Days,
        TIMESTAMPDIFF(hour, tbl_order.create_date, NOW()) AS Hours,
        TIMESTAMPDIFF(minute, tbl_order.create_date, NOW()) AS Minutes');
        $this->db->from('tbl_order');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function order_detail($order_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('is_timestamp', $order_id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function order_list_detail($order_id)
    {
        
        $this->db->select('
            od.product_name, 
            od.qty,
            od.subtotal,
            od.total,
            od.text_note');
        $this->db->from('tbl_order AS o');
        $this->db->join('tbl_order_desc AS od', 'o.id = od.order_id', 'inner');
        $this->db->where('o.is_timestamp',$order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function order_history($order_id)
    {
        $this->db->select('
            TIMESTAMPDIFF(day, tbl_order.create_date, NOW()) AS Days,
            TIMESTAMPDIFF(hour, tbl_order.create_date, NOW()) AS Hours,
            TIMESTAMPDIFF(minute, tbl_order.create_date, NOW()) AS Minutes,
            tbl_order.id,
            tbl_order.customer,
            tbl_order.order_year,
            tbl_order.order_no,
            tbl_order.order_tel,
            tbl_order.order_line,
            tbl_order.order_address,
            tbl_order.province,
            tbl_order.aumphur,
            tbl_order.tambon,
            tbl_order.zipcode,
            tbl_order.order_total,
            tbl_order.order_delivery,
            tbl_order.delivery_type,
            tbl_order.delivery_note,
            tbl_order.slip,
            tbl_order.is_timestamp,
            tbl_order.is_check,
            tbl_order.is_status,
            tbl_order.is_active,
            tbl_order.create_date,
            tbl_order.update_date,
            tbl_order.create_time,
            tbl_order_desc.order_dsc_id,
            tbl_order_desc.order_id,
            tbl_order_desc.product_id,
            tbl_order_desc.product_name,
            tbl_order_desc.qty,
            tbl_order_desc.text_note,
            tbl_order_desc.subtotal,
            tbl_order_desc.total,
            tbl_order_desc.rank,
            tbl_menu.id AS menu_id,
            tbl_menu.`name` AS menu_name,
            tbl_menu.price AS menu_price,
            tbl_menu.img_cover
        ');
        $this->db->from('tbl_order');
        $this->db->join('tbl_order_desc', 'tbl_order.id = tbl_order_desc.order_id', 'inner');
        $this->db->join('tbl_menu', 'tbl_order_desc.product_id = tbl_menu.id', 'inner');
        $this->db->where('tbl_order.id',$order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function confirm_payment($is_check,$order_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        $data = array(
            'is_check'      => $is_check,
            'update_date'   => $cur_date    
        );
        $this->db->where('id', $order_id);
        $this->db->update('tbl_order', $data);
        return $this->db->affected_rows();
    }

    

    // public function payslip($arr)
    // {
    //     date_default_timezone_set("Asia/Bangkok");
    //     $cur_date = date("Y-m-d H:i:s");

    //     if($arr['image_cover'] !=''){
    //         $data = array(
    //             'order_date'    => $arr['dates'],
    //             'order_time'    => $arr['times'],
    //             'order_cost'    => $arr['summoney'],
    //             'slip'          => $arr['image_cover'],
    //             'update_date'   => $cur_date
    //         );
    //         $this->db->where('id', $arr['order_id']);
    //         $this->db->update('tbl_order', $data);
    //         return $this->db->affected_rows();
    //     } else {
    //         return false;
    //     }

    // }

    // public function today_list()
    // {
        
    //     $datenow = date('Y-m-d');  

    //     $this->db->select('*');
    //     $this->db->from('tbl_order');
    //     $this->db->where('is_active', 1);
    //     $this->db->like('create_date', $datenow); // Produces: WHERE `create_date` LIKE '%2021-09-30%' ESCAPE '!'
    //     $this->db->order_by('id', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();

    // }

    

    // public function item_list($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_order_desc');
    //     $this->db->where('order_id', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

}

?>