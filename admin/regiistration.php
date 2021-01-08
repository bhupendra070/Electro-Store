<?php 
//session_start();
if($_POST)
{
    $uname = $_POST['user_name'];
    $umobile = $_POST['user_mobile'];
    $uemail = $_POST['user_email'];
    $uaddress = $_POST['user_address'];
    $upassword = $_POST['user_password'];
    $cpassword = $_POST['cpassword'];
    
    include './themepart/connection.php';
    if($upassword==$cpassword)
    {
        $q= mysqli_query($connect,"insert into tbl_user(user_name,user_mobile,user_email,user_address,user_password) values('{$uname}','{$umobile}','{$uemail}','{$uaddress}','{$upassword}')") or die(mysqli_error($connect."Error In Query"));
        if($q)
        {
            echo "<script>alert('Registration Succesfully');</script>";
        }
    }
    else 
    {
         echo "<script>alert('Password Does Not Match');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Website</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Register</b>Form</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="regiistration.php" method="post">
        <div class="input-group mb-3">
            <input type="text" name="user_name" class="form-control" placeholder="Enter Your name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          
        <div class="input-group mb-3">
            <input type="number" name="user_mobile" class="form-control" placeholder="Enter your Mobile Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
             <input type="email" name="user_email" class="form-control" placeholder="Enter your Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          
          <div class="input-group mb-3">
            <input type="text" name="user_address" class="form-control" placeholder="Enter your Address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          
        <div class="input-group mb-3">
            <input type="password" name="user_password" class="form-control" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          
          <div class="input-group mb-3">
            <input type="password" name="cpassword" class="form-control" placeholder="Conform Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          
          <div class="btn btn-block btn-primary">
            <button type="submit" class="btn btn-block btn-primary">Register</button>
          </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
      </form>
      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
