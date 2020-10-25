<?php 

include 'database.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: index.php');
    exit;
} else {
	$type = $_SESSION['type'];

	if (isset($_SESSION['username']) AND $type == 2) {
        if(isset($_GET['id'])){

            print $_GET['id'];
            $persoon = new database('localhost', 'root', '', 'project1', 'utf8');
    
            $persoon->delete();
        }
	} else {
        header('location: home.php');
    }
}


?>