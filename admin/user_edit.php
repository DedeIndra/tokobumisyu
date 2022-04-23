<?php include 'header.php'; 
$edit_=mysqli_query($con,"select * from pengguna where idpengguna='$_GET[id]'");
$v_=mysqli_fetch_array($edit_);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

       <section class="content">
      <div class="row">
        <div class="col-xs-12">


<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Edit</h3>
            </div>
            <div class="panel-body">
<form method="post" action="aksi.php?act=user_edit&id=<?php echo $_GET['id'];?>">
    <div class="form-group">
    <label>ID Admin <span class="text-danger">*</span></label>
    <input class="form-control" type="text" readonly='' name="idadmin" value="<?php echo $v_['idpengguna']?>"/>
</div>

<div class="form-group">
	<label>Username <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="username" value="<?php echo $v_['username']?>" required/>
</div>
<div class="form-group">
	<label>Password <span class="text-danger">*</span></label>
    <input class="form-control" type="password" name="password" value="<?php echo $v_['pass']?>" required/>
</div>

<div class="form-group">
    <label>Hak Akses <span class="text-danger">*</span></label>
    <select class="form-control" name="hakakses" required> 
    <?php 
            if ($v_['hakakses']=="Admin") echo "<option value='Admin' selected>Admin</option>";  
                  else echo "<option value='Admin'>Admin</option>";
          
              if ($v_['hakakses']=="Pimpinan") echo "<option value='Pimpinan' selected>Pimpinan</option>"; 
                  else echo "<option value='Pimpinan'>Pimpinan</option>";

    ?>
    </select>
</div>
<input type="submit" class="btn btn-primary" name="edit" value="Edit"/>
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

</body>
</html>
