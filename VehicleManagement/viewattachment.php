<?php
	
	if(isset($_POST['Submit']))
	{
		$record = $_POST['id'];
		
		$con=mysqli_connect('127.0.0.1','root','', 'selabdb');
		
		if(!$con)
		{
			echo 'Not Connected To Server';
		}
				
		if(!mysqli_select_db($con,'selabdb'))
		{
			echo'Database not selected';
		}
				
		$sql="SELECT Attachment FROM maintanencerecord WHERE RecordID = '$record'";
		
		$result = mysqli_query($con,$sql);
		
		$row = mysqli_fetch_assoc($result);
		
	?>	<img src="data:image/jpg;base64,<?php echo base64_encode($row['Attachment']); ?>" > <?php
	}
?>