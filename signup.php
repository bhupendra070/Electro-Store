

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
                <form action="signup.php" method="post">
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