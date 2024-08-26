<?php
include 'conn.php';

    if(isset($_POST['updatedata']))
    {  
        if($_FILES['image']['name']==""){
             $id = $_POST['update_id']; 
         $title = $_POST['title'];
    $sectitle = $_POST['sectitle'];
    $subtitle = $_POST['subtitle'];
    $secsub = $_POST['secsub'];
        $query = "UPDATE slider SET title='$title', subtitle='$subtitle', sectitle='$sectitle', secsub='$secsub' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        }
        else{
        $id=$_POST['update_id'];
        $title = $_POST['title'];
    $sectitle = $_POST['sectitle'];
    $subtitle = $_POST['subtitle'];
    $secsub = $_POST['secsub'];
        
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
        $updatequery="update slider set image='".$dest."' ,title='".$title."', subtitle='".$subtitle."' ,sectitle='".$sectitle."', secsub='".$secsub."' where id='$id'";
        $result=mysqli_query($connection,$updatequery);
        }
}
if ($result) {
    header("location:slider.php");
}
else{
    header("location:slider.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<script type="text/javascript">
    $('.close').click(function(){
        $('.alert').hide();
    });
</script>
</body>
</html>