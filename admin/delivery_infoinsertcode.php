<?php

include "conn.php";

if(isset($_POST['insertdata']))

{
    $title = $_POST['title'];
    $information = $_POST['information'];
    if(isset($_FILES['image']['name']))
    {
    $temp_name=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $dir="images";
    $dest=$dir. "/" .$image_name;
    if(move_uploaded_file($temp_name, $dest))
    {
      echo "successfuly";
    }else{
      echo "not";
    }
    }
    $query = "INSERT INTO delivery_info VALUES (null,'$dest','$title','$information')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('location:delivery_info.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
    
?>
