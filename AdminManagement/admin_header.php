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
			<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
			<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
			<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
			<link rel="stylesheet" type="text/css" href="css/table_util.css">
			<link rel="stylesheet" type="text/css" href="css/table_main.css">
			
			<style>
				#aclevel
				{
					width:130px;
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
			</style>
		</head>
		<body>

		  <header id="header" id="home">

			      <div id="logo">
			         <a href="#index"><img src="img/businesslogo.png" alt="" title="" style="width:140px;height:140px"/></a>
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
							 echo"Please log in";
							 header('Location: ../Login/login.php');
						 }
						?></a></li>
					 <li class="menu-active"><a href="../AdminManagement/adminpage.php">Admin Homepage</a></li>		          
			         <li><a href="../Login/logout_process.php">Logout</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		

		  </header><!-- #header -->
		  
		  	<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-white text-uppercase">
								System Management			
							</h1>
							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
