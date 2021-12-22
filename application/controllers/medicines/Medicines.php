<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicines extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['table'] = "medicines";
		$this->variables['table_ref'] = "reference";
		$this->variables['title'] = "medicines";
		$this->variables['menu'] = "medicines";
		$this->variables['page'] = "medicines/medicines";
		$this->variables['page_detil'] = 'medicines/detil';
		$this->variables['where'] = array("reference_type" => "jenis_obat");


	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			$data = array(
				"page" => $this->variables['page'],
				"flag" => "add",
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'm.medicine_id, m.medicine_name, m.medicine_price, created_date, r.reference_label as medicine_type, m.medicine_stock',
					$this->variables['table']. ' m',
					$this->variables['table_ref']. ' r',
					'm.medicine_type = r.reference_id',
					'',
					'',
					''
				)->result()
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));

		} else {
			redirect(base_url());
		}
	}

	public function add() {	
		if (!empty(!empty($_SESSION['admin']['id_user']))) {
			$data = array(
				"page" => $this->variables['page_detil'],
				"flag" => 'add',
				"menu" => $this->variables['menu'],
				"medicine_type" => $this->M_get->get_data(
					'*',
					$this->variables['table_ref'],
					'',
					'',
					'',
					'',
					$this->variables['where']
				)->result()
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));
		} else {
			redirect(base_url());
		}
	}

	public function edit($param) {
		if (!empty(!empty($_SESSION['admin']['id_user']))) {
			$where = array("medicine_id" => $param);
			$data = array(
				"page" => $this->variables['page_detil'],
				"flag" => 'edit',
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'*',
					$this->variables['table']. ' p',
					'',
					'',
					'',
					'',
					$where
				)->result(),
				"medicine_type" => $this->M_get->get_data(
					'*',
					$this->variables['table_ref'],
					'',
					'',
					'',
					'',
					$this->variables['where']
				)->result()
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));
		} else {
			redirect(base_url());
		}
	}

	public function save() {
		if ($_POST['flag'] === 'add') {
			$data = array(
				"medicine_id" => gen("MED", date('dYHis', time())),
				"medicine_name" => $_POST['name'],
				"medicine_type" => $_POST['medicine_type'],
				"medicine_price" => $_POST['medicine_price'],
				"medicine_stock" => $_POST['medicine_stock'],
				"created_date" => date('Y-m-d h:i:s a', time()),
				"created_by" => $_SESSION['admin']['username']
			);
			$save = $this->M_trans->add_data($this->variables['table'],$data);
			if($save) {
				$this->db->trans_commit();
				redirect(base_url('medicine'));
			} else {
				redirect(base_url('/medicine/add'));
			}
		} else if ($_POST['flag'] === 'edit'){
			$where = array("medicine_id" => $_POST['medicine_id']);
			$data = array(
				"medicine_name" => $_POST['name'],
				"medicine_type" => $_POST['medicine_type'],
				"medicine_price" => $_POST['medicine_price'],
				"medicine_stock" => $_POST['medicine_stock'],
				"updated_date" => date('Y-m-d h:i:s a', time()),
				"updated_by" => $_SESSION['admin']['username']
			);
			$save = $this->M_trans->update_data($this->variables['table'],$data, $where);
			if($save) {
				$this->db->trans_commit();
				redirect(base_url('medicine'));
			} else {
				redirect(base_url('medicine/put/'.$_POST['medical_record']));
			}
		} else {
			echo 'error';
		}
	}

	public function delete($param) {
		$where = array("medicine_id" => $param);
		$delete = $this->M_trans->delete_data($this->variables['table'], $where);		

		if($delete) {
			$this->db->trans_commit();
			redirect(base_url('medicine'));
		} else {
			redirect(base_url('medicine'));
		}
	}
}