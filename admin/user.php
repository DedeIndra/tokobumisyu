<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
       
      </h1>
      
    </section>
          <div class="panel-heading">
            <div class="form-group">
            <a align="text-left" class="btn  btn-info" href="user_tambah.php">Tambah </a>
             <a align="text-left" class="btn  btn-success" href="user.php">Refresh</a>
           </div>
        
          
          </div>
          <div class="col-xs-4">
       <form action="user.php" method="get" class="sidebar-form">
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
<table class="table table-busered table-striped">
    <thead>
        <tr>
		    <th>No</th>
			<th>Username</th>
			<th>Password</th>
      <th>Hak Akses</th>
			
			<th></th>
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
 $sql = "SELECT * from pengguna WHERE  
			username LIKE '%$q%'
			order BY username";

 // menentukan jumlah data yang ada di table users
 $rs = mysqli_query($con,$sql);
 $record = mysqli_num_rows($rs);

 // menentukan total paging
 $total_page = ceil($record / $perpage);

 // menentukan jumlah angka yang akan di tampilkan
 $display_page = $start_page + $prev + $next;
 if	($display_page > $total_page){
	 $display_page = $total_page;
	 }

 // memecah data berdasarkan :
 // $limit : data awal yang akan di lewati
 // $perpage : jumlah data yang akan di tampilkan
 $sql .= ' LIMIT '.$limit.','.$perpage;
 $rs = mysqli_query($con,$sql);


$no=1;
while($ini_user=mysqli_fetch_array($rs)){
$id=$ini_user['idpengguna'];
$username=$ini_user['username'];
$password=$ini_user['pass'];

	?>
	<tr class="text-left">	
	    <td><?php echo $no; ?></td>
        <td><?php echo $username;?></td>
        <td><?php echo md5($password);?></td>
        <td><?php echo $ini_user['hakakses'];?></td>
       
        <td>

            <a class="btn btn-xs btn-info" href="user_edit.php?id=<?php echo $id;?>">Edit </a>
			<?php if ($_SESSION['username']==$username){?>
			<?php } else { ?>
			<a class="btn btn-xs btn-danger" href="aksi.php?act=user_hapus&id=<?php echo $id;?>" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Hapus</a>
			<?php } ?>
      </td>
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
    $paging .= '<li><a href="user.php?page=1">Awal</a></li>';
    $paging .= '<li><a href="user.php?page='.($page - 1).'">Sebelumnya</a></li>';
   }

   for($i=$start_page; $i<=$display_page; $i++){
    if($i == $page){
     $paging .= '<li><a href="#'.$i.'">'.$i.'</a></li>';
    }else{
     $paging .= '<li><a href="user.php?page='.$i.'">'.$i.'</a></li>';
    }
   }

   if($total_page > $display_page){
    $paging .= '<li><a href="user.php?page='.($page + 1).'">Selanjutnya</a></li>';
    $paging .= '<li><a href="user.php?page='.$total_page.'">Akhir</a></li>';
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