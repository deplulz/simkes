<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

	public function index() {
        if (!empty($_SESSION['admin']['id_user'])) {
            redirect(base_url('dashboard'));
        } else {
            $data = array(
				"title" => 'login',
				"page" => 'login/login'
			);
            $this->load->view('templates/template',$data);
        }
    }

	public function auth() {
        $where = array(
            'u.user_name' => $_POST['username'],
            'u.user_password' => md5($_POST['password'])
        );
        $record = $this->M_get->get_data(
				'u.user_id ,u.user_name, ur.role_name as user_role',
				'users u',
				'roles ur',
				'u.user_role_id = ur.role_id',
				'',
				'',
				$where
			)->result();
			
        if (count($record) === 1) {
            $userdata = array(
                'id_user'  => $record[0]->user_id,
                'username'  => $record[0]->user_name,
                'user_role'     => $record[0]->user_role
            );

            $fdata = array(
                'fdata'  => array (
                    'sts' => TRUE,
                    'pesan' => 'Login Sukses',
                    'judul' => 'Sukses',
                    'icon' => 'success'
                )
            );
            $this->session->set_userdata('admin', $userdata);
            $this->session->set_flashdata($fdata);
            redirect(base_url('dashboard'));
        } else {
            $fdata = array(
                'fdata' => array(
                    'sts' => FALSE,
                    'pesan' => 'ID atau Password Salah',
                    'judul' => 'Login Gagal',
                    'icon' => 'error'
                )
            );
            $this->session->set_flashdata($fdata);
            redirect(base_url());
        }
    }
	public function logout() {
        // $this->session->sess_destroy();
        $array_items = array('admin');
        $this->session->unset_userdata($array_items);
        redirect(base_url());
    }    
}
