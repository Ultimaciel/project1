<?php

include 'database.php';

$db = new database('localhost', 'root', '', 'project1', 'utf8');

if (isset($_POST['signupForm'])) {
	$firstname = ucwords($_POST['firstname']);
	$middlename = $_POST['middlename'];
	$lastname = ucwords($_POST['lastname']);
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];

	if ($password === $repeatpassword) {
		$db->executeQuery($firstname, $middlename, $lastname, $email, $password, $username);
	} else {
		echo "Error";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Sign up</title>
</head>
<body>
	<form action="" method="POST">
		<label><b>First name</b></label>
		<input type="text" name="firstname" required><br/>

		<label><b>Middle name</b></label>
		<input type="text" name="middlename"><br/>

		<label><b>Last name</b></label>
		<input type="text" name="lastname" required><br/>

		<label><b>Email</b></label>
		<input type="email" name="email" required><br/>
	    
		<label><b>Username</b></label>
		<input type="text" name="username" required><br/>
	    
		<label><b>Password</b></label>
		<input type="password" name="password" required><br/>
	    
		<label><b>Repeat Password</b></label>
		<input type="password" name="repeatpassword" required><br/>

		<input type="submit" name="signupForm" value="Create"><br/>
	</form> 
</body>
</html>