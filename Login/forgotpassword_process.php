<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$conn)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$Password =$_POST['password'];
		$NewPassword =$_POST['newpassword'];
		
		$sql2 = "SELECT Password FROM register WHERE Id =".$_SESSION['userID']." AND Password = '$Password'";
		
		
		
		if(!mysqli_query($conn,$sql2))
		{
		
			echo "<script type='text/javascript'>alert('Old password didn't match')</script>";						
			header("refresh:3; url='forgotpassword.php'");
		}
		else
		{
			$sql1 = "UPDATE register SET Password = '$NewPassword' WHERE Id =".$_SESSION['userID']."";
			if(!mysqli_query($conn,$sql1))
			{
				header("refresh:0.1; url='forgotpassword.php'");
				echo "<script type='text/javascript'>alert('Change Password Failed')</script>";		
			}
			
			else 
			{
				echo "<script type='text/javascript'>alert('Password Successfully Reset!')</script>";	
								
				header("refresh:0.1; url='forgotpassword.php'");
			}
			
			
		}
			

		mysqli_close($conn);
?>