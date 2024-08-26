<?php
include 'conn.php';

    if(isset($_POST['updatedata']))
    {  
        if($_FILES['image']['name']==""){
             $id = $_POST['update_id']; 
        $title = $_POST['title'];
        $information = $_POST['information'];
        $query = "UPDATE delivery_info SET title='$title', information='$information' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        }
        else{
        $id=$_POST['update_id'];
        $title=$_POST['title'];
        $information = $_POST['information'];
        
        $temp_name=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        $dir="images";
        $dest=$dir . "/" . $image_name;
        if (move_uploaded_file($temp_name, $dest)){
            /*echo "Successfully Uploaded <br>";*/
        }
        else{
            /*echo "Faild to upload";*/
        }
        $updatequery="update delivery_info set title='".$title."', information='".$information."' ,image='".$dest."' where id='$id'";
        $result=mysqli_query($connection,$updatequery);
        }
}
if ($result) {
    header("location:delivery_info.php");
}
else{
    header("location:delivery_info.php");
}
?>
