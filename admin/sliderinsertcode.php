<?php

include "conn.php";

if(isset($_POST['insertdata']))

{
    $title = $_POST['title'];
    $sectitle = $_POST['sectitle'];
    $subtitle = $_POST['subtitle'];
    $secsub = $_POST['secsub'];
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
    $query = "INSERT INTO slider VALUES (null,'$dest','$title','$subtitle','$sectitle','$secsub')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
       ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data Saved</strong>
            
        </div>
     <?php
        
        header("location:slider.php");        
    }
    else
    {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Data Not Saved</strong>
            
        </div>
        <?php
    }
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
