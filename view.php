<?php 

include 'database.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
} else {
	$type = $_SESSION['type'];

	if (isset($_SESSION['username']) AND $type == 2) {
        $view = new database('localhost', 'root', '', 'project1', 'utf8');
        $view->viewAll();

        $row = $_SESSION['admin_view'];
	} else {
        header('location: home.php');
    }
}


?>

<!DOCTYPE HTML>
<html>
<head>
	<title>View</title>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>

body {
    width: 100%;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.table-div {
    padding-top: 100px;
}
</style>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <ul class="nav navbar-right top-nav ">
                <li>
                    <a href="view.php">Admin Panel</a>
                </li>
                <li class="dropdown ">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin User</a>
                    <ul class="dropdown-menu">
                        <li><a href="home.php"><i class="fa fa-fw fa-user"></i>Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="table-div">
        <a href="create.php">Add User</a>
        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>First name</td>
                    <td>Middle name</td>
                    <td>Last name</td>
                    <td>Email</td>
                    <td>Username</td>
                    <td>Type</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $user): ?>
                <tr>
                    <td><?php echo $userID = $user['id'];?></td>
                    <td><?php echo $user['firstname'];?></td>
                    <td><?php echo $user['middlename'];?></td>
                    <td><?php echo $user['lastname'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['type'];?></td>
                    <td><a href="edit.php?id=<?php echo $userID; ?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $userID; ?>">Delete</a></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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