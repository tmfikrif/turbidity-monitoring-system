


<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$ntuk      = mysqli_query($koneksi, "SELECT ntu FROM realtime  WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$datamodus    = mysqli_query($koneksi, "SELECT ntu, COUNT(ntu) as modus FROM realtime GROUP BY ntu ORDER BY modus DESC LIMIT 1");
$ratarata    = mysqli_query($koneksi, "SELECT  ntu, avg(ntu) as rata FROM realtime GROUP BY ntu ORDER BY rata LIMIT 1");

?>

    
       
  
           
      </div> <a href="../../include/hapus realtime.php">

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$adc       = mysqli_query($koneksi, "SELECT adc FROM monitoring WHERE adc>=0 ORDER BY waktu DESC");
$ntua = mysqli_query($koneksi, "SELECT ntu FROM realtime WHERE ntu>=0 ORDER BY waktu DESC LIMIT 20");
$waktua = mysqli_query($koneksi, "SELECT waktu FROM monitoring");

?>


        <script src="../../plugins/chartjs/Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 100%;
                margin: 0px auto;
            }
        </style>
 
      
        <div class="container">
            <canvas id="myChartb" width="600" height="420"></canvas>
        </div>

        <script>
            var ctx = document.getElementById("myChartb");

            var myChart = new Chart(ctx, {
                type: 'line',



                data: {
                    labels: [,,,,,,,,,,,,,,,,,,],
                    datasets: [{
                            label: "NTU"  ,
                            data: [<?php while ($p = mysqli_fetch_array($ntua)) { echo '"' . $p['ntu'] . '",';}?>],
                           borderColor: '#ffc04c',
                           backgroundColor: '#ffedcc',
                            
                            fill: true
                           
          
                            }]
                },  
                options: {
                   animation: {
                    duration: -10000
                   }
                 }
            });  

        </script> </a>

                  </div>

</var></script></script></div></div></div>  





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


<table   class="table table-striped table-bordered" cellspacing="0" width="100%" id="datatables">
  <thead class="thead-default">


     
    

    <tr>
    
     <th > Time</th>
  <th >Turbidity</th>

     
    </tr>
  </thead>

  <tbody>
    
    <?php
   
      
  $query = 'SELECT waktu,ntu from realtime ORDER BY waktu DESC LIMIT 3';
  

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
 
      <td><?php echo $row['waktu']; ?></td>
 <td ><?php echo $row['ntu']; ?> NTU</td> 
   
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
