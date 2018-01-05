<?php

include "../inc/config.php";
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{

$tab = $_GET['u'];
$tab = mb_strtoupper($tab);

  //  $this->Image('../images/crest.png',10,3,10);
    // Arial bold 15
    $this->SetFont('Times','BU',15);
    // Move to the right
    $this->Cell(80);
    // Titl
    $this->Cell(20,10,'CORNELIA CONNELLY SCHOOL OF THE HOLY CHILD JESUS',0,0,'C');

     $this->SetFont('courier','BIU',15);
    // Move to the right
    $this->Cell(17,22,$tab.' CLASS LIST',0,0,'R');
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
$tab = $_GET['u'];
$class="";
$find_class= mysql_query("SELECT * FROM students WHERE class='$tab' AND active='yes'");
        $noRows= mysql_num_rows($find_class);
        if ($noRows==0) {
             $pdf->SetFont('Arial','IB',12);
             $pdf->Cell(0,10,"No Student Found  in this Class.",0,0,"C");
        }else{
            while ($fetch = mysql_fetch_assoc($find_class)) {
                $first_name = $fetch['first_name'];
                $last_name = $fetch['last_name'];
                $middle_name = $fetch['middle_name'];
                $admissionNumber = $fetch['admissionNumber'];
            
         $class="$first_name $middle_name $last_name      -        $admissionNumber";
        
     $pdf->Cell(0,10,$class,1,1);

}
}   
$pdf->Output();
?>