<?php
session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["loggedIn"])){
	header("Location: index.php");
	exit();
}

if (isset($_POST['login'])){
	$connection= new mysqli("localhost", "root","nicki11480", "mydb");

	$email = $connection->real_escape_string($_POST["email"]);
	$password = sha1($connection->real_escape_string($_POST["password"]));
	$data= $connection->query("SELECT firstname FROM members_table WHERE email='$email' AND password='$password'");
	
	if ($data->num_rows > 0){
		$_SESSION["email"] = $email;
		$_SESSION["loggedIn"] = 1;

		
		header('Location: index.php');
		exit();
	}else{
		echo "incorrect";
	}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Using PHP and Mysql</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="http://developerguidance.com/contacts/css/main.css">
	<style>
		body {
			width: 400px;
			margin: 0 auto;
		}

		form input {
			margin: 10px 0px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		form span {
			font-size: 20px;

		}

		#register {
			padding: 10px 70px;
		}
		#registerr{
			padding: 10px 38px;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-color: #FFF;">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="forgot_password.php" method="POST">
					<span class="login100-form-logo">
						User
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" id="register" type="submit" name="login" value="Log In">
					</div>
					<br>
					
					<div class="container-login100-form-btn">
						<a class="txt1" href="forgot_password.php">
						<input  id="registerr" type="submit" name="reset" value="Reset Password">
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	


</body>
</html>