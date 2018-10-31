<?php

	include ('header.php');

?>	

					  <?php
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
			          
			          <li><a href="bookcar.php">Car List</a></li>
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
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			    <form class='form-horizontal' method="post" action="">
			   <h3><strong>Choose Brand&nbsp</strong></h3>
			  	 <div class='row1'>
               
									
                    
					
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
			
			
			<form class='form-horizontal lg-2' action="datepickertest.php" method="post" >
                <br>
            <?php
			
										
					while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC))
					{
						
                            
						echo "<div class=\"row\">";			
						echo " <div class=\"col-sm-4\">";
						echo "<img class=\"img-responsive img-thumbnail center-block\" style=\"background-color: white\" src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"300\">";
						echo "</div>";
						echo " <div class=\"col-sm-4\">";
						echo "<h3 class=\"text-center\">".$row['Brand']."</h3>";
						echo "<p class=\"text-center\"><strong>Model:</strong>".$row['Model']."</p>";
						echo "<p class=\"text-center\"><strong>Plate Number:</strong>".$row['PlateNumber']."</p>";
						echo "<p class=\"text-center\"><strong>PerHourRate:</strong>".$row['PerHourRate']."</p>";
						echo "<p class=\"text-center\"><strong>PerDayRate:</strong>".$row['PerDayRate']."</p>";
						echo "<p class=\"text-center\"><strong>NoOfSeat:</strong>".$row['NoOfSeat']."</p>";
						echo "</div>";
						echo " <div class=\"col-sm-4\">";				
						echo "<input value=\"Book\" name=\"".$row['CarID']."\" type=\"submit\">";			
						echo "</div>";																									
						echo "</div>";
						
					}
				
			?>
            

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

