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
					echo ' Delete fail';
				}
				else
				{
					echo 'Vehicle Deleted';
					header("refresh:2; url='../VehicleManagement/deletevehicle.php'");
				}
?>