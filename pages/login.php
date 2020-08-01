
<?php

extract($_GET);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PDAM| Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../plugins/komponen/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/komponen/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plugins/komponen/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plugins/pdam/pdam.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <br>
    <img src="../img/logopdam3.png" class="user-image" alt="User Image">
   <br> <a href="../../index2.html"><b>PDAM</b> Tirta Bhagasasi</a>
  </div>
  <!-- /.login-logo -->

  <?php if(isset($_SESSION ['username'])) { ?>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle"
              data-toggle="dropdown">
                <?php echo $_SESSION['username']; ?>
              </a>
             
            </li>
          </ul>
          <?php } else { ?>

  <div class="login-box-body">
    <p class="login-box-msg">Water Turbidity Monitoring System</p>

    <form action="../include/proses login.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="e" required> 
        <span class="fa fa-at form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  <?php }?>

  </div>

<font color="red">*Hanya admin yang dapat masuk ke dalam sistem</font>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../plugins/komponen/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../plugins/komponen/bootstrap/dist/js/bootstrap.min.js"></script>

</script>
</body>
</html>
