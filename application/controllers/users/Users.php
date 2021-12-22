<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public $variables = array();

	public function __construct() {
		parent::__construct();        
		$this->variables['table'] = "users";
		$this->variables['table_ref'] = "roles";
		$this->variables['title'] = "users";
		$this->variables['menu'] = "users";
		$this->variables['page'] = "users/users";
		$this->variables['page_detil'] = 'users/detil';
		$this->variables['where'] = array("reference_type" => "gender");


	}

	public function index() {
		if (!empty($_SESSION['admin']['id_user'])) {
			$data = array(
				"page" => $this->variables['page'],
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'u.user_id, u.user_name, u.user_password, r.role_name as user_role, u.created_date',
					$this->variables['table']. ' u',
					$this->variables['table_ref']. ' r',
					'u.user_role_id = r.role_id',
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
				"role" => $this->M_get->get_data(
					'*',
					$this->variables['table_ref'],
					'',
					'',
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

	public function edit($param) {
		if (!empty(!empty($_SESSION['admin']['id_user']))) {
			$where = array("user_id" => $param);
			$data = array(
				"page" => $this->variables['page_detil'],
				"flag" => 'edit',
				"menu" => $this->variables['menu'],
				"data" => $this->M_get->get_data(
					'u.user_id, u.user_name, u.user_password, u.user_role_id, r.role_name as user_role, u.created_date',
					$this->variables['table']. ' u',
					$this->variables['table_ref']. ' r',
					'u.user_role_id = r.role_id',
					'',
					'',
					$where
				)->result(),
				"role" => $this->M_get->get_data(
					'*',
					$this->variables['table_ref'],
					'',
					'',
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

	public function save() {
		if ($_POST['flag'] === 'add') {
			$data = array(
				"user_id" => gen(selector_id($_POST["role_text"]), date('dYHis', time())),
				"user_role_id" => $_POST['role'],
				"user_name" => $_POST['name'],
				"user_password" => md5($_POST['password']),
				"created_date" => date('Y-m-d h:i:s a', time()),
				"created_by" => $_SESSION['admin']['username']
			);

			$where = array("user_name" => $_POST['name']);
			$data_validator = $this->M_get->get_data(
				'u.user_id, u.user_name, u.user_password, r.role_name as user_role, u.created_date',
				$this->variables['table']. ' u',
				$this->variables['table_ref']. ' r',
				'u.user_role_id = r.role_id',
				'',
				'',
				$where
			)->num_rows();
			
			if ($data_validator < 1) {
				$save = $this->M_trans->add_data($this->variables['table'],$data);
				if($save) {
					$this->db->trans_commit();
					redirect(base_url('user'));
				} else {
					redirect(base_url('/user/add'));
				}
			} else {
				echo "Name Already Exist";
			}
		} else if ($_POST['flag'] === 'edit'){
			$where = array("user_id" => $_POST['user_id']);
			$data = array(
				"user_role_id" => $_POST['role'],
				"user_name" => $_POST['name'],
				"updated_date" => date('Y-m-d h:i:s a', time()),
				"updated_by" => $_SESSION['admin']['username']
			);
			if ($_POST['password'] != "") {
				$data = array_merge($data,array("user_password" => md5($_POST['password'])));
			}
			$save = $this->M_trans->update_data($this->variables['table'],$data, $where);
			if($save) {
				$this->db->trans_commit();
				redirect(base_url('user'));
			} else {
				redirect(base_url('user/put/'.$_POST['medical_record']));
			}
		} else {
			echo 'error';
		}
	}

	public function delete($param) {
		$where = array("user_id" => $param);
		$delete = $this->M_trans->delete_data($this->variables['table'], $where);		

		if($delete) {
			$this->db->trans_commit();
			redirect(base_url('user'));
		} else {
			redirect(base_url('user'));
		}
	}
}