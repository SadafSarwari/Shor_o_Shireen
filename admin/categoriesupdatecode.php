<?php
include "conn.php";

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $catname = $_POST['catname'];
        
       

        $query = "UPDATE categories SET catname='$catname' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data updated successfully!</strong>
            
        </div>
     <?php
            header("Location:categories.php");
        }
        else
        {
            ?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Unsuccessful!</strong>
            
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