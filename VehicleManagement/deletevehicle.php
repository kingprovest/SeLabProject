<?php

	include ('header.php');

?>	

						<li class="menu-active"><a href="../AdminManagement/adminpage.php">System Mangement</a></li>		          
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
                    <h3><strong>Delete Vehicles</strong></h3>
                </div>
            </div>
            <br>
			
			<form class='form-horizontal lg-2' action="deletevehicle_process.php" method="post" >
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
						echo " <div class=\"col-sm-4\">";
						echo "<img class=\"img-responsive img-thumbnail center-block\" style=\"background-color: white\" src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"300\">";
						echo "</div>";
						echo " <div class=\"col-sm-8\" style=\"margin:-100px 0 50px 200px\">";
						echo "<table style=\"border-collapse:collapse\" border=\"1px solid black\">";
						echo "<h3 class=\"text-left\">".$row['Brand']."</h3>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Model:</strong></th>			<td class=\"text-center\" style=\"padding: 10px\">".$row['Model']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Plate Number:</strong></th> 	<td class=\"text-center\" style=\"padding: 10px\">".$row['PlateNumber']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Per Hour Rate:</strong></th>	<td class=\"text-center\" style=\"padding: 10px\">".$row['PerHourRate']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>Per Day Rate:</strong></th>		<td class=\"text-center\" style=\"padding: 10px\">".$row['PerDayRate']."</td></tr>";
						echo "<tr><th class=\"text-center\" style=\"padding: 10px\"><strong>No. Of Seat:</strong></th>		<td class=\"text-center\" style=\"padding: 10px\">".$row['NoOfSeat']."</td></tr>";
						echo "</table>";
						
						echo " <div class=\"col-sm-4\">";
						echo "<input value=\"Delete\" name=\"".$row['CarID']."\" type=\"submit\" onclick=\"return confirm('Are you sure to delete?')\" style=\"padding: 10px 50px\">";
						echo "</div>";
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

