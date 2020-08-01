

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,celcius FROM monitoringsuhu WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
$celciusk      = mysqli_query($koneksi, "SELECT celcius FROM realtimesuhu  WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
$datamodus    = mysqli_query($koneksi, "SELECT celcius, COUNT(celcius) as modus FROM realtimesuhu GROUP BY celcius ORDER BY modus DESC LIMIT 1");
$ratarata    = mysqli_query($koneksi, "SELECT  celcius, avg(celcius) as rata FROM realtimesuhu GROUP BY celcius ORDER BY rata LIMIT 1"); // BENAR?
//$ratarata    = mysqli_query($koneksi, "SELECT  celcius, avg(celcius)  FROM monitoringsuhu LIMIT 1"); 


$totaldata    = mysqli_query($koneksi, "SELECT celcius FROM monitoringsuhu  WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");


?>

    
       
  
           
        
           <center><span class="badge bg-red"><h4> <b>Update</b><br>  <?php while ($b = mysqli_fetch_array($celciusk)) { echo '' . $b['celcius'] . '';}?>
     </span> °C
      </a> 
      <?php ?>   </h3>  </span>


<span  class="badge bg-yellow"><h4><b>Mode</b> <br> <?php while ($b = mysqli_fetch_array($datamodus)) { echo '' . $b['celcius'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>

<span class="badge bg-orange"><h4><b>Average</b><br> <?php while ($b = mysqli_fetch_array($ratarata)) { echo '' . $b['celcius'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>


<span class="badge bg-blue"><h4><b>Last Hour</b><br> <?php while ($b = mysqli_fetch_array($totaldata)) { echo '' . $b['celcius'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>
  
          
            </div> <a href="../../include/hapus realtime.php">
          



</var></script></script></div></div></div>  


