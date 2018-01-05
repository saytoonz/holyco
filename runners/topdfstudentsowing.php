<?php

include "../inc/config.php";
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{

$tab = $_GET['class'];
$explode = explode(",", $tab);
$class = current($explode);

    //$this->Image('../images/crest.png',10,3,25);
    // Arial bold 15
    $this->SetFont('Times','BU',15);
    // Move to the right
    $this->Cell(80);
    // Titl
    $this->Cell(20,10,'CORNELIA CONNELLY SCHOOL OF THE HOLY CHILD JESUS',0,0,'C');

     $this->SetFont('courier','BIU',15);
    // Move to the right
    $this->Cell(17,22,$class.' Fee owing List',0,0,'R');
    // Line break
    $this->Ln(25);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Page number
    $this->Cell(0,10,''.$this->PageNo().'/{nb}',0,0,'R');
}
}

    

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$students="";

$tab = $_GET['class'];
$explode = explode(",", $tab);
$class = current($explode);
$start = next($explode);

$find_staff= mysql_query("SELECT * FROM students WHERE fee >='$start' AND class='$class'");
        $noRows= mysql_num_rows($find_staff);
        if ($noRows==0) {
             $pdf->SetFont('Arial','IB',12);
             $pdf->Cell(0,10,"No Student Owe.",0,0,"C");
        }else{
            while ($fetch = mysql_fetch_assoc($find_staff)) {
                $first_name = $fetch['first_name'];
                $middle_name = $fetch['middle_name'];
                $last_name = $fetch['last_name'];
                $admissionNumber = $fetch['admissionNumber'];
                $class = $fetch['class'];
                $fee = $fetch['fee'];
                if (strpos($fee, ".")) {
                	$fee="$fee";
                }else{
                	$fee = "$fee.00";
                }
            
         $students="$first_name $middle_name $last_name              ($admissionNumber)      -                         $fee";
        
     $pdf->Cell(0,10,$students,1,1);

}
}   
$pdf->Output();
?>