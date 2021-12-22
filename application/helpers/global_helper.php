<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('gen')) {
		function gen($code , $left) {	
			$idx = $code . '-' . substr($left,0);
			return $idx;
	 	}
	}

	if (!function_exists('strMonth')) {
		function strMonth($code) {
			switch ($code) {
				case "01" : 
					return "Januari";
					break;
				case "02" : 
					return "Februari";
					break;
				case "03" : 
					return "Maret";
					break;
				case "04" : 
					return "April";
					break;
				case "05" : 
					return "Mei";
					break;
				case "06" : 
					return "Juni";
					break;
				case "07" : 
					return "Juli";
					break;
				case "08" : 
					return "Agustus";
					break;
				case "09" : 
					return "September";
					break;
				case "10" : 
					return "Oktober";
					break;
				case "11" : 
					return "November";
					break;
				case "12" : 
					return "Desember";
					break;
			}
		}
	}

	if (!function_exists('selector_id')) {
		function selector_id($args) {
			switch ($args) {
				case "ADMIN" :
					return "ADM";
					break;
				case "APOTEKER" :
					return "APT";
					break;
				case "DOKTER" :
					return "DOK";
					break;
				case "RESEPSIONIS" :
					return "RES";
					break;
			}
		}
	}

	if (!function_exists('get_param_selector')) {
		function get_param_selector($args) {
			switch ($args) {
				case "ADMIN" :
					return array("reference_type" => "reservation");
					break;
				case "APOTEKER" :
					return array("reference_type" => "apotek");
					break;
				case "DOKTER" :
					return array("reference_type" => "dokter");
					break;
				case "RESEPSIONIS" :
					return array("reference_type" => "reservation");
					break;
			}
		}
	}