<?php

error_reporting(~E_NOTICE & ~E_DEPRECATED);
  define('HOST','localhost');
 define('USER','root');
 define('PASS','');
 define('DB','tokoayu');
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
$mod = $_GET['modul']; 
$act = $_GET['act'];
$bag = $_GET['bag'];
//search	
$q = $_GET['q'];
date_default_timezone_set('Asia/Jakarta');
?>