<?php
session_start();
include 'conn.php';
if(isset($_POST['action']) && $_POST['action'] == 'add_to_cart')
{
 if(isset($_SESSION['cart']))
 {
  $item_array_id=array_column($_SESSION['cart'], "id"); 
  /*print_r($item_array_id);*/
  if(!in_array($_POST['id'], $item_array_id))
  {
    $countt=count($_SESSION['cart']);
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
    $_SESSION['cart'][$countt]=$cart_data;   
  }
  else
  {
    echo "<script>alert('already exists!')</script>";
    echo "<script>window.location='index.php'</script>";
  }
    }
 else{
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
    $_SESSION['cart'][0]=$cart_data;  
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
 <?php if($_SESSION["lang"] == "local/fa.php") { ?>
    <style type="text/css">
header,footer,p, h3, a, li ,ul , h2 , h1{
    direction: rtl;
}

.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}
</style>
<?php } ?>

<?php if($_SESSION["lang"] != "local/en.php") { ?>
<style type="text/css">
.navbar a {
    font-size:20px;
}
#collapse {
    padding-top:10px;
}
</style>
<?php } ?>
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
    <!--font awsome-->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .pagination{
            margin:0px 90px 0px 90px;
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
    </style>

</head>

<body>
   <!-- Start Main Top -->
    <?php 

include("conn.php"); 

    if(!isset($_SESSION["lang"])) { 
        $_SESSION["lang"] = "local/en.php";
    }

    if(isset($_POST["lang"])) {
        $lang = $_POST["lang"];
        if($lang == "en") {
            $_SESSION["lang"] = "local/en.php";
        }
        else if($lang == "fa") {
            $_SESSION["lang"] = "local/fa.php";
        }
        else if($lang == "ps") {
            $_SESSION["lang"] = "local/ps.php";
        }
    }

    include($_SESSION["lang"]);
?>

         

<!DOCTYPE html>
<html>
<head>
     <?php if($_SESSION["lang"] == "local/fa.php") { ?>
    <style type="text/css">


.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}
header,footer{
    direction: rtl;
}
</style>
<?php } ?>
<?php if($_SESSION["lang"] == "local/ps.php") { ?>
    <style type="text/css">
header,footer{
    direction: rtl;
}

.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}
</style>
<?php } ?>
<?php if($_SESSION["lang"] != "local/en.php") { ?>
<style type="text/css">
.navbar a {
    font-size:20px;
}
#collapse {
    padding-top:10px;
}
</style>
<?php } ?>
    <title></title>
</head>
<body>


<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 row" style="margin-right:250px;">
                    
                    <li ><a href="customer/login.php" style="color:white;padding:10px;margin-left:10px;">Sign in <i class='fas fa-sign-in-alt' style=""></i></a></li>
                    <li ><a href="register.php" style="color:white;">Register <i class='fas fa-registered' style=""></i></a></li> 
                    <li><a href="#" style="color:white;margin-left:20px;"><?php 
                    if(isset($_SESSION['username']))
                    {
                        echo "Hello"." ".$_SESSION['username'];
                    }
                    ?></a></li>
             
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    
                    <div class="text-slid-box" style="margin-left:-200px;">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Shop now from any categories here:
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Food and Snacks
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> chocolates
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Notebooks
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> School supplies
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Pens
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> With vary good quality
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Shop now!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12  col-xs-12 row" style="margin-left:-240px;">
                    <form method="post" style="margin-left:240px;margin-top:2px;" id="lang_form" >
                    <span class="glyphicon glyphicon-globe" style="color:white;font-size:16px;"></span>
                    <select id="lang" name="lang" onchange="document.getElementById('lang_form').submit();">
                        <option <?php if($_SESSION["lang"] == "local/en.php") echo "selected"; ?> value="en">English</option>
                        <option <?php if($_SESSION["lang"] == "local/fa.php") echo "selected"; ?> value="fa">Dari</option>
                        <option <?php if($_SESSION["lang"] == "local/ps.php") echo "selected"; ?> value="ps">Pashto</option>
                    </select>
                    
                </form>
                <a href="customer/logout.php" class="btn" style="color:white;margin-left: 310px; margin-top:-35px;">Logout <i class="fa fa-power-off"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/20200727_155836.png" class="logo" alt="" style="height:90px;width:200px;margin-right:30px;"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp" >
                        <li class="nav-item <?php if($page=='index'){echo "active";}?>"><a class="nav-link" href="index.php"><?php echo $menu_home;?></a></li>
                        <li class="nav-item <?php if($page=='about'){echo "active";}?>"><a class="nav-link" href="about.php"><?php echo $menu_about;?></a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown"><?php echo $menu_shop;?></a>
                            <ul class="dropdown-menu">
                                <li class="<?php if($page=='shop'){echo "active";}?>"><a href="shop.php"><?php echo $menu_side;?></a></li>
                                <!-- <li class="<?php if($page=='shop-detail'){echo "active";}?>"><a href="shop-detail.php"><?php echo $menu_shopd;?></a></li> -->
                                <li class="<?php if($page=='cart'){echo "active";}?>"><a href="cart.php"><?php echo $menu_cart;?></a></li>
                                <li class="<?php if($page=='checkout'){echo "active";}?>"><a href="checkout.php"><?php echo $menu_check;?></a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item <?php if($page=='contact-us'){echo "active";}?>"><a class="nav-link" href="contact-us.php"><?php echo $menu_contact;?></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav" style="margin-right:-35px;">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li >
                            <a href="cart.php">
                                
                                <?php 
                                    if(isset($_SESSION['cart']))
                                    {
                                        $countt=count($_SESSION['cart']);
                                        ?>
                                        <span>My Cart </span><i class="fa fa-shopping-bag"><?php echo $countt;?></i><span class="badge"></span>
                                <?php 
                                    }else{
                                        echo '<i class="fa fa-shopping-bag"></i>
                                <span class="badge">0</span>';
                                    }
                                ?>
                            </a>
                            
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <!-- <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                 <?php
                 include 'conn.php';
                 $select="select * from product limit 3";
                 $select_run=mysqli_query($connection,$select);
                 $count=mysqli_num_rows($select_run);
            ?> 
                    <ul class="cart-list">
                    <?php while($row=mysqli_fetch_array($select_run)){?>
                        <li>
                            <a href="#" class="photo"><img src="admin/<?=$row['image'];?>" class="cart-tumb"></a>
                            <h6><a href="#"><?php echo $row['pname']?></a></h6>
                            <p>1x - <span class="price"><?php echo $row['price']?> Afg</span></p>
                        </li>
                        <?php }?>
                        <li class="total">
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: 420 Afg</span>
                        </li>
                        
                    </ul>
                </li>
            </div> -->
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
</body>
</html>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $menu_shop;?></h2>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    

    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span><?php echo $sor;?> </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                    <option data-display="Select"><?php echo $not;?></option>
                                    <option value="1"><?php echo $sal;?></option>
                                    <option value="2"><?php echo $ne;?></option>
                                    
                                </select>
                                </div>
                                <p><?php echo $shl;?></p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
               
                                    <div class="row">
                                      <?php
                                        include "conn.php";
                                         $id=$_GET['id'];
                                            $qq="select * from product where catid=$id";
                                            $res=mysqli_query($connection,$qq);
                                            while ($row=mysqli_fetch_assoc($res)) {
                                                                                  ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">

                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale"><?php echo $sal;?></p>
                            </div>
                            <img style="height:200px;width:200px;" src="admin/<?=$row['image'];?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">

                                <div class="mask-icon">
                                <input type="button" class="cart btn btn-md" style="background-color:rgb(176,180,53);color:white;" onclick="addToCart(<?php echo $id;?>)" name="Add" value="Add to cart">
                                </div>
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
         <?php }?>     
        </div>
 
    
</div>


                                <div role="tabpanel" class="tab-pane fade" id="list-view" >
                                    <div class="list-view-box">
                                        <form method="POST">
                                            <div class="row">
                                             <?php
                        include 'conn.php';
                        

                        $result = mysqli_query($connection,"SELECT * FROM `product` ");
                        
                        $count=mysqli_num_rows($result);
                        if ($count > 0 ) {
                        while ($row=mysqli_fetch_array($result)) {
                          $id=$row['id'];
                        $pname=$row['pname'];
                        $image=$row['image'];
                        $price=$row['price'];
                        ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                       <div class="type-lb">
                                <p class="sale"><?php echo $sal;?></p>
                            </div>
                            <img style="height:200px;width:200px;" src="admin/<?=$row['image'];?>" class="img-fluid" alt="Image">

                                                        <div class="mask-icon">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                                        <input type="hidden" name="hidden_name" value="<?php echo $pname;?>">
                                                        <input type="hidden" name="hidden_price" value="<?php echo $price;?>">

                                                        </div>

                                                    </div>
                                                    <br>
                              Quantity &nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="quantity" class="form-control" value="1" min="1" max="10">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $row['pname'];?></h4>
                                                    <h5> <?php echo $row['price'];?></h5>
                                                    <p><?php echo $row['description'];?></p>
                                            
                                                    <input type="button" class="cart btn btn-md" style="background-color:rgb(176,180,53);color:white;" onclick="addToCart(<?php echo $id;?>)" name="Add" value="Add to cart">
                                                </div>
                                            </div>
                                            <?php }}?>
                                        </div>
                                        </form>
                                        

                                    </div>
                                    
                                </div>


                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3><?php echo $cate;?></h3>
                            </div>
                            <?php
                                include "conn.php";
                                $q="select * from categories";
                                $res=mysqli_query($connection,$q);
                                //start while loop categories
                                while ($row=mysqli_fetch_assoc($res)) {
                            ?>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="shop.php?id=<?php echo $row['id']; ?>" >
                                        <?php echo $row['catname'];?> <!-- <small class="text-muted"></small> -->
                                    </a>
                                    
                                </div>
                               
                                <!-- <a href="#" class="list-group-item list-group-item-action"> Grocery  <small class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a> -->
                            </div>
                        <?php }?>
                        </div>
                        <!-- <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

    <?php include 'footer.php'; ?>
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">GCC SDK high School ,<a href="#">Womanity Foundation | </a> Design By :
            <a href="https://html.design/">Group A (Sadaf Sarwari,Sahra Srawari and Shabnam)</a></p>
    </div>
    <!-- End copyright  -->
    <form method="post" action="index.php">
      <input type="hidden" name="id" id="addToCart_Id">
      <input type="hidden" name="hidden_name" id="addToCart_Pname">
      <input type="hidden" name="hidden_price" id="addToCart_Price">
      <input type="hidden" name="user_quantity" id="addToCart_Quantity">


      <input type="hidden" name="action" value="add_to_cart">
      <button type="submit" hidden="hidden" id="addToCart_Submit">
    </form>
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
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
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

</body>

</html>
