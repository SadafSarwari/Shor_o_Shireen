<?php
include "conn.php";

    if(isset($_POST['updatedata']))
    {   
    $id = $_POST['update_id'];
    $address = $_POST['address'];
    $what_no = $_POST['what_no'];
    $fb = $_POST['fb'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_time = $_POST['delivery_time'];
    $about = $_POST['about'];
    $today = $_POST['today'];
    $totime = $_POST['totime'];
    $close = $_POST['close'];

    $query = "UPDATE footer SET address='$address', what_no='$what_no', fb='$fb', email=' $email', phone=' $phone', delivery_date=' $delivery_date', delivery_time='$delivery_time', about='$about', today='$today', totime='$totime', close='$close' WHERE id='$id'";
     $query_run = mysqli_query($connection, $query);

        if($query_run)
        {?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Data updated successfully!</strong>
            
        </div>
     <?php
     header("location:footer.php");
            
        }
        else{?>
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