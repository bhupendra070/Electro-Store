

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
                <form method="post">
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