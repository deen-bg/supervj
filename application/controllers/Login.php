<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Logo_model'); // Logo_model 
		$this->load->model('Brand_model'); // Brand_model 
	}
	/**
	 * index function
	 *
	 * @return html form
	 */
	public function index(){
		$data['logo_list'] = $this->Logo_model->fetchActive();
		$data['name_sale'] = $this->Brand_model->fetchAll();
		$this->load->view('login/view_login',$data);
		$this->load->view('admin/script-core-js');
	}

	public function logout(){

		$user_data = $this->session->all_userdata();

		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('group_id');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('is_user_logged_in');
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}
}
