<?php
session_start();
define("RELATIVE", "..");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once RELATIVE.'/includes/config.php';
require_once RELATIVE.'/includes/computer.php';
require_once RELATIVE.'/fpdf/fpdf.php';

class PDF extends FPDF {
    function load_data() {
        $computer = new computer();
        $computer_list = $computer->find('id>=1');
        $data = array();
        foreach ($computer_list as $c){
            $data[] = $c;
        }
        return $data;
    }

    function table($header, $data) {
        $w = array(10 ,50, 30, 40, 40, 50, 40);

        for ($i=0; $i < count($header); $i++) {
            $this -> Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this -> Ln();

        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row->id, 1, 0, 'LR');
            $this->Cell($w[1], 6, $row->name, 1, 0,  'LR');
            $this->Cell($w[2], 6, $row->brand, 1, 0,  'LR');
            $this->Cell($w[3], 6, $row->serial, 1, 0,  'LR');
            $this->Cell($w[4], 6, $row->state, 1, 0,  'LR');
            $this->Cell($w[5], 6, $row->request_date, 1, 0,  'LR');
            $this->Cell($w[6], 6, $row->visit_date, 1, 0,  'LR');
            $this -> Ln();
        }
    }

}

if (isset($_SESSION['logged'])) {
    $pdf = new PDF('L', 'mm', 'A4');

    $header = array('id', 'Nombre', 'Marca', 'Serial', 'Estado', 'Fecha Solicitud', 'Fecha Arreglo');
    $data = $pdf->load_data();
    $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    $pdf->table($header, $data);
    $pdf->Output();
}
else {
    header('Location: login_admin.php');
}