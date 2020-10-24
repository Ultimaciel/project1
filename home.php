<?php 

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
} else {
	$type = $_SESSION['type'];

	if (isset($_SESSION['username'])) {
		if ($type == 1) {
			echo 'Welcome User';
		} elseif ($type == 2) {
			echo 'Welcome Admin';
		} else {
			header("Location: index.php");
		}
	}
}


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Home</title>
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
    <a class="nav-link" href="logout.php">Logout</a>
    
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