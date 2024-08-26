<?php
include "conn.php";

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $pid = $_POST['pid'];
        $orid = $_POST['orid'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
         $total = $_POST['total'];
       

        $query = "UPDATE order_detail SET pid='$pid', orid='$orid',quantity='$quantity', price='$price', total='$total' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:order_detail.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>