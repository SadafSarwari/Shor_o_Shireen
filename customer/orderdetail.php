<?php
include 'conn.php';
if(isset($_SESSION["username"]))
{

   if((time() - $_SESSION['last_login_timestamp']) > 15*60)

  {
     header("location:logout.php");


  }
  else
  {
    $_SESSION['last_login_timestamp'] =time();
  
  }
}
  else
  { 
    header('loaction:login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shor oo Shireen</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style type="text/css">
  .pagination{
    margin-left: 250px;
  }
</style>
  </head>

  <body>

    <div id="wrapper">

     <?php include 'header.php';?>
       <div id="page-wrapper">
     
             <?php
                 include 'conn.php';
                    $query="select  * from orderitems JOIN product ON orderitems.productid=product.id order by orderitems.id desc";
                    $res=mysqli_query($connection,$query);
                    
                  ?>
                <table class="table table-striped table-advance table-hover">
                <tr>
                    <th>Product ID</th>
                    <th>Pname</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                    
                </tr>
                    <?php
                              if($res)
                              {
                                  foreach($res as $row)
                                  {
                          ?>
                  <tr id="<?php echo $row['id'] ?>">
                     <td> <?php echo $row['productid']; ?> </td>
                                          <td><?php echo $row['pname']?></td>                     
                                                                      
                                                                    
                                          <td> <?php echo $row['quantity']; ?> </td>
                                          <td> <?php echo $row['productprice']; ?> </td>

                                     
                                      </tr>
                                    <?php }}?>

            </table>

                       

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
<script>
$(document).ready(function(){
$("#checkAll").click(function () {
if($(this).is(":checked"))
{
    $(".checkItem").prop('checked',true);
}else{
     $(".checkItem").prop('checked',false);
}
});
});
</script>


<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#dates').val(data[1]);
            $('#cid').val(data[2]);
          
    });
});

</script>
  </body>
</html>
