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
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
     <?php 
     $page='footer';
     include 'header.php';?>
       <div id="page-wrapper">
     
              <!-- Modal -->
              <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Footer Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="footerinsertcode.php" method="POST">

                          <div class="modal-body">
                              <div class="form-group">
                                  <label> Address </label>
                                  <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                              </div>

                              <div class="form-group">
                                  <label> Whatsapp No. </label>
                                  <input type="text" name="what_no" class="form-control" placeholder="Enter Whatsapp No.">
                              </div>
                              <div class="form-group">
                                  <label> Facebook Id </label>
                                  <input type="text" name="fb" class="form-control" placeholder="Enter Facebook Id">
                              </div>
                              <div class="form-group">
                                  <label> Email </label>
                                  <input type="email" name="email" class="form-control" placeholder="Enter Email">
                              </div>
                              <div class="form-group">
                                  <label> Phone No. </label>
                                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone No.">
                              </div>
                              <div class="form-group">
                                  <label> Day </label>
                                  <input type="text" name="delivery_date" class="form-control" placeholder="Enter Day">
                              </div>
                              <div class="form-group">
                                  <label> Time </label>
                                  <input type="time" name="delivery_time" class="form-control" placeholder="Enter Time">
                              </div>
                              <div class="form-group">
                                  <label> About </label>
                                  <input type="about" name="about" class="form-control" placeholder="Enter About">
                              </div>
                               <div class="form-group">
                                  <label> To Day </label>
                                  <input type="today" name="today" class="form-control" placeholder="Enter To Day">
                              </div>
                              <div class="form-group">
                                  <label> To Time </label>
                                  <input type="time" name="totime" class="form-control" placeholder="Enter To Time">
                              </div>
                              <div class="form-group">
                                  <label> Close </label>
                                  <input type="close" name="close" class="form-control" placeholder="Enter Close">
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
                      <h5 class="modal-title" id="exampleModalLabel"> Edit Footer Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="footerupdatecode.php" method="POST">

                          <div class="modal-body">

                              <input type="hidden" name="update_id" id="update_id">

                              <div class="form-group">
                                  <label> Address </label>
                                  <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
                              </div>

                              <div class="form-group">
                                  <label> Whatsapp No. </label>
                                  <input type="text" name="what_no" id="what_no" class="form-control" placeholder="Enter Whatsapp No.">
                              </div>
                              <div class="form-group">
                                  <label> Facebook Id </label>
                                  <input type="text" name="fb" id="fb" class="form-control" placeholder="Enter Facebook Id">
                              </div>
                              <div class="form-group">
                                  <label> Email </label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                              </div>
                              <div class="form-group">
                                  <label> Phone No. </label>
                                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone No.">
                              </div>
                              <div class="form-group">
                                  <label> Date </label>
                                  <input type="date" name="delivery_date" id="delivery_date" class="form-control" placeholder="Enter Date">
                              </div>
                              <div class="form-group">
                                  <label> Time </label>
                                  <input type="time" name="delivery_time" id="delivery_time" class="form-control" placeholder="Enter Time">
                              </div>
                              <div class="form-group">
                                  <label> About </label>
                                  <input type="about" name="about" id="about" class="form-control" placeholder="Enter About">
                              </div>
                              <div class="form-group">
                                  <label> To Day </label>
                                  <input type="today" name="today" id="today" class="form-control" placeholder="Enter To Day">
                              </div>
                              <div class="form-group">
                                  <label> To Time </label>
                                  <input type="time" name="totime" id="totime" class="form-control" placeholder="Enter To Time">
                              </div>
                              <div class="form-group">
                                  <label> Close </label>
                                  <input type="close" name="close" id="close" class="form-control" placeholder="Enter Close">
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
              <div class="container">
                  <div class="jumbotron">
                      <div class="card">
                          <h2> Change Your Footer Information </h2>
                      </div>    
                      <div class="card">
                          <div class="card-body">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal" style="margin-left:10px;">
                                  ADD
                              </button>
                          </div>
                      </div>

                      <div class="card">
                          <div class="card-body ">

                          <?php
                              include 'conn.php';

                             
                              if(isset($_POST['del']))
                    {
                        if(isset($_POST['chk']))
                        {
                            foreach ($_POST['chk'] as $check) {
                                $del="delete from footer where id='$check'";
                                mysqli_query($connection,$del);
                            }
                        }
                    }
                     $query = "SELECT * FROM footer";
                     $query_run = mysqli_query($connection, $query);
                ?>
            <form action="footer.php" method="POST">
                              <table id="datatableid" class="table table-striped thead-light table-hover">
                                  <thead>
                                    <tr>
                                        <td colspan="5">
                                            <input type="submit" name="del" value="Delete" class="btn btn-danger" onclick="return confirm('Are u sure')">
                                        </td>
                                      </tr>
                                      <tr class="table-primary">
                                          
                                          <th scope="col" > ID </th>
                                          <th scope="col"> Address </th>
                                          <th scope="col"> Whatsapp </th>
                                          <th scope="col"> Facebook </th>
                                          <th scope="col"> Email </th>
                                          <th scope="col"> Phone </th>
                                          <th scope="col"> Date </th>
                                          <th scope="col"> Time </th>
                                          <th scope="col"> About </th>
                                          <th scope="col"> To Day </th>
                                          <th scope="col"> To Time </th>
                                          <th scope="col"> Close </th>
                                          <th scope="col"> EDIT </th>
                                          <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                          </th>
                                          
                                      </tr>
                                  </thead>
                          <?php
                              if($query_run)
                              {
                                  foreach($query_run as $row)
                                  {
                          ?>
                                  <tbody>
                                  <tr id="<?php echo $row['id'] ?>">
                                    

                                          <td> <?php echo $row['id']; ?> </td>                            
                                          <td> <?php echo $row['address']; ?> </td>                            
                                          <td> <?php echo $row['what_no']; ?> </td>
                                          <td> <?php echo $row['fb']; ?> </td>
                                          <td> <?php echo $row['email']; ?> </td>
                                          <td> <?php echo $row['phone']; ?> </td>
                                          <td> <?php echo $row['delivery_date']; ?> </td>
                                          <td> <?php echo $row['delivery_time']; ?> </td>
                                          <td> <?php echo $row['about']; ?> </td>
                                          <td> <?php echo $row['today']; ?> </td>
                                          <td> <?php echo $row['totime']; ?> </td>
                                          <td> <?php echo $row['close']; ?> </td>                                                       
                                          <td> 
                                              <button type="button" class="btn btn-info editbtn"> EDIT </button>
                                          </td> 
                                          <td>
                                          <input type="checkbox" class="checkItem" value="<?=$row['id']?>" name="chk[]">
                                              
                                          </td>
                                          
                                      </tr>
                                  </tbody>
                          <?php           
                                  }
                              }
                              else 
                              {
                                  echo "No Record Found";
                              }
                          ?>
                              </table>
                            </form>
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
            $('#address').val(data[1]);
            $('#what_no').val(data[2]);
            $('#fb').val(data[3]);
            $('#email').val(data[4]);
            $('#phone').val(data[5]);
            $('#delivery_date').val(data[6]);
            $('#delivery_time').val(data[7]);
            $('#about').val(data[8]);
            $('#today').val(data[9]);
            $('#totime').val(data[10]);
            $('#close').val(data[11]);
          
    });
});

</script>
  </body>
</html>
