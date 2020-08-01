

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$ntuk      = mysqli_query($koneksi, "SELECT ntu FROM realtime  WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$datamodus    = mysqli_query($koneksi, "SELECT ntu, COUNT(ntu) as modus FROM realtime GROUP BY ntu ORDER BY modus DESC LIMIT 1");
$datamodus1    = mysqli_query($koneksi, "SELECT ntu, COUNT(ntu) as modus FROM realtime GROUP BY ntu ORDER BY modus DESC LIMIT 1");
$datamodus2   = mysqli_query($koneksi, "SELECT ntu, COUNT(ntu) as modus FROM realtime GROUP BY ntu ORDER BY modus DESC LIMIT 1");
$ratarata    = mysqli_query($koneksi, "SELECT  ntu, avg(ntu) as rata FROM realtime GROUP BY ntu ORDER BY rata DESC LIMIT 1"); // BENAR?
//$ratarata    = mysqli_query($koneksi, "SELECT  ntu, avg(ntu)  FROM monitoring LIMIT 1"); 


$totaldata    = mysqli_query($koneksi, "SELECT ntu FROM monitoring  WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");


?>

    
       
  
           
        
           <center><span class="badge bg-red"><h4> <b>Update</b><br>  <?php while ($b = mysqli_fetch_array($ntuk)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?>   </h3>  </span>


<span  class="badge bg-yellow"><h4><b>Mode 1</b> <br> <?php while ($b = mysqli_fetch_array($datamodus)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?> <b>  </h3>  </span>

<span  class="badge bg-yellow"><h4><b>Mode 2</b> <br> <?php while ($b = mysqli_fetch_array($datamodus1)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?> <b>  </h3>  </span>

<span  class="badge bg-yellow"><h4><b>Mode 3</b> <br> <?php while ($b = mysqli_fetch_array($datamodus2)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?> <b>  </h3>  </span>

<span class="badge bg-orange"><h4><b>Average</b><br> <?php while ($b = mysqli_fetch_array($ratarata)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?> <b>  </h3>  </span>


<span class="badge bg-blue"><h4><b>Last Hour</b><br> <?php while ($b = mysqli_fetch_array($totaldata)) { echo '' . $b['ntu'] . '';}?>
     </span> NTU
      </a> 
      <?php ?> <b>  </h3>  </span>
  
          
            </div> <a href="../../include/hapus realtime.php">
          



</var></script></script></div></div></div>  


