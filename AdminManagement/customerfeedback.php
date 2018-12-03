<?php

	include ('admin_header.php');

?>				
			<!-- Start quote Area -->
			<section class="quote-area pt-100">
				<div class="container">
					 
			   <div class="col-md-15 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 <div class='row'>
                <div class='col-sm-20'> 
                    <h3><strong>View Customer Feedback</strong></h3>
                </div>
            </div>
            <br>
                <br>
				
				<table class="table table-striped" style="font-size: 18px">
				  <thead>
					<tr>		
					  <th scope="col">Feedback No.</th>
					  <th scope="col">User</th>
					  <th scope="col">Title</th>
					  <th scope="col">Message</th>					  
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
				
				$sql ="SELECT feedback.title, feedback.message,register.FullName
				FROM feedback
				INNER JOIN register ON feedback.Id = register.Id";
				
				$count = 1;
				$records = mysqli_query($con,$sql);
				if(mysqli_num_rows($records)>0){
					while($row = mysqli_fetch_assoc($records))
					{
						echo "<tr>";	
						echo "<td>".$count."</td>";						
						echo "<td>".$row['FullName']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['message']."</td>";														
						echo "</tr>";
						$count++;
					}
				}
			?>
            

			</tbody>
			</table>
			</div>
				
			</section>
			<section class="quote-area pt-100">
			</section>
			<!-- End quote Area -->
			
			<br>
			
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

