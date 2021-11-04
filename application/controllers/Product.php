<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination'); // load pagination
		// $this->load->model('Cart_model'); // Cart_model
		$this->load->model('Product_model'); // Product_model
		// $this->load->model('Review_model'); // Product_model
		 
	}
    public function showProduct()
    {
        $action = $this->security->xss_clean($this->input->post('action', true));
        // $pid = $_POST['pid'];
        $pid = $this->security->xss_clean($this->input->post('pid', true));
        if ($action == 'queryProduct') {
            
            $result = $this->Product_model->getById($pid);
    
            if (!empty($result)) {
                $data['result'] = 'true';
                $data['data'] 	= $result;
            } else {
                $data['result'] = 'false';
            }
        }
        echo json_encode($data);
    }

    // public function page()
    // {
    //      $_get = $this->security->xss_clean($this->input->get());
    //      $product_id= $this->uri->segment(3);
         
    //         $config['base_url'] = base_url().'product/page/'.$product_id.'/';
    //         if (count($_get) > 0) $config['suffix'] = '/?' . http_build_query($_get, '', "&");
    //         if (count($_get) > 0) $config['first_url'] = $config['base_url'].'/?'.http_build_query($_get);
    //         $config['total_rows'] = $this->Product_model->countProGroup($product_id); // จำนวนข้อมูลทั้งหมด

    //         $config['per_page'] = 8;        
    //         $config['uri_segment'] = 4;   
    //         $config['next_link']        = 'Next';
    //         $config['prev_link']        = 'Prev';
    //         $config['first_link']       = false;
    //         $config['last_link']        = false;
    //         $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
    //         $config['full_tag_close']   = '</ul>';
    //         $config['attributes']       = ['class' => 'page-link'];
    //         $config['first_tag_open']   = '<li class="page-item">';
    //         $config['first_tag_close']  = '</li>';
    //         $config['prev_tag_open']    = '<li class="page-item">';
    //         $config['prev_tag_close']   = '</li>';
    //         $config['next_tag_open']    = '<li class="page-item">';
    //         $config['next_tag_close']   = '</li>';
    //         $config['last_tag_open']    = '<li class="page-item">';
    //         $config['last_tag_close']   = '</li>';
    //         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    //         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    //         $config['num_tag_open']     = '<li class="page-item">';
    //         $config['num_tag_close']    = '</li>';
 
    //         $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
 
    //         $this->pagination->initialize($config);        
    //         $data['page_start'] = $page;
    //         $data['pagination'] = $this->pagination->create_links();        
    //         $data['products_list'] = $this->Product_model->products_list($config["per_page"], $page,$product_id); // cart

    //         $data['cats_list'] = $this->Cart_model->cat_list(); // menu dropdown
    //         $data['caties_list'] = $this->Product_model->caties_list($product_id); // call product menu
 
    //         $this->load->view('head',$data);
    //         $this->load->view('product/list_product',$data);
    // }
    // public function detail()
    // {
    //     $product_id = $this->uri->segment(3);
    
    //     $data['cats_list'] = $this->Cart_model->cat_list(); // menu dropdown
    //     $data['producties_list'] = $this->Product_model->producties_list($product_id); // call product by id
    
    //     $data['products_img_list'] = $this->Product_model->products_img_list($product_id); // call product images by id
    //     $data['rands_list'] = $this->Product_model->rands_list(); // call product images by id

    //     $this->load->view('head',$data);
    //     $this->load->view('product/list_desc_product',$data);
    
    // }


}
