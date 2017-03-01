<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Roshan's CMS</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Slab">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="css/css/font-awesome.css">
	<script type="text/javascript" src="script/ckeditor/ckeditor.js"></script> 
</head>
<body>
	<header>
	<div class="top-wrapper">
		<!-- Site logo -->
		<div class="site-logo">
			<a href="http://localhost:8080/Roshan_CMS/index.php"><img src="images/CMS_LOGO.png" class="logo"></a>
		</div><!-- site-logo -->
			<!-- Search form -->
			<form method="GET" class="search-form" action="search-content.php">
				<label for="Search">Search Post</label>
				<input type="text" name="Search-input" id="Search">
				<input type="submit" name="Search" value="Search">
			</form>	<!-- search form -->
			<!-- user --> 
			<div class="user">
				<i class="fa fa-user fa-3x" aria-hidden="false"></i>
					<?php 
					if(isset ($_SESSION['username'])) {?>
					<span class="welcome-message">
						Welcome, <?php echo $_SESSION['username']; ?>
					</span>

					<?php } ?>
			
				<div class="dropdown-content">
					<?php if(!isset($_SESSION["username"])){?>
							<a href="admin-login.php">Login</a>
					<?php } else{?>
							<a href="logout.php">Logout</a>
							<a href="admin-signup.php">Add User</a>
							<a href="admin-panel.php">Admin's Panel</a>
					<?php } ?>
								
				</div> <!-- dropdown -->
			</div> <!-- userdiv -->
	
	</div>	<!-- top wrapper -->
	</header>