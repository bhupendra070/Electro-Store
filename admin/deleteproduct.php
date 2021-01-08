<?php
session_start();

    if(!isset($_SESSION['adminid']))
    {
        header("location:login.php");
    }
    
include './themepart/connection.php';

$deleteid = $_GET['deleteid'];

$qdelete = mysqli_query($connect,"delete from tbl_product where  product_id=$deleteid") or die(mysqli_error($connect));
if($qdelete)
{
    echo "<script>alert('Conform Delete');</script>";
    header('location:viewproduct.php');
}
?>