<?php include 'header.php'; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Data penjualan
       
      </h1>
      
    </section>
          <div class="panel-heading">
           
        
          
          </div>
     
     <section class="content">
        <div class="panel-heading">
           <form method="post" action="l_penjualan.php" enctype='multipart/form-data'>
<div class="form-group">
    <label>Periode Awal </label>
    <input class="form-control" type="date" name="tglawal"  style="width:300px;" required/>
</div>
<div class="form-group">
    <label>Periode Akhir</label>
  <input class="form-control" type="date" name="tglakhir" style="width:300px;"required/>
</div>
<div class="form-group">
            <input type="submit" class="btn btn-info" name="submit" value="Cek"/>
              <a align="text-left" class="btn  btn-info" href="l_penjualan.php">Refresh</a>
           </div>

     </form> 
        
          
          </div>
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <a href="cetakpenjualan.php?tglawal=<?php echo $tglawal;?>&tglakhir=<?php echo $tglakhir;?> " target="_blank" class="btn btn-info" >Cetak</a>  
						<div class="panel-body">
	
							<!---->
							<table class="table table-bordered ">
    <thead>
        <tr>
            <th>No</th>
            <th>No penjualan</th>
            <th>Tgl</th>
         
            <th>Nama Barang</th>

            <th>Jumlah Terjual</th>
        </tr>
    </thead>
	
	<?php
$tglawal=$_POST['tglawal'];
  $tglakhir=$_POST['tglakhir'];

 //ceil
 // set page
 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

 // data akan di tampilkan 5 baris perhalaman
 $perpage = 10;

 // metentukan offset
 // offset sendiri menentukan data yang akan di lewati setiap baris
 $limit = ($page - 1) * $perpage;

 $prev = 1;
 $next = 2;

 // menentukan angka awal untuk paging
 $start_page = ($page - $prev) < 1 ? 1 : ($page - $prev);

 // set query
 if ($tglawal=='')
 {
  $sql = "Select * from penjualan  
			ORDER BY penjualan.tgljual desc
		";
  }  else
{
$sql =("Select * from penjualan  where   tgljual between '$tglawal' and '$tglakhir' ");
}

 $rs = mysqli_query($con,$sql);
 $record = mysqli_num_rows($rs);

 $total_page = ceil($record / $perpage);

 $display_page = $start_page + $prev + $next;
 if	($display_page > $total_page){
	 $display_page = $total_page;
	 }

 $sql .= ' LIMIT '.$limit.','.$perpage;
 $rs = mysqli_query($con,$sql);

$no=1;
while($ini_order=mysqli_fetch_array($rs)){
$id=$ini_order['idjual'];
$tgl=$ini_order['tgljual'];

$namabarang=$ini_order['namabarang'];

$total=$ini_order['jumlahjual'];

	?>
	<tr class="text-left bg-info">	
	    <td><?php echo $no; ?></td>
	    <td><?php echo $id;?></td>
		<td><?php echo indonesian_date($tgl) ;?></td>
		
		<td><?php echo $namabarang;?></td>


		<td><?php echo ($total);?></td>
    </tr>
	<?php $no++; };?>
	
    </table>
	
	
	
	
<?php 
//page
 $paging = null;
 //jika total halaman dari ceil lebih dari 1
  if($total_page > 1){
   $paging .= '<ul class="pagination">';

   if($page > ($prev + 1)){
    $paging .= '<li><a href="index.php?modul=l_penjualan&page=1">Awal</a></li>';
    $paging .= '<li><a href="index.php?modul=l_penjualan&page='.($page - 1).'">Sebelumnya</a></li>';
   }

   for($i=$start_page; $i<=$display_page; $i++){
    if($i == $page){
     $paging .= '<li><a href="#'.$i.'">'.$i.'</a></li>';
    }else{
     $paging .= '<li><a href="index.php?modul=l_penjualan&page='.$i.'">'.$i.'</a></li>';
    }
   }

   if($total_page > $display_page){
    $paging .= '<li><a href="index.php?modul=l_penjualan&page='.($page + 1).'">Selanjutnya</a></li>';
    $paging .= '<li><a href="index.php?modul=l_penjualan&page='.$total_page.'">Akhir</a></li>';
   }

   $paging .= '<ul>';
  }
  echo $paging;
//akhir page
?>	
					
	   
</div>
            
           
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>