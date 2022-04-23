<?php
include "admin/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = $_POST['username'];
$pass     = md5($_POST['Password']);

$loginadmin=mysqli_query($con,"SELECT * FROM pengguna WHERE username='$username' AND pass='$pass'");
$ketemuadmin=mysqli_num_rows($loginadmin);
$radmin=mysqli_fetch_array($loginadmin);

if ($ketemuadmin > 0){
  session_start();

  $_SESSION['namauser']     = $radmin['username'];
  $_SESSION['namalengkap']  = $radmin['username'];
  $_SESSION['passuser']     = $radmin['pass'];
  $_SESSION['hakakses']    = $radmin['hakakses'];
  
  header('location:admin/index.php');
}
else{
  
 echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'index.php'</script>";
}
//}
?>
 