<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_ntu.xls");
?>
<h3><center>Laporan NTU PDAM Tirta Bahagasasi Bekasi</h3></center>
<h4><center> Cabang Rawalumbu</h4></center>
    
<table border="1" cellpadding="3"><center>
  <tr>
    <th>No</th>
    <th>Waktu</th>
    <th>Intake</th>
    <th> Reservoir </th>

  </tr>
  <?php
    
      include "connection.php";
 
  $query = 'SELECT a.id,a.waktu,a.ntu,a.adc,b.id,b.nturesv from monitoring as a, reservoir as b where a.id=b.id ORDER BY waktu DESC';
 

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
      <td><?php echo $row['ntu']; ?> </td>
     <<td><?php echo $row['nturesv']; ?></td>
  
    </tr>
    
    <?php } ?>
</table>