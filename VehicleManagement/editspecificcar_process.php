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
				$PerDayRate =$_POST['perdayrate'];
				$NoOfSeat =$_POST['noofseat'];
				
				if($_FILES["image"]["tmp_name"] == '')
				{
					$sql = "UPDATE vehiclelist SET Brand = '$Brand',Model='$Model',PlateNumber='$PlateNumber',
							PerDayRate='$PerDayRate',NoOfSeat='$NoOfSeat' WHERE CarID ='$ID'";
				}
				
				else
				{
					$Image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
					$sql ="UPDATE vehiclelist SET Brand= '$Brand',Model='$Model',PlateNumber='$PlateNumber',
				PerDayRate='$PerDayRate',NoOfSeat='$NoOfSeat',Image='$Image' WHERE CarID ='$ID'";
				}
				
				if(!mysqli_query($con,$sql))
				{
					echo "<script type='text/javascript'>alert('Update Failed!')</script>";
					header("refresh:0.1; url='editvehicles.php'");
				}
				
				else
				{
					echo "<script type='text/javascript'>alert('Update Successful!')</script>";
					header("refresh:0.1; url='editvehicles.php'");
				}
				mysqli_close($con);
				
	?>