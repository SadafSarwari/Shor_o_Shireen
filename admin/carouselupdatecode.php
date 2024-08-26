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
            ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data updated successfully!</strong>
            
        </div>
     <?php
           
        }
        else{
            ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Unsuccessful!</strong>
            
        </div>
        <?php
             
        }
        $updatequery="update carousel set image='".$dest."' where id='$id'";
        $result=mysqli_query($connection,$updatequery);
        
}
if ($result) {
    header("location:carousel.php");
}
else{
    header("location:carousel.php");
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