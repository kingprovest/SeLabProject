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
				$RunnerName =$_POST['runnername'];				
				
				
				$sql ="UPDATE carbooking SET Runner= '$RunnerName'
				 WHERE BookingID ='$BookingID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo 'Updated';
					header("refresh:2; url='bookingassignment.php'");
				}
				mysqli_close($con);
				
	?>