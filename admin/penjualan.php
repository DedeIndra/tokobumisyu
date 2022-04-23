<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penjualan
       
      </h1>
      
    </section>
					<div class="panel-heading">
            <div class="form-group">
            <a align="text-left" class="btn  btn-info" href="detpenjualan.php">Tambah </a>
             <a align="text-left" class="btn  btn-success" href="penjualan.php">Refresh</a>
					 </div>
				
					
					</div>
          <div class="col-xs-4">
       <form action="penjualan.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      </div>   
	   <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
							<table class="table table-bordered table-striped">
    <thead>
        <tr>
            
            <th>No Jual</th>
            <th>Tgl Jual</th>
            
            <th>Nama Barang</th>
 
            <th>Jumlah Penjualan </th>
            
            <th>Aksi</th>
        </tr>
    </thead>
	
	<?php


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
 $sql = "select * from penjualan   where 
			 idjual LIKE '%$q%'
			ORDER BY penjualan.idjual ASC";

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


$jumlahjual=$ini_order['jumlahjual'];

	?>
	<tr class="text-left">	
	    
	    <td><?php echo $id;?></td>
		<td><?php echo indonesian_date($tgl) ;?></td>
		
		<td><?php echo $namabarang;?></td>

		<td><?php echo duwek($jumlahjual);?></td>
		
		<td>
			<a class="btn btn-xs btn-success" href="detpenjualan2.php?id=<?php echo $id ?> ">Edit</a> | 
	
			
			
			<a class="btn btn-xs btn-danger" href="aksi.php?act=penjualan_hapus&id=<?php echo $id;?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
		
		</td>
		
    </tr>
	<?php $no++; };?>
	<tr>
		
	</tr>
	
    </table>
	
	
	
	
<?php 
//page
 $paging = null;
 //jika total halaman dari ceil lebih dari 1
  if($total_page > 1){
   $paging .= '<ul class="pagination">';

   if($page > ($prev + 1)){
    $paging .= '<li><a href="penjualan.php?page=1">Awal</a></li>';
    $paging .= '<li><a href="penjualan.php?page='.($page - 1).'">Sebelumnya</a></li>';
   }

   for($i=$start_page; $i<=$display_page; $i++){
    if($i == $page){
     $paging .= '<li><a href="#'.$i.'">'.$i.'</a></li>';
    }else{
     $paging .= '<li><a href="penjualan.php?page='.$i.'">'.$i.'</a></li>';
    }
   }

   if($total_page > $display_page){
    $paging .= '<li><a href="penjualan.php?page='.($page + 1).'">Selanjutnya</a></li>';
    $paging .= '<li><a href="penjualan.php?page='.$total_page.'">Akhir</a></li>';
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

