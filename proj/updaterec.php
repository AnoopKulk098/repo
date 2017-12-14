<html>
	<head>
	<style type="text/css">
        body{
            font-size: 32px;
            background-image: url("bluebkg.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: black;
            
        }
        h2{
            color:black;
            font-size: 42px;
        }
    </style>
		<center><h1>Update Profile</h1>
		<table border=1></center>
	</head>	
	<?php
		$db=mysqli_connect("localhost","root","","hosteldatabase")
		or die("Error connecting to MySQL");
		$sql="Select name,usn,year,branch,unit_no,room_no,phone_no from student";
		$result=$db->query($sql);
		if($result->num_rows>0){
            echo "<tr><td>name</td><td>usn</td><td>branch</td><td>year</td><td>unit_no</td><td>room_no</td><td>phone_no</td></tr>";
			while($row=$result->fetch_assoc())
			{
				$name=$row['name'];
				$usn=$row['usn'];
				$year=$row['year'];
				$branch=$row['branch'];
				$unit_no=$row['unit_no'];
				$room_no=$row['room_no'];
				$phone_no=$row['phone_no'];
				echo "<tr><td>".$name."</td><td>".$usn."</td><td>".$branch."</td><td>".$year."</td><td>".$unit_no."</td><td>".$room_no."</td><td>".$phone_no."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
		echo "0 Results";
		}
		$db->close();	
	?>
	<body>
		<center><form action="updaterec1.php" method="POST">
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
			Enter the usn of record to be updated:<br />
			<input type="text" name="usn"><br/>
			Enter the updated value of the selected attribute:<br />
			<input type="text" name="updation"><br />
			<button type="submit">Submit</button>
		</form></center>
	</body>
</html>