<?php
include 'conn.php';

    if(isset($_POST['updatedata']))
    {  
        
        $id=$_POST['update_id'];
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
        $updatequery="update shop_detail set image='".$dest."' where id='$id'";
        $result=mysqli_query($connection,$updatequery);
        
}
if ($result) {
    header("location:shop_detail.php");
}
else{
    header("location:shop_detail.php");
}
?>
