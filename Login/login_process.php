<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$conn)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$Username=$_POST['username'];
		$Password =$_POST['password'];
		
		$sql = "SELECT * FROM register WHERE Username='$Username' AND Password='$Password'";
		//echo $sql;
		$result = mysqli_query($conn, $sql);
		if(!$row = mysqli_fetch_assoc($result))
		{
			echo "<script type='text/javascript'>alert('Login failed! Please Retry')</script>";
			$_SESSION=array(); //unset data
			session_destroy();			
			header("refresh:3; url='login.php'");
		}
		else
		{
			
			 $_SESSION['user'] =$row['Username'];
			 $_SESSION['userID'] = $row['Id'];
			 $_SESSION['accesslevel'] = $row['AccessLevel'];
			if ($_SESSION['accesslevel']== "Manager")
			{
				 header("refresh:2; url='../AdminManagement/managerpage.php'");
			}
			else if($_SESSION['accesslevel']== "Employee")
			{
				header("refresh:2; url='../AdminManagement/adminpage.php'");
			}
			else{
				header("refresh:2; url='../VehicleManagement/selectbrand.php'");
			}
			 
			 echo $_SESSION['user'];
			

		}
?>