<?php

include "../inc/config.php";
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{

$tab = $_GET['u'];
$img ="../staff_data/$tab";
    $this->Image($img,5,5,200);
    // Arial bold 15

}
}

    

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Output();
?>