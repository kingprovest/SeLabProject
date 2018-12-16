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
                    <h3><strong> Edit Choice of Vehicle</strong></h3>
                </div>
            </div>
            <br>
			<?php
			
			$id = array_search("Edit", $_POST);
			
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
				
						echo "<form action=\"editspecificcar_process.php\" method=\"post\" enctype=\"multipart/form-data\" style=\"padding: 50px\">";
						?>	<td><img src="data:image/jpg;base64,<?php echo base64_encode($row['Image']); ?>" width="300" height="200"></td> <?php
						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Brand</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Brand']." name=\"brand\">";
						echo "</div>";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">Model</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['Model']." name=\"model\">";
						echo "</div>";
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">PlateNumber</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PlateNumber']." name=\"platenumber\">";
						echo "</div>";
                        echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">NoOfSeat</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['NoOfSeat']." name=\"noofseat\">";
						echo "</div>";						
						echo "</div>";

						echo "<div class=\"form-group row\">";
						echo "<div class=\"col-5\">";
						echo "<label for=\"exampleFormControlInput1\">PerDayRate</label>";
						echo "<input type=\"model\" class=\"form-control\" id=\"exampleFormControlInput1\" value=".$row['PerDayRate']." name=\"perdayrate\">" ;
						echo "</div>";
						
						echo "</div>";
											
						echo "<div class=\"form-group\">";
						echo "<label for=\"exampleFormControlInput1\">Choose Image</label>";
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<input type=\"file\" name=\"image\" id=\"image\">";		
						echo "</div>";
						
						echo "<th><input type = hidden name=\"CarID\" value='".$row['CarID']."'</th>";
											
						echo "<div class=\"form-group\">";
						echo "<button type=\"submit\" name=\"Edit\" value=\"Edit\" onclick=\"return confirm('Confirm Edit?')\" class=\"btn btn-default btn-primary\"
							style=\"background:linear-gradient(to bottom, #6493c4 0%,#375a7f 100%)\"; border: \"#6493c4\">Edit</button>";
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