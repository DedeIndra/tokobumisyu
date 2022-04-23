<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
       <!--     <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas> 
    </div> -->
          
            <canvas id="myChart"></canvas>
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- /.box (chat box) -->

          <!-- /.box -->

<?php 

$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='1'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Januari=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='2'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Februari=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='3'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Maret=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='4'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$April=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='5'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Mei=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='6'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Juni=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='7'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Juli=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='8'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Agustus=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='9'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$September=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='10'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Oktober=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='11'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$November=$hasil['jmlorder'];
$sql = mysqli_query($con,"select sum(jumlahjual) as jmlorder from penjualan where MONTH(tgljual)='12'")or die(mysql_error());
$hasil=mysqli_fetch_array($sql);
$Desember=$hasil['jmlorder'];

?>
 <script> 
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
               labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label:'Jumlah Penjualan ',
                    data: [
                    <?php echo $Januari; ?>, 
                    <?php echo $Februari; ?>, 
                    <?php echo $Maret; ?>, 
                    <?php echo $April; ?>, 
                    <?php echo $Mei; ?>, 
                    <?php echo $Juni; ?>, 
                   <?php echo $Juli; ?>, 
                    <?php echo $Agustus; ?>, 
                    <?php echo $September; ?>, 
                    <?php echo $Oktober; ?>, 
                    <?php echo $November; ?>, 
                    <?php echo $Desember; ?>
                    ],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                    ],
                    
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>  

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
