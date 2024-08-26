<?php

include 'conn.php';

if(isset($_POST['insertdata']))
{
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
            /*echo "not";*/
        }
        }
   

    $query = "INSERT INTO shop_detail VALUES (null,'$dest')";
    $query_run = mysqli_query($connection, $query);
    

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: shop_detail.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>