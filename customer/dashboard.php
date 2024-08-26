
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

     <?php include 'header.php';?>

       <div id="page-wrapper">
     
              <!-- Modal -->
             <!--  <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add customer Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="insertcode.php" method="POST">

                          <div class="modal-body">
                              <div class="form-group">
                                  <label> First Name </label>
                                  <input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
                              </div>

                              <div class="form-group">
                                  <label> Last Name </label>
                                  <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
                              </div>

                              <div class="form-group">
                                  <label> Username </label>
                                  <input type="text" name="username" class="form-control" placeholder="Enter Username">
                              </div>
                              <div class="form-group">
                                  <label> Email </label>
                                  <input type="email" name="email" class="form-control" placeholder="Enter Email">
                              </div>
                              <div class="form-group">
                                  <label> Address </label>
                                  <input type="text" name="address" class="form-control" placeholder="Enter Address">
                              </div>

                              <div class="form-group">
                                  <label> Phone Number </label>
                                  <input type="number" name="phone1" class="form-control" placeholder="Enter Phone Number">
                              </div>
                              <div class="form-group">
                                  <label> Phone Number 2 </label>
                                  <input type="number" name="phone2" class="form-control" placeholder="Enter Phone Number">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                          </div>
                      </form>

                  </div>
                </div>
              </div> -->




              <!-- ####################################################################################################################### -->

              <!-- EDIT POP UP FORM (Bootstrap MODAL) -->

              <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"> Edit customer Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="dashboardupdatecode.php" method="POST">

                          <div class="modal-body">

                              <input type="hidden" name="update_id" id="update_id">

                              <div class="form-group">
                                  <label> First Name </label>
                                  <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name" disabled>
                              </div>

                              

                              <div class="form-group">
                                  <label> Username </label>
                                  <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" disabled>
                              </div>
                              <div class="form-group">
                                  <label> Email </label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                              </div>
                              <div class="form-group">
                                  <label> Address </label>
                                  <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                              </div>

                              <div class="form-group">
                                  <label> Phone Number </label>
                                  <input type="text" name="phone1" id="phone1" class="form-control" placeholder="Enter Phone Number">
                              </div>
                              <div class="form-group">
                                  <label> Phone Number 2 </label>
                                  <input type="text" name="phone2" id="phone2" class="form-control" placeholder="Enter Phone Number">
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



              <div class="container" >
               
                      
                 
                     <!-- <?php 
                      include 'conn.php';
                      $customerid =$_SESSION["customerid"];

  $query = mysqli_query($connection,"SELECT * FROM ragister where id='$customerid'");
  $row = mysqli_fetch_assoc($query);
?>
  <div class="panel col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
    <div class="panel-heading">
      <h2>Your Detail</h2>
    </div>
    <div class="panel-body">
      <table class="table table-tripped">
        <tr>
          <td>Edit Your Detail</td>
          <td> 
            <button type="button" class="btn btn-info editbtn"> EDIT </button>
          </td> 
        </tr>
        <tr>
          <td>Full Name</td>
          <td><?php echo $row["firstname"];?> <?php echo $row["lastname"];?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?php echo $row["username"];?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row["email"];?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $row["address"];?></td>
        </tr>
        <tr>
          <td>Phone1</td>
          <td><?php echo $row["phone1"];?></td>
        </tr>
        <tr>
          <td>Phone2</td>
          <td><?php echo $row["phone2"];?></td>
        </tr>
        
      </table>
    </div>
  </div> -->
                      <div class="card">
                          <div class="card-body ">
                          <?php
                              include 'conn.php';
                              $customerid=$_SESSION['customerid'];
                              $query = "SELECT * FROM ragister where id='$customerid' ";
                              $query_run = mysqli_query($connection, $query);
                              date_default_timezone_set("Asia/Kabul");
                          ?>
                              <table id="datatableid" class="table table-striped thead-light table-hover">
                                  <thead>
                                      <tr class="table-primary">
                                         <th>ID</th>
                                          <th scope="col">Fullname</th>
                                        
                                          <th scope="col"> Username </th>
                                          <th scope="col"> Email </th>
                                          <th scope="col"> Address </th>
                                          <th scope="col"> Phone1 </th>
                                          <th scope="col"> Phone2 </th>
                                          <th>Edit</th>


                                    
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
                                    <td><?php echo $row['id'];?></td>
                                                                     
                                          <td> <?php echo $row['firstname']; ?>&nbsp;&nbsp;&nbsp;<?php echo $row['lastname']; ?> </td>
                                          
                                          <td> <?php echo $row['username']; ?> </td>
                                          <td> <?php echo $row['email']; ?> </td>
                                          <td> <?php echo $row['address']; ?> </td>
                                          <td> <?php echo $row['phone1']; ?> </td>
                                          <td> <?php echo $row['phone2']; ?> </td>
                                        <td> 
                                              <button type="button" class="btn btn-info editbtn"> EDIT </button>
                                          </td>

                                                                     
                                           
                                          
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

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#firstname').val(data[1]);
            $('#username').val(data[2]);
            $('#email').val(data[3]);
            $('#address').val(data[4]);
            $('#phone1').val(data[5]);
            $('#phone2').val(data[6]);
            
          
    });
});

</script>


  </body>
</html>
