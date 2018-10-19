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
			          
			         <li class="menu-active"><a href="">Welcome Back, 
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
						<li class="menu-active"><a href="../AdminManagement/adminpage.php">System Mangement</a></li>		          
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
                <div class='col-sm-8'> 
                    <h3><strong> Edit Bookings</strong></h3>
                </div>
            </div>
            <br>
			<?php
			
			$bookingid = array_search("Edit", $_POST);
			
				$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
				if(!$con)
				{
					echo 'Not Connected To Server';
				}
				
				if(!mysqli_select_db($con,'selabdb'))
				{
					
					echo'Database not selected';
				}
				
				$sql ="SELECT carbooking.StartDate,carbooking.EndDate,carbooking.PickUpPoint,carbooking.Price,carbooking.BookingID,
				carbooking.Id,carbooking.CarID,
				vehiclelist.Brand,vehiclelist.Model,vehiclelist.PlateNumber,register.Username
				FROM carbooking
				INNER JOIN vehiclelist ON carbooking.CarID = vehiclelist.CarID
				INNER JOIN register ON carbooking.Id = register.Id
				WHERE carbooking.BookingID = '$bookingid'";
				
				
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					$row = mysqli_fetch_assoc($records);
					
					
						echo "<form action=\"editspecificbooking_process.php\" method=\"post\">";				
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">User</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Username']." name=\"brand\" readonly>";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Brand</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Brand']." name=\"model\" readonly>";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Model</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Model']." name=\"platenumber\" readonly>";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">PlateNumber</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PlateNumber']." name=\"perhourrate\" readonly>";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">StartDate</label>";
						?>
						<input type="model" class="form-control" id="startdatePicker" value="<?php echo $row['StartDate']?>" name="startdate">
						</div>
						<div class="col-5">
						<label for="exampleFormControlInput1">EndDate</label>
						<input type="model" class="form-control" id="enddatePicker" value="<?php echo $row['EndDate']?>" name="enddate">
						</div>
						</div>
						<?php
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">PickUpPoint</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PickUpPoint']." name=\"pickuppoint\">" ;
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Payment</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Price']." name=\"noofseat\" readonly>";
						echo "</div>";
						echo "</div>";
											
						
						
						 echo "<th><input type = hidden name=\"bookingid\" value='".$row['BookingID']."'</th>";
						 echo "<th><input type = hidden name=\"userid\" value='".$row['Id']."'</th>";
						 echo "<th><input type = hidden name=\"carid\" value='".$row['CarID']."'</th>";
											
						echo "<div class=\"form-group\">";
						echo "<button type=\"submit\" name=\"Edit\" value=\"Edit\" class=\"btn btn-default btn-primary\"
							style=\"background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%)\"; border: \"#6493c4\">Edit</button>";
						echo "</div>";
						
											
						 echo "</form>";
				}
				
			?>
			
			
			
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

			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap.min.css" rel="stylesheet" />
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/jquery-ui.css" rel="stylesheet" />
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap-datepicker3.css" rel="stylesheet" />
			
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery.min.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/bootstrap.min.js"></script>
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/bootstrap-datepicker.js"></script>					
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery-ui.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/moment.min.js"></script>	
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
			
			<script type="text/javascript">
			
			$(function() {
			('#startdatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date()
			  });


			  $('#enddatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date()
			  });
			  
			});
			
			</script>
		</body>
	</html>