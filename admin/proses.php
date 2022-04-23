<?php
include "koneksi.php";
mysqli_query($con,"DELETE from temp ");

$bulanawal2=$bulanawal+1;
$namabarang=$_POST['namabarang'];
echo $namabarang;
for ($i = 1; $i <= 13; $i++){

$sql = mysqli_query($con,"select month(tgljual) as bulan,sum(jumlahjual) as jumlahjual,namabarang from penjualan where namabarang='$namabarang'  and month(tgljual)='$i' ");
      while($data=mysqli_fetch_array($sql))
      {
      	$barang=$data['namabarang'];
      	$bulan=$data['bulan'];
            $jumlahjual=$data['jumlahjual'];
      	mysqli_query($con,"INSERT INTO temp(bulan,namabarang,permintaan) VALUES ('$i','$namabarang','$jumlahjual') ");	
      }
 }

 $sql = mysqli_query($con,"select * from temp where bulan='1' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual1=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='2' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual2=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='3' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual3=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='4' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual4=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='5' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual5=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='6' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual6=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='7' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual7=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='8' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual8=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='9' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual9=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='10' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual10=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='11' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual11=$data['permintaan'];
      }
 $sql = mysqli_query($con,"select * from temp where bulan='12' ");
      while($data=mysqli_fetch_array($sql))
      {
            $jual12=$data['permintaan'];
      }
for ($i = 4; $i <= 13; $i++){
      $b=$i-4;
 $sql = mysqli_query($con,"select sum(permintaan) as jmltambah from temp where bulan<'$i' and bulan>'$b'");
      while($data=mysqli_fetch_array($sql))
      {
            $jmltambah=round(($data['jmltambah']/3),2);
            echo $jmltambah;
            mysqli_query($con,"UPDATE temp SET     peramalan='$jmltambah' WHERE bulan='$i' ");
      }
}
  header('location:prediksi.php?namabarang='.$namabarang);
?>