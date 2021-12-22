<?php 

class M_get extends CI_Model {	
	function get_data($select, $table, $tbl_join, $on, $tbl_join2, $on2, $where) {		
		$this->db->select($select);
		$this->db->from($table);

		if($tbl_join != null) {
			$this->db->join($tbl_join, $on);
		}
		if($tbl_join2 != null) {
			$this->db->join($tbl_join2, $on2);
		}

		if($where != null) {
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query;
	}

	
	function get_reservation_data($select, $table, $tbl_join, $on, $tbl_join2, $on2, $tbl_join3, $on3, $where) {		
		$this->db->select($select);
		$this->db->from($table);

		if($tbl_join != null) {
			$this->db->join($tbl_join, $on);
		}
		if($tbl_join2 != null) {
			$this->db->join($tbl_join2, $on2);
		}
		if($tbl_join3 != null) {
			$this->db->join($tbl_join3, $on3);
		}

		if($where != null) {
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query;
	}

	function get_data_dashboard() {
		$query = $this->db->query("SELECT distinct(product_name), SUM(product_quantity) as jumlah FROM shop.tbl_order_details group by product_name LIMIT 10");
		return $query;
	}
}