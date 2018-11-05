<?php
 
	include ('admin_header.php');
	
	if(isset($_POST['viewSalesPerformanceBtn']))
	{
		$year = $_POST['year'];
	}	
	
	$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
								
	if(!$con)
	{
		echo 'Not Connected To Server';
	}
				
	if(!mysqli_select_db($con,'selabdb'))
	{
		echo 'Database not selected';
	}
?>

	<script type="text/javascript">
		window.onload = function () {

			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				exportEnabled: true,
				theme: "light2",
				title:{
					text: "Sales Performance - Year <?php echo $year; ?>"
				},
				axisX: {
					interval: 1,
					intervalType: "month",
					valueFormatString: "MMM"
				},
				axisY:{
					title: "Sales (RM)",
					includeZero: false
				},
				data: [{        
					type: "line",
					markerSize: 12,
					xValueFormatString: "MMM, YYYY",
					yValueFormatString: "RM###.00",       
					dataPoints: [
					<?php 
					
						// January
						$period = '%-01-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 00, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// February
						$period = '%-02-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 01, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// March
						$period = '%-03-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 02, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						//April
						$period = '%-04-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 03, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// May
						$period = '%-05-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 04, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// June
						$period = '%-06-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 05, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// July
						$period = '%-07-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 06, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// August
						$period = '%-08-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 07, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// September
						$period = '%-09-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 08, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// October
						$period = '%-10-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 09, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// November
						$period = '%-11-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							if($row['Sum'] == 0)
							{
								$row['Sum'] = 0;
							}
							
							echo "{ x: new Date(".$year.", 10, 1), y: ".$row['Sum'].", markerColor: 'tomato'},";
							
						}
						
						// December
						$period = '%-12-'.$year;
						
						$sql = "SELECT SUM(Price) as 'Sum' FROM carbooking WHERE EndDate LIKE '$period'";
				
						$records = mysqli_query($con,$sql);
	
						if(mysqli_num_rows($records)>0)
						{
							$row = mysqli_fetch_assoc($records);
							
							echo "{ x: new Date(".$year.", 11, 1), y: ".$row['Sum'].", markerColor: 'tomato'}";
							
						}
					?>
					]
				}]
			});
			chart.render();
		}
	</script>
	
<!-- Start quote Area -->
	<section class="quote-area pt-100">
	<div style="padding: 0% 5%">
		<div id="chartContainer" style="height: 500px; width: 100%; padding: 0%"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</div>
		<br><br>
		<p class="text-center"><button type="submit" name="backBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4" onclick="document.location.href='viewsalesperformance.php';">Back</button></p>
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
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</body>
</html>
