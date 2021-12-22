<?php 
class M_trans extends CI_Model {	
	function add_data($table, $data) {
		$this->db->insert($table, $data);
        return $this->db->trans_status();
	}

	function update_data($table, $data, $where) {
		$this->db->where($where);
		$this->db->update($table, $data);
		return $this->db->trans_status();
	}

	function delete_data($table, $where) {
		$this->db->trans_start();
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->trans_status();
	}
}