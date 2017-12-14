<html>
	<head>
	 <style type="text/css">
        body{
            font-size: 32px;
            background-image: url("orangebkg.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: black;
            
        }
        h2{
            color: black;
            font-size: 42px;
        }
    </style>
	<center><h1>All Student records</h1>
	<table border=1>
<?php
	$db=mysqli_connect('localhost','root','','hosteldatabase')
	or die('Error connecting to MySQL Server.');
	$sql="Select comp_id,issuer_usn,type,comp_date,critical from complaints";
	$result=$db->query($sql);
	if($result->num_rows>0){
		echo "<tr><td>comp_id</td><td>issuer_usn</td><td>type</td><td>comp_date</td><td>critical</td></tr>";
		
while($row=$result->fetch_assoc())
{
	$comp_id=$row['comp_id'];
	$type=$row['type'];
	$comp_date=$row['comp_date'];
	$critical=$row['critical'];
	$issuer_usn=$row['issuer_usn'];
	echo "<tr><td>".$comp_id."</td><td>".$issuer_usn."</td><td>".$type."</td><td>".$comp_date."</td><td>".$critical."</td></tr>";
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
	</head>
	<body>
		<center>
		<p>Enter the ID of record to be deleted:</p><br />
		<form action="deletecomp1.php" method="POST">
			<input type="text" name="delentry">
		</form>
		</center>
	</body>
</html>