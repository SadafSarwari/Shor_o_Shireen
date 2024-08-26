<?php

include "conn.php";

if(isset($_POST['insertdata']))
{
    $pid = $_POST['pid'];
    $orid = $_POST['orid'];
     $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    $query = "INSERT INTO order_detail (`pid`,`orid`,`quantity`,`price`,`total`) VALUES ('$pid','$orid','$quantity','$price','$total')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('location:order_detail.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>