<?php

	include ('header.php');

?>	
<style>		
	#header .nav-menu a:hover
	{
		color: blue;
		font-size: 210%;
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
								Book Specific Car			
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
			   <div class="col-md-15 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-8'> 
                    <h3 style="font-size:30px"><strong> Choice of Vehicle</strong></h3>
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

						$disabledate = $row2['StartDate'] .''. $row2['EndDate'];
						echo $disabledate;
						$str = implode(' ', array($row2['StartDate'], $row2['EndDate']));
						echo $str;
						$arr = explode('/\s+/', $str );

						foreach($arr as $result=>$val) {
						echo $val, '<br>';
					  }		
				
			?>
			</tbody>
			</table>
			
			<div class="col-sm-8">
			
			<form class="form-group " method="post" action="bookspecificcar_process.php"> <!-- Name field -->
				<label class="control-label" for="name">Start Date</label>
				<input class="form-control" id="startdatePicker" name="startdate" type="text"/>
				<label class="control-label " for="name">End Date</label>
				<input class="form-control" id="enddatePicker" name="enddate" type="text"/>
				<label class="control-label " for="name">Pick Up Point</label>
				<input class="form-control" id="name" name="pickuppoint" type="text"/>
				<label class="control-label " for="name">Dorp Off Point</label>
				<input class="form-control" id="name" name="dropoffpoint" type="text"/>
				<br>
				<button type='submit' name='add' value='add'  class='btn btn-default btn-primary'
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; margin-left:32px; padding: 10px 30px; font-size: 22px"
                >Submit</button>
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
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap-datepicker.css" rel="stylesheet" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery.min.js"></script>	
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/bootstrap.min.js"></script>
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/bootstrap-datepicker.js"></script>					
			<script src="Bootstrap.Datepicker.1.7.1/content/Scripts/jquery-ui.js"></script>	
			
			
		
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
			
			// var phpArray= "<?php echo jason_encode($arr); ?> ";
			
				
				
				$("#startdatePicker").datepicker();
			
			</script>
		</body>
	</html>