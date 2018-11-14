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
	$PerDayRate =$_POST['perdayrate'];
	$NoOfSeat =$_POST['noofseat'];
	$Image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$sql ="INSERT INTO vehiclelist(Brand,Model,PlateNumber,PerDayRate,NoOfSeat,Image) VALUES ('$Brand','$Model','$PlateNumber','$PerDayRate','$NoOfSeat','$Image')";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	 echo "<script type='text/javascript'>alert('Successfully Added!')</script>";
	}
	mysqli_close($con);
	header("refresh:0.2; url='../AdminManagement/adminpage.php'");
?>