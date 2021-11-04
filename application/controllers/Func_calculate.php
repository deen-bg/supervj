<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func_calculate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
		
	}

	public function date_th($date_th){
       // echo 'Y';

        $month=Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $Bday = date('j',strtotime($date_th));
        $Mday = $month[date('n',strtotime($date_th))];
        $Yday = date('Y',strtotime($date_th))+543;
        return $Bday.' '.$Mday.' '.$Yday;
    }
}
