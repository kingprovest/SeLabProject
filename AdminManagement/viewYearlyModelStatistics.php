<?php

	include ('manager_header.php');

?>
		<!-- Start quote Area -->
		<section class="quote-area pt-100">
			<div class="container">
				<div class="account_grid">
					<div class="col-md-20 login-left wow fadeInLeft" data-wow-delay="0.4s">
						<div class='row'>
							<div class='col-sm-20'> 
								<h3><strong>View Most Popular Car Model by Year</strong></h3>
								<hr>
								<br>
								<p> Choose the year to view:</p>
								<form method="post" action="generateYearlyModelStatistics.php">
									<select name="year" style="display: inline-block; margin: -20px 0 0 200px; padding: 20px">
										<option value="2018" selected>2018</option>
										<?php 
											$currentYear = date('Y');
											$startYear = 2018;
											
											echo $currentYear + $startYear;
											
											while($startYear != $currentYear)
											{
												$startYear++;
										?>
												<option value="<?php echo $startYear; ?>"><?php echo $startYear; ?></option>
										<?php		
											}
										?>
									</select>
									<br><br><br>
							
									<button type="submit" name="viewYearlyModelStatisticsBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; margin: -10px 0 0 200px; padding: 20px; width: 200px">View Statistics</button>
								</form>
								<br>
								<button type="submit" name="backBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; margin: -10px 0 0 200px; padding: 20px; width: 200px; display:inline;" onclick="document.location.href='viewModelStatistics.php';">Back</button>
							</div>
						</div>
					</div>
				</div>
			</div>				
			<br>
		<section class="quote-area pt-100"></section>
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