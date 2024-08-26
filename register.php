<?php
include "conn.php";
session_start();

if(isset($_POST['save']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    
    $query = "INSERT INTO ragister  VALUES (null,'$firstname','$lastname','$username','$password','$email','$address',' $phone1','$phone2')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        ?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>registered successfully</strong>
        	
        </div>
     <?php }
   
    else{?>
        <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>register not</strong>
        	
        </div>
        <?php
    }
}





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width intial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site Metas -->
    <title>Shor o Shireen - SuperMarket</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/title.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/title.png">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <style type="text/css">
    	.form-control{padding: 10px;}
    	form{width: 100%;}
    	.send{background-color: rgb(176,180,53);color: white;
        border-radius: 2px;margin-top: 20px;}
        fieldset{border:5px black solid;padding:30px ;margin: 50px 50px 50px 50px;}
        legend{color: rgb(176,180,53)}
        
    </style>

</head>
<body>
<div class="container">
	<div class="row" required>
         <form method="POST" action="register.php">
              <fieldset>
        <legend style="font-size:50px">
	    <p style="text-align:center;">Register Form</p>
        </legend>
	    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6" style="float:left;">
	    	<div class="form-group ">
	    	<label>Firstname:</label>
			<div>
				<input type="text" name="firstname" class="form-control" placeholder="First Name" required>
			</div>
		</div>
		<div class="form-group">
		<label>Lastname:</label>
			<div>
				<input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
			</div>
		</div>
		<div class="form-group">
		<label>Username:</label>
			<div>
				<input type="text" name="username" class="form-control" placeholder="User Name" required>
			</div>
		</div>
		<div class="form-group">
		<label>Password:</label>
			<div>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
		</div>
		
	    </div>
	    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6" style="float:right;">
	    	<div class="form-group">
		<label>Email:</label>
			<div>
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
		</div>
		<div class="form-group">
		<label>Address:</label>
			<div>
				<input type="Address" name="address" class="form-control " placeholder="your Address" required >
			</div>
		</div>
		<div class="form-group">
		<label>1<sup>st</sup>Number:</label>
			<div>
				<input type="tel" name="phone1" class="form-control " placeholder="+93" required>
			</div>
		</div>
		<div class="form-group">
		<label>2<sup>nd</sup>Number:</label>
			<div>
				<input type="tel" name="phone2" class="form-control " placeholder="+93" >
			</div>
		</div>
	    </div>

			<center>
				<div class="col-md-offset-4">
			<input type="submit" name="save" class="form-control send col-md-3 " value="Register">
			<a href="index.php" class="send form-control col-md-3 btn" style="color:white;">Back</a>
		
		    </div>
			</center>
            </fieldset>
	    </form>	
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	$('.close').click(function(){
		$('.alert').hide();
	});
</script>