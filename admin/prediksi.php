<?php include 'header.php'; 
function getBulan($bln){
        switch ($bln){
          case 1: 
            return "Januari";
            break;
            case 13: 
            return "Januari";
            break;
          case 2:
            return "Februari";
            break;
          case 3:
            return "Maret";
            break;
          case 4:
            return "April";
            break;
          case 5:
            return "Mei";
            break;
          case 6:
            return "Juni";
            break;
          case 7:
            return "Juli";
            break;
          case 8:
            return "Agustus";
            break;
          case 9:
            return "September";
            break;
          case 10:
            return "Oktober";
            break;
          case 11:
            return "November";
            break;
          case 12:
            return "Desember";
            break;
        }
      } 
?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

       <section class="content">
      <div class="row">
        <div class="col-xs-12">


<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Analisa Stok</h3>
            </div>
            <br>
 <form method="post" action="proses.php">
<table width="500px">
 
  <tr>
    <td> 
    <div class="form-group">
  <label>Nama Barang<span class="text-danger">*</span></label>
    <select name='namabarang' id='namabarang' class="form-control" required >
     <option value='' selected>- Pilih  -</option>";
        <?php $tampil=mysqli_query($con,"SELECT * FROM penjualan group by namabarang ORDER BY namabarang asc");
         while($r=mysqli_fetch_array($tampil)){
          echo "<option value='$r[namabarang]'>$r[namabarang]</option>";
            }        ?>                       
       </select>
</div> 
  
  </td>
  
  </tr>
  
</table>
 <br>

 <input type="submit" class="btn btn-info" name="submit" value="Analisa"/>
</form>

</div>
</div>


<div class="panel-heading"><h3 style="color: red">Peramalan kebutuhan barang untuk periode 3 bulan</h3></div>
  <div class="row placeholders">
            <div class="col-xs-12 col-sm-12 placeholder">
                     <div class="panel panel-primary">
                    <div class="panel-heading"><h3>Peramalan Produk <?php echo $_GET['namabarang'];?></h3>
                   
                    
                    </div>
                        <div class="panel-body">
                            
                            <!---->
                            <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
             <th>Bulan</th>
              <th>Permintaan</th>
             <th>Peramalan</th>
            <th>MSE (Mean Square Error)</th>
        
        </tr>
    </thead>
    
    <?php


 //ceil
 // set page
 $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

 // data akan di tampilkan 5 baris perhalaman
 $perpage = 15;

 // metentukan offset
 // offset sendiri menentukan data yang akan di lewati setiap baris
 $limit = ($page - 1) * $perpage;

 $prev = 1;
 $next = 2;

 // menentukan angka awal untuk paging
 $start_page = ($page - $prev) < 1 ? 1 : ($page - $prev);

 // set query
 $sql = "select *
from temp order by bulan";

 $rs = mysqli_query($con,$sql);
 $record = mysqli_num_rows($rs);

 $total_page = ceil($record / $perpage);

 $display_page = $start_page + $prev + $next;
 if ($display_page > $total_page){
     $display_page = $total_page;
     }

 $sql .= ' LIMIT '.$limit.','.$perpage;
 $rs = mysqli_query($con,$sql);

$no=1;
while($ini_produk=mysqli_fetch_array($rs)){
  $bulan=$ini_produk['bulan'];
$permintaan=$ini_produk['permintaan'];
$peramalan=$ini_produk['peramalan'];
if ($bulan==13)
{
$nilaid=ceil($peramalan);
}

    ?>
    <tr class="text-left">  
        <td><?php echo $no; ?></td>
       <td><?php echo getBulan($bulan);?></td>
        <td><?php echo $permintaan;?></td>
        <?php if (($bulan>3)  ) { ?>
         <td><?php echo $peramalan; ?></td>
          <?php } else { ?>
          <td>-</td>
      <?php }  ?>
         <?php if (($bulan>3) && ($bulan!=13) ) { ?>
         <td><?php echo round(((pow(($permintaan-$peramalan),2))/12),2); ?></td>
        <?php } else { ?>
          <td>-</td>
      <?php }  ?>
    </tr>
    <?php $no++; };?>
    
    </table>
  
                            
                            <!---->
                        </div>
                    </div>    
            </div>
            <?php 
            $ss=ceil(1.64*ceil($nilaid/30)*3);
            $rop=ceil($nilaid/30)*3+$ss; 
 //$rop=ceil($nilaid/25)*3; 

            ?>
           <!-- <div class="panel-heading"><h3 style="color: red">Safety Stok Bulan Januari 2021 Untuk <?php echo $_GET['namabarang'];?> : <?php echo $ss;?></h3></div> -->
  <div class="panel-heading"><h3 style="color: red">Kebutuhan Penambahan Barang Untuk Bulan Januari 2021 Untuk <?php echo $_GET['namabarang'];?> : <?php echo $rop;?></h3></div>  


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
             
