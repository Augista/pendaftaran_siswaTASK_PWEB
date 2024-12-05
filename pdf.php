<?php
require_once('fpdf/fpdfile/fpdf.php');
$pdf = new FPDF('l','mm','A5');
$pdf->AddPage();
$pdf->SetFont('times','B',16);
$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN CODING',0,1,'C');
$pdf->SetFont('times','B',12);
$pdf->Cell(190,7,'DAFTAR PENDAFTAR SMK CODING',0,1,'C');
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('times','B',10);
$pdf->Cell(20,20,'ID',1,0);  
$pdf->Cell(85,20,'NAMA SISWA',1,0);  
$pdf->Cell(50,20,'ALAMAT',1,0);  
$pdf->Cell(30,20,'JENIS KELAMIN',1,0);  
$pdf->Cell(30,20,'FOTO',1,1);  

$pdf->SetFont('times','',10);

include 'config.php';
$query = mysqli_query($db, "SELECT * FROM calon_siswa");
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(20,20,$row['id'],1,0);  
    $pdf->Cell(85,20,$row['nama'],1,0);  
    $pdf->Cell(50,20,$row['alamat'],1,0);  
    $pdf->Cell(30,20,$row['jenis_kelamin'],1,0);  

    $photoPath = 'image/'.$row['foto'];
    if (file_exists($photoPath)) {
        $pdf->Image($photoPath, $pdf->GetX(), $pdf->GetY(), 15, 20); 
    } else {
        $pdf->Cell(30,20,'No Image',1,0, 'C');  
    }
    $pdf->Ln();
}

$pdf->Output();
?>
