<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('pagination');
		$this->load->model('Cart_model');
		$this->load->model('Product_model');
        $this->load->model('Order_model');
        $this->load->model('Brand_model');
        $this->load->model('Logo_model');
        $this->load->model('Payment_model');
	}
    public function summary()
    {
        $order_id = $this->security->xss_clean($this->input->get('id', TRUE));
    
        $data['logo_list'] = $this->Logo_model->fetchActive();
        $data['add_list'] = $this->Brand_model->fetchAdd();

        $data['order_detail'] = $this->Order_model->order_detail($order_id); // order
        $data['order_i'] = $this->Order_model->order_list_detail($order_id); // order
        $data['timestamp'] = $order_id;
        
		$this->load->view('payment/list_payment',$data);

    }
    public function payment_add()
    {
        $order_id = $this->security->xss_clean($this->input->post('order_id', TRUE));
        $timestamp = $this->security->xss_clean($this->input->post('timestamp', TRUE));
        // 

        if(!empty($_FILES['slipImg']['name'])){
                
            $config['upload_path'] = './assets/images/slip/'; 
            $config['file_name']        = $_FILES['slipImg']['name'];
            $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
            $config['file_ext_tolower'] = TRUE; 
            $config['overwrite']        = TRUE; 
            $config['max_size']         = '0';  
            $config['max_width']        = '0'; 
            $config['max_height']       = '0';
            $config['max_filename']     = '0'; 
            $config['remove_spaces']    = TRUE;
            $config['detect_mime']      = TRUE;
            $config['encrypt_name']     = TRUE;

            $this->upload->initialize($config); 
            $this->upload->do_upload('slipImg');
                
            $file_upload=$this->upload->data('file_name');
            if($this->upload->display_errors()){
                echo $this->upload->display_errors();  
            }else{  

                $image_type=$this->upload->data('image_type');
                $file_size=$this->upload->data('file_size');
                $file_path=$this->upload->data('file_path');

                $dataArr = array(
                    'image_type'    =>  $image_type,
                    'file_size'     =>  $file_size,
                    'file_path'     =>  $file_path,
                    'image_cover'   =>  $file_upload,
                    'order_id'       => $order_id
                );
            }
            
            $response = $this->Payment_model->update_slip($dataArr);

            if($response > 0){
                echo "<script>
                    alert('อัพโหลดหลักฐานการชำระเงิน สำเร็จ! ขอบคุณค่ะ');
                    window.location.href='".base_url("home")."';
                </script>";
            } else {
                echo "<script>
                    alert('ล้มเหลว! กรุณาลองใหม่อีกครั้ง');
                    window.location.href='".base_url("payment/summary/?id=".$timestamp)."';
                </script>";
            }

        } else{
            echo "<script>
                    alert('กรุณาอัพโหลดหลักฐานการชำระเงิน');
                    window.location.href='".base_url("payment/summary/?id=".$timestamp)."';
            </script>";
        }
    }

    public function check_payment()
    {
        date_default_timezone_set("Asia/Bangkok");

        $action = $this->security->xss_clean($this->input->post('action', TRUE));
        $fname = $this->security->xss_clean($this->input->post('fname', TRUE));
        $tel = $this->security->xss_clean($this->input->post('tel', TRUE));

        if($action == 'checkMoneys'){

            $result = $this->Payment_model->check_payment($action,$fname,$tel);
    
            if ( !empty( $result ) ) {
                $data = $result;
            } else {
                $data = 'false';
            }
        }

        echo json_encode($data);
    }
    // display order status
    public function history()
    {
        $tel = $this->security->xss_clean($this->input->get('id', TRUE));
        $name = $this->security->xss_clean($this->input->get('name', TRUE));

        $data['logo_list'] = $this->Logo_model->fetchActive();
        $data['add_list'] = $this->Brand_model->fetchAdd();
        $data['order_detail'] = $this->Payment_model->payment_history($tel,$name);
        
        $order_id =$data['order_detail'][0]['is_timestamp'];  // new
        $data['order_i'] = $this->Order_model->order_list_detail($order_id); // new
        
        $this->load->view('payment/list_payhistory',$data);

       
    }


}
