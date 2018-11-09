<?php

	include ('admin_header.php');

?>	
						
			
			<!-- Start quote Area -->
			<section class="quote-area pt-100" style="font-size:20px">
				<div class="container">
					 <div class="account_grid">
			   <div class="col-md-10 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-8'> 
                    <h3><strong> Add Maintanence Record</strong></h3>
                </div>
            </div>
            <br>
			<?php
			
			$id = array_search("Add", $_POST);
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
				
				
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					$row = mysqli_fetch_assoc($records);
				
						echo "<form action=\"addvehiclemaintanence_process.php\" method=\"post\" style=\"padding: 50px\">";
						echo "<img class=\"img-responsive img-thumbnail center-block\" style=\"background-color: white\" src=\"img/".$row['ImagePath']."\" width=\"250\" height=\"250\">";
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-3\">";
						echo "<label for=\"exampleFormControlInput1\">Brand</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Brand']." name=\"brand\" readonly>";
						echo "</div>";
						echo "<div class=\"col-3\">";
						echo "<label for=\"exampleFormControlInput1\">Model</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Model']." name=\"model\" readonly>";
						echo "</div>";
						echo "<div class=\"col-3\">";
						echo "<label for=\"exampleFormControlInput1\">PlateNumber</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PlateNumber']." name=\"platenumber\" readonly>";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Date</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"Date1\" name=\"date\">";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Cost</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" name=\"cost\">";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Description</label><br>";
						echo "<textarea name=\"description\" class=\"form-control\" placeholder=\"Description\" style=\"width: 95%; height: 115px;\"></textarea>" ;
						echo "</div>";
	
						echo "</div>";
											
						echo "<div class=\"form-group\">";
						echo "<label for=\"exampleFormControlInput1\">Attachment</label>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<input type=\"file\" name=\"attachment\" id=\"image\" >";		
						echo "</div>";
						
						echo "<th><input type = hidden name=\"CarID\" value='".$row['CarID']."'</th>";
											
						echo "<div class=\"form-group\">";
						echo "<button type=\"submit\" name=\"Submit\" value=\"Submit\" onclick=\"return confirm('Confirm Submit?')\" class=\"btn btn-default btn-primary\"
							style=\"background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%)\"; border: \"#6493c4\">Submit</button>";
						echo "</div>";																	
						 echo "</form>";
				}
				
			?>
			
			</div>
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
			<script type="text/javascript">
			
			$('#Date1').datepicker({
				autoclose: true,
				dateFormat: 'dd-mm-yy',
				
			  });
			  
			  </script>
		</body>
	</html>