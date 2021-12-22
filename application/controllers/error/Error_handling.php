<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_handling extends CI_Controller {

	public function index() {
        // echo 'asdasd';
        // exit();
        $data = array(
            "title" => "Page Not Found",
            "page" => 'errors/html/error_404',
            "menu" => ""
        );
        $this->load->view($data["page"],$data);
    }
}