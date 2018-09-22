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
	$FullName =$_POST['fullname'];
	$Username =$_POST['username'];
	$HpNo =$_POST['phonenumber'];
	$EmailAddress =$_POST['emailaddress'];
	$Password =$_POST['password'];
	$sql ="INSERT INTO register(FullName,Username,HpNo,EmailAddress,Password) VALUES ('$FullName','$Username','$HpNo','$EmailAddress','$Password')";
	
	if(!mysqli_query($con,$sql))
	{
		echo ' Not inserting';
	}
	else
	{
	echo 'Inserted';
	}
	mysqli_close($con);
	header("refresh:2; url='../Login/login.php'");
?>