<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class province extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination'); // load pagination
        $this->load->model('Province_model'); // load Category_model
        // Load model
	}
    // อำเภอ โดย id จังหวัด
    public function getAumphur(){

        $this->security->get_csrf_token_name(); // initial CSRF name
        $this->security->get_csrf_hash(); // get CSRF Token generate

        $proid = $this->security->xss_clean($this->input->post('proid', TRUE));
       
        $aumphurs = $this->Province_model->fetchAumphur($proid);

        $opt ='';
        $opt .='<option value="">-- เขต/อำเภอ --</option>';
        //  $opt .='<option value="'.$aump_val['district_id'].'" >'.$aump_val['district_th'].'</option>';
        foreach ($aumphurs as $aump_val) {
            $opt .='<option value="'.$aump_val['district_th'].'" >'.$aump_val['district_th'].'</option>';
        }
        echo  $opt; 
    }
    // ตำบล โดย id อำเภอ
    public function getTumbon()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $this->security->get_csrf_hash(); // get CSRF Token generate

        $aumphurId = $this->security->xss_clean($this->input->post('aumphurId', TRUE));
        $tumbons = $this->Province_model->fetchTumbon($aumphurId);

        $opt ='';
        $opt .='<option value="">-- แขวง/ตำบล --</option>';
        // $tumbon_val['tambon_id']
        foreach ($tumbons as $tumbon_val) {
            $opt .='<option value="'.$tumbon_val['tambon_th'].'" >'.$tumbon_val['tambon_th'].'</option>';
        }
        echo  $opt; 
    }
    // รหัสำปรษณีย์ โดย ตำบล
    public function getPostcode()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $this->security->get_csrf_hash(); // get CSRF Token generate

        $tumbon = $this->security->xss_clean($this->input->post('tumbon', TRUE));
        
        $postcode = $this->Province_model->fetchPostcode($tumbon);

        echo  $postcode[0]['zipcode'];
    
    }
}
