<?php
session_start();

  if(isset($_SESSION["username"]))
{

   if((time() - $_SESSION['last_login_timestamp']) > 15*60)

  {
     header("location:/shor_o_shireen/customer/logout.php");


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

include 'conn.php';
if(isset($_POST['action']) && $_POST['action'] == 'add_to_cart')
{
 if(isset($_SESSION['cart']))
 {
  $item_array_id=array_column($_SESSION['cart'], "id"); 
  /*print_r($item_array_id);*/
  if(!in_array($_POST['id'], $item_array_id))
  {
    $count=count($_SESSION['cart']);
    //catch the item from db using id and check into database
    $product_id = $_POST['id'];
    $data =       $_POST['user_quantity'];
    $sql = "SELECT * FROM product WHERE product.id =$product_id";
    $result = mysqli_query($connection, $sql);
    $product_data = mysqli_fetch_assoc($result);
    $cart_data = array(
      'id' => $product_data['id'] ,
      'pname' => $product_data['pname'] ,
      'price' => $product_data['price'] ,
      'quantity' => $product_data['quantity'] ,
      'user_quantity' => $data
    );
    $_SESSION['cart'][$count]=$cart_data;   
  }
  else
  {
    ?>
        <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom:-3px;>
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Item already exist</strong>
          
        </div><?php
    
  }
    }
 else{
    $product_id = $_POST['id'];
    $data =$_POST['user_quantity'];

    $sql = "SELECT * FROM product WHERE product.id =$product_id";
    $result = mysqli_query($connection, $sql);
    $product_data = mysqli_fetch_assoc($result);
    $cart_data = array(
      'id' => $product_data['id'] ,
      'pname' => $product_data['pname'] ,
      'price' => $product_data['price'] ,
      'quantity' => $product_data['quantity'] ,
      'user_quantity' => $data
    );
    $_SESSION['cart'][0]=$cart_data;  
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Shor o Shireen - SuperMarket</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/title.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/title.png">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!--font awsome-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
         <style type="text/css">
        .pagination{
            margin: 30px;

        }
        .btn-p{
        background-color:rgb(176,180,53);
        color:white;
        margin: 10px;
        }
        .btn-p:hover !important{
        background-color:rgb(176,180,53);
        color:white;
        margin: 10px;
        }
        .pre{margin-left: 100px;}
    </style>
    
   

<body>
    <!-- Start Main Top -->
    <?php 
    $page='index';
    include 'header.php'; 
    
    ?>
    <!-- End Main Top -->

    <!-- Start Top Search -->

    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search" name="search"></i></span>
                <input type="text" class="form-control" placeholder="Search" name="search1">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

   <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
    <?php
                 include 'conn.php';
                 $select="select * from slider limit 4";
                 $select_run=mysqli_query($connection,$select);
                 $count=mysqli_num_rows($select_run);
            ?> 
        <ul class="slides-container">
        <?php while($row=mysqli_fetch_array($select_run)){?>
         <li class="text-center">
                <img src="admin/<?=$row['image'];?>">
                <!-- <img src="images/market.gif" alt=""> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong><?=$row['title'];?> <br><?=$row['sectitle'];?></strong></h1>
                            <p class="m-b-40"><?=$row['subtitle'];?><br><?=$row['secsub'];?> </p>
                            
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="products-box">
        <div class="container">
             <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Shop NowFood And School Supplies</h1>
                        <p>Shop Now</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row special-list">
             <?php
                        include 'conn.php';



                         if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                      $page_no = $_GET['page_no'];
                      } else {
                        $page_no = 1;
                            }

                      $total_records_per_page = 8;
                        $offset = ($page_no-1) * $total_records_per_page;
                      $previous_page = $page_no - 1;
                      $next_page = $page_no + 1;
                      $adjacents = "2"; 

                      $result_count = mysqli_query($connection,"SELECT COUNT(*) As total_records FROM `product`");
                      $total_records = mysqli_fetch_array($result_count);
                      $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                      $seconnectiond_last = $total_no_of_pages - 1;

                       // total page minus 1

                        $result = mysqli_query($connection,"SELECT * FROM product LIMIT $offset, $total_records_per_page");
                        
                        $count=mysqli_num_rows($result);
                        if ($count > 0 ) {
                        while ($row=mysqli_fetch_assoc($result)) {
                          $id=$row['id'];
                        $pname=$row['pname'];
                        $image=$row['image'];
                        $price=$row['price'];
                        ?>
                <div  class="col-lg-3 col-md-6 special-grid best-seller top-featured">
                    <div class="products-single fix" style="height:400px;">

                        <div class="box-img-hover">
                        <div class="type-lb">
                                <p class="sale">Sale</p>
                        </div>
                        <img  style="height:200px;width:300px;" src="admin/<?=$row['image'];?>" class="img-fluid" alt="Image">                      
                            <div class="mask-icon">
                                <input type="button" class="cart btn btn-md" style="background-color:rgb(176,180,53);color:white;" onclick="addToCart(<?php echo $id;?>)" name="Add" value="Add to cart">
                               
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $row['pname'];?></h4>
                            <h5> <?php echo $row['price'];?> Afg</h5>
                            <br>
                              Quantity &nbsp;&nbsp;&nbsp;&nbsp; <input type="number" min='1' name="quantity" id="quantity<?php echo $id;?>" class="form-control" value="1">
                        </div>
                    </div>
                </div>
            <?php }}?>
            </div>
          </div>
    </div>
    
<ul class="pagination">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li> <?php if($page_no <= 1) ?>
  <a class="cart btn btn-md btn-p pre" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active btn btn-p'><a>$counter</a></li>";  
        }else{
           echo "<li class='btn btn-p'><a href='?page_no=$counter'>$counter</a></li>";
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
    echo "<li><a >...</a></li>";
    echo "<li><a  href='?page_no=$seconnectiond_last'>$seconnectiond_last</a></li>";
    echo "<li><a  href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
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
     echo "<li><a href='?page_no=$seconnectiond_last'>$seconnectiond_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li ><a href='?page_no=1'>1</a></li>";
    echo "<li ><a href='?page_no=2'>2</a></li>";
        echo "<li ><a>...</a></li>";

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
  <a class="cart btn btn-md btn-p" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages' class='cart btn btn-md btn-p' >Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>
 
 

    <!-- End Categories -->


    <!-- Start Products  -->
   
    <!-- End Products  -->


  <?php include 'footer.php'; ?>

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">GCC SDK high School ,<a href="#">Womanity Foundation | </a> Design By :
            <a href="https://html.design/">Group A (Sadaf Sarwari,Sahra Srawari and Shabnam)</a></p>
    </div>
    <form method="post" action="index.php">
      <input type="hidden" name="id" id="addToCart_Id">
      <input type="hidden" name="hidden_name" id="addToCart_Pname">
      <input type="hidden" name="hidden_price" id="addToCart_Price">
      <input type="hidden" name="user_quantity" id="addToCart_Quantity">


      <input type="hidden" name="action" value="add_to_cart">
      <button type="submit" hidden="hidden" id="addToCart_Submit">
    </form>
    <!-- End copyright  -->
    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script>
      function addToCart(id)
      {
        var quantity = $("#quantity" + id).val();
        $("#addToCart_Id").val(id);
        $("#addToCart_Quantity").val(quantity);
        $("#addToCart_Submit").trigger('click');
      }
    </script>

    <script type="text/javascript">
  $('.close').click(function(){
    $('.alert').hide();
  });
</script>
</body>
</html>

