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
				
				$BookingID = $_POST['bookingid'];
				$Availability =$_POST['availability'];				
				
				
				$sql ="UPDATE carbooking SET Availability= '$Availability'
				 WHERE BookingID ='$BookingID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo "<script type='text/javascript'>alert('Fail to verify!')</script>";
					header("refresh:0.2; url='verifybooking.php'");
				}
				else
				{
					echo "<script type='text/javascript'>alert('Verified!')</script>";
					header("refresh:0.2; url='verifybooking.php'");
				}
				mysqli_close($con);
				
	?>