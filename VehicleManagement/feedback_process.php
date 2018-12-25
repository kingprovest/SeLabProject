<?php
			session_start();

				$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
				if(!$con)
				{
					echo 'Not Connected To Server';
				}
				
				if(!mysqli_select_db($con,'selabdb'))
				{
					
					echo'Database not selected';
				}
				
				$ID = $_SESSION['userID'];
				$Title = $_POST['title'];
				$Message = $_POST['message'];
				
				
				$sql ="INSERT INTO feedback(title,message,Id) VALUES ('$Title','$Message','$ID')";
				
				if(!mysqli_query($con,$sql))
				{
					echo ' Update fail';
				}
				else
				{
					echo "<script type='text/javascript'>alert('Feedback Submitted! Thanks for giving us feedback.')</script>";
					header("refresh:0.1; url='selectbrand.php'");
				}
				mysqli_close($con);
				
	?>
