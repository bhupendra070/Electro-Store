<div class="agile-main-top">
    <div class="container-fluid">
        <div class="row main-top-w3l py-2">
            <div class="col-lg-4 header-most-top">
                <p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
                    <i class="fas fa-shopping-cart ml-1"></i>
                </p>
            </div>
            <div class="col-lg-8 header-right mt-lg-0 mt-2">
                <!-- header lists -->
                <ul>
                    <!--
                    <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                    <i class="fas fa-truck mr-2"></i>Track Order</a>
                    </li>
                    <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 001 234 5678
                    </li>
                  !-->
                    <?php
                    
                    if (isset($_SESSION['userid']))
                    {
                        echo $_SESSION['useremail'];
                        echo '<li class="text-center border-right text-white">';
                        echo '<a href="logout.php" data-toggle="modal" data-target="#exampleModal" class="text-white">';
                        echo '<i class="fas fa-sign-in-alt mr-2"></i> Log Out </a>';
                        echo '</li>';
                    } 
                    else 
                    {
                        echo '<li class="text-center border-right text-white">';
                        echo '<a href="login.php" data-toggle="modal" data-target="#exampleModal" class="text-white">';
                        echo '<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>';
                        echo '</li>';
                        
                        echo '<li class="text-center border-right text-white">';
                        echo '<a href="signup.php" data-toggle="modal" data-target="#exampleModal2" class="text-white">';
                        echo '<i class="fas fa-sign-in-alt mr-2"></i> Register </a>';
                        echo '</li>';
                    }
                    
                    ?>
                </ul>
                <!-- //header lists -->
            </div>
        </div>
    </div>
</div>

<!-- LogIn  !-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 

include 'connection.php';
if($_POST)
{
    $uemail = $_POST['user_email'];
    $upass = $_POST['user_password'];
    $q = mysqli_query($connect,"select * from tbl_user where user_email='{$uemail}' and user_password='{$upass}'") or die(mysqli_error($connect));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);
    
    if($count>0)
    {
        $_SESSION['userid'] = "{$row['user_id']}";
        $_SESSION['username'] = "{$row['user_name']}";
        $_SESSION['useremail'] = "{$row['user_email']}";
        header("location:home.php");
    }
    else
    {
        echo "<script>alert('Log In Failled');</script>";
        
    }
}
?>
            <div class="modal-body">
                <form method="post" action="home.php">
                    <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input type="text" class="form-control" placeholder=" " name="user_email" required="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" class="form-control" placeholder=" " name="user_password" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Log in">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                        </div>
                    </div>
                    <p class="text-center dont-do mt-3">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#exampleModal2">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register  !-->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
include 'connection.php';
if($_POST)
{
    $uname = $_POST['user_name'];
    $umaobile = $_POST['user_mobile'];
    $uemail = $_POST['user_email'];
    $upassword = $_POST['user_password'];
    $conpass = $_POST['conpass'];
    
    $q=mysqli_query($connect,"insert into tbl_user(user_name,user_mobile,user_email,user_password) values('{$uname}','{$umaobile}','{$uemail}','{$upassword}')") or die(mysqli_error($connect."Error in insert query"));
    if($q)
    {
        echo "<script>alert('SinghUp Succesfully.');</script>";
        header("location:home.php");
    }
}
?>
            <div class="modal-body">
                <form action="home.php" method="post">
                    <div class="form-group">
                        <label class="col-form-label">Your Name</label>
                        <input type="text" name="user_name" class="form-control" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mobile</label>
                        <input type="number" name="user_mobile" class="form-control" placeholder="Enter Mobile number" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Email</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="Enter Password" id="password1" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="password" name="conpass" class="form-control" placeholder="Conform Password" id="password2" required>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control" value="Register">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                            <label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	</div>