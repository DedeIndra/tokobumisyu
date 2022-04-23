<?php 
session_start();
include('koneksi.php');
include('upload.php');
// Hapus barang
if ($act=='user_simpan'){
	 
	$password=md5($_POST['password']);
 
	$username=$_POST['username'];
	$hakakses=$_POST['hakakses'];
	if($username=='' || $password=='') {
	header('location:user.php?error=salah');
	}
	else {
		mysqli_query($con,"INSERT INTO pengguna VALUES ('','$username','$password','$hakakses') ")or die (mysql_error());
		echo "<script>alert('Berhasil !'); window.location = 'user.php'</script>"; 		
		}
}
	
elseif ($act=='user_edit'){

	$password=md5($_POST['password']);
	$username=$_POST['username'];
$nama=$_POST['nama'];
  $hakakses=$_POST['hakakses'];
	if($username=='' || $password==''){
	header('location:user.php?error=salah');
	}
	else {
		mysqli_query($con,"UPDATE pengguna SET     pass='$password', username='$username', hakakses='$hakakses' WHERE idpengguna='".$_GET['id']."' ")or die (mysql_error());
		echo "<script>alert('Berhasil !'); window.location = 'user.php'</script>"; 		
		}
}
elseif ($act=='user_hapus'){
	
		mysqli_query($con,"DELETE from pengguna where idpengguna='$_GET[id]'")or die (mysql_error());
		header('location:user.php');			
		}
 
elseif ($act=='penjualan_hapus'){
   $kdpenjualan=$_GET['id'];
 
   
    mysqli_query($con,"DELETE from penjualan where idjual='$kdpenjualan'")or die (mysql_error());
        
    header('location:penjualan.php');      
    }
elseif ($act=='penjualan_edit'){
$idjual=$_POST['idjual'];
 $tgljual=$_POST['tgljual'];
$namabarang=$_POST['namabarang'];
$jumlahjual=$_POST['jumlahjual']; 
    mysqli_query($con,"UPDATE penjualan SET     tgljual='$tgljual', namabarang='$namabarang', jumlahjual='$jumlahjual' WHERE idjual='".$idjual."' ")or die (mysql_error());
    echo "<script>alert('Berhasil !'); window.location = 'penjualan.php'</script>";    
    
}
elseif ($act=='penjualan_simpan'){

  $idlogin=$_SESSION['idloginnya'];
  $tgljual=$_POST['tgljual'];
$namabarang=$_POST['namabarang'];
$jumlahjual=$_POST['jumlahjual'];  
    mysqli_query($con,"INSERT INTO penjualan(tgljual,namabarang,jumlahjual) VALUES ('$tgljual','$namabarang','$jumlahjual') ")or die (mysql_error());
    echo "<script>window.alert('Berhasil');
        window.location=('penjualan.php')</script>";     
    
} 

?>