<?php
			$db1=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$entry=$_POST['delentry'];
			$sql1="Delete from complaints where comp_id='$entry'";
			if($db1->query($sql1)==true)
				echo "Record deleted successfully";
			else
				echo "Failed to delete record";
				$db1->close();
					?>