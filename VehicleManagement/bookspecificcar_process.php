<?php
	session_start();
	
	echo $_SESSION['userID'];
	echo $_SESSION['carID'];
	$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
	
	if(!$con)
	{
		echo 'Not Connected To Server';
	}
	
	if(!mysqli_select_db($con,'selabdb'))
	{
		
		echo'Database not selected';
	}
	
	$UserName = $_SESSION['user']; 
	$StartDate =$_POST['startdate'];
	$EndDate =$_POST['enddate'];
	$PickUpPoint =$_POST['pickuppoint'];
	$DropOffPoint =$_POST['dropoffpoint'];
	$Price =$_POST['price'];
	$UserId = $_SESSION['userID']; 
	$CarId = $_SESSION['carID'];
	$ReserveDate = date("d-m-Y");
	//$PickupTime = $_POST['pickuptime'];
	$PickupTime = date("Y-m-d H:i:s", strtotime($_POST['pickuptime']));
	//$DropOffTIme = $_POST['dropofftime'];
	$DropOffTIme = date("Y-m-d H:i:s", strtotime($_POST['dropofftime']));
	$AddOnItem = $_POST['addonitem'];
	$Runner = "None";
	$Availability = "Null";
	
	
	$sql ="INSERT INTO carbooking(ReserveDate,StartDate,EndDate,PickUpPoint,DropOffPoint,Id,CarID,Price,Runner,PickUpTime,DropOffTime,Availability,AddOnItem) 
	VALUES ('$ReserveDate','$StartDate','$EndDate','$PickUpPoint','$DropOffPoint','$UserId','$CarId','$Price','$Runner','$PickupTime','$DropOffTIme','$Availability','$AddOnItem')";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	
		echo "<script type='text/javascript'>alert('Booking Successful!!')</script>";
		
		$sql = "SELECT BookingID from carbooking WHERE Id = '$UserId' AND StartDate = '$StartDate' AND EndDate = '$EndDate' AND CarID = '$CarId'";
		
		$result = mysqli_query($con,$sql);
		
		$row = mysqli_fetch_assoc($result);
		
		$_SESSION['invoiceNo'] = $row['BookingID'];
	
		echo $_SESSION ['invoiceNo'];
	}
	mysqli_close($con);
	
	 header("refresh:0.2; url='generateinvoice.php'");
?>