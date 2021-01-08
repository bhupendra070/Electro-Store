<?php
if($_POST)
{
    $name = $_POST['st_name'];
    $class = $_POST['st_class'];
    $mobile = $_POST['st_mobile'];
    $email = $_POST['st_email'];
    $gender = $_POST['st_gender'];
    $address = $_POST['st_address'];
    $source = $_FILES['st_image']['tmp_name'];
    $destination ="myimages/".$_FILES['st_image']['name'];
    
    $connect= mysqli_connect("localhost","root","","batch1") or die(mysqli_error($connect."Error in Connection"));
    if($connect)
    {
        $query="insert into tbl_student(st_name,st_class,st_mobile,st_email,st_gender,st_address,st_image) values('{$name}','{$class}','{$mobile}','{$email}','{$gender}','{$address}','{$destination}')" or die(mysqli_error($connect."Error in Query"));
        $q= mysqli_query($connect,$query) ;
        if($_FILES['st_image']['type']== "image/png" || $_FILES['st_image']['type']=="image/jpeg")
        {
            $file= move_uploaded_file($source, $destination);
            if($file)
            {
                echo "<script>alert('Data is Inserted.');</script>";
            }
        }
    }
    else 
    {
        echo "<script>alert('Data is Not Connected.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?PHP
  include './themepart/navbar.php';
  include './themepart/sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Student Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                    <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="st_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <select class="form-control" name="st_class">
                        <option>Select</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                  </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="number" name="st_mobile" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    Male<input type="radio" name="st_gender"  value="Male" id="exampleInputEmail1">
                    Female<input type="radio" name="st_gender"  value="Female" id="exampleInputEmail1">
                  </div>
            
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="st_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                   
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea name="st_address" class="form-control" id="exampleInputPassword1"></textarea>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                          <input type="file" name="st_image"class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?PHP
  include './themepart/footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
