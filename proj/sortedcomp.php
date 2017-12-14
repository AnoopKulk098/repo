<html>
	<head>
	<title>Hostel database</title>
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
	<center>
	<h1>Complaint Database</h1>
	<h2>Sorting By:<?php echo $_POST['sorter'];?></h2>
	<table border=1>
	<?php
		$db=mysqli_connect("localhost","root","","hosteldatabase")
		or die("Error connecting to MySQL");
		$var=$_POST['sorter'];
			$sql="Select comp_id,issuer_usn,type,comp_date,critical from complaints order by $var";
		
		$result=$db->query($sql);
		if($result->num_rows>0){
            echo "<tr><td>comp_id</td><td>issuer_usn</td><td>type</td><td>comp_date</td><td>critical</td></tr>";
			while($row=$result->fetch_assoc())
			{	
				$issuer_usn=$row['issuer_usn'];
				$comp_id=$row['comp_id'];
				$type=$row['type'];
				$comp_date=$row['comp_date'];
				$critical=$row['critical'];
				echo "<tr><td>".$comp_id."</td><td>".$issuer_usn."</td><td>".$type."</td><td>".$comp_date."</td><td>".$critical."</td></tr>";
			}
			echo "</table>";
		}
		else
		{
		echo "0 Results";
		}
		$db->close();	
?>
</center>
</head>
	<body>
		<br />
		<center><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			Sort By:
			<select name="sorter">
				<option name="comp_id">Comp_ID</option>
				<option name="issuer_usn">Issuer_usn</option>
				<option name="type">Type</option>
				<option name="comp_date">Comp_date</option>
				<option name="critical">Critical</option>
			</select>
			<input type="submit" value="GO!">
		</form></center>
	</body>
</html>	