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
        </style></head>
	<center><h1>All Student records</h1>
	<table border=1>
<?php
	$db=mysqli_connect('localhost','root','','hosteldatabase')
	or die('Error connecting to MySQL Server.');
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
	else{
		echo "0 Results";
	}
	$db->close();
?>
		<title>Hostel Database</title>
		</center>
	
	<body>
		<center>
		<p>Enter the name of student whose record is to be deleted:</p><br />
		<form action="deleterec1.php" method="POST">
			<input type="text" name="delentry">
		</form>
		</center>
	</body>
</html>
