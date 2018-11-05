<?php
 
	include ('admin_header.php');
 
	if(isset($_POST['viewYearlyBrandStatisticsBtn']))
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
					
	$period = '%-%-'.$year;
							
	$sql = "SELECT vehiclelist.Brand, COUNT(*) as 'Count'
			FROM carbooking
		    INNER JOIN vehiclelist ON carbooking.CarID = vehiclelist.CarID
			WHERE carbooking.EndDate LIKE '$period'
			GROUP BY vehiclelist.Brand";
				
	$records = mysqli_query($con,$sql);
?>

	<script type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer",
			{
			animationEnabled: true,
			exportEnabled: true,
			theme: "light2",
			title:{
				text: "Most Popular Car Brand in <?php echo $year; ?>"
			},
			data: [
			{
				dataPoints: [
				<?php
				if(mysqli_num_rows($records)>0)
				{
					$num = 1;
		
					while($row = mysqli_fetch_assoc($records))
					{	
						echo '{ x: '.$num.', y: '.$row['Count'].', label: "'.$row['Brand'].'" },';
					
						$num += 1;
					}
				}
				?>
				]
			}
			]
			});

		chart.render();
	}
	</script>
	
<!-- Start quote Area -->
	<section class="quote-area pt-100">
		<div style="padding: 0% 5%">
			<div id="chartContainer" style="height: 370px; width: 100%; padding: 0%"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</div>
		<br><br>
		<p class="text-center"><button type="submit" name="backBtn" class='btn btn-default btn-primary' style="background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4" onclick="document.location.href='viewYearlyBrandStatistics.php';">Back</button></p>
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