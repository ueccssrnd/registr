<?php
    require_once('fpdf/fpdf.php');
    require_once('fpdf/fpdi.php');

    $ctr = 1;
    $height = 10;

    $dbc = mysqli_connect('localhost', 'root', '', 'registr_database');
    $result = mysqli_query($dbc, "SELECT * FROM registered_people ORDER BY university");
    
    $pdf = new FPDF('portrait', 'mm', 'letter');
    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 15);
    $pdf->SetTextColor(33, 133, 89);

    $pdf->Cell(196, $height - 5, "Seminar Workshop on Outcome-Based Education", 0, 1, 'C');

    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(196, $height - 5, "UE Conference Hall, University of the East - Manila Campus", 0, 1, 'C');
    $pdf->Cell(196, $height - 5, date("F j, Y"), 0, 1, 'C');

    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 15);
    $pdf->SetTextColor(221, 30, 47);

    $pdf->Cell(65, $height, "Name", 1, 0, 'C');
    $pdf->Cell(56, $height, "University", 1, 0, 'C');
    $pdf->Cell(75, $height, "College", 1, 1, 'C');

    while($row = mysqli_fetch_array($result)) {
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetTextColor(0, 0, 0);

        $name = $row['full_name'];
        $university = $row['university'];
        $college = $row['college'];

        $pdf->Cell(65, $height, utf8_decode(ucwords(strtolower($name))), 1, 0, 'L');
        $pdf->Cell(56, $height, utf8_decode(ucwords(strtolower($university))), 1, 0, 'L');
        $pdf->MultiCell(75, $height, utf8_decode(ucwords(strtolower($college))), 1, 'L');
        
        $ctr++;
    }

    $pdf->Output();
?>