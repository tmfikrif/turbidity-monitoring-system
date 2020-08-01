<?php


@session_start();
extract($_GET);
  include '../../include/connection.php';
  if(empty($_SESSION['username'])){
      header('location:../login.php'); 
    } else {
}




  
  $query1 = 'select (SELECT COUNT(*) FROM monitoring) as count, 
       (SELECT ntu FROM realtime WHERE ntu>=0 LIMIT 1)  as countx,(SELECT COUNT(*) FROM monitoring WHERE status=0)  as counta '; 

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
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('reload.php').fadeIn("slow");
    }, 1000); // refresh setiap 10000 milliseconds
</script>


  
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
$waktu       = mysqli_query($koneksi, "SELECT waktu,ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$ntu 		 = mysqli_query($koneksi, "SELECT ntu FROM monitoring  WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
?>

                    <a>
                     <i class="fa fa-warning text-yellow"> <?php while ($b = mysqli_fetch_array($waktu)) { echo '"' . $b['waktu'] . '",';}?></i></li>
                    </a>
                     <li>

  <a>
                   <i class="fa fa-warning text-yellow"> <?php while ($b = mysqli_fetch_array($ntu)) { echo '"' . $b['ntu'] . '",';}?></i></li>
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
                  <i><center>Water Quality Monitoring System</center></i>
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
        <small>Tirta Bhagasasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i> Panel</a></li>
        <li class="active">Grafik</li>
      </ol>
    </section>

    <section class="content">
 
<!--Grafik NTU--> 

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
$ntuk 		 = mysqli_query($koneksi, "SELECT ntu FROM realtime  WHERE ntu>=0 ORDER BY waktu DESC LIMIT 1");
?>

		
        <div   class="col-md-6">
          <!-- LINE CHART -->
          <div id="load" class="box box-info ">
            <div class="box-header with-border">
              <h3 class="box-title">Realtime</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id="load_content" class="box-body">
           
          
           <span class="badge bg-red"><h1>  <?php while ($b = mysqli_fetch_array($ntuk)) { echo '' . $b['ntu'] . '';}?>
     </span>
			</a> 
			<?php }?> <b> NTU </h1>  </span>

    
</div></div></div>
      
          
              

<!--Grafik Kedua-->
    
        <div  class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Analog Digital Converter </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
         
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    
                
                  <div>

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$adc       = mysqli_query($koneksi, "SELECT adc FROM monitoring WHERE adc>=0 ORDER BY waktu DESC");
$ntua = mysqli_query($koneksi, "SELECT ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC ");
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
            <canvas id="myChartb" width="600" height="325"></canvas>
        </div>

        <script>
            var ctx = document.getElementById("myChartb");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [,,,,,,,,,,,,,,,,,,,],
                    datasets: [{
                            label: "# NTU",
                            data: [<?php while ($p = mysqli_fetch_array($ntua)) { echo '"' . $p['ntu'] . '",';}?>],
                            borderColor: 'orange',
                            fill: false

                            },{

                            label: "# ADC",
                            data: [<?php while ($p = mysqli_fetch_array($adc)) { echo '"' . $p['adc'] . '",';}?>],
                            borderColor: 'green',
                            fill: false

                         
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
 

      <!-- Grafik 3 /UTAMA-->
      <div class="row">
        <div class="col-md-12 ">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Data 24 Jam</h3>

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

              <!--      <div class="col-md-3">

                    <select class="form-control" name="j" required>
    <option value="...">...</option>
    <option href="#" value="Kepala Cabang">Harian <?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu FROM monitoring ORDER BY waktu DESC LIMIT 3");
$ntu = mysqli_query($koneksi, "SELECT ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 3");
?> </option>
    <option value="Sekretaris">Mingguan</option>
    <option value="Divisi IT">Bulanan</option>
  </select>   <span ></span> </div> -->

  
<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu FROM monitoring ORDER BY waktu DESC LIMIT 48");
$ntu = mysqli_query($koneksi, "SELECT ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC LIMIT 48");
?>

        <script src="../../plugins/chartjs/Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 100%;
                margin: 0px auto;
            }
        </style>

      
        <div  class="container">


            <canvas id="myChart" width="600" height="300"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($waktu)) { echo '"' . $b['waktu'] . '",';}?>],
                    datasets: [{
                            label: '# NTU',
                            data: [<?php while ($p = mysqli_fetch_array($ntu)) { echo '"' . $p['ntu'] . '",';}?>],
                             
                            backgroundColor: [
                                'orange','#ffc966','orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966',
                                 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966',
                                  'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966',
                                   'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966',
                                    'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966', 'orange','#ffc966',

                    
                            ],
                            borderColor: [
                                'orange',
                             
                            ],
                            borderWidth: 0
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
 <div>




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

<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [<?php while ($p = mysqli_fetch_array($ntua)) { echo '"' . $p['ntu'] . '",';}?>], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : 'red'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */

    

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
</body>
</html>
