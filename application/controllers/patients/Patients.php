<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['table'] = "patients";
		$this->variables['table_ref'] = "reference";
		$this->variables['title'] = "patients";
		$this->variables['menu'] = "patients";
		$this->variables['page'] = "patients/patients";
		$this->variables['page_detil'] = 'patients/detil';
		$this->variables['where'] = array("reference_type" => "gender");


	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			$data = array(
				"page" => $this->variables['page'],
				"flag" => "add",
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'p.patient_id, p.patient_name, p.patient_address, p.patient_age, created_date, r.reference_label as patient_gender',
					$this->variables['table']. ' p',
					$this->variables['table_ref']. ' r',
					'p.patient_gender = r.reference_id',
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
				"gender" => $this->M_get->get_data(
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
			$where = array("patient_id" => $param);
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
				"gender" => $this->M_get->get_data(
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
				"patient_id" => gen("PAT", date('dYHis', time())),
				"patient_name" => $_POST['name'],
				"patient_address" => $_POST['address'],
				"patient_age" => $_POST['age'],
				"patient_gender" => $_POST['gender'],
				"created_date" => date('Y-m-d h:i:s a', time()),
				"created_by" => $_SESSION['admin']['username']
			);
			$save = $this->M_trans->add_data($this->variables['table'],$data);
			if($save) {
				$this->db->trans_commit();
				redirect(base_url('patient'));
			} else {
				redirect(base_url('/patient/add'));
			}
		} else if ($_POST['flag'] === 'edit'){
			$where = array("patient_id" => $_POST['medical_record']);
			$data = array(
				"patient_name" => $_POST['name'],
				"patient_address" => $_POST['address'],
				"patient_age" => $_POST['age'],
				"patient_gender" => $_POST['gender'],
				"updated_date" => date('Y-m-d h:i:s a', time()),
				"updated_by" => $_SESSION['admin']['username']
			);
			$save = $this->M_trans->update_data($this->variables['table'],$data, $where);
			if($save) {
				$this->db->trans_commit();
				redirect(base_url('patient'));
			} else {
				redirect(base_url('patient/put/'.$_POST['medical_record']));
			}
		} else {
			echo 'error';
		}
	}

	public function delete($param) {
		$where = array("patient_id" => $param);
		$delete = $this->M_trans->delete_data($this->variables['table'], $where);		

		if($delete) {
			$this->db->trans_commit();
			redirect(base_url('patient'));
		} else {
			redirect(base_url('patient'));
		}
	}
}