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
	$Brand =$_POST['brand'];
	$Model =$_POST['model'];
	$PlateNumber =$_POST['platenumber'];
	$PerHourRate =$_POST['perhourrate'];
	$PerDayRate =$_POST['perdayrate'];
	$NoOfSeat =$_POST['noofseat'];
	$ImagePath =$_POST['imagepath'];
	$sql ="INSERT INTO vehiclelist(Brand,Model,PlateNumber,PerHourRate,PerDayRate,NoOfSeat,ImagePath) VALUES ('$Brand','$Model','$PlateNumber','$PerHourRate','$PerDayRate','$NoOfSeat','$ImagePath')";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	echo 'Inserted';
	}
	mysqli_close($con);
	header("refresh:2; url='../AdminManagement/adminpage.php'");
?>