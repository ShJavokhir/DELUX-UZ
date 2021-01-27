<?php 

	require("FPDF/fpdf.php");
	$pdf = new FPDF();
	
	$pdf->Cell(0,10,"Hello world !");
	$pdf->Output();

 ?>