<?php

include "conn.php";

if(isset($_POST['insertdata']))
{
    $dates = $_POST['dates'];
    
    $cid = $_POST['cid'];
    $query = "INSERT INTO orderp (`dates`,`cid`) VALUES ('$dates','$cid')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('location:order.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>