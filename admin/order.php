<?php

 
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
<?php
include 'session.php';
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
       <div class="card">
                          <div class="card-body ">
                       <div class="panel-body">
                             <form method="POST" action="order.php" class="form">
                                <input type="text" name="search1"  class="form-control" autocomplete="on">
                                <br>
                                <input type="submit" name="search" value="search" class="btn btn-info">
                            </form>

                          </div>
                      </section>
                  </div>
              </div>
               <table class="table table-striped table-advance table-hover">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Lastname</th>
                    <th>Phone1</th>
                    <th>Phone2</th>
                    <th>Address</th>

                  
                    <th>total</th>
                    <th>Order Status</th>
                    <th>Date and Time</th>
                                          
                                          
                </tr>
                
                 <?php
                 include 'conn.php';
              if(isset($_POST['search1'])){
                  $search = $_POST['search1'];
                 
                  $sql = "select * from orders  JOIN ragister  on orders.customerid=ragister.id  WHERE firstname like '%$search%'";
                  $result = mysqli_query($connection, $sql);

                   if(mysqli_num_rows($result)>0)
                   {
                    while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['customerid']."</td>"
                ."<td>".$row['firstname']."</td>"
                ."<td>".$row['lastname']."</td>"
                ."<td>".$row['phone1']."</td>"
                ."<td>".$row['phone2']."</td>"
                ."<td>".$row['address']."</td>"
                ."<td>".$row['total']."</td>"
                ."<td>".$row['orderstatus']."</td>"
                ."<td>".$row['timestamp']."</td>"
                ;
                }
                   }
                
                }
                /*else {
               $query="select * from product";
                $result=mysqli_query($connection,$query);
                if ($result-> num_rows > 0) {
                while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['id']."</td>"
                ."<td>".$row['pname']."</td>"
                ."<td>".$row['price']."</td>"
                ."<td>".$row['description']."</td>"
                ."<td>".$row['quantity']."</td>"

                ;
                }
               
              }
            }*/
                ?>
            </table>

     
             <?php
                 include 'conn.php';
                    $query="select * from orders JOIN ragister  on orders.customerid=ragister.id order by orders.id desc";
                    $res=mysqli_query($connection,$query);
                    date_default_timezone_set("Asia/Kabul");
                    
                  ?>
                <table class="table table-striped table-advance table-hover">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Lastname</th>
                    <th>Phone1</th>
                    <th>Phone2</th>
                    <th>Address</th>

                  
                    <th>total</th>
                    <th>Order Status</th>
                    <th>Date and Time</th>
                    <th>View Orders</th>
                    
                </tr>
                    <?php
                              if($res)
                              {
                                  foreach($res as $row)
                                  {
                          ?>
                  <tr id="<?php echo $row['id'] ?>">
                                          <td> <?php echo $row['customerid']; ?> </td>
                                          <td> <?php echo $row['firstname']; ?> </td>
                                          <td> <?php echo $row['lastname']; ?> </td>                            
                                          <td> <?php echo $row['phone1']; ?> </td>                            
                                          <td> <?php echo $row['phone2']; ?> </td>
                                          <td> <?php echo $row['address']; ?> </td>                            


                                                                      
                                                                    
                                          <td> <?php echo $row['total']; ?> </td>                           
                                          <td> <?php echo $row['orderstatus']; ?> </td>
                                          
                                          <td><?php echo $row['timestamp']; ?></td>
                                          <td><a href="vieworder.php?id=<?php echo $row['id'];?>" class="btn btn-primary">View Orders</a></td>
                                          
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
