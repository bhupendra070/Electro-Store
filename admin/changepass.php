<?php
session_start();
include './themepart/connection.php';
if($_POST)
{
  if(isset($_SESSION['adminid']))
  {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];
    
    $q= mysqli_query($connect, "select * from tbl_admin where admin_id = '{$_SESSION['adminid']}'") or die(mysqli_error($connect));
    $row = mysqli_fetch_array($q);

    if($row['admin_password']==$opass)
    {
        if($npass == $opass)
        {
            echo "<script>alert('Old0 Password and new password are same.')</script>";
        }
        else
        {
            if($npass==$cpass)
            {
                $iq= mysqli_query($connect,"update tbl_admin set admin_password='{$npass}' where admin_id = '{$_SESSION['adminid']}' ");
                if($iq)
                {
                    echo "<script>alert('Password Changed Succesfully.')</script>";
                }
            }
            else
            {
                echo "<script>alert('Password not match.')</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Old Password not matched.')</script>";
    }
  }
}

?>

<html>
    <body>
    <center>
        <form method="post">
            <h3>Change Password</h3> <br>
            old password : <input type="text" name="opass"><br><br>
            new password : <input type="text" name="npass"><br><br>
            con password : <input type="text" name="cpass"><br><br>
            <input type="submit" name="Submit">
        </form>
    </center>
    </body>
</html>