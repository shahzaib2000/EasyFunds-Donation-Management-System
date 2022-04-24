<?php

session_start();
require 'connection.php';
// $db = mysqli_connect('localhost', 'root', '', 'users') or die("could not connect to the database");
// $db = mysqli_connect('db5003435648.hosting-data.io', 'dbu1173131', 'NewStartup123', 'dbs2787679') or die("could not connect to the database");     //for online ionos server
$email = $_SESSION['email'];
// $v_token = $_SESSION['v_token'];
$query = "SELECT * FROM user WHERE email = '$email'";
$results = mysqli_query($db, $query);
$user_data_row = mysqli_fetch_assoc($results);
$isVerified = $user_data_row['verify'];
$user_id = $user_data_row['id'];

// echo("saad");

if(!isset($_SESSION['email']))
{
	$_SESSION['msg'] = "You must log in first to view this page";
	header("location: index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<title>Donation Programs</title>
	<link rel="shortcut icon" href="img/EF8.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/dashboard-style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/profile-edit.css"> -->
	<link rel="stylesheet" type="text/css" href="css/donation_program_style.css">
</head>
<body>
	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<!-- <h2><span class="las la-recycle"></span><span>MINT</span></h2> -->
			<h2><span><img src="img/EF9.png"></span><span>EasyFunds</span></h2>
		</div>

		<div class="sidebar-menu">
			<ul>
				<li><a href="dashboard.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
				</li>

				<li><a href="#" class="active"><span class="las la-hand-holding-heart"></span><span>Donation Programs</span></a>
				</li>

				<li><a href="edit-profile.php"><span class="las la-user-circle"></span><span>Account</span></a>
				</li>

				<!-- <li><a href="#"><span class="las la-cog"></span><span>Settings</span></a>
				</li> -->
			</ul>
			<button onclick="location.href='logout.php'" type="button" class="logout-btn"><span class="las la-sign-out-alt"></span><span>Logout</span></button>
		</div>
	</div>

	<div class="main-content">
		<header class="header-title">
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label>
				Programs
			</h2>

			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Search here"/>
			</div>

			<div class="user-wrapper">
				<img src="img/picture-not-present.jpg" width="40px" height="40px" alt="">
				<div>
					<h4><?php echo $_SESSION['fname']; ?></h4>
					<small>User</small>
				</div>
			</div>
		</header>

		<main>
			
			<div class="program_cards">


				<?php 
					$fetch_don_prog = "SELECT * FROM programs";
					$result_fetch_don = mysqli_query($db, $fetch_don_prog);
					// $temp_var = "saad";
					// echo ("onclick=\"location.href='donation_history.php'\" name='go_donation'");
					while ($fetch_don_row = mysqli_fetch_assoc($result_fetch_don))
					{
						echo("<div class='program_cards_single'>
								<div>
									<h3>".$fetch_don_row['program_name']."</h3>
									<span class='org_label'>".$fetch_don_row['org_name']."</span>
								</div>
								<div class = 'program_det'>
									<p>".substr($fetch_don_row['prog_details'], 0, 70)."...</p>
								</div>

								<div class='read-donate'>
									<a href = \" program-details.php?prog_id=".$fetch_don_row['id']."\">Read More</a>
									<button onclick=\"location.href='donation.php?prog_id=".$fetch_don_row['id']."'\" name='go_donation'>Donate <span class='las la-arrow-right'></span></button>
								</div>
							</div>");
					}

					
				 ?>
				
			</div>
		</main>

	</div>
</body>