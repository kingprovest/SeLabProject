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
	$Date = $_POST['date'];
	$Description = $_POST['description'];
	$Cost = $_POST['cost'];
	$Attachment = addslashes(file_get_contents($_FILES["attachment"]["tmp_name"]));
	$CarID = $_POST['CarID']; 
	$sql = "INSERT INTO maintanencerecord(Date,Description,Cost,Attachment,CarID) VALUES ('$Date','$Description','$Cost','$Attachment','$CarID')";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	  echo "<script type='text/javascript'>alert('Record Inserted!')</script>";
	}
	mysqli_close($con);
	header("refresh:0.2; url='../VehicleManagement/vehiclemaintanence.php'");
?>