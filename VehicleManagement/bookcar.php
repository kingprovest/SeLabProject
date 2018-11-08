<?php

	include ('header.php');

?>	

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
			  	 <div class='row'>
                <div class='col-5'> 
                    <h3><strong>Book Car</strong></h3>
                </div>
            </div>
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
						echo "<tr>";
						echo "<td><img src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"200\"</td>";
						echo "<td>".$row['Brand']."</td>";
						echo "<td>".$row['Model']."</td>";
						echo "<td>".$row['PlateNumber']."</td>";
						echo "<td>".$row['PerHourRate']."</td>";
						echo "<td>".$row['PerDayRate']."</td>";
						echo "<td>".$row['NoOfSeat']."</td>";
						echo "<td><input value=\"Book\" name=\"".$row['CarID']."\" type=\"submit\" style=\"padding: 10px 50px\"</td>";
						echo "</tr>";
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

