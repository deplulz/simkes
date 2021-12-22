<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('rupiah')) {
		function rupiah($angka) {	
			$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
			return $hasil_rupiah;
	 	}
	}

    if (!function_exists('myDateTime')) {
        function myDateTime($time) {
            return DateTime::createFromFormat('Y-m-d H:i:s', $time)->format('d-M-Y');
        }
    }

	if(!function_exists('do_upload')){
    function do_upload($replacedname) {
        $APP =& get_instance();
        $config = array(
            'upload_path' => ('/var/www/html/makeuppedia/assets/img/'),
            'allowed_types' => "jpg|jpeg|png",
            'max_size' => '2048', // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => 0,
            'max_width' => 0,
            'file_name' => $replacedname. '.' . pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION),
            'overwrite' => true
        );

        $APP->upload->initialize($config);
        if ($APP->upload->do_upload()) {
            return(array(
                'status'=>TRUE,
                'filename' => $config['file_name']
                )
            );
        } else {
            return(array(
                'status'=>FALSE
                )
            );
        }
    }
}