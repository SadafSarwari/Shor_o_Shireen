<?php
include "conn.php";

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $dates = $_POST['dates'];
       
       $cid = $_POST['cid'];

        $query = "UPDATE orderp SET dates='$dates', 'cid'='$cid' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:order.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>