<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah 
       
      </h1>
      
    </section>

       <section class="content">
      <div class="row">
        <div class="col-xs-12">


<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Tambah </h3>
            </div>
            <div class="panel-body">
<form method="post" action="aksi.php?act=user_simpan">

<div class="form-group">
	<label>Username <span class="text-danger">*</span></label>
    <input class="form-control" type="text" name="username" value="" required/>
</div>
<div class="form-group">
	<label>Password <span class="text-danger">*</span></label>
    <input class="form-control" type="password" name="password" value="" required/>
</div>

<div class="form-group">
    <label>Hak Akses <span class="text-danger">*</span></label>
    <select class="form-control" name="hakakses" required> 
      <option></option>";
      <option value="Admin">Admin</option>";
      
      <option value="Pimpinan">Pimpinan</option>";
    </select>
</div>
<input type="submit" class="btn btn-primary" name="submit" value="Simpan"/>
<a class="btn btn-danger" onclick="self.history.back()">Batal</a>
</form>
</div>
</div>

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
