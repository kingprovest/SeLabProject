<?php
	session_start();
	$conn = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$conn)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$Username=$_POST['username'];
		$Password =$_POST['password'];
		
		$sql = "SELECT * FROM login WHERE Username='$Username' AND Password='$Password'";
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
			
			 $_SESSION['user'] =$row['Id'];
				
			header("refresh:2; url='carlist.php'");
			//echo $_SESSION['user'];
			//echo ("{$_SESSION['user']}"."<br />");
			//var_dump($_SESSION);

		}
?>