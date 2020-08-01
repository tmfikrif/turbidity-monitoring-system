<?php

  include '../../include/connection.php';





  
  $query1 = 'select (SELECT COUNT(*) FROM monitoring) as count, 
       (SELECT COUNT(*) FROM monitoring WHERE ntu>=120)  as counts,(SELECT COUNT(*) FROM monitoring WHERE status=0)  as counta '; 

  $result1 = mysqli_query($link, $query1);
  
  if(!$result1){
    echo 'gagal';
  } else {
    $row = mysqli_fetch_assoc($result1);
}
  
  

  
?>





<link  href="../../plugins/datatable/datatables.min.css" rel="stylesheet">      


<table   id="dataku" class="table table-striped table-bordered" cellspacing="0" width="100%" id="datatables">
  <thead class="thead-default">


    <tr>
      <th>#</th>
     <th>Time</th>
  <th >Turbidity</th>

            <th></th>
    </tr>
  </thead>

  <tbody>
    
    <?php
   
      
  $query = 'SELECT waktu,ntu from realtime ORDER BY waktu DESC ';
  

  //$query = 'SELECT a.id,a.waktu,a.ntu,a.adc,b.id,b.nturesv from monitoring as a, reservoir as b where a.id=b.id ORDER BY waktu DESC';
  

      $result = mysqli_query($link, $query);
      
      if(mysqli_num_rows($result) == 0) {
    ?>
    
    <tr>
      <td colspan="2" class="text-center">Empty data</td>
    </tr>
    
    <?php
      }
      
      $i = 1;
      
      while($row = mysqli_fetch_assoc($result)) {
    ?>
    
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row['waktu']; ?></td>
 <td ><?php echo $row['ntu']; ?> NTU</td> 
      <td class="text-right">

       <a href="../../include/hapus data.php?&id=<?php echo $row['waktu']; ?>" class="btn btn-danger fa fa-trash-o btn-xs" onclick="Konfirmasi ('Apakah anda ingin menghapus data?');"></a>
  
      <!--  <a href="sawah-edit.php?m=&id=<?php echo $row['idsawah']; ?>" class="btn btn-warning btn-sm">Edit</a>
    -->
      </td>
    </tr>
    
    <?php } ?>
        
  </tbody>
</table>




<script src="../../plugins/komponen/jquery/dist/jquery.min.js"></script>
<script src="../../plugins/komponen/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../plugins/komponen/fastclick/lib/fastclick.js"></script>
<script src="../../plugins/pdam/js/pdam.js"></script>
<script src="../../plugins/komponen/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../../plugins/komponen/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../plugins/komponen/chart.js/Chart.js"></script>

 <script src="../../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../plugins/vendor/chart.js/Chart.min.js"></script>

    
    <!-- Toggle between fixed and static navbar-->

    <script src="../../plugins/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#dataku').DataTable();
} );

</script>
