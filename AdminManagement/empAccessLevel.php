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
			<style>
			
				#aclevel{
					width:130px;
				}
			</style>
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
                <div class='col-sm-2'> 
                    <h3><strong>Update Access Level</strong></h3>
                </div>
            </div>
            <br>
			
			<form class='form-horizontal lg-2' action="editempAccLevel.php" method="post" >
                <br>
				
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Full Name</th>
					  <th scope="col">UserName</th>
					  <th scope="col">HpNo</th>
					  <th scope="col">Email Address</th>
					  <th scope="col">Access Level</th>
					  <th scope="col">Edit</th>
					</tr>
				  </thead>
				  <tbody>
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
				
				$sql ="SELECT * FROM register";
				
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					while($row = mysqli_fetch_assoc($records))
					{						
						echo "<tr>";
						echo "<th scope=\"row\" value=\"Delete\">".$row['Id']."</th>";
						echo "<td>".$row['FullName']."</td>";
						echo "<td>".$row['Username']."</td>";
						echo "<td>".$row['HpNo']."</td>";
						echo "<td>".$row['EmailAddress']."</td>";
						echo "<td>".$row['AccessLevel']."</td>";					
						 // echo "<th><input type = hidden name=\"UserID\" value='".$row['Id']."'</th>";						
						echo "<td>";
						echo "<p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Change\">";
						echo "<button class=\"btn btn-danger btn-xs \" name=\"".$row['Id']."\" value=\"Change\" href =\"editempAccLevel.php\" data-toggle=\"modal\" data-target=\"#apply\" >Change</button>";	
						
						echo "</p>";
						echo "</td>";
						echo "<tr>";						
											
					}
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
			<script src="js/jquery.min.js"></script>					
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

