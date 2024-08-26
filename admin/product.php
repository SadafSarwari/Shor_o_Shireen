<?php
session_start();
if(isset($_SESSION["username"]))
{

  if ((time() - $_SESSION['last_login_timestamp']) > 15*60)  
  {
    header('location:logout.php');
  }
  else{
    $_SESSION['last_login_timestamp'] = time();
  }
}
else{
  header('location:login.php');
}
?>
<?php 
include 'session.php';
include 'conn.php';
$category = mysqli_query($connection,"SELECT * FROM categories");
$row_category = mysqli_fetch_assoc($category);
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

      <?php include 'header.php';?>
       <div id="page-wrapper">
     
              <!-- Modal -->
              <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Product Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="proinsertcode.php" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">
                              <div class="form-group">
                                  <label> Product Name </label>
                                  <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required>
                              </div>

                              <div class="form-group">
                                  <label> Price </label>
                                  <input type="number" name="price" class="form-control" placeholder="Enter Price">
                              </div>

                              <div class="form-group">
                                  <label> Description </label>
                                  <input type="text" name="description" class="form-control" placeholder="Enter Description">
                              </div>

                              <div class="form-group">
                                  <label> Quantity </label>
                                  <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                              </div>
                                <div class="form-group">
                                  <label> Image </label>
                                  <input type="file" name="image" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label> Category </label>
                                  <select name="category" class="form-control" required>
                                  <?php 
                                  do{?>
                                    <option value="<?php echo $row_category["id"];?>"><?php echo $row_category["catname"];?></option>
                                  <?php } while($row_category = mysqli_fetch_assoc($category));?>
                                </select>
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
                      <h5 class="modal-title" id="exampleModalLabel"> Edit Product Data </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <form action="proupdatecode.php" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">

                              <input type="hidden" name="update_id" id="update_id">

                              <div class="form-group">
                                  <label> Product Name </label>
                                  <input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Product Name">
                              </div>

                              <div class="form-group">
                                  <label> Price </label>
                                  <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price">
                              </div>

                              <div class="form-group">
                                  <label> Description </label>
                                  <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description">
                              </div>

                              <div class="form-group">
                                  <label> Quantity </label>
                                  <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity">
                              </div>
                              <div class="form-group">
                                  <label> Image </label>
                                  <input type="file" name="image" id="image" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label> Category </label>
                                  <input type="text" name="catid" id="catid" class="form-control" placeholder="Enter Category">
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
                          <h2> Change Your Product Information </h2>
                      </div>    
                      <div class="card">
                          <div class="card-body">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                                  ADD DATA
                              </button>
                          </div>
                      </div>

                      <div class="card">
                          <div class="card-body ">
                       <div class="panel-body">
                             <form method="POST" action="product.php" class="form">
                                <input type="text" name="search1"  class="form-control">
                                <br>
                                <input type="submit" name="search" value="search" class="btn btn-info">
                            </form>

                          </div>
                      </section>
                  </div>
              </div>
               <table class="table table-striped table-advance table-hover">
                <tr>
                    <th> ID </th>
                                          <th> Product Name </th>
                                          <th> Price </th>
                                          <th> Description </th>
                                          <th> Quantity </th>
                                          <th> Image </th>
                                        
                </tr>
                
                 <?php
                 include 'conn.php';
              if(isset($_POST['search1'])){
                  $search = $_POST['search1'];
                 
                  $sql = "SELECT*FROM product WHERE pname like '%$search%'";
                  $result = mysqli_query($connection, $sql);
                   while ($row=mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['id']."</td>"
                ."<td>".$row['pname']."</td>"
                ."<td>".$row['price']."</td>"
                ."<td>".$row['description']."</td>"
                ."<td>".$row['quantity']."</td>";
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
                    <div class="row">
                      <div class="col-lg-12">
                       <section class="panel">
                          <header class="panel-heading">
                              Select Data
                          </header>
                            
                
                          <?php
                              include 'conn.php';
                             
                              if(isset($_POST['del']))
                    {
                        if(isset($_POST['chk']))
                        {
                            foreach ($_POST['chk'] as $check) {
                                $del="delete from product where id='$check'";
                                mysqli_query($connection,$del);
                            }
                        }
                    }
                    
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 5;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($connection,"SELECT COUNT(*) As total_records FROM `product`");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $seconnd_last = $total_no_of_pages - 1; // total page minus 1
    $result = mysqli_query($connection,"SELECT * FROM `product` order by id desc LIMIT $offset, $total_records_per_page");
                ?>
            <form action="product.php" method="POST">
                              <table id="datatableid" class="table table-striped thead-light table-hover">
                                  <thead>
                                    <tr>
                                        <td colspan="5">
                                            <input type="submit" name="del" value="Delete" class="btn btn-danger" onclick="return confirm('Are u sure')">
                                        </td>
                                      </tr>
                                      <tr class="table-primary">
                                          
                                          <th scope="col" > ID </th>
                                          <th scope="col"> Product Name </th>
                                          <th scope="col"> Price </th>
                                          <th scope="col"> Description </th>
                                          <th scope="col"> Quantity </th>
                                          <th scope="col"> Image </th>
                                          <th scope="col"> Category </th>
                                          <th scope="col"> EDIT </th>
                                          <th scope="col">
                                            <input type="checkbox" id="checkAll">
                                          </th>
                                          
                                      </tr>
                                  </thead>
                          <?php
                              if($result)
                              {
                                  foreach($result as $row)
                                  {
                          ?>
                                  <tbody>
                                  <tr id="<?php echo $row['id'] ?>">
                                    

                                          <td> <?php echo $row['id']; ?> </td>                            
                                          <td> <?php echo $row['pname']; ?> </td>                            
                                          <td> <?php echo $row['price']; ?> </td>                            
                                          <td> <?php echo $row['description']; ?> </td>                            
                                          <td> <?php echo $row['quantity']; ?> </td>   
                                          <td> <?php echo "<img src='".$row['image']."' width='70' height='70'>";?> </td> 
                                          <td> <?php echo $row['catid']; ?> </td>  
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
<ul class="pagination">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$seconnd_last'>$seconnd_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$seconnd_last'>$seconnd_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>

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
            $('#pname').val(data[1]);
            $('#price').val(data[2]);
            $('#description').val(data[3]);
            $('#quantity').val(data[4]);
            $('#image').val(data[5]);
            $('#catid').val(data[6]);

    });
});

</script>
  </body>
</html>
