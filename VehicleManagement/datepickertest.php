<?php

	include ('header.php');

?>	

<style>		
	#header .nav-menu a:hover
	{
		color: blue;
		font-size: 250%;
	}
				
	.form-group .form-control
	{
		font-size:20px;
		height: 50px;
	}
	
	
</style>
		  
		  <!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-white text-uppercase" style="font-family: PlayfairDisplay-Regular">
								System Management			
							</h1>
							
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			
															
			<!-- Start quote Area -->
			<section class="quote-area pt-100" style="font-size: 18px">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-15 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-8'> 
                    <h3 style="font-size: 30px"><strong> Choice of Vehicle</strong></h3>
                </div>
            </div>
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
					</tr>
				  </thead>
				  <tbody>
				  
			<?php
			
			$id = array_search("Book", $_POST);
			echo $id;
				$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
				if(!$con)
				{
					echo 'Not Connected To Server';
				}
				
				if(!mysqli_select_db($con,'selabdb'))
				{
					
					echo'Database not selected';
				}
				
				$sql ="SELECT * FROM vehiclelist where CarID =".$id.";";
				$sql2 ="SELECT * FROM carbooking where CarID =".$id.";";
				
				 $_SESSION["carID"]= $id;
				$records = mysqli_query($con,$sql);
				 $records2 = mysqli_query($con,$sql2);
				if(mysqli_num_rows($records)>0){
					$row = mysqli_fetch_assoc($records);
					
						echo "<tr>";
						echo "<td><img src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"200\"</td>";
						echo "<td>".$row['Brand']."</td>";
						echo "<td>".$row['Model']."</td>";
						echo "<td>".$row['PlateNumber']."</td>";
						echo "<td>".$row['PerHourRate']."</td>";
						echo "<td>".$row['PerDayRate']."</td>";
						echo "<td>".$row['NoOfSeat']."</td>";
						echo "</tr>";											
				}
				
				
						$row2 = mysqli_fetch_assoc($records2);
						
						$period = new DatePeriod(
								 new DateTime($row2['StartDate']),
								 new DateInterval('P1D'),
								 new DateTime($row2['EndDate'])
							);
				
				
			?>
			</tbody>
			</table>
			
			<div class="col-sm-4">
			
			<form class="form-group " method="post" action="bookspecificcar_process.php"> <!-- Name field -->
				<label class="control-label " for="name">Start Date</label>
				<input class="form-control" id="startdatePicker" name="startdate" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">End Date</label>
				<input class="form-control" id="enddatePicker" name="enddate" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">PickUp Time</label>
				<input class="form-control" id="pickuptimepicker" name="pickuptime" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">DropOff Time</label>
				<input class="form-control" id="dropofftimepicker" name="dropofftime" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">PickUp Point</label>
				<input class="form-control" id="name" name="pickuppoint" type="text" autocomplete="off" required/>
				<label class="control-label " for="name">DropOff Point</label>
				<input class="form-control" id="name" name="dropoffpoint" type="text" autocomplete="off" required/>					
				<label class="control-label " for="name">Price</label>
				<input class="form-control" id="rentingprice" name="price" type="text" autocomplete="off" required />
				<input id="calculate" type="button" value="Calculate" style="width:220px"/>
				<br>
				<button type='submit' name='add' value='add'  class='btn btn-default btn-primary' onclick="return confirm('Are you sure to add?')"
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; width: 220px; padding: 10px; margin-left:30px; font-size: 18px"
                >Reserve Now!!</button>
			</form>
			
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
			
				
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap.min.css" rel="stylesheet" />
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/jquery-ui.css" rel="stylesheet" />
			<link href="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery.timepicker.css" rel="stylesheet" />
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap-datepicker3.css" rel="stylesheet" />
			
			
			<script src="js/vendor/jquery-2.2.4.min.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery.min.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/bootstrap.min.js"></script>		
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery.timepicker.js"></script>			
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
			
			$("#rentingprice").keypress(function(e){
							e.preventDefault();
						});			
			$(function() {
				
				var totalSum = 0;
				var dayRate = <?php echo $row['PerDayRate'] ?>;
				
			  $('#startdatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date()
			  });


			  $('#enddatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date()
			  });
			  
			
				$('div.ui-datepicker').css({ fontSize: '20px' });
				$('#pickuptimepicker').timepicker();
				$('#dropofftimepicker').timepicker();
				
				
				
			  $('#calculate').on('click', function() {

				var fromDate = moment($('#startdatePicker').val(), 'DD-MM-YYYY');
				var toDate = moment($('#enddatePicker').val(), 'DD-MM-YYYY'); 
				var beginningTime = moment($('#pickuptimepicker').val(), 'h:mma');
				var endTime = moment($('#dropofftimepicker').val(), 'h:mma');
				var dayDifference = toDate.diff(fromDate,'days');
				var hourdifference = endTime.diff(beginningTime,'hours');
				
				
				if (fromDate.isValid() && toDate.isValid() && fromDate.isBefore(toDate)) {

				 
				 if(hourdifference>0)
				 {
					
					   totalSum = (dayDifference*dayRate)+dayRate;
					   $('#rentingprice').val(totalSum);
				 }
				 else
				 {
					  
					  totalSum = dayDifference*dayRate;
					  $('#rentingprice').val(totalSum);
				 }
				

				}
				else if(dayDifference==0)
				{
					if(hourdifference>0)
					{
						totalSum = dayRate;
					$('#rentingprice').val(totalSum);
					}
					else
					{
						alert('Invalid date input. Please try again!!')    
					}
					
				}
				else {
					alert('Invalid date input. Please try again!!')    

				}

			  });


			});
			
			
			 				 									
			function dateDiff(startDate, endDate){
				const _MS_PER_DAY = 1000 * 60 * 60 * 24;
				
				const utc1 = Date.UTC(startDate.getFullYear(), startDate.getMonth(), startDate.getDate());
				const utc2 = Date.UTC(endDate.getFullYear(), endDate.getMonth(), endDate.getDate());
				
				 return Math.floor((utc2 - utc1) / _MS_PER_DAY);
				
				
			}
			
			function parseDMY(value) 
			{
				
				var date = value.split("-");
				var d = parseInt(date[0], 10),
					m = parseInt(date[1], 10),
					y = parseInt(date[2], 10);
				return new Date(y, m - 1, d);
			}
			</script>
		</body>
	</html>