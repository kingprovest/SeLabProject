	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Car Rental</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/hexagons.min.css">										
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link href="css/styleadminbootstrap.css" rel="stylesheet" type="text/css" media="all" />
		</head>
		<body>
		<style>
				.row1
				{
				display: flex;
				flex-direction: row;
				align-items: flex-start
				}
	
				#logo
				{
					padding: 0 0 0 80px;
				}
				
				#header .nav-menu
				{
					float: right;
					margin-top: -80px;
				}
				
				#header .nav-menu a
				{
					font-size: 20px;
					padding-left: 20px;
					text-decoration: none;
				}
				
				#header .nav-menu a:hover
				{
					color: blue;
					font-size: 150%;
				}
				
				.control-label
				{
					font-weight: bold;
					padding: 30px;
					font-size: 22px;
				}
				
				.form-control
				{
					margin: -20px 0 30px 30px;
					padding: 30px;
					font-size: 24px;
				}
				
				#calculate
				{
					margin:30px;
					padding: 10px;
				}
		</style>

		  <header id="header" id="home">

			      <div id="logo">
			        <a href="#index"><img src="img/businesslogo.png" alt="" title="" style="width:100px;height:100px"/></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu-active"><a href="">Welcome, 
					  	<?php
	
						session_start();
						 if(isset($_SESSION['user']))
						 {
							 echo $_SESSION['user'];
						 }
						 
						 else{
							 echo"You are not logged in";
							 header('Location: ../Login/login.php');
						 }
						?></a></li>
						
						
						<li><a href="selectbrand.php">Car List</a></li>
						<li><a href="custbookingDetails.php">Manage My Bookings</a></li>
						<li class="menu-has-children"><a href="">Account</a>
			            <ul>
			              <li><a href="../Login/forgotpassword.php">Change Password</a></li>
			              <li><a href="../Login/logout_process.php">Logout</a></li>
			            </ul>
			          </li>					
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	
		    
		  </header><!-- #header -->