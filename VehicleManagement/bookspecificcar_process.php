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
	$Price =$_POST['price'];
	$UserId = $_SESSION['userID']; 
	$CarId = $_SESSION['carID'];
	
	$sql ="INSERT INTO carbooking(StartDate,EndDate,PickUpPoint,Id,CarID,Price) VALUES ('$StartDate','$EndDate','$PickUpPoint','$UserId','$CarId',$Price)";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	echo 'Inserted';
	}
	mysqli_close($con);
	 header("refresh:2; url='bookcar.php'");
?>