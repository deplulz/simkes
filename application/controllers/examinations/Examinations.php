<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examinations extends CI_Controller {

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
		$this->variables['title'] = "Examinations";
		$this->variables['menu'] = "examinations";
		$this->variables['page'] = "reservations/reservations";
		$this->variables['page_detil'] = 'reservations/detil';
		$this->variables['where'] = array("reference_type" => "jenis_obat");


	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {

            $where_clause = $this->M_get->get_data(
                'reference_id',
                $this->variables['table_ref'],
                '',
                '',
                '',
                '',
                array("reference_label" => "MENDAFTAR")
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
                    array('reservation_status' => $where_clause[0]->reference_id)
				)->result()
			);
			$this->load->view('templates/template',array_merge($this->variables,$data));

		} else {
			redirect(base_url());
		}
	}

	public function edit($param) {
		if (!empty(!empty($_SESSION['admin']['id_user']))) {

            $patient_status = $this->M_get->get_data(
                'reference_id',
                $this->variables['table_ref'],
                '',
                '',
                '',
                '',
                array("reference_label" => "DIPERIKSA")
            )->result();

            $where = array("reservation_id" => $param);
			$data = array(
				"reservation_status" => $patient_status[0]->reference_id,
				"updated_date" => date('Y-m-d h:i:s a', time()),
				"updated_by" => $_SESSION['admin']['username']
			);

			$save = $this->M_trans->update_data($this->variables['table'],$data, $where);
			
			if($save) {
                $where = array("reservation_id" => $param);
                $data = array(
                    "page" => $this->variables['page_detil'],
                    "flag" => 'edit',
                    "url" => base_url("examination/post"),
                    "menu" => $this->variables['menu'],
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
				redirect(base_url('/examination/add'));
			}
		} else {
			echo 'error';
		}
	}

	public function save() {
        $where = array("reservation_id" => $_POST['reservation_id']);
        $data = array(
            "reservation_status" => $_POST['status_patient'],
            "updated_date" => date('Y-m-d h:i:s a', time()),
            "updated_by" => $_SESSION['admin']['username']
        );

        $save = $this->M_trans->update_data($this->variables['table'],$data, $where);
        
        if($save) {
            if (isset($_POST['medicine_patient'])){
                foreach($_POST['medicine_patient'] as $med) {
                    $med_ref = array(
                        "ref_id" => gen("RMR", date('dYHis', time())) . rand(1,99),
                        "ref_reservation_id" => $_POST['reservation_id'],
                        "ref_medicine_id" => $med,
                        "created_date " => date('dYHis', time()),
                        "created_by" => $_SESSION['admin']['username']
                    );
                    $save_child = $this->M_trans->add_data($this->variables['table_ref_reservation'],$med_ref);
                    if ($save_child) {
                        $this->db->trans_commit();
                    } else {
                        $this->db->trans_rollback();
                        $this->M_trans->delete_data($this->variables['table'], array("reservation_id" => $chk_id));	
                        break;
                        redirect(base_url('/examination/put').$_POST['reservation_id']);
                    }
                }
                redirect(base_url('examination'));
            } else {
                $this->db->trans_commit();
                redirect(base_url('examination'));
            }

        } else {
            redirect(base_url('/examination/put').$_POST['reservation_id']);
        }
	}
}