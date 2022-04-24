<?php
session_start();
require 'connection.php';
// $db = mysqli_connect('localhost', 'root', '', 'users') or die("could not connect to the database");

// $db = mysqli_connect('db5003435648.hosting-data.io', 'dbu1173131', 'NewStartup123', 'dbs2787679') or die("could not connect to the database");     //for online ionos server

if (isset($_GET['token']))
{
	$token = $_GET['token'];
	
	$update_query = "UPDATE user set verify=1 where vtoken='$token'";

	$results = mysqli_query($db, $update_query);

	if($results)
	{
		// $query = "SELECT * FROM user WHERE vtoken = '$token'";
		// $results = mysqli_query($db, $query);
		// $user_data_row = mysqli_fetch_assoc($results);
		header('location:dashboard2.php');
	}
}

// echo "You have verified your email successfully";

?>