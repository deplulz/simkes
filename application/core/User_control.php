<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_control extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        if (empty($this->session->userdata)) {
            redirect(base_url());
        }
    }
}