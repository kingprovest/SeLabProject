<?php
	session_start();
	$con = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$con)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$id = array_search("Delete",$_POST);
		
		$sql = "DELETE FROM vehiclelist WHERE CarID = $id ";
		
		if(!mysqli_query($con,$sql))
				{
					echo "<script type='text/javascript'>alert('Vehicle Fail to Delete!')</script>";
					header("refresh:0.2; url='deletevehicle.php'");
				}
				else
				{
					echo "<script type='text/javascript'>alert('Vehicle Deleted!')</script>";
					header("refresh:0.2; url='deletevehicle.php'");
				}
?>