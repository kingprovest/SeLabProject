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
	$Password2 =$_POST['password2'];
	$AccessLevel = "User";
	$sql ="INSERT INTO register(FullName,Username,HpNo,EmailAddress,Password,AccessLevel) VALUES ('$FullName','$Username','$HpNo','$EmailAddress','$Password','$AccessLevel')";
	
	if($Password != $Password2)
	{
		echo "<script type='text/javascript'>alert('Password Entered Does Not Match!')</script>";
		header("refresh:2; url='../Registration/register.php'");
	}
	else
	{
		if(!mysqli_query($con,$sql))
		{
			echo ' Not inserting';
		}
		else
		{
		  echo "<script type='text/javascript'>alert('Registration Successfull!')</script>";
		}
		mysqli_close($con);
		header("refresh:0.2; url='../Login/login.php'");
	}
	
	
?>