<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		//TABLE
		$this->variables['table'] = 'reservations';
		$this->variables['table_patients'] = 'patients';
		$this->variables['table_ref'] = "reference";
		$this->variables['table_medicine'] = "medicines";

		//PAGE VARIABLE
		$this->variables['title'] = "reservation";
		$this->variables['menu'] = "reservation";
		$this->variables['page'] = "reservations/reservations";
		$this->variables['page_detil'] = 'reservations/detil';
		$this->variables['where'] = array("reference_type" => "jenis_obat");


	}

	public function index() {
		$where_clause = $this->M_get->get_data(
			'reference_id',
			$this->variables['table_ref'],
			'',
			'',
			'',
			'',
			array("reference_label" => "MENDAFTAR")
		)->result();

		if (!empty($_SESSION['admin']['id_user'])) {
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
                    array("reservation_status" => $where_clause[0]->reference_id)
				)->result()
			);
			// echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit();
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
				"url" => base_url("reservation/post"),
				"medicine" => $this->M_get->get_data(
					'medicine_id, medicine_name',
					$this->variables['table_medicine'],
					'',
					'',
					'',
					'',
                    ''
				)->result(),
                "patients" => $this->M_get->get_data(
                    'patient_name, patient_id',
                    $this->variables['table_patients'],
                    '',
                    '',
                    '',
                    '',
                    ""
				)->result(),
                "status" => $this->M_get->get_data(
                    'reference_id, reference_label',
                    $this->variables['table_ref'],
                    '',
                    '',
                    '',
                    '',
                    get_param_selector($_SESSION['admin']['user_role'])
				)->result()
            );
			$this->load->view('templates/template',array_merge($this->variables,$data));
		} else {
			redirect(base_url());
		}
	}

	public function edit($param) {
		if (!empty(!empty($_SESSION['admin']['id_user']))) {
			$where = array("reservation_id" => $param);
			$data = array(
				"page" => $this->variables['page_detil'],
				"flag" => 'edit',
				"menu" => $this->variables['menu'],
				"url" => base_url("reservation/post"),
				"medicine" => $this->M_get->get_data(
					'medicine_id, medicine_name',
					$this->variables['table_medicine'],
					'',
					'',
					'',
					'',
                    ''
				)->result(),
                "patients" => $this->M_get->get_data(
                    'patient_name, patient_id',
                    $this->variables['table_patients'],
                    '',
                    '',
                    '',
                    '',
                    ""
				)->result(),
                "status" => $this->M_get->get_data(
                    'reference_id, reference_label',
                    $this->variables['table_ref'],
                    '',
                    '',
                    '',
                    '',
                    get_param_selector($_SESSION['admin']['user_role'])
				)->result(),
				"data" => $this->M_get->get_data(
					'r.reservation_id, r.reservation_user , r.reservation_status, p.patient_name, ref.reference_label',
					$this->variables['table']. ' r',
					$this->variables['table_patients']. ' p',
					'r.reservation_user = p.patient_id',
					$this->variables['table_ref']. ' ref',
					'r.reservation_status = ref.reference_id',
                    $where
				)->result()
            );
			$this->load->view('templates/template',array_merge($this->variables,$data));
		} else {
			redirect(base_url());
		}
	}

	public function save() {
		if ($_POST['flag'] === 'add') {

			$chk_id = gen("CHK", date('dYHis', time()));

			$data = array(
				"reservation_id" => $chk_id,
				"reservation_user" => $_POST['patient_name'],
				"reservation_status" => $_POST['status_patient'],
				"created_date" => date('Y-m-d h:i:s a', time()),
				"created_by" => $_SESSION['admin']['username']
			);
			
			$save = $this->M_trans->add_data($this->variables['table'],$data);

			if($save) {
				if (isset($_POST['medicine_patient'])){
					$data = array_merge($data, $med_for_pat);
					foreach($_POST['medicine_patient'] as $med) {
						$med_ref = array(
							"ref_id" => gen("RMR", date('dYHis', time())),
							"ref_reservation_id" => $chk_id,
							"ref_medicine_id" => $med[$i]
						);
						$save_child = $this->M_trans->add_data($this->variables['table_ref_reservation'],$med_ref);
						if ($save_child) {
							$this->db->trans_commit();
						} else {
							$this->db->trans_rollback();
							$this->M_trans->delete_data($this->variables['table'], array("reservation_id" => $chk_id));	
							break;
						}
					}
				} else {
					$this->db->trans_commit();
					redirect(base_url('reservation'));
				}

			} else {
				redirect(base_url('/reservation/add'));
			}
		} else if ($_POST['flag'] === 'edit'){
			$where = array("reservation_id" => $_POST['reservation_id']);
			$data = array(
				"reservation_status" => $_POST['status_patient'],
				"updated_date" => date('Y-m-d h:i:s a', time()),
				"updated_by" => $_SESSION['admin']['username']
			);

			$save = $this->M_trans->update_data($this->variables['table'],$data, $where);
			
			if($save) {
				if (isset($_POST['medicine_patient'])){
					$data = array_merge($data, $med_for_pat);
					foreach($_POST['medicine_patient'] as $med) {
						$med_ref = array(
							"ref_id" => gen("RMR", date('dYHis', time())),
							"ref_reservation_id" => $chk_id,
							"ref_medicine_id" => $med[$i]
						);
						$save_child = $this->M_trans->add_data($this->variables['table_ref_reservation'],$med_ref);
						if ($save_child) {
							$this->db->trans_commit();
						} else {
							$this->db->trans_rollback();
							$this->M_trans->delete_data($this->variables['table'], array("reservation_id" => $chk_id));	
							break;
						}
					}
				} else {
					$this->db->trans_commit();
					redirect(base_url('reservation'));
				}

			} else {
				redirect(base_url('/reservation/add'));
			}
		} else {
			echo 'error';
		}
	}

	public function delete($param) {
		$where = array("reservation_id" => $param);
		$delete = $this->M_trans->delete_data($this->variables['table'], $where);		

		if($delete) {
			$this->db->trans_commit();
			redirect(base_url('reservation'));
		} else {
			redirect(base_url('reservation'));
		}
	}
}