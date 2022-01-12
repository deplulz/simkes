<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developers extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['title'] = "developer";
		$this->variables['menu'] = "developer";
		$this->variables['page'] = "developers/developer";
	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			$data = array(
				"page" => $this->variables['page'],
				"menu" => $this->variables['menu']
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));

		} else {
			redirect(base_url());
		}
	}
}