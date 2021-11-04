<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
		$this->load->model('Cart_model');
		$this->load->model('Product_model'); 
	}

    public function addToCart()
    {
        $this->security->get_csrf_token_name();
        $this->security->get_csrf_hash();
        $pid = $this->security->xss_clean($this->input->post('pid', TRUE));
        $qty = $this->security->xss_clean($this->input->post('qty', TRUE));
        $textnote = $this->security->xss_clean($this->input->post('textnote', TRUE));
        $action = $this->security->xss_clean($this->input->post('action', TRUE));

        if ($action == 'addCart') {	
            if (!isset($_SESSION) ) {
                session_start();
            }

            $check = $this->Product_model->getById($pid); // call product dscs by product id
    
            if ( !isset($_SESSION["cart"]['num']) ) {
                $_SESSION["cart"]['num']			= 1;
                $_SESSION["cart"]['id'][$pid] 		= $pid;
                $_SESSION["cart"]['qty'][$pid] 		= $qty;
                $_SESSION["cart"]['textnote'][$pid] = $textnote;
                $_SESSION["cart"]['name'][$pid] 	= $check[0]->name;
                $_SESSION["cart"]['img'][$pid] 		= $check[0]->img_cover;
                $_SESSION["cart"]['price'][$pid] 	= $check[0]->price;
                $_SESSION["cart"]['weight'][$pid] 	= $check[0]->weight;
            } else {
                $key = array_search($pid, $_SESSION["cart"]['id']);
    
                if ((string)$key != "") {
                    $_SESSION["cart"]['qty'][$key] += $qty;
                } else {
                    $_SESSION["cart"]['num'] 					+= 1;
                    $_SESSION["cart"]['id'][$pid] 		= $pid;
                    $_SESSION["cart"]['qty'][$pid] 		= $qty;
                    $_SESSION["cart"]['textnote'][$pid] = $textnote;
                    $_SESSION["cart"]['name'][$pid] 	= $check[0]->name;
                    $_SESSION["cart"]['img'][$pid] 		= $check[0]->img_cover;
                    $_SESSION["cart"]['price'][$pid] 	= $check[0]->price;
                    $_SESSION["cart"]['weight'][$pid] 	= $check[0]->weight;
                }		
            }
    
            $data['result'] = 'true';
        }

        echo json_encode($data);
    }

    public function checkOut()
    {
        $fname = $this->security->xss_clean($this->input->post('fname', TRUE));
        $tel = $this->security->xss_clean($this->input->post('tel', TRUE));
        $lineid = $this->security->xss_clean($this->input->post('lineid', TRUE));
        $alladdress = $this->security->xss_clean($this->input->post('alladdress', TRUE));
        $changwat = $this->security->xss_clean($this->input->post('changwat', TRUE));
        $aumphur = $this->security->xss_clean($this->input->post('aumphur', TRUE));
        $tumbon = $this->security->xss_clean($this->input->post('tumbon', TRUE));
        $postalcode = $this->security->xss_clean($this->input->post('postalcode', TRUE));

        $action = $this->security->xss_clean($this->input->post('action', TRUE));
        
        if ($action == 'checkOut') {
            if ( !isset($_SESSION) ) {
                session_start();
            }
        
            $created 	= date('Y-m-d');
            $create_time = date ('H:i:s');
            $year 		= date('Y');

            $arr = array(
                'fname'         => $fname,
                'tel'           => $tel,
                'lineid'        => $lineid,
                'address'       => $alladdress,
                'province'      => $changwat,
                'district'      => $aumphur,
                'subdist'       => $tumbon,
                'postcode'      => $postalcode
            );

            $res = $this->Cart_model->create($arr); // add new order
        
            if(!empty($res))
            {
                $order_id = $res['last_id'];
                $timestamp = $res['timestamp'];
                $pono = $res['po'];
 
                $area = $changwat; // initalize
    
                $delivery = 30;
                $sum_weight = 0;
                $sum_qty=0;
                $total_weight =0;

                foreach (@$_SESSION["cart"]['id'] as $k => $value){
                    // echo '$weight i='.$_SESSION["cart"]['weight'][$k];
                    $sum_qty=$_SESSION['cart']['qty'][$k]; // sum qty each key
                    $sum_weight = $_SESSION["cart"]['weight'][$k];
                    $total_weight += ($sum_qty * $sum_weight); // sum weight each key * qty
                }
                // echo '<br>';
                // echo '$total_weight='.$total_weight;
                // die();

                // calculate dilivery weight and area
                if($area =='กรุงเทพมหานคร' || $area =='Bangkok' || $area =='10' || $area =='BANGKOK'){
                    if($total_weight >=0 && $total_weight <=3000){
                        // '0-3000 g';
                        $deliv_total = 90;
                    }elseif($total_weight >3000 && $total_weight <=7000){
                        // '3000-7000 g';
                        $deliv_total = 120;
                    } elseif($total_weight > 7000){
                        // '> 7000 g';
                        $deliv_total = 170;
                    }
                } else {
                    // ตจว.
                    if($total_weight >=0 && $total_weight <=3000){
                        // '0-3000 g';
                        $deliv_total = 150;
                    }elseif($total_weight >3000 && $total_weight <=7000){
                        // '3000-7000 g';
                        $deliv_total = 190;
                    } elseif($total_weight > 7000){
                        // '> 7000 g';
                        $deliv_total = 260;
                    }
                }

                $totl_delivery = $deliv_total;
                $rank = 0;

                // echo '<br>';
                // echo '$totl_delivery='.$totl_delivery;

                $res = $this->Cart_model->update_delivery($totl_delivery,$order_id,$total_weight); // add order delivery cost
        
                foreach ($_SESSION['cart']['id'] as $key => $value) {
                    $total 	= $_SESSION['cart']['qty'][$key] * $_SESSION['cart']['price'][$key];
                    $rank++;
                    $totl_delivery += $total;

                    $order_dsc[] = array(
                        'order_id'      => $order_id,
                        'product_id'    => $_SESSION['cart']['id'][$key],
                        'product_name'  => $_SESSION['cart']['name'][$key],
                        'qty'           => $_SESSION['cart']['qty'][$key],
                        'weight'        => $_SESSION["cart"]['weight'][$key],
                        'text_note'     => $_SESSION['cart']['textnote'][$key],
                        'subtotal'      => $_SESSION['cart']['price'][$key],
                        'total'         => $total,
                        'rank'          => $rank
                    );

                }
                // 1:M
                $result = $this->Cart_model->create_order_desc($order_dsc,$totl_delivery,$order_id); // add order details
                if($result > 0){
                    $this->notify_message($pono,$timestamp); // call method notify line
                } else{
                    $data['order_id'] = '';
                    $data['result'] = 'false';
                }

            } else{
                
                $data['order_id'] = '';
                $data['result'] = 'false';

            }

        }
    }

    // line notify
    public function notify_message($pono,$timestamp){

        date_default_timezone_set("Asia/Bangkok");
        // Dev test cVCPNWWm5vhxRJrGxqDbQxqhwxlz1JdqhGxMZCdURW1
        $sToken = "cVCPNWWm5vhxRJrGxqDbQxqhwxlz1JdqhGxMZCdURW1";
        $sMessage = "มีรายการสั่งซื้อใหม่เข้ามาค่ะ\n $pono\n";
    
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 
        curl_close( $chOne );

        // return
        if (!empty($result)) {
            $data['order_id'] = $timestamp;
            $data['result'] = 'true';
        } else {
            $data['order_id'] = $timestamp;
            $data['result'] = 'false';
        }
        
        unset($_SESSION["cart"]); // unset cart

        echo json_encode($data); // 
    }

    public function delCart()
    {
        $dpid = $this->security->xss_clean($this->input->post('del', TRUE));
        $action = $this->security->xss_clean($this->input->post('action', TRUE));
        
        if ($action == 'delCart' ) {
            if (!empty($dpid)) {
                if ( !isset($_SESSION) ) {
                    session_start();
                }
        
                $_SESSION["cart"]['num'] -= 1;
                unset( $_SESSION["cart"]['id'][$dpid] );
                unset( $_SESSION["cart"]['qty'][$dpid] );
                unset( $_SESSION["cart"]['textnote'][$dpid] );
                unset( $_SESSION["cart"]['name'][$dpid] );
                unset( $_SESSION["cart"]['img'][$dpid] );
                unset( $_SESSION["cart"]['price'][$dpid] );
                $data['result'] = 'true';
            } else {
                $data['result'] = 'false';
            }

        }
        echo json_encode($data);
    }

}
