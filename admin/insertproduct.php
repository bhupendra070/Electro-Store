<?php
session_start();

    if(!isset($_SESSION['adminid']))
    {
        header("location:login.php");
    }
    
    include './themepart/connection.php';
    if($_POST)
    {
        $pdname=$_POST['product_name'];
        $catname = $_POST['catname'];
        $pddetails=$_POST['product_detail'];
        $pdprice=$_POST['product_price'];
        $imagesource=$_FILES['product_image']['tmp_name'];
        $imagedest='myimages/'.$_FILES['product_image']['name'];
        
        $q = mysqli_query($connect,"insert into tbl_product(product_name,category_id,product_detail,product_price,product_image) values('{$pdname}','{$catname}','{$pddetails}','{$pdprice}','{$imagedest}')") or die(mysqli_error($connect));
        
        if($_FILES['product_image']['type']=="image/png" || $_FILES['product_image']['type']=="image/jpeg")
        {
            $fileup = move_uploaded_file($imagesource,$imagedest) or die(mysqli_error($connect."Error in file Uploading"));
            if($fileup)
            {
                echo  "<script>alert('Data inserted');</script>";
            }
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
                <h3 class="card-title">Product Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                    <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <?php
                        include './themepart/connection.php';
                        $q= mysqli_query($connect,"select * from tbl_category") or die(mysqli_error($connect));
                    ?>    
                    
                    <select class="form-control" name="catname">
                        <?php
                       while($row=mysqli_fetch_array($q))
                        {
                        
                            echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                        } ?>
                        
                    </select>
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputName">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" required>
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Details</label>
                    <input type="text" name="product_detail" class="form-control" id="exampleInputEmail1" placeholder="Enter product Details" required>
                  </div>
                   
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Price</label>
                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product Price" required>
                  </div>
                    
                    <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                          <input type="file" name="product_image"class="custom-file-input" id="exampleInputFile" required>
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