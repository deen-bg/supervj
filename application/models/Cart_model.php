
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function create($arr)
    {
        date_default_timezone_set("Asia/Bangkok");

        $created 	= date('Y-m-d H:i:s');
        $create_time = date ('H:i:s');
        $year 		= date('Y');

        $this->db->select_max('id', 'qid');
        $this->db->from('tbl_order');
        $this->db->where('id is NOT NULL',NULL, FALSE);
        $this->db->where('order_year', $year);        
        $query = $this->db->get();
        $max_id = $query->row('qid');        

        if($max_id > 0){
            $number = $max_id + 1;
        } else {
            $number = 1;
        }
        
        $pono = 'ORDER' . '-' . sprintf("%04d",$number) . $year;
        $current_mktime = mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $is_timestamp = $number . $current_mktime;

        $data = array(
            'customer'      => $arr['fname'],
            'order_no'      => $pono,
            'order_year'    => $year,
            'order_address' => $arr['address'],
            'province'      => $arr['province'],
            'aumphur'       => $arr['district'],
            'tambon'        => $arr['subdist'],
            'zipcode'       => $arr['postcode'],
            'order_tel'     => $arr['tel'],
            'order_line'    => $arr['lineid'],
            'is_timestamp'  => $is_timestamp,
            'create_date'   => $created,
            'create_time'   => $create_time
        );

        $this->db->insert('tbl_order', $data);

        $result = array(
            'last_id'   => $this->db->insert_id(),
            'timestamp' => $is_timestamp,
            'po'        => $pono
        );
        
        if($this->db->affected_rows() > 0){
            return $result;
        } else {
            return 0;
        }
    }

    public function update_delivery($num,$order_id,$total_weight)
    {

        $data = array(
            'weight_total'      => $total_weight,
            'order_delivery'    => $num
        );
        $this->db->where('id', $order_id);
        $this->db->update('tbl_order', $data);
        return $this->db->affected_rows();
    }
    // create order descs 1:M
    public function create_order_desc($order_dsc,$total_delivery,$order_id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        $i=0;

        foreach($order_dsc as $val) {
            // weight
            $dataToSave = array(
                'order_id'      => $val['order_id'],
                'product_id'    => $val['product_id'],
                'product_name'  => $val['product_name'],
                'qty'           => $val['qty'],
                'weight'           => $val['weight'],
                'text_note'     => $val['text_note'],
                'subtotal'      => $val['subtotal'],
                'total'         => $val['total'],
                'rank'          => $val['rank']
            );
           $this->db->insert('tbl_order_desc', $dataToSave);
            $i++;
        }

        if($this->db->affected_rows() > 0){

            $data = array(
                'order_total'   => $total_delivery
            );
            $this->db->where('id', $order_id);
            $this->db->update('tbl_order', $data);
            return $this->db->affected_rows();
        } else{
            return FALSE;
        }
    }
   
}

?>