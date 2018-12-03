<?php

	include ('manager_header.php');
	
	if(isset($_POST['viewMonthlyReportBtn']))
	{
		$year = $_POST['year'];
		$month = $_POST['month'];
		
		if($year == date("Y") && $month > date("m"))
		{
			?>
			<script>notifyInvalidPeriod();</script>
			<?php
		}
	}
?>
		<script type="text/javascript">
			function notifyInvalidPeriod() 
			{
				alert("Oops! The selected period is invalid.");
				window.location.href = "viewmonthlyreport.php";
			}
		</script>
		
		<!-- Start quote Area -->
		<section class="quote-area pt-100">
			<h1 class="text-center"><img src="img/businesslogo.png" height="200px" width="200px"></h1>
			<h1 class="text-center" style="padding:30px;">Monthly Sales Report</h1>
			<h1 class="text-center">
			<?php 
				if($month == 1)
					echo "January ";
				if($month == 2)
					echo "February ";
				if($month == 3)
					echo "March ";
				if($month == 4)
					echo "April ";
				if($month == 5)
					echo "May ";
				if($month == 6)
					echo "June ";
				if($month == 7)
					echo "July ";
				if($month == 8)
					echo "August ";
				if($month == 9)
					echo "September ";
				if($month == 10)
					echo "October ";
				if($month == 11)
					echo "November ";
				if($month == 12)
					echo "December ";
				
				echo $year;
			?>
			</h1>
			<hr>
			<div class="limiter">
				<div class="container-table100">
					<div class="wrap-table100">
						<h2 class="text-center">Sales</h2>
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 column1">#</th>
											<th class="cell100 column2">Invoce No.</th>
											<th class="cell100 column3">Start Date</th>
											<th class="cell100 column4">End Date</th>
											<th class="cell100 column5">Duration (Days)</th>
											<th class="cell100 column6">Car Plate No.</th>
											<th class="cell100 column7">Brand</th>
											<th class="cell100 column8">Model</th>
											<th class="cell100 column9">Runner</th>
											<th class="cell100 column10">Price (RM)</th>
										</tr>
									</thead>
								</table>
							</div>
							
							<div class="table100-body js-pscroll">
								<table>
									<tbody>
									<?php 
										$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
								
										if(!$con)
										{
											echo 'Not Connected To Server';
										}
				
										if(!mysqli_select_db($con,'selabdb'))
										{
											echo 'Database not selected';
										}
								
										if(strlen($month) == 2)
										{
											$period = '%-'.$month.'-'.$year;
										}
									
										else
										{
											$period = '%-0'.$month.'-'.$year;
										}
										
										$sql = "SELECT carbooking.BookingID,carbooking.StartDate,carbooking.EndDate,carbooking.Price,carbooking.Runner,
											   vehiclelist.Brand,vehiclelist.Model,vehiclelist.PlateNumber,vehiclelist.NoOfSeat
											   FROM carbooking
											   INNER JOIN vehiclelist ON carbooking.CarID = vehiclelist.CarID
											   WHERE carbooking.EndDate LIKE '$period'";
				
										$count = 1;
										$totalSales = 0.00;
										$records = mysqli_query($con,$sql);
										if(mysqli_num_rows($records)>0)
										{
											while($row = mysqli_fetch_assoc($records))
											{	
									?>
												<tr class="row100 body">
													<td class="cell100 column1"><?php echo $count; ?></td>
													<td class="cell100 column2"><?php echo $row['BookingID']; ?></td>
													<td class="cell100 column3"><?php echo $row['StartDate']; ?></td>
													<td class="cell100 column4"><?php echo $row['EndDate']; ?></td>
													<?php 
														$date1=date_create($row['StartDate']);
														$date2=date_create($row['EndDate']);
														$diff=date_diff($date1,$date2);	
													?>
													<td class="cell100 column5"><?php echo $diff->format("%a"); ?></td>
													<td class="cell100 column6"><?php echo $row['PlateNumber']; ?></td>
													<td class="cell100 column7"><?php echo $row['Brand']; ?></td>
													<td class="cell100 column8"><?php echo $row['Model']; ?></td>
													<td class="cell100 column9"><?php echo $row['Runner']; ?></td>
													<td class="cell100 column10"><?php echo $row['Price'].".00"; ?></td>
												</tr>
									<?php		
												$count += 1;
												$totalSales += $row['Price'];
											}
										}
									?>
									</tbody>
								</table>
							</div>
							<div class="table100-foot">
								<table>
									<tbody>
										<tr class="row100 head">
											<th class="cell100 column1"></th>
											<th class="cell100 column2"></th>
											<th class="cell100 column3"></th>
											<th class="cell100 column4"></th>
											<th class="cell100 column5"></th>
											<th class="cell100 column6"></th>
											<th class="cell100 column7"></th>
											<th class="cell100 column8"></th>
											<th class="cell100 column9">Total (RM)</th>
											<th class="cell100 column10"><?php echo $totalSales.".00"; ?></th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<h2 class="text-center">Vehicle Maintenance Summary</h2>
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 column11">#</th>
											<th class="cell100 column12">Brand</th>
											<th class="cell100 column13">Model</th>
											<th class="cell100 column14">Car Plate No.</th>
											<th class="cell100 column15">Date</th>
											<th class="cell100 column16">Description</th>
											<th class="cell100 column17">Cost (RM)</th>
										</tr>
									</thead>
								</table>
							</div>
							
							<div class="table100-body js-pscroll">
								<table>
									<tbody>
									<?php 
										$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
								
										if(strlen($month) == 2)
										{
											$period = '%-'.$month.'-'.$year;
										}
									
										else
										{
											$period = '%-0'.$month.'-'.$year;
										}
											   
										$sql = "SELECT vehiclelist.Brand,vehiclelist.Model,vehiclelist.PlateNumber,maintanencerecord.Date,
											   maintanencerecord.Description,maintanencerecord.Cost
											   FROM vehiclelist
											   INNER JOIN maintanencerecord ON vehiclelist.CarID = maintanencerecord.CarID
											   WHERE maintanencerecord.Date LIKE '$period'";
				
										$count = 1;
										$totalCost = 0.00;
										$records = mysqli_query($con,$sql);
										if(mysqli_num_rows($records)>0)
										{
											while($row = mysqli_fetch_assoc($records))
											{	
									?>
												<tr class="row100 body">
													<td class="cell100 column11"><?php echo $count; ?></td>
													<td class="cell100 column12"><?php echo $row['Brand']; ?></td>
													<td class="cell100 column13"><?php echo $row['Model']; ?></td>
													<td class="cell100 column14"><?php echo $row['PlateNumber']; ?></td>
													<td class="cell100 column15"><?php echo $row['Date']; ?></td>
													<td class="cell100 column16"><?php echo $row['Description']; ?></td>
													<td class="cell100 column17"><?php echo $row['Cost']; ?></td>
												</tr>
									<?php		
												$count += 1;
												$totalCost += $row['Cost'];
											}
										}
									?>
									</tbody>
								</table>
							</div>
							<div class="table100-foot">
								<table>
									<tbody>
										<tr class="row100 head">
											<th class="cell100 column11"></th>
											<th class="cell100 column12"></th>
											<th class="cell100 column13"></th>
											<th class="cell100 column14"></th>
											<th class="cell100 column15"></th>
											<th class="cell100 column16">Total (RM)</th>
											<th class="cell100 column17"><?php echo $totalCost.".00"; ?></th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
						<h2 class="text-center">Return on Investment (ROI)</h2>
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="text-center">Total Sales - Total Maintenance Cost = RM<?php echo ($totalSales - $totalCost).".00"; ?></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<form method="post" action="printmonthlyreport.php" target="_blank">	
							<input type="hidden" name="year" value="<?php echo $year; ?>"></input>
							<input type="hidden" name="month" value="<?php echo $month; ?>"></input>
							<p class="text-center"><button type="submit" name="printMonthlyReportBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; padding: 20px; width: 150px; margin-left: -15px">Print</button></p>
						</form>
					</div>
				</div>
			</div>
		</section>
		
		<p class="text-center"><button type="submit" name="backBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; padding: 20px; width: 150px" onclick="document.location.href='viewmonthlyreport.php';">Back</button></p>

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
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script>
			$('.js-pscroll').each(function(){
				var ps = new PerfectScrollbar(this);

				$(window).on('resize', function(){
					ps.update();
				})
			});
		</script>
		<script src="js/table_main.js"></script>
	</body>
</html>
