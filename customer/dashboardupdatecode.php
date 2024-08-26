<?php
include "conn.php";

    if(isset($_POST['updatedata']))
    {  
     
    $id = $_POST['update_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    

    $query = "UPDATE ragister SET email=' $email', address=' $address', phone1=' $phone1', phone2='$phone2' WHERE id='$id'";
     $query_run = mysqli_query($connection, $query);

        if($query_run)
        {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data Updated!</strong>
            
        </div>
     <?php
          echo '<script> alert(""); </script>';
            header("location:dashboard.php");
        }
        else
        {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Data Not Updated!</strong>
            
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