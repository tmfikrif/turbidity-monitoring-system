

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,adc FROM monitoringsuhu WHERE adc>=0 ORDER BY waktu DESC LIMIT 1");
$adck      = mysqli_query($koneksi, "SELECT adc FROM realtime  WHERE adc>=0 ORDER BY waktu DESC LIMIT 1");
$datamodus    = mysqli_query($koneksi, "SELECT adc, COUNT(adc) as modus FROM realtime GROUP BY adc ORDER BY modus DESC LIMIT 1");
$ratarata    = mysqli_query($koneksi, "SELECT  adc, avg(adc) as rata FROM realtime GROUP BY adc ORDER BY rata LIMIT 1"); // BENAR?
//$ratarata    = mysqli_query($koneksi, "SELECT  adc, avg(adc)  FROM monitoringsuhu LIMIT 1"); 


$totaldata    = mysqli_query($koneksi, "SELECT celcius FROM monitoringsuhu  WHERE adc>=0 ORDER BY waktu DESC LIMIT 1");


?>

    
       
  
           
        
           <center><span class="badge bg-red"><h4> <b>Update</b><br>  <?php while ($b = mysqli_fetch_array($adck)) { echo '' . $b['adc'] . '';}?>
     </span> °C
      </a> 
      <?php ?>   </h3>  </span>


<span  class="badge bg-yellow"><h4><b>Mode</b> <br> <?php while ($b = mysqli_fetch_array($datamodus)) { echo '' . $b['adc'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>

<span class="badge bg-orange"><h4><b>Average</b><br> <?php while ($b = mysqli_fetch_array($ratarata)) { echo '' . $b['adc'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>


<span class="badge bg-blue"><h4><b>Last Hour</b><br> <?php while ($b = mysqli_fetch_array($totaldata)) { echo '' . $b['celcius'] . '';}?>
     </span> °C
      </a> 
      <?php ?> <b>  </h3>  </span>
  
          
            </div> <a href="../../include/hapus realtime.php">
          



</var></script></script></div></div></div>  


