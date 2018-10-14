	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Car Rental</title>

		 <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/hexagons.min.css">										
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link href="css/styleadminbootstrap.css" rel="stylesheet" type="text/css" media="all" />
		</head>
		<body>
		<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu-active"><a href="">Welcome Back, 
					  <?php
	
						session_start();
						 if(isset($_SESSION['user']))
						 {
							 echo $_SESSION['user'];
						 }
						 
						 else{
							 echo"You are not logged in";
						 }
						
						?></a></li>
			          <li><a href="bookcar.php">Car List</a></li>
			          <li><a href="custbookingDetails.php">Manage My Bookings</a></li>
			          <li><a href="#contact">Contact</a></li>
						<li><a href="../Login/logout_process.php">Logout</a></li>						
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
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
				$sql2 ="SELECT * FROM carbooking where CarID =".$id.";";
				
				 $_SESSION["carID"]= $id;
				$records = mysqli_query($con,$sql);
				 $records2 = mysqli_query($con,$sql2);
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
				
				
						$row2 = mysqli_fetch_assoc($records2);
						
						$period = new DatePeriod(
								 new DateTime($row2['StartDate']),
								 new DateInterval('P1D'),
								 new DateTime($row2['EndDate'])
							);
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
				<input class="form-control" id="startdatePicker" name="startdate" type="text" required/>
				<label class="control-label " for="name">End Date</label>
				<input class="form-control" id="enddatePicker" name="enddate" type="text" required/>
				<label class="control-label " for="name">Pick Up Point</label>
				<input class="form-control" id="name" name="pickuppoint" type="text" required/>				
				<label class="control-label " for="name">Price</label>
				<input class="form-control" id="rentingprice" name="price" type="text" required readonly/>
				<input id="calculate" type="button" value="Calculate" />
				<br>
				<button type='submit' name='add' value='add'  class='btn btn-default btn-primary'
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4"
                >Reserve Now!!</button>
			</form>
			
			</div>
			
			</div>
			
			
				
			</section>
		  
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			<!-- start footer Area -->	
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Re-distributed by <a target="_blank" href="www.Themewagon.com">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
											
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
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
					moment.min.js
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

			  $('#calculate').on('click', function() {

				var fromDate = moment($('#startdatePicker').val(), 'DD-MM-YYYY');
				var toDate = moment($('#enddatePicker').val(), 'DD-MM-YYYY'); 

				if (fromDate.isValid() && toDate.isValid() && toDate.diff(fromDate)>0) {

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
		
			// $(function(){
				
			// $("#startdatePicker").datepicker({
				
				// dateFormat:'dd-mm-yy',
				// todayHighlight:'TRUE',
				// autoclose: true							
											
			// }).on('changeDate', function (ev) {
				
				// $("#enddatePicker").datepicker('setStartDate',$("startdatePicker").val());
				
			// });
			
			// $("#enddatePicker").datepicker({
				
				// dateFormat: "dd-mm-yy",
				// todayHighlight:'TRUE',
				// autoclose: true
				
			// }).on('changeDate', function (ev) {
				
				// var start = $("#startdatePicker").val();
				// console.log(start);
				// var startD = parseDMY(start);
				// var end = $("enddatePicker").val();
				// var endD = parseDMY(end);
				
				// const utc1 = Date.UTC(startD.getFullYear(), startD.getMonth(), startD.getDate());
				// const utc2 = Date.UTC(endD.getFullYear(), endD.getMonth(), endD.getDate());
					
				// var diff = Math.floor((utc2 - utc1) / (24*3600*1000));
				
				// document.getElementById('rentingprice').value = "1";
				
				
			// });
				 // $("#enddatePicker").val(diff);
			// });
			
			
			// $(function(){
				
			// $("#startdatePicker").datepicker({
				
				// dateFormat:'dd-mm-yy',
				// todayHighlight:'TRUE',
				// autoclose: true	,
				// onSelect: function(data){
					// $("#enddatePicker").datepicker('setStartDate',$("startdatePicker").val());
				// }
											
			// });
			
			// $("#enddatePicker").datepicker({
				
				// dateFormat: "dd-mm-yy",
				// todayHighlight:'TRUE',
				// autoclose: true,
				// onSelect: function(data){
				
				
				// var start = $("#startdatePicker").val();
				// console.log(start);
				// var startD = parseDMY(start);
				// var end = $("enddatePicker").val();
				// var endD = parseDMY(end);
				
				// const utc1 = Date.UTC(startD.getFullYear(), startD.getMonth(), startD.getDate());
				// const utc2 = Date.UTC(endD.getFullYear(), endD.getMonth(), endD.getDate());
					
				// var diff = Math.floor((utc2 - utc1) / (24*3600*1000));
				// console.log(diff);
				// $("#rentingprice").val("1");
				
				// }
				
			// });
			
			// });
			
			 				 					
			
			
	
			
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