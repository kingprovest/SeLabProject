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
					font-size: 20px;
				}
				
				.form-control
				{
					margin: -30px 0 30px 30px;
					padding: 30px;
				}
				
				#calculate
				{
					margin:30px;
					padding: 10px;
				}
		</style>

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
							 echo"You are not logged in";
						 }
						?></a></li> 

						<li class="menu-active"><a href="../AdminManagement/adminpage.php">System Management</a></li>		          
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
			
			
			
			
			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-20'> 
                    <h3><strong>View Vehicles</strong></h3>
                </div>
            </div>
            <br>
			
			<form class='form-horizontal lg-2' action="bookspecificcar.php" method="post" >
                <br>
				
			
            <?php
				$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
				if(!$con)
				{
					echo 'Not Connected To Server';
				}
				
				if(!mysqli_select_db($con,'selabdb'))
				{
					
					echo'Database not selected';
				}
				
				$sql ="SELECT * FROM vehiclelist";
				
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					while($row = mysqli_fetch_assoc($records))
					{
						
						echo "<div class=\"row\">";
						echo "<div class=\"col-sm-4\">";
						echo "<img class=\"img-responsive img-thumbnail center-block\" style=\"background-color: white\" src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"300\">";
						echo "</div>";
						echo " <div class=\"col-sm-8\" style=\"margin:-120px 0 50px 200px\">";
						echo "<table style=\"border-collapse:collapse\" border=\"1px solid black\">";
						echo "<h3 class=\"text-left\">".$row['Brand']."</h3>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Model:</strong></th>			<td class=\"text-center\" style=\"padding: 10px\">".$row['Model']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Plate Number:</strong></th> 	<td class=\"text-center\" style=\"padding: 10px\">".$row['PlateNumber']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Per Hour Rate:</strong></th>		<td class=\"text-center\" style=\"padding: 10px\">".$row['PerHourRate']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Per Day Rate:</strong></th>		<td class=\"text-center\" style=\"padding: 10px\">".$row['PerDayRate']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>No. Of Seat:</strong></th>			<td class=\"text-center\" style=\"padding: 10px\">".$row['NoOfSeat']."</td></tr>";
						echo "</table>";
						echo "</div>";

						echo "</div>";
						
					}
				}
			?>
            

			</div>
				
			</section>
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			<br>
			
			<!-- start footer Area -->				
				<?php

				include ('footer.php');

				?>
			<!-- End footer Area -->					
				

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/hexagons.min.js"></script>					
			<script src="js/waypoints.min.js"></script>			
			<script src="js/jquery.counterup.min.js"></script>						
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>

