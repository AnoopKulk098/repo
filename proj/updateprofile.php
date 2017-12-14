<html>
	<head>
	<style type="text/css">
        body{
            font-size: 24px;
            background-image: url("bluebkg.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: black;
            
        }
        h2{
            color:black;
            font-size: 36px;
        }
    </style>
		<center><h1>Update Profile</h1>
		
	</head>	
	<?php
		session_start();
		$db=mysqli_connect("localhost","root","","hosteldatabase")
		or die("Error connecting to MySQL");
		$var=$_SESSION['login_id'];
		$sql="Select name,usn,year,branch,unit_no,room_no,phone_no from student where usn='$var'";
		$result=$db->query($sql);
		if($result->num_rows>0){
			$row=$result->fetch_assoc();
			$name=$row['name'];
			$usn=$row['usn'];
			$year=$row['year'];
			$branch=$row['branch'];
			$unit_no=$row['unit_no'];
			$room_no=$row['room_no'];
			$phone_no=$row['phone_no'];
		}
		
	?>
	<body>
		<br/><h2><center>Your Details
			<br/>Name:     <?php echo $name; ?>
			<br/>USN:      <?php echo $usn; ?>
			<br/>Year:     <?php echo $year; ?>
			<br/>Branch:   <?php echo $branch; ?>
			<br/>Unit No.: <?php echo $unit_no; ?>
			<br/>Room No.: <?php echo $room_no; ?>
			<br/>Phone No.:<?php echo $phone_no; ?>
			</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				Select the attribute to be updated:<br />
				<select name="uptype">	
					<option name="name">Name</option>
					<option name="usn">USN</option>
					<option name="year">Year</option>
					<option name="branch">Branch</option>
					<option name="unit_no">Unit_No</option>
					<option name="room_no">Room_No</option>
					<option name="phone_no">Phone_No</option>					
				</select><br/>
				Enter the updated value of the selected attribute:<br />
				<input type="text" name="updation"><br />
				<input type="submit" name="submit" value="Submit">
			</form>
			<?php
				if(isset($_POST['submit']))
				{
					$uptype=$_POST['uptype'];
					$updation=$_POST['updation'];
					$sql1="Update student set $uptype='$updation' where usn='$var'";
					if($db->query($sql1)==true)
						echo "Record updated successfully";
					else
						echo "Failed to update record";
				}
			?>
		</center>
	</body>
</html>