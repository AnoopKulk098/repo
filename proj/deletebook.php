<html>
	<head>
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
	<center><h1>All Book records</h1>
	<table border=1>
<?php
	$db=mysqli_connect('localhost','root','','hosteldatabase')
	or die('Error connecting to MySQL Server.');
	$sql="Select book_id,branch,topic,title,publisher,availability,lender_usn from books";
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
		<p>Enter the ID of book record to be deleted:</p><br />
		<form action="deletebook1.php" method="POST">
			<input type="text" name="delentry">
		</form>
		</center>
	</body>
</html>
