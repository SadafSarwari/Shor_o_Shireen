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
        {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data inserted successfully!</strong>
            
        </div>
     <?php
      
    }else{?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Data did not insert!</strong>
            
        </div>
        <?php
        }
        }
   

    $query = "INSERT INTO carousel VALUES (null,'$dest')";
    $query_run = mysqli_query($connection, $query);
    

    if($query_run)
    {
       ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data Saved</strong>
            
        </div>
     <?php
        header('Location: carousel.php');
    }
    else
    {
        ?>
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