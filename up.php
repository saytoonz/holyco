<?php

include "inc/config.php";
require('fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{

$tab = $_GET['u'];
$query = mysql_query("SELECT * FROM notes WHERE id='$tab'");
    $fetch = mysql_fetch_assoc($query);
        $title = $fetch['title'];
        $date = $fetch['dated'];


    $this->Image('images/crest.png',10,3,25);
    // Arial bold 15
    $this->SetFont('Times','BU',15);
    // Move to the right
    $this->Cell(80);
    // Titl
    $this->Cell(28,10,'GODSLOVE FOR HUMANITY SCHOOL',0,0,'C');

     $this->SetFont('courier','BIU',15);
    // Move to the right
    $this->Cell(10,22,"$title",0,0,'R');
    
     $this->SetFont('courier','I',15);

    $this->Cell(6,32,"$date",0,0,'R');
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

    
$tab = $_GET['u'];
$query = mysql_query("SELECT * FROM notes WHERE id='$tab'");
    $fetch = mysql_fetch_assoc($query);
        $note = $fetch['note'];

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
        
   $pdf->Cell(0,10,"$note",0,1);  
$pdf->Output();
?>