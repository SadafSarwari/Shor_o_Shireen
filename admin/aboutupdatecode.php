<?php
include 'conn.php';

    if(isset($_POST['updatedata']))
    {  
        if($_FILES['image']['name']==""){
             $id = $_POST['update_id']; 
        $about = $_POST['about'];
        
        $query = "UPDATE about SET about='$about' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        }
        else{
        $id=$_POST['update_id'];
        $about=$_POST['about'];
        
        
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
        else{?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Data Not Saved</strong>
            
        </div>
        <?php
           
        }
        $updatequery="update about set about='".$about."',image='".$dest."' where id='$id'";
        $result=mysqli_query($connection,$updatequery);
        }
}
if ($result) {
    header("location:about.php");
}
else{
    header("location:about.php");
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