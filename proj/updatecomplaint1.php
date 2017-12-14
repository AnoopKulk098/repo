<?php
			$db1=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$uptype=$_POST['uptype'];
			$id=$_POST['id'];
			$updation=$_POST['updation'];
			$sql1="Update complaints set $uptype='$updation' where comp_id='$id'";
			if($db1->query($sql1)==true)
				echo "Record updated successfully";
			else
				echo "Failed to update record";
				$db1->close();
					?>