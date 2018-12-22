<?php

	include ('admin_header.php');

?>				
			
			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-20 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-12'> 
                    <h3><strong>Booking Verification</strong></h3>
                </div>
            </div>
            <br>
			
			<form class='form-horizontal lg-2' action="verifyspecificbooking.php" method="post" >
                <br>
				
				<table class="table table-striped" style="margin-left: -35px">
				  <thead>
					<tr>
					  <th scope="col">BookingID</th>
					  <th scope="col">User</th>
					  <th scope="col">Brand</th>
					  <th scope="col">Model</th>
					  <th scope="col">Plate Number</th>					  
					  <th scope="col">StartDate</th>
					  <th scope="col">EndDate</th>	
					  <th scope="col">PickUp Point</th>
					  <th scope="col">PickUp Time</th>
					  <th scope="col">DropOff Point</th>
					  <th scope="col">DropOff Time</th>	
					  <th scope="col">Availability</th>
					  <th scope="col">Action</th>
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
				
				$sql ="SELECT carbooking.StartDate,carbooking.EndDate,carbooking.PickUpPoint,carbooking.DropOffPoint,carbooking.Price,carbooking.BookingID,carbooking.Runner,
				date_format(carbooking.PickUpTime, '%h:%i%p') AS PickUpTime,carbooking.DropOffPoint,date_format(carbooking.DropOffTime, '%h:%i%p') AS DropOffTime,
				carbooking.Availability,vehiclelist.Brand,vehiclelist.Model,vehiclelist.PlateNumber,register.Username
				FROM carbooking
				INNER JOIN vehiclelist ON carbooking.CarID = vehiclelist.CarID
				INNER JOIN register ON carbooking.Id = register.Id";
				
				
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					while($row = mysqli_fetch_assoc($records))
					{						
							  echo "<tr>";
							  echo "<th scope=\"row\">".$row['BookingID']."</th>";
							  echo "<td>".$row['Username']."</td>";
							  echo "<td>".$row['Brand']."</td>";
							  echo "<td>".$row['Model']."</td>";
							  echo "<td>".$row['PlateNumber']."</td>";							
							  echo "<td>".$row['StartDate']."</td>";
							  echo "<td>".$row['EndDate']."</td>";		
                              echo "<td>".$row['PickUpPoint']."</td>";
							  echo "<td>".$row['PickUpTime']."</td>";
							  echo "<td>".$row['DropOffPoint']."</td>";
							  echo "<td>".$row['DropOffTime']."</td>";
							  echo "<td>".$row['Availability']."</td>";							  
							  echo "<td>";
							  echo "<p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Assign\">";
							  echo "<button class=\"btn btn-success btn-xs \" name=\"".$row['BookingID']."\" value=\"AssignRunner\" href =\"editbookingassignment.php\" data-toggle=\"modal\" data-target=\"#delete\" >Verify Availability</button>";
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

