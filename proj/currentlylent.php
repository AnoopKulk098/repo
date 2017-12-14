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
		table{
			color:black;
			font-size:24px;
		}
    </style>
	</head>
	<body>
		<center>
		<h2>Your currently lent books are:</h2>
		<?php
			session_start();
					$db=mysqli_connect('localhost','root','','hosteldatabase')
						or die('Error connecting to MySQL Server.');
					$lender_id=$_SESSION['login_id'];
					$sql="Select book_id,branch,topic,title,publisher,availability from books where lender_usn='$lender_id'";
					$result=$db->query($sql);
						echo '<table border=1>';
					if($result->num_rows>0){
						echo"<tr><td>Book ID</td><td>Branch</td><td>Topic</td><td>Title</td><td>Publisher</td><td>Availability</td><tr>";
						while($row=$result->fetch_assoc())
						{
							$book_id=$row['book_id'];
							$branch=$row['branch'];
							$topic=$row['topic'];
							$title=$row['title'];
							$publisher=$row['publisher'];
							$availability=$row['availability'];
							echo "<tr><td>".$book_id."</td><td>".$branch."</td><td>".$topic."</td><td>".$title."</td><td>".$publisher."</td><td>".$availability."</td></tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "0 Results";
					}
		?>
		<center>
	</body>
</html>