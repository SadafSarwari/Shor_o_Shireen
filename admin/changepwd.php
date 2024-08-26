<?php

  include 'conn.php';
   
  if (isset($_POST['save'])) {
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $retypepass=$_POST['retypepass'];
    $query="select password from login where username='admin'";
    $result=mysqli_query($connection,$query);
    while ($row= mysqli_fetch_assoc($result)) {
        $pass=$row['password'];
        if($pass==$oldpass)
        {
        	if($newpass==$retypepass)
        	{
        		$update="update login set password='".$retypepass."'";
        		if(mysqli_query($connection,$update))
        		{?>
        <div class="alert alert-success alert-dismissible" style="margin-bottom:-3px;">
        <button type="button" class="close" data-ng-click='alert' aria-label="close">&times; </button>
        
        <strong>Your password has been set successfuly!</strong>
            
        </div>
     <?php
                  
                  
                }else{?>
        <div class="alert alert-warning alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Password did not change!</strong>
            
        </div>
        <?php
        		}

        	}
        	else{?>
        <div class="alert alert-warning alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Password does not match!</strong>
            
        </div>
        <?php
        		
        	}
        	
        }else{?>
        <div class="alert alert-warning alert-dismissible" style="margin-bottom:-3px;">
        <a href="#" class="close" data-dismiss="alter" aria-label="close">&times;</a>
        <strong>Password did not change!</strong>
            
        </div>
        <?php
        		
        		}
        }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>change password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Change Password
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Old Password is required">
						<span class="label-input100">Old Password</span>
						<input class="input100" type="password" name="oldpass" placeholder="Enter Old password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "New Password is required">
						<span class="label-input100">New Password</span>
						<input class="input100" type="password" name="newpass" placeholder="Enter new password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Retype Password</span>
						<input class="input100" type="password" name="retypepass" placeholder="Retype Password">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
					<input type="submit" name="save" class="login100-form-btn" value="Change">
					<a href="slider.php" type="submit" class="login100-form-btn" >Back</a>	
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript">
    $('.close').click(function(){
        $('.alert').hide();
    });
</script>

</body>
</html>