<?php
	session_start();
	$con = mysqli_connect('127.0.0.1','root','','selabdb');
	
	if(!$con)
		{
			die("Connection failed:".mysqli_connect_error());
		}
		
		$id = array_search("Delete",$_POST);
		
		$sql = "DELETE FROM maintanencerecord WHERE RecordID = $id ";
		
		if(!mysqli_query($con,$sql))
				{
					echo ' Delete fail';
				}
				else
				{
					echo "<script type='text/javascript'>alert('Record Deleted!')</script>";
					header("refresh:0.2; url='deletevehiclemaintanence.php'");
				}
?>