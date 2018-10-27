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
				
				$ID =$_POST['UserID'];			
				$AccessLevel =$_POST['accesslevel'];				
				
				$sql ="UPDATE register SET AccessLevel= '$AccessLevel' WHERE Id ='$ID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo "<script type='text/javascript'>alert('Update Success!')</script>";
					header("refresh:0.1; url='empAccessLevel.php'");
				}
				mysqli_close($con);
				
	?>