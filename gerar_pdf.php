<?php
require 'fpdf/fpdf.php';
require 'db_con.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Cabeçalho
$pdf->Cell(190, 10, 'PHP APLICAÇÃO COMPLETA CRUD', 0, 1, 'C');
$pdf->Ln(10); // Adiciona um espaço

// Cabeçalhos da tabela
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(50, 10, 'Primeiro Nome', 1, 0, 'C');
$pdf->Cell(50, 10, 'Sobrenome', 1, 0, 'C');
$pdf->Cell(60, 10, 'Email', 1, 0, 'C');
$pdf->Cell(20, 10, 'Gênero', 1, 1, 'C');

// Dados da tabela
$pdf->SetFont('Arial', '', 12);

$sql = "SELECT * FROM `crud`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(20, 10, $row['id'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['first_name'], 1, 0);
    $pdf->Cell(50, 10, $row['last_name'], 1, 0);
    $pdf->Cell(60, 10, $row['email'], 1, 0);
    $pdf->Cell(20, 10, $row['gender'], 1, 1, 'C');
}

$pdf->Output('D', 'relatorio.pdf');
?>