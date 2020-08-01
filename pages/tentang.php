<?php


@session_start();
extract($_GET);
  include '../include/connection.php';
    if(empty($_SESSION['username'])){
      header('location:../login.php'); 
    } else {
}




  
  $query1 = 'select (SELECT COUNT(*) FROM monitoring) as count, 
       (SELECT COUNT(*) FROM monitoring WHERE ntu>=120)  as counts,(SELECT COUNT(*) FROM monitoring WHERE status=0)  as counta '; 

  $result1 = mysqli_query($link, $query1);
  
  if(!$result1){
    echo 'gagal';
  } else {
    $row = mysqli_fetch_assoc($result1);
}
  
  
?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDAM BEKASI</title>
  <meta http-equiv="refresh" content="300">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../plugins/komponen/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/komponen/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../plugins/komponen/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/komponen/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../plugins/pdam/pdam.css">
  <link rel="stylesheet" href="../plugins/pdam/skins/_all-skins.min.css">

  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    
    <a href="../index.php" class="logo">
      <span class="logo-mini"><b></b>PDAM</span>
      
     
      <span class="logo-lg"><b>PDAM</b> BEKASI</span>
    </a>

   
    <nav class="navbar navbar-static-top">
  
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Navigasi</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <i class="fa fa-bell-o"></i>
               <?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span class="label label-warning" ><?php echo $row['counta']; ?> </span>
</a>
<?php }?></span> 



            </a> 
            <ul class="dropdown-menu" onClick="window.location.reload()" > <?php $query1 = 'UPDATE monitoring SET status="1"'; $result = mysqli_query($link, $query1); ?>
              <li class="header">Pemberitahuan</li>
              <li>
                <ul class="menu">
                  <li>
                   

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "pdam");
$waktu       = mysqli_query($koneksi, "SELECT waktu,ntu FROM monitoring WHERE ntu>=0 ORDER BY waktu DESC ");
$ntu 		 = mysqli_query($koneksi, "SELECT ntu FROM monitoring  WHERE ntu>=0 ORDER BY waktu DESC");
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
              <li class="footer"><a href="tabel/tbl_turbidity.php">Lihat Semua</a></li>
            </ul>
          </li>

          


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/logopdam2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin 
             

          </span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="../img/logopdam2.png" class="img-circle" alt="User Image">

                <p>
                  Admin  <?php echo $_SESSION['username']; ?>
                
                </p>
              </li>
              
              <li class="user-footer">

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
                <a href="../include/logout.php" type="button" class="btn btn-outline">Ya</a>
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
          <img src="../img/logopdam2.png" class="img-circle" alt="foto profil">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
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
          <a href="../index.php">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span class="pull-right-container">
          
            </span>
          </a>
         
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Grafik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="grafik/grf_turbidity.php"><i class="fa fa-circle-o"></i> Grafik Turbidity</a></li>            
          </ul>
        </li>

        

       
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tabel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tabel/tbl_turbidity.php"><i class="fa fa-circle-o"></i> Tabel Turbidity</a></li>
          </ul>
        </li>
       <li>

        


<li class=" active treeview">
  <a href="tentang.php">
            <i class="fa fa-book"></i> <span>Tentang</span>
            
        
            </span>
          </a>
        </li>
       

    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
      <h1>
      Tentang
        <small>Developer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-table"></i> Panel</a></li>
        <li class="active">Tentang</li>
      </ol>
    </section>


  <link  href="../plugins/datatable/datatables.min.css" rel="stylesheet">      



 <section class="content">
      <!-- Info boxes -->

 <!-- /.col (LEFT) -->


      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
            <span class="pull-right badge bg-aqua">Developer</span><br>
              <div class="widget-user-image">
                <img class="img-circle" src="../img/tmfikri.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->

              <h3 class="widget-user-username">T.M Fikri Febriansyah</h3>
              <h5 class="widget-user-desc">J3D115114 
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Margin of Error <span class="pull-right badge bg-red">0.96%</span></a></li>
                 </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
       

        <div class="col-md-8">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Turbidity Monitoring System merupakan sebuah alat yang terintegrasi dengan WEB. 
              Pada praktiknya, alat ini dipasang pada Instalasi Pengolahan Air 40 di PDAM Tirta Bhagasasi Bekasi cabang Rawalumbu. 
              Prinsip kerjanya adalah setiap 30 menit sekali alat membaca tingkat kekeruhan air pada IPA 40 dengan satuan NTU <i>(Nephelometric Turbidity Unit)</i>, 
              kemudian data akan dikirim ke Database MYSQL dengan Ethernet Shield, sehingga data dimonitoring di WEB dalam bentuk tabel dan grafik.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 


<div class="col-md-4">
        <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tools</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

         
                <img  src="../img/arduino.png" alt="User Avatar" width="100" heigh="100">
                <img  src="../img/bootstrap.png" alt="User Avatar" width="100" heigh="100">
               
 <img  src="../img/chartjs.png" alt="User Avatar" width="100" heigh="100">
  <img  src="../img/datatables.png" alt="User Avatar" width="100" heigh="100">
  <img  src="../img/adminlte.svg" alt="User Avatar" width="100" heigh="100">
   <img  src="../img/tplink.png" alt="User Avatar" width="100" heigh="100">
   


             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 





    <div class="col-md-8">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Thanks to</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              Thanks to Allah SWT.
              Atas berkat rahmat dan karunianya Tugas Akhir ini dapat diselesaikan.<br>

              Ayah/Ibu.
              Yang telah memberikan doa dan dukungan secara batin maupun materi.<br>

              Bapak/Ibu Dosen.
              Yang tak pernah letih membimbing dan memberikan ilmunya.<br>

              Pembimbing Lapangan.
              Yang telah membimbing dan mengarahkan sehingga alat ini dapat diimplementasikan.<br>

              Teknik Komputer 52.
              Walaupun selama 3 tahun jarang kumpul dan tidak terlalu akrab, tapi makasih buat titip absennya akhirnya selama 3 tahun saya tidak pernah cekal UTS/UAS.<br>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 


</section>
</div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>tmfikri</b>
    </div>
    <strong>&copy; 2018 <a href="http://travelmate.ml">Teknik Komputer</a>.</strong>  Institut Pertanian Bogor.
  </footer>


<script src="../plugins/komponen/jquery/dist/jquery.min.js"></script>
<script src="../plugins/komponen/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../plugins/komponen/fastclick/lib/fastclick.js"></script>
<script src="../plugins/pdam/js/pdam.js"></script>
<script src="../plugins/komponen/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../plugins/komponen/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/komponen/chart.js/Chart.js"></script>

 <script src="../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../plugins/vendor/chart.js/Chart.min.js"></script>

    
    <!-- Toggle between fixed and static navbar-->

    <script src="../plugins/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#dataku').DataTable();
} );

</script>


</body>
</html>