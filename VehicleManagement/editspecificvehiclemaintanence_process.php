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
				
				$Date =$_POST['date'];
				$Description =$_POST['description'];
				$Cost =$_POST['cost'];
				$Attachment =addslashes(file_get_contents($_FILES["attachment"]["tmp_name"]));
				$CarID =$_POST['CarID']; 
				
				$sql ="UPDATE maintanencerecord SET Date= '$Date',Description='$Description',Cost='$Cost',
				Attachment='$Attachment' WHERE CarID ='$CarID'";
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo "<script type='text/javascript'>alert('Update Success!')</script>";
					header("refresh:0.1; url='editvehiclemaintanence.php'");
				}
				mysqli_close($con);
				
	?>