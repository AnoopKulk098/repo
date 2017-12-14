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
	</head>
	<body>
		<?php
			session_start();
			$db=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$var=$_SESSION['login_id'];
			$sql="Select name,usn,year,branch,unit_no,room_no,phone_no from student where usn='$var'";
			$result=$db->query($sql);
			$row=$result->fetch_assoc();
				$name=$row['name'];
				$usn=$row['usn'];
				$year=$row['year'];
				$branch=$row['branch'];
				$unit_no=$row['unit_no'];
				$room_no=$row['room_no'];
				$phone_no=$row['phone_no'];
		?>
		<h2><center>Details
			Name:     <?php echo $name; ?><br>
			USN:      <?php echo $usn; ?><br>
			Year:     <?php echo $year; ?><br>
			Branch:   <?php echo $branch; ?><br>
			Unit No.: <?php echo $unit_no; ?><br>
			Room No.: <?php echo $room_no; ?><br>
			Phone No.:<?php echo $phone_no; ?><br>
            </center>
		</h2>
	</body>
</html>