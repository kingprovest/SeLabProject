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
				$StartDate =$_POST['startdate'];
				$EndDate =$_POST['enddate'];
				$PickUpPoint =$_POST['pickuppoint'];
				$UserID =$_POST['userid'];
				$CarID =$_POST['carid'];
				
				
				$sql ="UPDATE carbooking SET StartDate= '$StartDate',EndDate='$EndDate',
				PickUpPoint='$PickUpPoint',Id='$UserID',CarID='$CarID'
				 WHERE BookingID ='$BookingID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo 'Updated';
					header("refresh:2; url='editbooking.php'");
				}
				mysqli_close($con);
				
	?>