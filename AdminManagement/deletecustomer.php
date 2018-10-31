<?php

	include ('admin_header.php');

?>			
			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					<div class="account_grid">
						<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
							<div class='row'>
								<div class='col-sm-12'> 
									<h3><strong>Delete Customer</strong></h3>
								</div>
							</div>
							<br>
			
							<form class='form-horizontal lg-2' action="deletecustomer_process.php" method="post" >
								<br>
								
								<table class="table table-striped">
								  <thead>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">Full Name</th>
									  <th scope="col">UserName</th>
									  <th scope="col">HpNo</th>
									  <th scope="col">Email Address</th>
									  <th scope="col">Delete</th>
									</tr>
								  </thead>
								  <tbody>
							<?php
								$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
								if(!$con)
								{
									echo 'Not Connected To Server';
								}
								
								if(!mysqli_select_db($con,'selabdb'))
								{
									
									echo'Database not selected';
								}
								
								$sql ="SELECT * FROM register";
								
								$records = mysqli_query($con,$sql);
								if(mysqli_num_rows($records)>0){
									while($row = mysqli_fetch_assoc($records))
									{						
										echo "<tr>";
										echo "<th scope=\"row\" value=\"Delete\">".$row['Id']."</th>";
										echo "<td>".$row['FullName']."</td>";
										echo "<td>".$row['Username']."</td>";
										echo "<td>".$row['HpNo']."</td>";
										echo "<td>".$row['EmailAddress']."</td>";
										echo "<td>";
										echo "<p data-placement=\"top\" data-toggle=\"tooltip\" title=\"Delete\">";
										echo "<button class=\"btn btn-danger btn-xs \" name=\"".$row['Id']."\" value=\"Delete\" href =\"deletecustomer_process.php\" data-toggle=\"modal\" data-target=\"#delete\" >Delete</button>";							 
										echo "</p>";
										echo "</td>";
										echo "<tr>";						
															
									}
								}
							?>
							
							 </tbody>
							</table>
							</form>
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
			<script src="js/jquery.min.js"></script>					
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

