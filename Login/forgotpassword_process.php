<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$conn)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$Username=$_POST['username'];
		$Password =$_POST['password'];
		
		$sql = "UPDATE register SET Password = '$Password' WHERE Username ='$Username'";
		
		
		if(!mysqli_query($conn,$sql))
		{
		
			echo "<script type='text/javascript'>alert('Password Reset Failed! Please Retry')</script>";						
			header("refresh:3; url='forgotpassword.php'");
		}
		else
		{
			
			header("refresh:0.1; url='login.php'");
			echo "<script type='text/javascript'>alert('Password Successfully Reseted!')</script>";		
			
		}
			

		mysqli_close($conn);
?>