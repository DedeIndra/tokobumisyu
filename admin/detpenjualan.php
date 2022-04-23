<?php include 'header.php'; 
$tglsekarang=date('Y-m-d'); 
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

       <section class="content">
      <div class="row">
        <div class="col-xs-12">


<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Penjualan </h3>
            </div>
            <div class="panel-body">  
      
<form method="post" action="aksi.php?act=penjualan_simpan" enctype='multipart/form-data'>

<div class="form-group">
    <label>Tgl penjualan<span class="text-danger">*</span></label>
  <input class="form-control" type="date" name="tgljual" value="<?php echo $tglsekarang;?>" placeholder="Tgl penjualan" required/>
</div>
<div class="form-group">
    <label>Nama Barang <span class="text-danger">*</span></label>
    <input class="form-control" type="text" name="namabarang" required="" />
</div>
<div class="form-group">
    <label>Jumlah Penjualan Barang<span class="text-danger">*</span></label>
    <input class="form-control" type="text" required="" name="jumlahjual" value="0" />
    
</div>

<input type="submit" class="btn btn-primary" name="submit" value="Simpan"/>
<a class="btn btn-danger" onclick="self.history.back()">Batal</a>
</form>

</div>

</div>
</div>

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
              <script type="text/javascript">  

                <?php echo $jsArray; ?>  
                <?php echo $jskategori; ?>  
function changeValue(kdproduk){  
    document.getElementById('prd_name').value = prdName[kdproduk];
    var kategori = prdkategori[kdproduk]; 
    
    };  
                </script> 
                
                <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
           <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript" src="jquery.js"></script>

     <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('total').value;
      var txtSecondNumberValue = document.getElementById('jmlbayar').value;
      var result = parseInt(txtSecondNumberValue)-parseInt(txtFirstNumberValue)  ;
      if (!isNaN(result)) {
         document.getElementById('kembali').value = result;
      }
}
</script>