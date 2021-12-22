<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes extends CI_Controller {

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
		$this->variables['title'] = "recipe";
		$this->variables['menu'] = "recipe";
		$this->variables['page'] = "reservations/reservations";
		$this->variables['page_detil'] = 'recipes/detil';
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
                array("reference_label" => "DIPERIKSA")
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
            $where = array("reservation_id" => $param);
            $where_clause = array("ref_reservation_id" => $param);
            $data = array(
                "page" => $this->variables['page_detil'],
                "flag" => 'edit',
                "url" => base_url("recipe/post"),
                "menu" => $this->variables['menu'],
                "medicine" => $this->M_get->get_data(
                    'r.ref_id, r.ref_medicine_id, m.medicine_name, m.medicine_id, m.medicine_price, m.medicine_stock',
                    $this->variables['table_ref_reservation']. ' r',
                    $this->variables['table_medicine']. ' m',
                    'r.ref_medicine_id = m.medicine_id',
                    '',
                    '',
                    $where_clause
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
	}

	public function save() {
        $array_med_id = explode("|",rtrim($_POST['mid'], "|"));
        $where = array("reservation_id" => $_POST['reservation_id']);
        $data = array(
            "reservation_status" => $_POST['status_patient'],
            "updated_date" => date('Y-m-d h:i:s a', time()),
            "updated_by" => $_SESSION['admin']['username']
        );

        $save = $this->M_trans->update_data($this->variables['table'],$data, $where);
        
        if($save) {
            foreach($array_med_id as $med) {
                $where_clause = array("medicine_id"=>$med);
                $stock = $this->M_get->get_data(
                    'medicine_stock',
                    $this->variables['table_medicine'],
                    '',
                    '',
                    '',
                    '',
                    $where_clause
                )->result();


                $med_ref = array(
                    "medicine_stock" => $stock[0]->medicine_stock - 1,
                    "updated_date " => date('dYHis', time()),
                    "updated_by" => $_SESSION['admin']['username']
                );

                $save_child = $this->M_trans->update_data($this->variables['table_medicine'],$med_ref, $where_clause);
                if ($save_child) {
                    $this->db->trans_commit();
                } else {
                    $this->db->trans_rollback();
                    $this->M_trans->delete_data($this->variables['table'], array("reservation_id" => $chk_id));	
                    redirect(base_url('/examination/put').$_POST['reservation_id']);
                    break;
                }
            }
            redirect(base_url('recipe'));
        } else {
            redirect(base_url('/recipe/put').$_POST['reservation_id']);
        }
	}
}