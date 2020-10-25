<?php

include 'database.php';

session_start();

$alert = '';

// Check all fields
if (isset($_POST['loginForm'])) {
	$fieldnames = array('username', 'password');
	$error = false;

	foreach ($fieldnames as $data) {
		if(!isset($_POST[$data]) || empty($_POST[$data])){
			$error = true;
		}
	}
	
	if ($error) { 
		$alert = "Please fill in all required fields";
	} else {
		$username = strtolower($_POST['username']);
		$password = $_POST['password'];

		$alert = $_SESSION['alert'];

		$db = new database('localhost', 'root', '', 'project1', 'utf8');

		$db->login($username, $password);
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="style/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="style/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="style/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="style/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="style/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="style/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="style/css/util.css">
	<link rel="stylesheet" type="text/css" href="style/css/main.css">
</head>
<body>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" class="login100-form-btn" name="loginForm" value="Login">
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="lostpsw.php" class="txt2 hov1">
							Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="signup.php" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
				<?php echo $alert; ?>
			</div>
		</div>
	</div>
	<script src="style/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="style/vendor/animsition/js/animsition.min.js"></script>
	<script src="style/vendor/bootstrap/js/popper.js"></script>
	<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="style/vendor/select2/select2.min.js"></script>
	<script src="style/vendor/daterangepicker/moment.min.js"></script>
	<script src="style/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="style/vendor/countdowntime/countdowntime.js"></script>
	<script src="style/js/main.js"></script>
</body>
</html>