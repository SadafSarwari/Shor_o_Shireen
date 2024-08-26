<?php

include "conn.php";

if(isset($_POST['insertdata']))
{
    $catname = $_POST['catname'];
    
    $query = "INSERT INTO categories VALUES (null,'$catname')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data inserted successfully!</strong>
            
        </div>
     <?php
      header('location:categories.php');
    }else{?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Data did not insert!</strong>
            
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