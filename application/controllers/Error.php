<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class error extends CI_Controller
{
    function error_404()
    {
        $this->output->set_status_header('404');
        $data["heading"] = "404 Page Not Found";
        $data["message"] = "The page you requested was not found ";
        $this->load->view('errors/html/error_404',$data);
    }
}
?>