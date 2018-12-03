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
								Bookings			
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
			   <div class="col-md-20 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-20'> 
                    <h3><strong>Manage Your Bookings</strong></h3>
                </div>
            </div>
            <br>
			
				
                <br>
				
				<table class="table table-striped" style="font-size: 16px">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Brand</th>
					  <th scope="col">Model</th>				  				  
					  <th scope="col">StartDate</th>
					  <th scope="col">EndDate</th>
					  <th scope="col">PickUpPoint</th>
					  <th scope="col">PickUpTime</th>
					  <th scope="col">DropOffPoint</th>
					  <th scope="col">DropOffTime</th>
					  <th scope="col">Add-On</th>
					  <th scope="col">Status</th>
					  <th scope="col">Invoice</th>
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
				
				$userid = $_SESSION['userID'];
				
				$sql ="SELECT carbooking.BookingID,carbooking.StartDate,carbooking.EndDate,carbooking.PickUpPoint,carbooking.Price,carbooking.PickUpTime,carbooking.DropOffPoint,carbooking.DropOffTime,
				carbooking.Availability,carbooking.AddOnItem,vehiclelist.Brand,vehiclelist.Model,
				vehiclelist.PlateNumber,vehiclelist.NoOfSeat
				FROM carbooking
				INNER JOIN vehiclelist ON carbooking.CarID = vehiclelist.CarID
				WHERE carbooking.Id = ".$userid.";";
				
				$count = 1;
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0)
				{
					while($row = mysqli_fetch_assoc($records))
					{						
						echo "<tr>";
							echo "<th scope=\"row\">$count</th>";
							echo "<td>".$row['Brand']."</td>";
							echo "<td>".$row['Model']."</td>";													
							echo "<td>".$row['StartDate']."</td>";
							echo "<td>".$row['EndDate']."</td>";
							echo "<td>".$row['PickUpPoint']."</td>";
							echo "<td>".$row['PickUpTime']."</td>";
							echo "<td>".$row['DropOffPoint']."</td>";
							echo "<td>".$row['DropOffTime']."</td>";
							echo "<td>".$row['AddOnItem']."</td>";
							if($row['Availability']== 'Available')
							{
								echo "<td>Confirmed</td>";
							}
							else if($row['Availability']=='Unavailable')
							{
								echo "<td>Unsuccessfull</td>";
							}
							else
							{
								echo "<td>Pending</td>";
							}
							
			?>
							
							<td>
								<form method="post" action="generateinvoice.php"> 
									<input type="hidden" name="bookingNo" value="<?php echo $row['BookingID']; ?>">
									<button type="submit" name="viewInvoiceBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; padding: 10px 20px; font-size: 14px">View</button>
								</form>
							</td>
						</tr>
			<?php
						$count += 1;
					}
				}
			?>
            
			 </tbody>
			</table>
			</div>
			</div>
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

