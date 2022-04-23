<?php session_start();
include('koneksi.php'); 
include('function.php');
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Bumi Ayu</title>
  <link rel="shortcut icon" href="../themes/images/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <script type='text/javascript' src='js/fullcalendar/fullcalendar.min.js'></script>
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <script type="text/javascript" src="Chart.js"></script>
 <script type="text/javascript" src="Chart.js/Chart.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function angkadanhuruf(e, goods, field)
{
var angka, karakterangka;
angka = getkey(e);
if (angka == null) return true;
 
karakterangka = String.fromCharCode(angka);
karakterangka = karakterangka.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(karakterangka) != -1)
    return true;
// control angka
if ( angka==null || angka==0 || angka==8 || angka==9 || angka==27 )
   return true;
    
if (angka == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini" >

<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="index.php" class="logo" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Tk</b>Ba</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Toko </b>Bumi Ayu</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" >
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

          
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['namauser']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['namauser']; ?>
                 
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="user.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('show.php').fadeIn("slow");
    }, 5000); 
    
</script>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['namauser']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
         <?php if ($_SESSION['hakakses']=='Admin'){?>
        <li><a href="user.php"><i class="fa fa-book"></i> Pengguna</a></li>
        <li><a href="penjualan.php"><i class="fa fa-book"></i> Penjualan </a></li>
        <li><a href="prediksi.php"><i class="fa fa-book"></i>Analisa Stok</a></li>
         <?php } ?>
         <?php if ($_SESSION['hakakses']=='Pimpinan'){?>
        <li><a href="l_penjualan.php"><i class="fa fa-book"></i> Laporan Penjualan</a></li>
            
         <?php } ?>
       <li><a href="#"> <hr></a></li>
        <li><a href="logout.php"><i class="fa fa-circle-o"></i> Logout</a></li>
      </ul>
      <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
    </section>
    <!-- /.sidebar -->
  </aside> 