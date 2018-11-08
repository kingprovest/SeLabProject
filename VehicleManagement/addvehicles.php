<?php

	include ('admin_header.php');

?>

			 <!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-20'> 
                    <h3><strong>Add Vehicles</strong></h3>
                </div>
            </div>
            <br>
            
            
            
            <form class='form-horizontal ' method="post" action="addvehicle_process.php">
                <br>
           
            <div class="form-group"> <!-- Name field -->
				<label class="control-label " for="name" style="font-weight:bold; font-size:20px">Brand</label>
				<input class="form-control" id="name" name="brand" type="text" required/>
			</div>
			
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">Model</label>
				<input class="form-control" id="name" name="model" type="text" required/>
			</div>
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">Plate Number</label>
				<input class="form-control" id="name" name="platenumber" type="text" required/>
			</div>
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">Per hour rate</label>
				<input class="form-control" id="name" name="perhourrate" type="text" required/>
			</div>
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">Per day rate</label>
				<input class="form-control" id="name" name="perdayrate" type="text" required/>
			</div>
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">No of Seat</label>
				<input class="form-control" id="name" name="noofseat" type="text" required/>
			</div>	
			<div class="form-group"> <!-- Name field -->
				<label class="control-label" for="name" style="font-weight:bold; font-size:20px">Image:</label>
				<input type="file" name="imagepath" id="image" required="" style="font-size: 20px">			
			</div>
			
            <br>
            <div class='row'>
            <div class='col-sm-offset-7'>
                <button type='submit' name='add' value='add' onclick="return confirm('Confirm Add?')" class='btn btn-default btn-primary'
                        style=" background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%); border: #6493c4; font-size:22px; margin-left:18px; padding: 10px 50px"
                >Add</button>
            </div>
            </div>
			   <div class ='row'></div>
			   <div class="clearfix"> </div>
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