<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['order'] = "tbl_order";
		$this->variables['customer'] = "tbl_customer";
		$this->variables['title'] = "Dashboard";
		$this->variables['menu'] = "dashboard";
	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			// $order = $this->M_get->get_data('*',$this->variables['order'],'','','','','')->result();
			// $customer = $this->M_get->get_data('*',$this->variables['customer'],'','','','','')->result();
			// $dataChart = $this->M_get->get_data_dashboard()->result();
			// $dataname = array();
			// $dataVal = array();
			// $dataColor = array();
			
			// foreach ($dataChart as $record) {
			// 	array_push($dataname,$record->product_name);
			// 	array_push($dataVal,$record->jumlah);
				// array_push($dataColor,);
			// }

			// echo "<pre>";
			// print_r(json_encode($dataVal));
			// echo "</pre>";
			// exit;

			$data = array(
				"title" => $this->variables['title'],
				"page" => 'dashboard',
				// "order" => count($order),
				// "customer" => count($customer),
				"menu" => $this->variables['menu'],
				// "label" => $dataname,
				// "value" => $dataVal
			);
			$this->load->view('templates/template',$data);
        } else {
            redirect(base_url());
        }
	}
}
