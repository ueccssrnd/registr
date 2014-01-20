<?php
    $id = $_GET['id'];
    $dbc = mysqli_connect('localhost', 'root', '', 'registr_database');
    require_once('fpdf/fpdf.php');
    require_once('fpdf/fpdi.php');
    $result = mysqli_query($dbc, "SELECT * FROM renewal where id='$id'");
    $row = mysqli_fetch_array($result);
    // initiate FPDI
    
    $pdf = new FPDI('landscape', 'mm', 'letter');

    //$pageCount = $pdf->setSourceFile("fpdf/certificate1.pdf");
    //$pageCount = $pdf->setSourceFile("fpdf/certificate2.pdf");

    /* <Virtual loop> */
    $pdf->AddPage();
    /* $tplIdx = $pdf->importPage(1);

    $pdf->useTemplate($tplIdx, null, null, 0, 0, true); */
    $pdf->SetY(35);
    $pdf->SetFont('Arial', '', 30);
    $pdf->SetTextColor(30, 30, 30);

    $name = $row['full_name'];

    // now write some text above the imported page
    //Text configuration for certificate1.pdf
    /* $height = 125;
    $pdf->Cell(240, $height, utf8_decode($name), 0, 0, 'C'); */

    //Text configuration for certificate2.pdf
    $height = 120;
    $pdf->Cell(0, $height, utf8_decode($name), 0, 0, 'C');
    
    $pdf->Output();
?>