<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['table'] = 'reservations';
		$this->variables['table_patients'] = 'patients';
		$this->variables['table_ref'] = "reference";
		$this->variables['table_medicine'] = "medicines";

		// BASE VARIABLE
		$this->variables['title'] = "Home";
		$this->variables['menu'] = "dashboard";
	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			
			$param_mendaftar = $this->where_clause("MENDAFTAR");
			$param_diperiksa = $this->where_clause("DIPERIKSA");
			$param_selesai = $this->where_clause("SELESAI");
			$param_batal = $this->where_clause("BATAL");

			$mendaftar = $this->get_data_count($param_mendaftar[0]->reference_id);
			$diperiksa = $this->get_data_count($param_diperiksa[0]->reference_id);
			$selesai = $this->get_data_count($param_selesai[0]->reference_id);
			$batal = $this->get_data_count($param_batal[0]->reference_id);

			// echo(sizeof($mendaftar));
			// exit();

			$data = array(
				"title" => $this->variables['title'],
				"page" => 'dashboard/dashboard',
				"menu" => $this->variables['menu'],
				"mendaftar" => sizeof($mendaftar),
				"diperiksa" => sizeof($diperiksa),
				"selesai" => sizeof($selesai),
				"batal" => sizeof($batal),
			);
			$this->load->view('templates/template',$data);
        } else {
            redirect(base_url());
        }
	}

	public function where_clause($args) {
		return $where_clause = $this->M_get->get_data(
			'reference_id',
			$this->variables['table_ref'],
			'',
			'',
			'',
			'',
			array("reference_label" => $args)
		)->result();
	}

	private function get_data_count($args) {
		return $this->M_get->get_data(
			'r.reservation_id, r.reservation_user , r.reservation_status, p.patient_name, ref.reference_label',
			$this->variables['table']. ' r',
			$this->variables['table_patients']. ' p',
			'r.reservation_user = p.patient_id',
			$this->variables['table_ref']. ' ref',
			'r.reservation_status = ref.reference_id',
			array("reservation_status" => $args)
		)->result_array();
	}
}
