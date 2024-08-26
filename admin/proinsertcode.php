<?php

include "conn.php";

if(isset($_POST['insertdata']))
{
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $catid=$_POST['category'];

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

    $query = "INSERT INTO product  VALUES (null,'$pname','$price','$description','$quantity','$dest','$catid')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data Saved</strong>
            
        </div>
     <?php
        
        header("location:product.php");        
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