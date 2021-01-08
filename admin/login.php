<?php 
session_start();
include './themepart/connection.php';
if($_POST)
{
    $uemail = $_POST['admin_email'];
    $upass = $_POST['admin_password'];
    $q = mysqli_query($connect,"select * from tbl_admin where admin_email='{$uemail}' and admin_password='{$upass}'") or die(mysqli_error($connect));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);
    
    if($count>0)
    {
        $_SESSION['adminid'] = "{$row['admin_id']}";
        $_SESSION['adminname'] = "{$row['admin_name']}";
        $_SESSION['adminemail'] = "{$row['admin_email']}";
        header("location:home.php");
    }
    else
    {
        echo "<script>alert('Log In Failled');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Theme</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Log</b>In</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
            <input type="email" name="admin_email" class="form-control" placeholder="Enter Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="admin_password" class="form-control" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <div class="btn btn-block btn-primary">
            <button type="submit" class="btn btn-block btn-primary">LogIn</button>
          </div>
          
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
          <a href="forgotpassword.php">I forgot my password</a>
      </p>
      <p class="mb-0">
          <a href="regiistration.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
