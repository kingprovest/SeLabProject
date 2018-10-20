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
				
				$ID =$_POST['CarID'];
				$Brand =$_POST['brand'];
				$Model =$_POST['model'];
				$PlateNumber =$_POST['platenumber'];
				$PerHourRate =$_POST['perhourrate'];
				$PerDayRate =$_POST['perdayrate'];
				$NoOfSeat =$_POST['noofseat'];
				$ImagePath =$_POST['imagepath'];
				
				$sql ="UPDATE vehiclelist SET Brand= '$Brand',Model='$Model',PlateNumber='$PlateNumber',
				PerHourRate='$PerHourRate',PerDayRate='$PerDayRate',NoOfSeat='$NoOfSeat',ImagePath='$ImagePath' WHERE CarID ='$ID'";
				
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo "<script type='text/javascript'>alert('Update Success!')</script>";
					header("refresh:0.1; url='editvehicles.php'");
				}
				mysqli_close($con);
				
	?>