

<?php


@session_start();
  include 'include/connection.php';


if(empty($_SESSION['username'])){
      header('location:pages/login.php'); 
    } else {
}



  
  $query1 = 'select (SELECT COUNT(*) FROM monitoring) as count, 
       (SELECT COUNT(*) FROM monitoring WHERE ntu>=1000)  as counts,(SELECT COUNT(*) FROM monitoring WHERE status=0)  as counta
       ,(SELECT COUNT(*) FROM reservoir WHERE nturesv<=1000)  as countn '; 

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
  <link rel="stylesheet" href="plugins/komponen/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/komponen/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/komponen/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/komponen/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="plugins/pdam/pdam.css">
  <link rel="stylesheet" href="plugins/pdam/skins/_all-skins.min.css">


  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue fixed sidebar-mini background-color="red"">
<div class="wrapper">

  <header class="main-header">
  
    <a href="index.php" class="logo">
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
              <li class="footer"><a href="../tabel/tbl_turbidity.php">Lihat Semua</a></li>
            </ul>
          </li>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/logopdam2.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="img/logopdam2.png" class="img-circle" alt="User Image">

                <p>
                  Admin <?php echo $_SESSION['username']; ?>
                
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
                <a href="pages/daftar.php" type="button" class="btn btn-outline">Ya</a>
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
                <a href="include/logout.php" type="button" class="btn btn-outline">Ya</a>
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
          <img src="img/logopdam2.png" class="img-circle" alt="foto profil">
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

        <li class=" active menu open">
          <a href="index.php">
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
            <li><a href="pages/grafik/grf_turbidity.php"><i class="fa fa-circle-o"></i> Grafik Turbidity</a></li>            
          <li><a href="pages/grafik/grf_suhu.php"><i class="fa fa-circle-o"></i> Grafik Suhu</a></li>            
        
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
            <li><a href="pages/tabel/tbl_turbidity.php"><i class="fa fa-circle-o"></i> Tabel Turbidity</a></li>
           <li><a href="pages/tabel/tbl_suhu.php"><i class="fa fa-circle-o"></i> Tabel Suhu</a></li>

          </ul>
        </li>
       <li>

        



  <a href="pages/tentang.php">
            <i class="fa fa-book"></i> <span>Tentang</span>
            
        
            </span>
          </a>
        </li>
       

    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
      <h1>
      Beranda
        <small>Tirta Bhagasasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Panel</a></li>
        <li class="active">Beranda</li>
      </ol>
    </section>









 <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-cloud-upload"> </i> </span>

            <div class="info-box-content">
              <span class="info-box-text">Total Data</span>
              <span class="info-box-number"></i>
               <?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span  ><?php echo $row['count']; ?> </span>
</a>
<?php }?></span>  
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-area-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Normal</span>
              <span class="info-box-number"></i>
               <?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span  ><?php echo $row['countn']; ?> </span>
</a>
<?php }?> </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sangat Keruh</span>
              <span class="info-box-number"></i>
               <?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span  ><?php echo $row['counts']; ?> </span>
</a>
<?php }?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bell"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemberitahuan</span>
              <span class="info-box-number"><?php if(mysqli_num_rows($result1) > 0 ){ ?>
<span  ><?php echo $row['counta']; ?> </span>
</a>
<?php }?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  <link  href="plugins/datatable/datatables.min.css" rel="stylesheet">  



 <!-- /.col (LEFT) -->
           <div class="row">
        <!-- Left col -->
        <div class="col-md-12 ">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Terdaftar</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-12">
                  <div class="pad">
                    <!-- Map will be created here -->
                   
                   <!--ISI DISINI DIV> -->
                   <div>

<table   id="dataku" class="table table-striped table-bordered" cellspacing="0" width="100%" id="datatables">
  <thead class="thead-default">


    <tr>
    
     <th>Terdaftar</th>
  <th>Nama</th>
  
    <th>Jabatan</th>
     
            <th></th>
    </tr>
  </thead>

  <tbody>
    
    <?php
      //$query = 'SELECT * FROM sawah ';
      
  $query = 'SELECT waktu,username,email,jabatan from admin';
  

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
      <td><?php echo $row['username']; ?></td>
     <td><?php echo $row['jabatan']; ?></td>
      <td class="text-right">

       <a href="include/hapus admin.php?&id=<?php echo $row['waktu']; ?>" class="btn btn-danger fa fa-trash-o btn-xs" class="fa  fa-trash" onclick="Konfirmasi ('Apakah anda ingin menghapus data?');"></a>
  
      <!--  <a href="sawah-edit.php?m=&id=<?php echo $row['idsawah']; ?>" class="btn btn-warning btn-sm">Edit</a>
    -->
      </td>
    </tr>
    
    <?php } ?>
        
  </tbody>
</table>

</div></div></div></div></div>
</div></div></div>
    

<div class="row">
        <div class="col-md-6">
          <div class="box box-info collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Sejarah PDAM Tirta Bhagasasi Bekasi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            Tirta Bhagasasi (PDAM Bekasi) lama dikenal sebagai penyedia jasa air bersih bagi area industri, area bisnis maupun pemukiman penduduk di wilayah operasional Tirta Bhagasasi, meliputi Kabupaten Bekasi dan sebagian Kota Bekasi. Tirta Bhagasasi senantiasa berupaya memberikan pelayanan terbaik berupa jasa penyedia kebutuhan akan air yang terjamin kualitas dan kuantitasnya. Hal ini adalah bagian langkah kecil Tirta Bhagasasi untuk menyehatkan masyarakat Bangsa Indonesia.
Semua usaha ini dilakukan oleh Tirta Bhagasasi untuk memenuhi kepuasan pelanggan. Tirta Bhagasasi menyadari pula bahwa pelanggan setia adalah urat nadi dari majunya bisnis yang telah dirintis selama ini.

Sejak tahun 1979 Tirta Bhagasasi mendapat konsesi untuk melakukan usaha dari Surat Keputusan Menteri Pekerjaan Umum dengan Nomor: 036/KPTS/CK/VI/1979, dengan bentuk lembaga Badan Pengelolaan Air Minum (BPAM) Kabupaten Bekasi dibawah pengawasan Proyek Air Bersih Jawa Barat.

Setelah berjalan 2 tahun kemudian terjadi penggabungan BPAM dan PDAM berdasarkan Perda No.: 04/HK-D/PU.013.1/VIII/81, yang kemudian mengalami dua kali perubahan Perda yaitu Nomor 8 Tahun 1988 dan Nomor 2 Tahun 1992.

Kemudian tahun 1998 terjadi penggabungan dua(2) wilayah pelayanan Kabupaten & Kota Bekasi berdasarkan Kesepakatan bersama PEMDA Kota dan Kabupaten Bekasi tentang Pengembangan dan Pengelolaan Sistim Penyediaan Air Bersih Wilayah Kotamadya Bekasi oleh PDAM Kabupaten DT. II Bekasi Nomor : 690/244A/PDAM 690/191/PDAM 690/Kep.457-HOR/XII/2002

Tahun 2002 dengan nama PDAM Bekasi berdasarkan Keputusan bersama PEMDA Kota dan Kabupaten Bekasi tentang kepemilikan dan pengelolaan PDAM Bekasi Nomor : 503/Kep.389.B-PDAM/2002 690/Kep.457-HOR/XII/2002.

Perubahan terakhir terjadi pada tanggal 29 September 2009 pada logo dan nama perusahaan dari sebelumnya PDAM Bekasi menjadi PDAM Tirta Bhagasasi Bekasi sampai saat ini. Jumlah karyawan sampai dengan saat ini adalah sebanyak 704 orang.
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <!-- Info boxes -->


        <div class="col-md-6">
          <div class="box box-info collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Sejarah Pengembangan Instalasi Pengolahan Air </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            PDAM Tirta Bhagasasi Bekasi telah membangun Instalasi Pengolahan Air (IPA) yang tersebar di berbagai wilayah pelayanan untuk menjamin tercukupinya kebutuhan air bersih kepada masyarakat. Dibawah ini merupakan penyebaran pengembangan IPA PDAM Tirta Bhagasasi Bekasi yang meliputi wilayah pelayanan Kota dan Kabupaten Bekasi, diantaranya adalah:
<br> <br><b>Wilayah Pelayanan Kota Bekasi</b><br>
Pembangunan IPA Poncol dari Th. 1979 – 2016 dengan Total Kapasitas 480 I/dt
Pembangunan IPA Pondok Ungu dari Th. 1992 – 2013 dengan Total Kapasitas 450 I/dt
Pembangunan IPA Rawa Lumbu dari Th. 1987 – 2005 dengan Total Kapasitas 260 I/dt
Pembangunan IPA Rawa Tembaga dari Th. 1990 – 1994 dengan Total Kapasitas 190 I/dt
Pembangunan Deep Wheel dan Sumur dalam Pondok Gede dari Th. 1984 – 2014 dengan Total Kapasitas 15 I/dt
<br>
<b>Wilayah Pelayanan Kabupaten Bekasi</b><br>
Pembangunan IPA Sukatani dari Th. 1985 – 2009 dengan Total Kapasitas 60 I/dt
Pembangunan IPA Tambun dari Th. 1990 – 2001 dengan Total Kapasitas 110 I/dt
Pembangunan IPA Babelan dari Th. 1991 – 2011 dengan Total Kapasitas 220 I/dt
Pembangunan IPA Tegal Gede dari Th. 1995 – 2003 dengan Total Kapasitas 420 I/dt
Pembangunan IPA CabangBungin dari Th. 2002 – 2002 dengan Total Kapasitas 20 I/dt
Pembangunan IPA Kedungwaringin dari Th. 2007 – 2008 dengan Total Kapasitas 40 I/dt
Pembangunan IPA Tambelang dari Th. 2012 – 2013 dengan Total Kapasitas 20 I/dt
Pembangunan IPA Tambun Utara dari Th. 2013 – 2013 dengan Total Kapasitas 50 I/dt
Pembangunan IPA Cikarang Barat dari Th. 2013 – 2013 dengan Total Kapasitas 50 I/dt
Pembangunan IPA Cikarang Utara (Tanah Merah) dari Th. 2014 – 2014 dengan Total Kapasitas 50 I/dt
Pembangunan IPA Tarumajaya dari Th. 2015 – 2015 dengan Total Kapasitas 50 lt/dt
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        </div>



 <div class="row">
        <div class="col-md-6">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Visi, Misi & Motto</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <b>VISI</b><br>
Mewujudkan PDAM Bekasi yang Profesional, Sehat dan Siap Melayani
<br>
<b>MISI</b><br>
Mewujudkan entitas bisnis yang profesional berdasarkan tata nilai unggulan
Mewujudkan perusahaan yang memberikan nilai bagi pemilik, karyawan, dan masyarakat Bekasi
Menjalankan bisnis
<br><b>MOTTO</b><br>
Kami Layani Kebutuhan Air Bersih Masyarakat Bekasi
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




        <div class="col-md-6">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Struktur Organisasi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
             <a href="img/struktur.jpg" target="struktur"><img border="0"  width=100% src="img/struktur.jpg" alt=""></a>
              <font color="red">*Klik gambar untuk melihat lebih jelas</font>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> </div>
        

         <div class="row">
        <div class="col-md-3">
          <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Wilayah Pelayanan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<b> Cabang Rawa Tembaga</b>
<br>Jl. M. Hasibuan No.1 Bekasi Selatan
<br>Telp. (021) 8894384

<br><b>Cabang Kota</b>
<br>Jl. Kartini No.1 Bekasi Timur
<br>Telp. (021) 8802722

<br><b>Cabang Rawa Lumbu</b>
<br>Jl. Parang Tritis No. 1 Bekasi Timur
<br>Telp. (021) 82413845

<br><b>Cabang Wisma Asri</b>
<br>Belakang Polsek Bekasi Utara
<br>Telp. (021) 88870019

<br><b>Cabang Babelan</b>
<br>Jl. Raya Perjuangan, Kebalen, Babelan
<br>Telp.(021) 8921938

<br><b>Cabang Tambun</b>
<br>Jl. Sultan Hasanudin No. 275, Tambun Selatan
<br>Telp. (021) 88338402

<br><b>Cabang Cikarang Utara</b>
<br>Jl. Raya Gatot Subroto No. 35, Cikarang Utara
<br>Telp. (021) 8904368

<b><br>Cabang Cikarang Selatan</b>
<br>Jl. Raya Cibarusah No. 34, Cikarang Selatan
<br>Telp. (021) 706252108

<br><b>Cabang Tarumajaya</b>
<br>Jl. Raya Tarumajaya, Bekasi
<br>Telp.(021) 88992229

<br><b>Cabang Lemah Abang</b>
<br>Jl. Raya Cibarusah Lemah Abang No.2 Cikarang Utara
<br>Telp.(021) 8983768

<br><b>KCP Sukatani</b>
<br>Jl. Raya Sukatani
<br>Telp. (021) 89161777

<br><b>KCP Cabangbungin</b>
<br>Jl. Raya Cabangbungin
<br>Telp. (021) 89180456

<br><b>KCP Pondok Gede</b>
<br>Jl. Raya Pondok Gede
<br>Telp. (021) 70277297

<br><b>KCP Cibarusah
<br></b>Jl. Raya Cibarusah, Sukasari

<br><b>KCP Bojongmangu</b>
<br>Jl. Raya Bojongmangu
<br>Telp. (021) 70277298

<br><b>KCP Setia Mekar</b>
<br>Perumnas 3, Bekasi Timur
<br>Telp. (021) 88358002

<br><b>KCP Harapan Baru</b>
<br>Jl. Jambu Air, Perum Harapan Baru, Bekasi Utara
<br>Telp. (021) 70995108

<br><b>KCP Kedung Waringin</b>
<br>Jl, Kedung Waringin, Cikarang Utara
<br>Telp. (021) 37329275

<br><b>KCP Tambelang</b>
<br>Jl. Raya Tambelang (Dekat Pasar Tambelang)

<br><b>KCP Tambun Utara</b>
<br>Jl. Karang Satria/ Radar (Belakang Kantor Desa Karang Satria)

<br><b>KCP Cikarang Barat</b>
<br>Jl. Raya Cibitung, Bekasi

<br><b>KCP Tanah Merah</b>
<br>Jl. Rengas Bandung, Cikarang Timur
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>



        <div class="col-md-5">
          <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Lokasi Penelitian PKL</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <a href="pages/tentang.php" target="struktur"><img border="0"  width=100% src="img/rawalumbu.jpg" alt=""></a>
              <font color="red">*Klik gambar untuk melihat deskripsi</font>       </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div></div>
        </div>


</div>
</section>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>tmfikri</b>
    </div>
    <strong>&copy; 2018 <a href="http://travelmate.ml">Teknik Komputer</a>.</strong>  Institut Pertanian Bogor.
  </footer>


<script src="plugins/komponen/jquery/dist/jquery.min.js"></script>
<script src="plugins/komponen/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/komponen/fastclick/lib/fastclick.js"></script>
<script src="plugins/pdam/js/pdam.js"></script>
<script src="plugins/komponen/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/komponen/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="plugins/komponen/chart.js/Chart.js"></script>







 <script src="plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="plugins/vendor/chart.js/Chart.min.js"></script>

    
    <!-- Toggle between fixed and static navbar-->

    <script src="plugins/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#dataku').DataTable();
} );

</script>


</body>
</html>