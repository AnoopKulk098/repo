<?php
			$db1=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$uptype=$_POST['uptype'];
			$bid=$_POST['bid'];
			$updation=$_POST['updation'];
			$sql1="Update books set $uptype='$updation' where book_id='$bid'";
			if($db1->query($sql1)==true)
				echo "Record updated successfully";
			else
				echo "Failed to update record";
				$db1->close();
					?>