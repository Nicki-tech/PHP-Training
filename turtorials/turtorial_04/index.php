<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Turtorial_04</title>
	<style>
		body {
			width: 400px;
			margin: 0 auto;
			border: 2px solid black;
			text-align: center;
			padding-top: 30px;
			padding-bottom: 30px;

		}

		p a {
			text-decoration: none;
			padding: 10px 10px;
			border: 1px solid brown;
			color: black;
		}
	</style>
</head>

<body>
	<?php

	if (!empty($_POST["remember"])) {
		setcookie("username", $_POST["username"], time() + 3600);
		setcookie("password", $_POST["password"], time() + 3600);
		echo "Welcome";
	} else {
		setcookie("username", "");
		setcookie("password", "");
		echo "Can't log in";
	}

	?>

	<p><a href="logout.php">Log Out Here</a> </p>
</body>

</html>