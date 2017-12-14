<?php
			$db1=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$uptype=$_POST['uptype'];
			$usn=$_POST['usn'];
			$updation=$_POST['updation'];
			$sql1="Update student set $uptype='$updation' where usn='$usn'";
			if($db1->query($sql1)==true)
				echo "Record updated successfully";
			else
				echo "Failed to update record";
				$db1->close();
					?>