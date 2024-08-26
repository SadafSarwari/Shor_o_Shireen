<?php

 session_start();
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
  </head>

  <body>

    <div id="wrapper">

     <?php
     $page='index';
      include 'header.php';?>

       <div id="page-wrapper">
     
              <!-- Modal -->
              <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="insertcode.php" method="POST">

                          <div class="modal-body">
                              <div class="form-group">
                                  <label> First Name </label>
                                  <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                              </div>

                              <div class="form-group">
                                  <label> Last Name </label>
                                  <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                              </div>

                              <div class="form-group">
                                  <label> Course </label>
                                  <input type="text" name="course" class="form-control" placeholder="Enter Course">
                              </div>

                              <div class="form-group">
                                  <label> Phone Number </label>
                                  <input type="number" name="contact" class="form-control" placeholder="Enter Phone Number">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                          </div>
                      </form>

                  </div>
                </div>
              </div>




              <!-- ####################################################################################################################### -->

              <!-- EDIT POP UP FORM (Bootstrap MODAL) -->

              <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="updatecode.php" method="POST">

                          <div class="modal-body">

                              <input type="hidden" name="update_id" id="update_id">

                              <div class="form-group">
                                  <label> First Name </label>
                                  <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                              </div>

                              <div class="form-group">
                                  <label> Last Name </label>
                                  <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                              </div>

                              <div class="form-group">
                                  <label> Course </label>
                                  <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">
                              </div>

                              <div class="form-group">
                                  <label> Phone Number </label>
                                  <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Phone Number">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                          </div>
                      </form>

                  </div>
                </div>
              </div>

              <!-- #################################################################################################### -->





              <!-- ####################################################################################################################### -->

              <!-- DELETE POP UP FORM (Bootstrap MODAL) -->


              <!-- #################################################################################################### -->



              <div class="container">
                  <div class="jumbotron">
                      <div class="card">
                          <h2> Your Order Info </h2>
                      </div>    
                      

                      <div class="card">
                          <div class="card-body ">
                          <?php
                              include 'conn.php';
                              $customerid=$_SESSION['customerid'];
                              $query = "SELECT * FROM orders where customerid='$customerid' order by id desc";
                              $query_run = mysqli_query($connection, $query);
                              date_default_timezone_set("Asia/Kabul");
                          ?>
                              <table id="datatableid" class="table table-striped thead-light table-hover">
                                  <thead>
                                      <tr class="table-primary">
                                          <th scope="col" > Customer ID </th>
                                          <th scope="col">Total</th>
                                          <th scope="col"> order status </th>
                                          <th scope="col"> Date </th>
                                          <th>Order Details</th>
                                    
                                      </tr>
                                  </thead>
                          <?php
                          if(isset($_SESSION['customerid']))
                          {


                              if($query_run)
                              {
                                  foreach($query_run as $row)
                                  {
                          ?>
                                  <tbody> 
                                  <tr id="<?php echo $row['id'] ?>">
                                          <td> <?php echo $row['customerid']; ?> </td>                            
                                          <td> <?php echo $row['total']; ?> </td>                            
                                          <td> <?php echo $row['orderstatus']; ?> </td>                            
                                          <td><?php echo $row['timestamp']; ?></td>
                                          <td><a href="orderdetail.php?id=<?php echo $row['id'];?>" class="btn btn-primary">View Orders</a></td>                            
                                           
                                          
                                      </tr>
                                  </tbody>
                          <?php           
                                 } 
                              }
                            }
                              else 
                              {
                                  echo "No Record Found";
                              }
                          ?>
                              </table>
                          </div>
                      </div>


                  </div>
              </div>


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

  </body>
</html>
