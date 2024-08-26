<?php
session_start();
include 'conn.php';
$msg='';
if(isset($_POST['login'])){
	$time=time()-30;
	$ip_address=getIpAddr();
	$check_login_row=mysqli_fetch_assoc(mysqli_query($connection,"select count(*) as total_count from login_log where try_time>$time and ip_address='$ip_address'"));
	$total_count=$check_login_row['total_count'];
	if($total_count==3){
		$msg="To many failed login attempts. Please login after 30 sec";
	}else{
		$username=mysqli_real_escape_string($connection,$_POST['username']);
		$password=mysqli_real_escape_string($connection,$_POST['password']);
		$sql="select * from login where username='$username' and  password='$password'";
		$res=mysqli_query($connection,$sql);
		$row=mysqli_fetch_assoc($res);
		if(mysqli_num_rows($res)){
			if(!empty($_POST["remember"]))   
		   {  
		    setcookie ("username",$username,time()+ (10 * 365 * 24 * 60 * 60));  
		    setcookie ("password",$password,time()+ (10 * 365 * 24 * 60 * 60));
		    $_SESSION["username"] = $username;
		   } 
            $_SESSION['username']=$username;
            
            $_SESSION['last_login_timestamp'] = time();
			$_SESSION['IS_LOGIN']='yes';
			mysqli_query($connection,"delete from login_log where ip_address='$ip_address'");

			?>
			<script>
				window.location.href='slider.php';
			</script>
			<?php
		}else{

    if(isset($_COOKIE["username"]))   
    {  
     setcookie ("username","");  
    }  
    if(isset($_COOKIE["password"]))   
    {  
     setcookie ("password","");  
    } 
	}		$total_count++;
			$rem_attm=3-$total_count;
			if($rem_attm==0){
				$msg="To many failed login attempts. Please login after 30 sec";
			}else{
				$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
			}
			$try_time=time();
			mysqli_query($connection,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time')");
			
		}
	}

function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta http-equiv="Refresh" content="30">
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
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						
						 <div style="color:red;" id="result"><?php echo $msg?></div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="login" class="login100-form-btn" value="Login"  onclick="myFirstFunction();">
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

</body>
</html>