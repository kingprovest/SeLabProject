<?php

	include ('admin_header.php');

?>			
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
				carbooking.Id,carbooking.CarID,carbooking.PickUpTime,carbooking.DropOffTime,
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
						echo "<label for=\"exampleFormControlInput1\"><strong>User</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Username']." name=\"brand\" readonly>";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>Brand</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Brand']." name=\"model\" readonly>";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>Model</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Model']." name=\"platenumber\" readonly>";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>PlateNumber</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PlateNumber']." name=\"perhourrate\" readonly>";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>StartDate</strong></label>";
						?>
						<input type="model" class="form-control" id="startdatePicker" value="<?php echo $row['StartDate']?>" name="startdate">
						</div>
						<div class="col-5">
						<label for="exampleFormControlInput1"><strong>EndDate</strong></label>
						<input type="model" class="form-control" id="enddatePicker" value="<?php echo $row['EndDate']?>" name="enddate">
						</div>
						</div>
						<?php
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>PickUpTime</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PickUpTime']." name=\"pickuptime\">" ;
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>DropOffTime</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['DropOffTime']." name=\"dropofftime\">";
						echo "</div>";
						echo "</div>";
						
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>PickUpPoint</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PickUpPoint']." name=\"pickuppoint\">" ;
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\"><strong>Payment</strong></label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Price']." name=\"noofseat\" readonly>";
						echo "</div>";
						echo "</div>";
											
						
						
						 echo "<th><input type = hidden name=\"bookingid\" value='".$row['BookingID']."'</th>";
						 echo "<th><input type = hidden name=\"userid\" value='".$row['Id']."'</th>";
						 echo "<th><input type = hidden name=\"carid\" value='".$row['CarID']."'</th>";
											
						echo "<div class=\"form-group\">";
						echo "<button type=\"submit\" name=\"Edit\" value=\"Edit\" class=\"btn btn-default btn-primary\" onclick=\"return confirm('Confirm edit?')\"
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
				<?php

				include ('footer.php');

				?>
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