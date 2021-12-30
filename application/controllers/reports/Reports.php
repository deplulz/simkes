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

	public function print_report_consulting() {
		$pdf = new FPDF('l','mm','A3');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(400,7,'LAPORAN KONSULTASI DOKTER',0,1,'C');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(400,7,'Petugas : ' . $_SESSION['admin']['username'],0,1,'C');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(400,7,'Waktu Cetak  : ' . date("d-M-Y H:i:sa"),0,1,'C');
		$pdf->Cell(400,6,'_________________________________________________________________________________________________________________________________________________________________________________________',0,1,'C');


		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(400,20,'DAFTAR PASIEN YANG BERHASIL DAN SEDANG MELAKUKAN KONSULTASI',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'No',1,0, 'R');
		$pdf->Cell(250,6,'Nama Pasien',1,0,'C');
		$pdf->Cell(130,6,'Status Pasien',1,0,'C');
		$pdf->Ln();
		
		$where_clause = $this->M_get->get_data(
			'reference_id',
			$this->variables['table_ref'],
			'',
			'',
			'',
			'',
			array("reference_label" => "BATAL")
		)->result();
		$data = $this->M_get->get_data(
			'r.reservation_id, r.reservation_user , r.reservation_status, p.patient_name, ref.reference_label',
			$this->variables['table']. ' r',
			$this->variables['table_patients']. ' p',
			'r.reservation_user = p.patient_id',
			$this->variables['table_ref']. ' ref',
			'r.reservation_status = ref.reference_id',
			array('reservation_status !=' => $where_clause[0]->reference_id)
		)->result();
		$a=0;
		foreach ($data as $record){
			$a = $a+1;
			$pdf->Cell(20,6,$a,1,0,'R');
			$pdf->Cell(250,6,$record->patient_name,1,0,'C');
			$pdf->Cell(130,6,$record->reference_label,1,0,'C');
			$pdf->Ln();
		}
		$pdf->Output();
	}

	public function print_report_medicine() {
		$pdf = new FPDF('l','mm','A3');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(400,7,'LAPORAN PENJUALAN OBAT',0,1,'C');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(400,7,'Petugas : ' . $_SESSION['admin']['username'],0,1,'C');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(400,7,'Waktu Cetak  : ' . date("d-M-Y H:i:sa"),0,1,'C');
		$pdf->Cell(400,6,'_________________________________________________________________________________________________________________________________________________________________________________________',0,1,'C');


		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(400,20,'DAFTAR YANG BERHASIL DI JUAL BESERTA STOK AKHIR OBAT',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'No',1,0, 'R');
		$pdf->Cell(250,6,'Nama Obat',1,0,'C');
		$pdf->Cell(65,6,'Jumlah terjual',1,0,'C');
		$pdf->Cell(65,6,'Jumlah tersedia',1,0,'C');
		$pdf->Ln();
		
		$data = $this->M_get->get_data(
			'm.medicine_name, "1" as Sell, m.medicine_stock',
			$this->variables['table_ref_reservation']. ' ref',
			$this->variables['table_medicine']. ' m',
			'ref.ref_medicine_id = m.medicine_id',
			'',
			'',
			''
		)->result();
		$a=0;
		foreach ($data as $record){
			$a = $a+1;
			$pdf->Cell(20,6,$a,1,0,'R');
			$pdf->Cell(250,6,$record->medicine_name,1,0,'C');
			$pdf->Cell(65,6,$record->Sell,1,0,'C');
			$pdf->Cell(65,6,$record->medicine_stock,1,0,'C');
			$pdf->Ln();
		}
		$pdf->Output();
	}
}