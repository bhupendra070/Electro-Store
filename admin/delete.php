<?php

$connect= mysqli_connect("localhost","root","","batch1") or die(mysqli_error($connect."Error in Connection"));
$deleteid = $_GET['deleteid'];
$query = mysqli_query($connect,"delete from tbl_student where st_id=$deleteid") or die(mysqli_error($connect."Error in query"));
if($query)
{
    echo  "<script>alert('Conform Delete');</script>";
    header("location:table.php");
}
 else
{
    echo "nothing";
}
?>
