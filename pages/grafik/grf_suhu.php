<?php


@session_start();
extract($_GET);
  include '../../include/connection.php';
  if(empty($_SESSION['username'])){
      header('location:../login.php'); 
    } else {
}




  
  $query1 = 'select (SELECT COUNT(*) FROM monitoringsuhu) as count, 
       (SELECT celcius FROM realtimesuhu WHERE celcius>=0 LIMIT 1)  as countx,(SELECT COUNT(*) FROM monitoringsuhu WHERE status=0)  as counta '; 

  $result1 = mysqli_query($link, $query1);
  
  if(!$result1){
    echo 'gagal';
  } else {
    $row = mysqli_fetch_assoc($result1);

  
  
?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDAM BEKASI</title>
 <!-- <meta http-equiv="refresh" content="300">-->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../plugins/komponen/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/komponen/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../plugins/komponen/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/komponen/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../plugins/pdam/pdam.css">
  <link rel="stylesheet" href="../../plugins/pdam/skins/_all-skins.min.css">
   <link rel="stylesheet" href="scrollgrafik.css">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>




  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    
    <a href="../../index.php" class="logo">
      <span class="logo-mini"><b></b>PDAM</span>
      
     
      <span class="logo-lg"><b>PDAM</b> BEKASI</span>
    </a>

   
    <nav class="navbar navbar-static-top">
  
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Navigasi</span>
      </a>

      <div id="load_content2" class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <i class="fa fa-bell-o"></i>
               <?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span   class="label label-warning" ><?php echo $row['counta']; ?> </span>
</a>
<?php }?></span> 



            </a> 
            <ul  class="dropdown-menu" onClick="window.location.reload()" > <?php $query1 = 'UPDATE monitoring SET status="1"'; $result = mysqli_query($link, $query1); ?>
              <li class="header">Pemberitahuan</li>
              <li>
                <ul class="menu">
                  <li>
                   

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,celcius FROM monitoringsuhu WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
$celcius 		 = mysqli_query($koneksi, "SELECT celcius FROM monitoringsuhu  WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
?>

                    <a>
                     <i class="fa fa-warning text-yellow"> <?php while ($b = mysqli_fetch_array($waktu)) { echo '"' . $b['waktu'] . '",';}?></i></li>
                    </a>
                     <li>

  <a>
                   <i class="fa fa-warning text-yellow"> <?php while ($b = mysqli_fetch_array($celcius)) { echo '"' . $b['celcius'] . '",';}?></i></li>
                 </a>

                  <li>
                  
                </ul>
              </li>
              <li class="footer"><a href="../tabel/tbl_turbidity.php">Lihat Semua</a></li>
            </ul>
          </li>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../img/logopdam2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="../../img/logopdam2.png" class="img-circle" alt="User Image">

                <p>
                  Admin <?php echo $_SESSION['username']; ?>
                
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-info">Tambah Admin</a>
                </div>





      
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-warning">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>

    </nav>
  </header>





<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Harap Konfirmasi</h4>
              </div>
              <div class="modal-body">
                <h5>Apakah anda yakin ingin menambahkan orang lain menjadi admin?</h5>
                <p><i>*Menambahkan orang lain sebagai admin berarti memberikan hak akses sepenuhnya kepada orang tersebut. Harap daftarkan orang yang dapat dipercaya</i></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
                <a href="../daftar.php" type="button" class="btn btn-outline">Ya</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Harap Konfirmasi</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin keluar dari halaman admin?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Tidak</button>
                <a href="../../include/logout.php" type="button" class="btn btn-outline">Ya</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../img/logopdam2.png" class="img-circle" alt="foto profil">
        </div>
        <div class="pull-left info">
          <p> <?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
 
      <form  class="sidebar-form">
        <div class="input-group">
         
                <a class="btn btn-flat">
                  <i><center>Water Turbidity Monitoring System</center></i>
                </a><a></a>
              </span>
        </div>
      </form>
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi</li>

        <li>
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span class="pull-right-container">
          
            </span>
          </a>
         
        </li>
        
        
        <li class="active treeview menu open">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Grafik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="grf_turbidity.php"><i class="fa fa-circle-o"></i> Grafik Turbidity</a></li>
            <li><a href="grf_suhu.php"><i class="fa fa-circle-o"></i> Grafik Suhu</a></li>              
          </ul>
        </li>

        

       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tabel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../tabel/tbl_turbidity.php"><i class="fa fa-circle-o"></i> Tabel Turbidity</a></li>
            <li><a href="../tabel/tbl_suhu.php"><i class="fa fa-circle-o"></i> Tabel Suhu</a></li>
          </ul>
        </li>
       <li>

        



  <a href="../tentang.php">
            <i class="fa fa-book"></i> <span>Tentang</span>
            
        
            </span>
          </a>
        </li>
       

    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
      <h1>
      Grafik
        <small>Suhu| </small>
      <b>  <small id="clock"> </small>  </b> <small><b>WIB </b></small>
      </h1>


      <script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
     
    function clock()
    {
        if (detik!=0 && detik%60==0) {
            menit++;
            detik=0;
        }
        second = detik;
         
        if (menit!=0 && menit%60==0) {
            jam++;
            menit=0;
        }
        minute = menit;
         
        if (jam!=0 && jam%24==0) {
            jam=0;
        }
        hour = jam;
         
        if (detik<10){
            second='0'+detik;
        }
        if (menit<10){
            minute='0'+menit;
        }
         
        if (jam<10){
            hour='0'+jam;
        }
        waktu = hour+':'+minute+':'+second;
         
        document.getElementById("clock").innerHTML = waktu;
        detik++;
    }
 
    setInterval(clock,1000);
</script>
 
<div style="text-align:RIGHT;">
   
    
</div>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i> Panel</a></li>
        <li class="active">Grafik</li>
      </ol>
    </section>

    <section class="content">
 
<!--Grafik NTU--> 

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,celcius FROM monitoringsuhu WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
$celciusk 		 = mysqli_query($koneksi, "SELECT celcius FROM realtimesuhu  WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
?>


<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_suhu').load('reload_suhu.php').fadeIn("slow");
       
    }, 1000); // refresh setiap 10000 milliseconds
</script>


        <div   class="col-md-6">
          <!-- LINE CHART -->
          <div id="load" class="box box-warning ">
            <div class="box-header with-border">
              <h3 class="box-title">Realtime</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div id="load_suhu" class="box-body"> 

          
           <span class="badge bg-red"><h1>  <?php while ($b = mysqli_fetch_array($celciusk)) { echo '' . $b['celcius'] . '';}?>
     </span>
			</a> 
			<?php }?> <b> °C </h1>  </span>

    
</div></div></div>
      
          
              
<!--Grafik resvo--> 



<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,celcius FROM monitoringsuhu WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
$celciusk 		 = mysqli_query($koneksi, "SELECT celcius FROM realtimesuhu  WHERE celcius>=0 ORDER BY waktu DESC LIMIT 1");
?>


<div class="datamonitor">
 <div class="col-md4">
  <span class="bridge bg-red">

		
        <div   class="col-md-6">
          <!-- LINE CHART -->
          <div  class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Calculate</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id="load_suhucal" class="box-body">
           
          
  <script type="text/javascript">
    var auto_refresh_resvo = setInterval(
    function () {
       $('#load_suhucal').load('reload_suhucal.php').fadeIn("slow");
    }, 1000); // refresh setiap 10000 milliseconds
</script>


</div></div></div>
      

 

      <!-- Grafik 3 /UTAMA-->
      <div class="row">
        <div class="col-md-6 ">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">24 Hours</h3>




              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="box-body no-padding">

              <div class="row">
                <div class="col-md-12">
                  <div class="pad">
                   <div>

          <?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$resvo       = mysqli_query($koneksi, "SELECT nturesv FROM reservoir WHERE adc>=0 ORDER BY waktu DESC");
$celciusa = mysqli_query($koneksi, "SELECT celcius FROM monitoringsuhu WHERE celcius>=0 ORDER BY waktu DESC ");
$waktu = mysqli_query($koneksi, "SELECT  waktu FROM monitoringsuhu ORDER BY waktu DESC LIMIT 24");

?>


        <script src="../../plugins/chartjs/Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 100%;
                margin: 0px auto;
            }
        </style>

      
        <div class="container">
            <canvas id="myChartb" width="300" height="205"></canvas>
        </div>

        <script>
            var ctx = document.getElementById("myChartb");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($waktu)) { echo '"' . $b['waktu'] . '",';}?>],
                    datasets: [{
                            label: "# °C",
                            data: [<?php while ($p = mysqli_fetch_array($celciusa)) { echo '"' . $p['celcius'] . '",';}?>],
                             borderColor: '#5b8e7d',
                          backgroundColor: '#5b8e7d',
                            //'#ffedcc'
                           // fill: true

                         

                         
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }]
                    }
                }
            });
        </script>

                  </div>

         

                </div>


              </div>
          
                </div>
              </div>

                </div>
              </div>

                </div>
              </div>


</div>
</div>





    

         
     </var></script>





  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>tmfikri</b>
    </div>
    <strong>&copy; 2018 <a href="http://travelmate.ml">Teknik Komputer</a>.</strong>  Institut Pertanian Bogor.
  </footer>


<script src="../../plugins/komponen/jquery/dist/jquery.min.js"></script>
<script src="../../plugins/komponen/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../plugins/komponen/fastclick/lib/fastclick.js"></script>
<script src="../../plugins/pdam/js/pdam.js"></script>
<script src="../../plugins/komponen/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../../plugins/komponen/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../plugins/komponen/chart.js/Chart.js"></script>
<script src="../../plugins/komponen/Flot/jquery.flot.js"></script>
<script src="../../plugins/komponen/Flot/jquery.flot.resize.js"></script>






</script>
</body>
</html>
