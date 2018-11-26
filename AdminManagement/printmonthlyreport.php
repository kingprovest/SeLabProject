<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/hexagons.min.css">										
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/main.css">
		<link href="css/styleadminbootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
		<link rel="stylesheet" type="text/css" href="css/table_util.css">
		<link rel="stylesheet" type="text/css" href="css/table_main.css">
	</head>
	
	<body>
		<?php
			if(isset($_POST['printMonthlyReportBtn']))
			{
				$year = $_POST['year'];
				$month = $_POST['month'];
			}
		?>
		
		<!--Javascript function to save data inside 'annualReport' div -->
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

		<div id="monthlyReport">
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
							
							<div class="table100-print">
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
							
							<div class="table100-print">
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
					</div>
				</div>
			</div>
		</section>
		</div>
		
		<script>
			printDiv('monthlyReport');
		</script>
		
		<section class="quote-area pt-100">
		</section>
		<!-- End quote Area -->
	</body>
</html>