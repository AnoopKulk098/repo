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
		<center><h1>Update Complaint</h1>
		<table border=1></center>
	</head>	
	<?php
		$db=mysqli_connect("localhost","root","","hosteldatabase")
		or die("Error connecting to MySQL");
		$sql="Select comp_id,issuer_usn,type,comp_date,critical from complaints";
		$result=$db->query($sql);
		if($result->num_rows>0){
		
		echo "<tr><td>comp_id</td><td>issuer_usn</td><td>type</td><td>comp_date</td><td>critical</td></tr>";
		while($row=$result->fetch_assoc())
		{
			$comp_id=$row['comp_id'];
			$type=$row['type'];
			$issuer_usn=$row['issuer_usn'];
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
	<body>
		<center><form action="updatecomplaint1.php" method="POST">
			Select the attribute to be updated:<br />
			<select name="uptype">	
				<option name="comp_id">Comp_ID</option>
				<option name="issuer_usn">Issuer_USN</option>
				<option name="type">Type</option>
				<option name="comp_date">Comp_Date</option>
				<option name="critical">Critical</option>				
			</select><br/>
			Enter the ID of record to be updated:<br />
			<input type="text" name="id"><br/>
			Enter the updated value of the selected attribute:<br />
			<input type="text" name="updation"><br />
			<button type="submit">Submit</button>
		</form></center>
	</body>
</html>