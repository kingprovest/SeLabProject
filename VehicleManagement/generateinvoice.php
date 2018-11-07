<?php

	include ('header.php');
	
	if(isset($_POST['viewInvoiceBtn']))
	{
		$_SESSION['invoiceNo'] = $_POST['bookingNo'];
	}
?>	
  
			          <li><a href="selectbrand.php">Car List</a></li>
			          <li><a href="custbookingDetails.php">Manage My Bookings</a></li>
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
				<br>
				<div id="invoice">
				<br><br>
				<div class="row">
					<div class="col-xs-12">
						<div class="invoice-title">
							<h1 class="text-center"><img src="img/businesslogo.png" height="150px" width="150px"></h1>
							<h1 class="text-center" style="padding:10px;">Invoice</h1>
							<hr>
						</div>
						<div class="row">
							<div class="col-xs-6">
								Baymax Car Rental
								<br>No.163, Jalan Samarax,
								<br>94300 Kota Samarahan,
								<br>Sarawak, Malaysia.
								<br>http://baymaxcarrental.com
							</div>
							<div class="col-xs-6 text-right">
								<h4>Invoice # <?php echo $_SESSION ['invoiceNo'] ?></h4>
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
									
									$bookingId = $_SESSION['invoiceNo'];
									
									$sql="SELECT ReserveDate FROM carbooking WHERE BookingID = '$bookingId'";
									$result = mysqli_query($con,$sql);
									$row = mysqli_fetch_assoc($result);
								?>
								<h4>Date: <?php echo $row['ReserveDate'] ?></h4>							
							</div>
						</div>
						<br><hr>
					</div>
				</div>
				<?php
					$userId = $_SESSION['userID'];				
					
					$sql="SELECT FullName, HpNo, EmailAddress FROM register WHERE Id = '$userId'"; 
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>
				<div class="row" style="width:52%; float:left;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Customer's Info</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
											<tr>
												<th>Name :</th>
												<td><?php echo $row['FullName'] ?></td>
											</tr>
											<tr>
												<th>Telephone :</th>
												<td><?php echo $row['HpNo'] ?></td>
											</tr>
											<tr>
												<th>Email :</th>
												<td><?php echo $row['EmailAddress'] ?></td>
											</tr>											
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<?php
					$sql="SELECT vehiclelist.PlateNumber, vehiclelist.Brand, vehiclelist.Model, vehiclelist.NoOfSeat FROM vehiclelist
						  INNER JOIN carbooking ON vehiclelist.CarID = carbooking.CarID	WHERE carbooking.BookingID = '$bookingId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>
				<div class="row" style="width:52%; float:right;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Vehicle's Info</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
											<tr>
												<th>Car Plate No. :</th>
												<td><?php echo $row['PlateNumber'] ?></td>
											</tr>
											<tr>
												<th>Brand/Model :</th>
												<td><?php echo $row['Brand']."/".$row['Model'] ?></td>
											</tr>
											<tr>
												<th>No. of Seats :</th>
												<td><?php echo $row['NoOfSeat'] ?></td>
											</tr>											
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>		
				<?php
					$sql="SELECT StartDate, EndDate, PickUpPoint, DropOffPoint, Price FROM carbooking WHERE BookingID = '$bookingId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($result);
				?>				
				<div class="row" style="display:block;">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Car Rental Summary</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
										<thead>
											<tr>
												<td>Start Date</td>
												<td class="text-center">End Date</td>
												<td class="text-center">Duration (Days)</td>
												<td class="text-center">Pickup Location</td>
												<td class="text-center">Dropoff Location</td>
											</tr>
										</thead>
										<tbody>
    										<tr height="200px">
												<td><?php echo $row['StartDate'] ?></td>
												<td class="text-center"><?php echo $row['EndDate'] ?></td>
												<?php
													$date1=date_create($row['StartDate']);
													$date2=date_create($row['EndDate']);
													$diff=date_diff($date1,$date2);													
												?>
												<td class="text-center"><?php echo $diff->format("%a"); ?></td>
												<td class="text-center"><?php echo $row['PickUpPoint'] ?></td>
												<td class="text-center"><?php echo $row['DropOffPoint'] ?></td>
											</tr>                       
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center">Total (RM)</td>
												<td class="no-line text-center"><?php echo $row['Price'].".00" ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form id="form1" runat='server'>		
					<input type="button" value="Print" onclick="javascript:printDiv('invoice')" />    
			</form>
		</div>
		
	</section>
	<section class="quote-area pt-100"></section>
	<!-- End quote Area -->
			
	<!-- start footer Area -->				
	<?php
		include ('footer.php');
	?>
	<!-- End footer Area -->					
			
	<!--Javascript function to save data inside 'invoice' div -->
	<script language="javascript" type="text/javascript">
	function printDiv(divID) 
	{
		var divElements = document.getElementById(divID).innerHTML;
		var oldPage = document.body.innerHTML;
 
		document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body></html>";
 
		window.print();
 
		document.body.innerHTML = oldPage;
	}
	</script>

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