<?php
include 'conn.php';

    if(isset($_POST['updatedata']))
    {  
        if($_FILES['image']['name']==""){
             $id = $_POST['update_id']; 
             $pname=$_POST['pname'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $catid = $_POST['catid'];
        $updatequery = "UPDATE product SET pname='$pname', price='$price', description='$description', quantity='$quantity', catid='$catid' WHERE id='$id'";
        $result = mysqli_query($connection, $updatequery);
        }
        else{
        $id=$_POST['update_id'];
        $pname=$_POST['pname'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $catid = $_POST['catid'];
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
        $updatequery = "UPDATE product SET pname='$pname', price='$price', description='$description', image='$dest', quantity='$quantity', catid='$catid' WHERE id='$id'";
        $result = mysqli_query($connection, $updatequery);
        }
}
if ($result) {
    header("location:product.php");
}
else{
    header("location:product.php");
}
?>
