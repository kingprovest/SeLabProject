	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		
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
			<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu-active"><a href="selectbrand.php">Welcome Back, 
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
			          <li><a href="#service">Service</a></li>
			          <li><a href="../CarList/carlist.php">Car List</a></li>
			          <li><a href="#testimonail">Testimonial</a></li>
			          <li><a href="#contact">Contact</a></li>
						<li><a href="../Login/logout_process.php">Logout</a></li>						
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-white text-uppercase">
								Invoice			
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
				<div class="col-md-8 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'></div>
				<br>
				
				<div class="row">
					<div class="col-xs-12">
						<div class="invoice-title">
							<h1 class="text-center"><img src="img/businesslogo.png" height="200px" width="200px" border="1px">Invoice</h1>
							<hr>
						</div>
						<div class="row">
							<div class="col-xs-6">
								Baymax Car Rental
								<br>Address Line 1
								<br>Address Line 2
								<br>baymax@gmail.com
								<br>http://baymaxcarrental.com
							</div>
							<div class="col-xs-6 text-right">
								<h4>Invoice # <?php echo $_SESSION ['invoiceNo'] ?></h4>
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
									
									$bookingId = $_SESSION['invoiceNo'];
									
									$sql="SELECT ReserveDate FROM carbooking WHERE BookingID = '$bookingId'";
									$result = mysqli_query($con,$sql);
									$row = mysqli_fetch_assoc($result);
								?>
								<h4>Date: <?php echo $row['ReserveDate'] ?></h4>							
							</div>
						</div>
						<br><hr>
					</div>
				</div>
				<?php
					$userId = $_SESSION['userID'];				
					
					$sql="SELECT FullName, HpNo, EmailAddress FROM register WHERE Id = '$userId'"; 
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>
				<div class="row" style="width:50%; float:left;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Customer's Info</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
											<tr>
												<th>Name :</th>
												<td><?php echo $row['FullName'] ?></td>
											</tr>
											<tr>
												<th>Telephone :</th>
												<td><?php echo $row['HpNo'] ?></td>
											</tr>
											<tr>
												<th>Email :</th>
												<td><?php echo $row['EmailAddress'] ?></td>
											</tr>											
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<?php
					$sql="SELECT vehiclelist.PlateNumber, vehiclelist.Brand, vehiclelist.Model, vehiclelist.NoOfSeat FROM vehiclelist
						  INNER JOIN carbooking ON vehiclelist.CarID = carbooking.CarID	WHERE carbooking.BookingID = '$bookingId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>
				<div class="row" style="width:50%; float:right;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Vehicle's Info</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
											<tr>
												<th>Car Plate No. :</th>
												<td><?php echo $row['PlateNumber'] ?></td>
											</tr>
											<tr>
												<th>Brand/Model :</th>
												<td><?php echo $row['Brand']."/".$row['Model'] ?></td>
											</tr>
											<tr>
												<th>No. of Seats :</th>
												<td><?php echo $row['NoOfSeat'] ?></td>
											</tr>											
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>		
				<?php
					$sql="SELECT StartDate, EndDate, PickUpPoint, DropOffPoint, Price FROM carbooking WHERE BookingID = '$bookingId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>				
				<div class="row" style="display:block;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Car Rental summary</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
										<thead>
											<tr>
												<td>Start Date</td>
												<td class="text-center">End Date</td>
												<td class="text-center">Duration (Days)</td>
												<td class="text-center">Pickup Location</td>
												<td class="text-center">Dropoff Location</td>
											</tr>
										</thead>
										<tbody>
    										<tr height="200px">
												<td><?php echo $row['StartDate'] ?></td>
												<td class="text-center"><?php echo $row['EndDate'] ?></td>
												<?php
													$date1=date_create($row['StartDate']);
													$date2=date_create($row['EndDate']);
													$diff=date_diff($date1,$date2);													
												?>
												<td class="text-center"><?php echo $diff->format("%a"); ?></td>
												<td class="text-center"><?php echo $row['PickUpPoint'] ?></td>
												<td class="text-center"><?php echo $row['DropOffPoint'] ?></td>
											</tr>                       
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center">Total (RM)</td>
												<td class="no-line text-center"><?php echo $row['Price'].".00" ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			<!-- start footer Area -->	
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Re-distributed by <a target="_blank" href="www.Themewagon.com">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
											
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
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