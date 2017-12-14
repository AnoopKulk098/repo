<html>
	<head>
	<title>Hostel database</title>
	<style type="text/css">
        body{
            font-size: 32px;
            background-image: url("booksimg2.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: snow;
            
        }
        h2{
            color: snow;
            font-size: 42px;
        }
    </style>
	<center>
	<h1>Books Database</h1>
	<h2>Sorting By:<?php echo $_POST['sorter'];?></h2>
	<table border=1>
	<?php
		$db=mysqli_connect("localhost","root","","hosteldatabase")
		or die("Error connecting to MySQL");
		$var=$_POST['sorter'];
			$sql="Select book_id,branch,topic,title,publisher,availability,lender_usn from books order by $var";
		
		$result=$db->query($sql);
		if($result->num_rows>0){
            echo "<tr><td>book_id</td><td>branch</td><td>topic</td><td>title</td><td>publisher</td><td>availability</td><td>lender_usn</td></tr>";
			while($row=$result->fetch_assoc())
			{
				$book_id=$row['book_id'];
				$branch=$row['branch'];
				$topic=$row['topic'];
				$title=$row['title'];
				$publisher=$row['publisher'];
				$availability=$row['availability'];
				$lender_usn=$row['lender_usn'];
				echo "<tr><td>".$book_id."</td><td>".$branch."</td><td>".$topic."</td><td>".$title."</td><td>".$publisher."</td><td>".$availability."</td><td>".$lender_usn."</td></tr>";
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
				<option name="book_id">Book_ID</option>
				<option name="branch">Branch</option>
				<option name="topic">Topic</option>
				<option name="title">Title</option>
				<option name="publisher">Publisher</option>
				<option name="availability">Availability</option> 
				<option name="lender_usn">Lender_USN</option>
			</select>
			<input type="submit" value="GO!">
		</form></center>
	</body>
</html>