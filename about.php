<?php
include 'conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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

<?php if($_SESSION["lang"] != "local/en.php") { ?>
<style type="text/css">
.navbar a {
    font-size:20px;
}
#collapse {
    padding-top:10px;
}
header,footer{
    direction: ltr;
}

</style>
<?php } ?>

 <?php if($_SESSION["lang"] == "local/ps.php") { ?>
    <style type="text/css">


.glyphicon  {
    font-family:'Glyphicons Halflings' !important;
}
header,footer,h2,h3,h1{
    direction: rtl;
}
h2,h3{
    float: right;


}
p{
    float: left;
}
</style>
<?php } ?>
    <title></title>
</head>

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

</head>

<body>
   <!-- Start Main Top -->
    <?php 
     $page='about';
    include 'header.php'; 
   
    ?>
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
                    <h2><?php echo $menu_about;?></h2>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
         <?php
                        include 'conn.php';
                        $query="select * from about limit 1";
                       $query_run=mysqli_query($connection,$query);
                        $count=mysqli_num_rows($query_run);
                        if ($count > 0 ) {
                        while ($row=mysqli_fetch_array($query_run)) {
                        $about=$row['about'];
                        $image=$row['image'];
                        ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="admin/<?=$row['image'];?>" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top"><?php echo $we;?> <span> <?php echo $shee;?></span></h2>
                    <p class="text-justify"><?php echo $about;?></p>
                   
                </div>
                <?php }}?>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3><?php echo $proo;?></h3>
                        <p class="text-justify">•   In excess of 1000 things in our list. Presently see Best Before Dates before purchasing.Browse more than 5,000 items at costs lower than markets each day! </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3><?php echo $prof;?> </h3>
                        <p class="text-justify">•   We convey all over kabul.this is a low-cost online general store that gets items crosswise over classifications like grocery and school supplies conveyed to your doorstep. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3><?php echo $poo;?></h3>
                        <p class="text-justify">•   Grocery is the biggest of all retail portions and is moving on the web. We give you the most minimal costs on the entirety of your grocery needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->

    <?php include 'footer.php'; ?>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">GCC SDK high School ,<a href="#">Womanity Foundation | </a> Design By :
            <a href="https://html.design/">Group A (Sadaf Sarwari,Sahra Srawari and Shabnam)</a></p>
    </div>
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
</body>

</html>
