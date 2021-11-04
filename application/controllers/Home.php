<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Banner_model');
		$this->load->model('Logo_model'); 
		$this->load->model('Brand_model');
		$this->load->model('Service_model');
		$this->load->model('Link_model');
		$this->load->model('Product_model');
		$this->load->model('Province_model');
	}

    public function index()
	{
		$data['sociallinks'] = $this->Link_model->socialLink();

		$data['provinces'] = $this->Province_model->fetchAll();
		$data['slide_list'] = $this->Banner_model->fetchAll();
		$data['logo_list'] = $this->Logo_model->fetchActive();
		$data['name_sale'] = $this->Brand_model->fetchAll();
		$data['dsc_detail_s'] = $this->Service_model->fetchAll();
		
		$data['yl'] = $this->Link_model->fetchAll();
		$data['product_list'] = $this->Product_model->fetchAll();
		$this->load->view('home',$data);
	}
}
