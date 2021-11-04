<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->model('Order_model');
        $this->load->model('Product_model');
        $this->load->model('Banner_model');
        $this->load->model('Contact_model');
        $this->load->model('Brand_model');
        $this->load->model('Link_model');
        $this->load->model('Service_model');
        $this->load->model('Logo_model');
        $this->load->model('Unit_model');
        $this->load->model('Upload_product_model');
	}
    // display product html form
	public function home(){
        if(!empty($this->session->userdata('user'))){
           
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $this->load->view('admin/home',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }
    public function brand()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['brandname'] = $this->Brand_model->fetchBrandName(); 
            $data['logo_list'] = $this->Logo_model->fetchActive(); 
            $this->load->view('admin/form_brandname_edit',$data);
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }
    
    public function update_brandname()
    {
        $this->security->get_csrf_token_name(); 
        $this->security->get_csrf_hash();

        if(!empty($this->session->userdata('user'))){
            
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $br_id = $this->security->xss_clean($this->input->post('br_id', TRUE));

            $res = $this->Brand_model->update_brandname($name,$br_id); 
            if($res > 0){
                echo "<script>
                        alert('บันทึกสำเร็จ!');
                        window.location.href='".base_url("Admin/brand")."';
                    </script>";
            } else{
                echo "<script>
                    alert('บันทึกไม่สำเร็จ!');
                    window.location.href='".base_url("Admin/brand")."';
                </script>";
            }

        }
    }

    public function banner()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['banner_dcs'] = $this->Banner_model->fetchAll(); 
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $this->load->view('admin/form_banner_edit',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function banner_update()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $bh_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $bh_id = $this->security->xss_clean($this->input->post('banner_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                 
                $config['upload_path'] = 'assets/images/banner/'; 
                $config['file_name']        = $_FILES['covImg']['name'];
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
                $this->upload->do_upload('covImg');
                    
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
                }

                $dataArr = array(
                    'name'          => $bh_name,
                    'image_type'    =>  @$image_type,
                    'file_size'     =>  @$file_size,
                    'file_path'     =>  @$file_path,
                    'image_cover'   =>  @$file_upload,
                    'banner_id'      => @$bh_id
                );  
                $response = $this->Banner_model->update($dataArr);
                if($response > 0){
                    echo "<script>
                        alert('บันทึกสำเร็จ!');
                        window.location.href='".base_url("Admin/banner")."';
                    </script>";
                } else {
                    echo "<script>
                        alert('กรุณาอัพโหลดไฟล์!');
                        window.location.href='".base_url("Admin/banner")."';
                    </script>";
                }
            } else{
                echo "<script>
                    alert('กรุณาอัพโหลดไฟล์!');
                    window.location.href='".base_url("Admin/banner")."';
                </script>";
            } 
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function logo()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['logo'] = $this->Brand_model->fetchLogo(); 
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $this->load->view('admin/form_logo_edit',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function logo_update()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $lg_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $lg_id = $this->security->xss_clean($this->input->post('logo_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                //  '
                $config['upload_path'] = 'assets/images/logo/'; 
                $config['file_name']        = $_FILES['covImg']['name'];
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
                $this->upload->do_upload('covImg');
                    
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
                }

                $dataArr = array(
                    'name'          =>  $lg_name,
                    'image_type'    =>  @$image_type,
                    'file_size'     =>  @$file_size,
                    'image_cover'   =>  @$file_upload,
                    'logo_id'       =>  @$lg_id
                );  

                $response = $this->Brand_model->update_logo($dataArr);
                if($response > 0){
                    echo "<script>
                        alert('บันทึกสำเร็จ!');
                        window.location.href='".base_url("Admin/logo")."';
                    </script>";
                } else {
                    echo "<script>
                        alert('กรุณาอัพโหลดไฟล์!');
                        window.location.href='".base_url("Admin/logo")."';
                    </script>";
                }
            } else{
                echo "<script>
                    alert('กรุณาอัพโหลดไฟล์!');
                    window.location.href='".base_url("Admin/logo")."';
                </script>";
            } 
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function social()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['contact_dscs'] = $this->Contact_model->fetchAll(); 
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $this->load->view('admin/form_sociallink_edit',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function update_contact()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $_token = $this->security->get_csrf_hash(); // get CSRF Token generate

        $fb_link = $this->security->xss_clean($this->input->post('fb_link', TRUE));
        $ig_link = $this->security->xss_clean($this->input->post('ig_link', TRUE));
        $line_link = $this->security->xss_clean($this->input->post('line_link', TRUE));
        $tel = $this->security->xss_clean($this->input->post('tel', TRUE));
        $social_id = $this->security->xss_clean($this->input->post('social_id', TRUE));

        $data = array(
            'fb_link'   => $fb_link,
            'ig_link'   => $ig_link,
            'line_link' => $line_link,
            'tel'       => $tel,
            'social_id' => $social_id
        );

        if(!empty($this->session->userdata('user')) && !empty($_token)){
           
            $res = $this->Contact_model->update($data); 
            if($res > 0 ){
                echo "<script>
                        alert('บันทึกสำเร็จ!');
                        window.location.href='".base_url("Admin/social")."';
                    </script>";
            } else{
                echo "<script>
                    alert('บันทึกไม่สำเร็จ!');
                    window.location.href='".base_url("Admin/social")."';
                </script>";
            }
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function youtube()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['youtube_dscs'] = $this->Link_model->fetchAll(); 
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $this->load->view('admin/form_youtube_edit',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function create_youtube()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $this->security->get_csrf_hash(); // get CSRF Token generate

        if(!empty($this->session->userdata('user'))){
            
            $yt_name = $this->security->xss_clean($this->input->post('yt_name', TRUE));
            $yt_link = $this->security->xss_clean($this->input->post('yt_link', TRUE));
            $yt_id = $this->security->xss_clean($this->input->post('yt_id', TRUE));

            require_once APPPATH.'third_party/convert_youtube.php';
			$mylib = new convert_youtube(); // create new obj
            $embed_yt =  $mylib->getYoutubeEmbedUrl($yt_link); // call method

            $response = $this->Link_model->update($yt_name,$embed_yt,$yt_id);

            if($response > 0){
                echo "<script>
                    alert('บันทึกสำเร็จ!');
                    window.location.href='".base_url("Admin/youtube")."';
                </script>";
            } else{
                echo "<script>
                    alert('บันทึกไม่สำเร็จ!');
                    window.location.href='".base_url("Admin/youtube")."';
                </script>";
            } 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function order()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['orders'] = $this->Order_model->fetchAll(); 
            $data['logo_list'] = $this->Logo_model->fetchActive();

            $this->load->view('admin/list_order',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function history_detail()
    {
        if(!empty($this->session->userdata('user'))){
           
            $order_id = $this->uri->segment(3);
            $data['order_history'] = $this->Order_model->order_history($order_id); 

            $timestamp =$data['order_history'][0]['is_timestamp'];  // new
            $data['order_i'] = $this->Order_model->order_list_detail($timestamp); // order

            $this->load->view('admin/historydesc', $data); //     
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    // ยังไม่เสร็จ
    public function payment_confirm()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $this->security->get_csrf_hash(); // get CSRF Token generate

        if(!empty($this->session->userdata('user')) && !empty($this->security->get_csrf_hash())){

            $is_check = $this->security->xss_clean($this->input->post('is_check', TRUE));
            $order_id = $this->security->xss_clean($this->input->post('order_id', TRUE));

            if(is_numeric($order_id) && $is_check == '1'){
                $result = $this->Order_model->confirm_payment($is_check,$order_id); 
                if($result > 0){
                    echo "<script>
                    alert('ยืนยันสำเร็จ!');
                    window.location.href='".base_url("Admin/history_detail/".$order_id)."';
                </script>";
                }

            } else{
                echo "<script>
                    alert('ผิดพลาด! กรุณาลองใหม่อีกครั้ง');
                    window.location.href='".base_url("Admin/order")."';
                </script>";
            }
        } else {
            redirect('Login','refresh');
        }
    }

    public function product()
    {
        if(!empty($this->session->userdata('user'))){
            $data['products'] = $this->Product_model->fetchAllMenu();
            $data['logo_list'] = $this->Logo_model->fetchActive();

            $this->load->view('admin/product', $data); //  
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    public function changeIsActive()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        if(!empty($this->session->userdata('user')) && !empty($this->security->get_csrf_hash())){
            $pid = $this->security->xss_clean($this->input->post('id', TRUE));
            $state = $this->security->xss_clean($this->input->post('st', TRUE));
            $paction = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($pid) && $paction =='chgIsActive'){
                $response = $this->Product_model->update_isactive($pid,$state);
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function product_edit()
    {   
        if(!empty($this->session->userdata('user'))){
            $pid = $this->uri->segment(3);
            
            $data['units'] = $this->Unit_model->fetchActive(); 
            $data['menu_descs'] = $this->Product_model->menu_detail($pid);
            
            $this->load->view('admin/form_product_edit', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function updateProduct(){

        $this->security->get_csrf_token_name(); // initial CSRF name

        if(!empty($this->session->userdata('user')) && !empty($this->security->get_csrf_hash())){
            
            $name = $this->security->xss_clean($this->input->post('name', TRUE));
            $price = $this->security->xss_clean($this->input->post('price', TRUE));
            $weight = $this->security->xss_clean($this->input->post('weight', TRUE));
            $unit = $this->security->xss_clean($this->input->post('unit', TRUE));
            $product_id = $this->security->xss_clean($this->input->post('product_id', TRUE));
            
            // image cover 
            if(!empty($_FILES['covImg']['name'])){
                $config['upload_path'] = './assets/images/menu/';
                $config['file_name']        = $_FILES['covImg']['name'];
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
                $this->upload->do_upload('covImg');

                @$file_upload=$this->upload->data('file_name'); 
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{      
                    @$dataArr = array(
                        'image_cover'   => @$file_upload,
                        'name'          => $name,
                        'price'         => $price,
                        'weight'        => $weight,
                        'unit'          => $unit,
                        'product_id'    => $product_id
                    );
                }
            } else{
                @$dataArr = array(
                    'image_cover'   => '',
                    'name'          => $name,
                    'price'         => $price,
                    'weight'        => $weight,
                    'unit'          => $unit,
                    'product_id'    => $product_id
                );
                
            }
            // update image_cover where last id
            $result = $this->Product_model->updatefileUpload(@$dataArr);
            if($result > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/product")."';
                </script>";
            } else{
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/product")."';
                </script>";
            }

        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }   
    }

    public function service()
    {
        if(!empty($this->session->userdata('user'))){
            
            $data['serv_dscs'] = $this->Service_model->fetchAll();
            $data['logo_list'] = $this->Logo_model->fetchActive();
            
            $this->load->view('admin/form_service_edit', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function update_service()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name

        if(!empty($this->session->userdata('user')) && !empty($this->security->get_csrf_hash())){
            $serv_id = $this->security->xss_clean($this->input->post('serv_id', TRUE));
            $serv_dsc = $this->input->post('description', FALSE);
            $result = $this->Service_model->update($serv_id,$serv_dsc);
            
            if($result > 0){
                echo "<script>
                    alert('Success!');
                        window.location.href='".base_url("Admin/service")."';
                </script>";
            } else{
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/service")."';
                </script>";
            }

        } else {
            redirect('Login','refresh');
        }
    }

    public function unit()
    {   
        if(!empty($this->session->userdata('user'))){
           
            $data['logo_list'] = $this->Logo_model->fetchActive();
            $data['units'] = $this->Unit_model->fetchAll(); 

            $this->load->view('admin/list_unit', $data); //     
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }

    }
    public function changeUnitIsActive()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        if(!empty($this->session->userdata('user')) && !empty($this->security->get_csrf_hash())){
            $pid = $this->security->xss_clean($this->input->post('id', TRUE));
            $state = $this->security->xss_clean($this->input->post('st', TRUE));
            $paction = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($pid) && $paction =='chgIsActive'){
                $response = $this->Unit_model->update_isactive($pid,$state);
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }

    public function userManual()
    {
        if(!empty($this->session->userdata('user'))){
            $this->load->helper('download');
            $file = './assets/file/usermanual_kaopognfarm_v1.pdf';
            force_download($file, NULL);
        }
        else{
            redirect('Login','refresh');
        }
    }
    
}
