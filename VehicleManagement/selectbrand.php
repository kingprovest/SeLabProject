	
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
		.row1{
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
				
		</style>

		  <header id="header" id="home">
		   
			      <div id="logo">
			        <a href=""><img src="img/businesslogo.png" alt="" title="" style="width:100px;height:100px"/></a>
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
						 }
						 
						 $conn=mysqli_connect('127.0.0.1','root','', 'selabdb');
							if(!$conn)
							{
								echo 'Not Connected To Server';
							}
							
							if(!mysqli_select_db($conn,'selabdb'))
							{
								
								echo'Database not selected';
							}
							error_reporting(0);
							ini_set('display_errors', 0);
							$sql1= "SELECT DISTINCT Brand from vehiclelist";
							$result1 = mysqli_query($conn,$sql1);
							
							 if(isset($_POST['search']))
							{
								$brand = mysqli_real_escape_string($conn,$_POST['brand']);								
								$sql2 = "SELECT * FROM vehiclelist WHERE Brand='$brand'";
								
							}
							
							$result2 = mysqli_query($conn,$sql2);
						 
						?></a></li>
			          
			          <li><a href="selectbrand.php">Car List</a></li>
			          <li><a href="custbookingDetails.php">Manage My Bookings</a></li>
					   <li class="menu-has-children"><a href="">Account</a>
			            <ul>
			              <li><a href="../Login/forgotpassword.php">Change Password</a></li>
						  <li><a href="../VehicleManagement/feedback.php">Feedback</a></li>
			              <li><a href="../Login/logout_process.php">Logout</a></li>
			            </ul>
			          </li>
												
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
								List of Vehicles			
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
			   <div class="col-md-15 login-left wow fadeInLeft" data-wow-delay="0.4s">
			    <form class='form-horizontal' method="post" action="">
			   <h3><strong>Choose Brand&nbsp</strong></h3>
			  	 <div class='row1' style="width:400px">
		
					<select class='form-control' name="brand">
						<?php
						while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
						{
						?>
						<option value="<?php echo $row1['Brand'] ?>"><?php echo $row1['Brand'] ?></option>
						<?php
						}
						?>
					</select>
					
					<div class='col-sm-2'>
                <button type='submit' name='search' value='search' class='btn btn-default btn-primary'
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4"
                >Search</button>
            </div>
					
                
            </div>
			 </form>
            <br>
			<br>
			<form class='form-horizontal lg-2' action="datepickertest.php" method="post" >
                <br>
				
				<table class="table table-striped" style="font-size: 18px">
				  <thead>
					<tr>
					  <th scope="col">Car Image</th>
					  <th scope="col">Brand</th>
					  <th scope="col">Model</th>
					  <th scope="col">Plate Number</th>
					  <th scope="col">Per Hour Rate</th>
					  <th scope="col">Per Day Rate</th>
					  <th scope="col">No Of Seat</th>
					  <th scope="col">Book Car</th>
					</tr>
				  </thead>
				  <tbody>
				  
            <?php
			
										
					while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC))
					{
						echo "<tr>";
						?>	<td><img src="data:image/jpg;base64,<?php echo base64_encode($row['Image']); ?>" width="300" height="200"></td> <?php
						echo "<td>".$row['Brand']."</td>";
						echo "<td>".$row['Model']."</td>";
						echo "<td>".$row['PlateNumber']."</td>";
						echo "<td>".$row['PerHourRate']."</td>";
						echo "<td>".$row['PerDayRate']."</td>";
						echo "<td>".$row['NoOfSeat']."</td>";				
						echo "<td><input value=\"Book\" name=\"".$row['CarID']."\" type=\"submit\" style=\"padding: 10px 50px\" </td>";			
						echo "</tr>";
					}
				
			?>
            </tbody>
			</table>
			</div>
				
			</section>
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			
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

