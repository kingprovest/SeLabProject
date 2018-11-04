<?php

	include ('header.php');

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
								System Management			
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
			   <div class="col-md-8 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-8'> 
                    <h3><strong> Choice of Vehicle</strong></h3>
                </div>
            </div>
            <br>
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
				$sql2 ="SELECT StartDate,EndDate FROM carbooking where CarID =".$id.";";
				
				 $_SESSION["carID"]= $id;
				$records = mysqli_query($con,$sql);
				 // $records2 = mysqli_query($con,$sql2);
				if(mysqli_num_rows($records)>0){
					$row = mysqli_fetch_assoc($records);
					
					echo "<div class=\"row\">";
						echo " <div class=\"col-sm-4\">";
						echo "<img class=\"img-responsive img-thumbnail center-block\" style=\"background-color: white\" src=\"img/".$row['ImagePath']."\" width=\"300\" height=\"300\">";
						echo "</div>";
						echo " <div class=\"col-sm-4\">";
						echo "<h3 class=\"text-center\">".$row['Brand']."</h3>";
						echo "<p class=\"text-center\"><strong>Model:</strong>".$row['Model']."</p>";
						echo "<p class=\"text-center\"><strong>Plate Number:</strong>".$row['PlateNumber']."</p>";
						echo "<p class=\"text-center\"><strong>PerHourRate:</strong>".$row['PerHourRate']."</p>";
						echo "<p class=\"text-center\"><strong>PerDayRate:</strong>".$row['PerDayRate']."</p>";
						echo "<p class=\"text-center\"><strong>NoOfSeat:</strong>".$row['NoOfSeat']."</p>";
						echo "</div>";	
															
				}
						
				
						
						
						
						// $disabledate = $row2['StartDate'] .''. $row2['EndDate'];
						// echo $disabledate;
						// $str = implode(' ', array($row2['StartDate'], $row2['EndDate']));
						// echo $str;
						// $arr = explode('/\s+/', $str );

						// foreach($arr as $result=>$val) {
						// echo $val, '<br>';
					  // }
					
				
								// var array = ["2013-03-14","2013-03-15","2013-03-16"]

				// $('input').datepicker({
					// beforeShowDay: function(date){
						// var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
						// return [ array.indexOf(string) == -1 ]
					// }
				// });
				
				
			?>
			<div class="col-sm-4">
			
			<form class="form-group " method="post" action="bookspecificcar_process.php"> <!-- Name field -->
				<label class="control-label " for="name">Start Date</label>
				<input class="form-control" id="startdatePicker" name="startdate" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">End Date</label>
				<input class="form-control" id="enddatePicker" name="enddate" autocomplete="off" type="text" required/>
				<label class="control-label " for="name">Pick Up Point</label>
				<input class="form-control" id="name" name="pickuppoint" type="text" autocomplete="off" required/>
				<label class="control-label " for="name">Drop Off Point</label>
				<input class="form-control" id="name" name="dropoffpoint" type="text" autocomplete="off" required/>					
				<label class="control-label " for="name">Price</label>
				<input class="form-control" id="rentingprice" name="price" type="text" autocomplete="off" required />
				<input id="calculate" type="button" value="Calculate" />
				<br>
				<button type='submit' name='add' value='add'  class='btn btn-default btn-primary' onclick="return confirm('Are you sure to add?')"
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; padding: 10px; margin-left:30px"
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
			<link href="Bootstrap.Datepicker.1.7.1/content/Content/bootstrap-datepicker3.css" rel="stylesheet" />
			<script src="js/vendor/jquery-2.2.4.min.js"></script>	
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
			
			$("#rentingprice").keypress(function(e){
				e.preventDefault();
			});
			
			$(function() {
				
				var totalSum = 0;
				var dayRate = <?php echo $row['PerDayRate'] ?>;
				
			  $('#startdatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date(),
				    
			  });


			  $('#enddatePicker').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				minDate: new Date()
			  });

			  $('#calculate').on('click', function() {

				var fromDate = moment($('#startdatePicker').val(), 'DD-MM-YYYY');
				var toDate = moment($('#enddatePicker').val(), 'DD-MM-YYYY'); 

				if (fromDate.isValid() && toDate.isValid() && fromDate.isBefore(toDate)) {

				  var duration = moment.duration(toDate.diff(fromDate));
				  // $('#rentingprice').val( duration.days() + ' Day(s)');
				  var dayDifference = toDate.diff(fromDate,'days');
				  totalSum = dayDifference*dayRate;
				  $('#rentingprice').val(totalSum);

				} else {
					alert('Invalid date input. Please try again!!')    

				}
			  });

			});					 				 							

			</script>
		</body>
	</html>