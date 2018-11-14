<?php
	session_start();
	$con = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$con)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$bookingid = array_search("Delete",$_POST);
		
		$sql = "DELETE FROM carbooking WHERE BookingID = $bookingid ";
		
		if(!mysqli_query($con,$sql))
				{
					echo "<script type='text/javascript'>alert('Car Booking Fail to Delete!')</script>";
					header("refresh:0.2; url='deletebooking.php'");
				}
				else
				{
					echo "<script type='text/javascript'>alert('Car Booking Deleted!')</script>";
					header("refresh:0.2; url='deletebooking.php'");
				}
?>