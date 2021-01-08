<?php
session_start();

session_destroy();
echo "<script>alert('LogOut Successfully. ')</script>";
header("location:home.php");
?>