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
                    <h2>Customer Service and Delivery Information</h2>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="images/Capture.PNG" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">We Always <span>Think About OUr Customer's Convenient.</span></h2>
                    <p>We give you the most minimal costs on the entirety of your grocery needs.     ‘Shor o Shireen’ is a low-cost online general store that gets items crosswise over classifications like grocery and school supplies conveyed to your doorstep. Browse more than 5,000 items at costs lower than markets each day!
                    The world is evolving quick, determined by various shopping propensities and always cutting-edge innovation for the customer. Grocery is the biggest of all retail portions and is moving on the web. In addition, the quick development of shopping utilizing cell phones opens new chances. We are all around                     situated to exploit these long-haul basic patterns to assist our clients, accomplices and investors.
                    </p>
					
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Hours We Work And Do The Delivery </h3>
                        <p>8:00 Am of the morning to 8:00 Pm of night from Saturday to Thursday.
                        friday:closed
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Delivery Conditions</h3>
                        <p>We deliver products or shopping bugs costed over 1000 AFG</p>
                        </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>places We Do Delivery to</h3>
                        <p>We deliver to every place of Kabul which is secure.</p>
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
