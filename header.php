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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li ><a href="/shor_o_shireen/customer/dashboard.php" style="color:white;"><i class='fas fa-user-circle' style=""></i>&nbsp;&nbsp;Your profile </a></li> 
             
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
                                <li class="<?php if($page=='shop'){echo "active";}?>"><a href="shop.php?id=1"><?php echo $menu_side;?></a></li>
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
                                        $count=count($_SESSION['cart']);
                                        ?>
                                        <span><?php echo $menu_cart;?></span><i class="fa fa-shopping-bag"><?php echo $count;?></i><span class="badge"></span>
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