<?php

include "../inc/config.php";
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{


   // $this->Image('../images/crest.png',10,3,25);
    // Arial bold 15
    $this->SetFont('Times','BU',15);
    // Move to the right
    $this->Cell(80);
    // Titl
    $this->Cell(20,10,'CORNELIA CONNELLY SCHOOL OF THE HOLY CHILD JESUS',0,0,'C');

     $this->SetFont('courier','BIU',15);
    // Move to the right
    $this->Cell(17,22,'LIST OF ACTIVE STAFFS',0,0,'R');
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

$class="";
$find_staff= mysql_query("SELECT * FROM teachers WHERE active ='yes'");
        $noRows= mysql_num_rows($find_staff);
        if ($noRows==0) {
             $pdf->SetFont('Times','IB',12);
             $pdf->Cell(0,10,"No Staff Found.",0,0,"C");
        }else{
            while ($fetch = mysql_fetch_assoc($find_staff)) {
                $name = $fetch['full_name'];
                $staff_id = $fetch['staff_id'];
                $position = $fetch['position'];
            
         $class="$name     ($position)      -        $staff_id";
        
     $pdf->Cell(0,10,$class,1,1);

}
}   
$pdf->Output();
?>