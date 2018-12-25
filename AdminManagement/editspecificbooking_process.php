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
				$DropOffPoint =$_POST['dropoffpoint'];
				$UserID =$_POST['userid'];
				$CarID =$_POST['carid'];
				$PickUpTime =$_POST['pickuptime'];
				$DropOffTime =$_POST['dropofftime'];
				
				
				$sql ="UPDATE carbooking SET StartDate= '$StartDate',EndDate='$EndDate',
				PickUpPoint='$PickUpPoint', DropOffPoint='$DropOffPoint', Id='$UserID',PickUpTime='$PickUpTime',DropOffTime='$DropOffTime',CarID='$CarID'
				WHERE BookingID ='$BookingID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo "<script type='text/javascript'>alert('Update Failed!')</script>";
				}
				else
				{
					echo "<script type='text/javascript'>alert('Update Successful!')</script>";
					header("refresh:0.2; url='editbooking.php'");
				}
				mysqli_close($con);
				
	?>