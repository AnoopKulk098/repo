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
		<center>
			<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				Enter the Details of book you want to lend:
				<br/>Title of the book:
				<input type="text" name="title" placeholder="Title">
				<br/>Branch:
				<input type="text" name="branch" placeholder="Branch it falls into">
				<br/>Topic:
				<input type="text" name="topic" placeholder="Topic the book is about">
				<br/>Publisher:
				<input type="text" name="publisher" placeholder="Author or publisher of book">
				<br/><input type="submit" name="submit" value="Lend book">
			</form>
			<?php
					session_start();
					$db=mysqli_connect('localhost','root','','hosteldatabase')
						or die('Error connecting to MySQL Server.');
					$lender_id=$_SESSION['login_id'];
					if(isset($_POST['submit']))
					{
						$sql="Select * from books";
						$result=$db->query($sql);
						$id=($result->num_rows);
						$id++;
						$branch=$_POST['branch'];
						$topic=$_POST['topic'];
						$title=$_POST['title'];
						$publisher=$_POST['publisher'];
						$sql="Insert into books values($id,'$branch','$topic','$title','$publisher','y','$lender_id')";
						if($db->query($sql))
							echo 'Book up lending';
														
					}
					
			?>
		</center>
	</body>
</html>