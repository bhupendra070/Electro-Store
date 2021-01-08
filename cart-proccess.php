<?php
session_start();

$pid = $_GET['pid'];
$qty = $_GET['qty'];

    if(isset($_SESSION['productcard']))
    {
        $counter = $_SESSION['counter'] +1;
        $_SESSION['productcard'][$counter] = $pid;
        $_SESSION['qtycard'][$counter] = $qty;
        $_SESSION['counter'] = $counter;
    }
    else
    {
        $productcard = array();
        $qtycard = array();
        $_SESSION['productcard'][0] = $pid;
        $_SESSION['qtycard'][0] = $qty;
        $_SESSION['counter'] = 0;
    }

    header("location:view-cart.php");
?>