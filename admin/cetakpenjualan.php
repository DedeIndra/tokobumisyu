<?php
// memanggil library FPDF
include("koneksi.php");
include("function.php");
require('../fpdf/fpdf.php');
session_start();
$tglsekarang=date('Y-m-d H:i:s');
 $tglawal=$_GET['tglawal'];
  $tglakhir=$_GET['tglakhir'];
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Image('../themes/images/logo.png',20,10,25,25);
$pdf->Cell(180,7,'Toko Bumi Ayu',0,1,'C');
$pdf->Cell(180,7,'Sumbawa ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,7,'Laporan Data Penjualan',0,1,'C');
 $pdf->Cell(10,7,'',0,1);
$pdf->Cell(180,0,'Dicetak oleh : '.$_SESSION['namalengkap'],0,1,'L');
$pdf->Cell(180,0,'Dicetak pada : '.$tglsekarang,0,1,'R'); 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(30,6,'No Order',1,0);
$pdf->Cell(35,6,'Tgl jual',1,0);
$pdf->Cell(80,6,'Nama Barang',1,0);

$pdf->Cell(25,6,'Jumlah ',1,1);

 
$pdf->SetFont('Arial','',10);
 
 if ($tglawal=='')
 {
  $barang =mysqli_query($con,"Select * from penjualan  
      ORDER BY penjualan.idjual desc");
} else
{
$barang =mysqli_query($con,"Select * from penjualan  where   tgljual between '$tglawal' and '$tglakhir' 
      ORDER BY penjualan.idjual desc");
}
$no=1;
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(30,6,$row['idjual'],1,0);
    $pdf->Cell(35,6,indonesian_date($row['tgljual']),1,0); 
    $pdf->Cell(80,6,$row['namabarang'],1,0);

    $pdf->Cell(25,6,duwek($row['jumlahjual']),1,1); 
    $no++;
}
$todayDate = date("d-m-Y");
$pdf->SetFont('Arial','B',10);
 $pdf->Cell(270,7,'',0,1,'C');
 $pdf->Cell(270,7,'Sumbawa,'.$todayDate.'',0,1,'C');
 $pdf->Cell(270,7,'',0,1,'C');
 $pdf->Cell(270,7,'',0,1,'C');
 $pdf->Cell(270,7,'',0,1,'C');
 $pdf->Cell(270,7,''.$_SESSION['namalengkap'].'',0,1,'C');  
$pdf->Output();
?>