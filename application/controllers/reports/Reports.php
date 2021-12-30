<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		//TABLE
		$this->variables['table'] = 'reservations';
		$this->variables['table_patients'] = 'patients';
		$this->variables['table_ref'] = "reference";
		$this->variables['table_medicine'] = "medicines";
        $this->variables['table_ref_reservation'] = "ref_reservation";

		//PAGE VARIABLE
		$this->variables['title'] = "Patient Report";
		$this->variables['menu'] = "report";
		$this->variables['page'] = "report/doctor_report";
		$this->variables['page_medicine'] = "report/medicine_selling";
		$this->variables['where'] = array("reference_type" => "jenis_obat");


	}

	public function doctor() {
		if (!empty($_SESSION['admin']['id_user'])) {

            $where_clause = $this->M_get->get_data(
                'reference_id',
                $this->variables['table_ref'],
                '',
                '',
                '',
                '',
                array("reference_label" => "BATAL")
            )->result();

			$data = array(
				"page" => $this->variables['page'],
				"flag" => "add",
                "menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'r.reservation_id, r.reservation_user , r.reservation_status, p.patient_name, ref.reference_label',
					$this->variables['table']. ' r',
					$this->variables['table_patients']. ' p',
					'r.reservation_user = p.patient_id',
					$this->variables['table_ref']. ' ref',
					'r.reservation_status = ref.reference_id',
                    array('reservation_status !=' => $where_clause[0]->reference_id)
				)->result()
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));

		} else {
			redirect(base_url());
		}
	}

	public function medicines() {
		if (!empty($_SESSION['admin']['id_user'])) {
			$data = array(
				"page" => $this->variables['page_medicine'],
				"flag" => "add",
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'm.medicine_name, "1" as Sell, m.medicine_stock',
					$this->variables['table_ref_reservation']. ' ref',
					$this->variables['table_medicine']. ' m',
					'ref.ref_medicine_id = m.medicine_id',
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
}