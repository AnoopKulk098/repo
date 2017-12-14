<html>
	<head>
        <title>Hostel Database</title>
         <style type="text/css">
        body{
            font-size: 32px;
            background-image: url("backgrnd.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: chocolate;
            
        }
        h1{
            color: black;
            font-size: 36px;
        }
                .nav {
			
margin: 7px;
height: 350px;    
}
      
.nav a:hover {
    background-color: #4CAF50;
    color: black;
}

.nav a {
    padding: 14px 16px;
float: left;
    display: block;
    color: white;
    text-align: center;
 
    text-decoration: none;
}
    </style>
		
	</head>
	<body><center>
		<?php
			session_start();
			$db=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
			$var=$_SESSION['login_id'];
			//unset($_SESSION['login_id']); 
			$sql="Select name from student where usn='$var'";
			$res=$db->query($sql);
			$row=$res->fetch_assoc();
			?>
            <div class="nav">
			<h1>Hello <?php echo $row['name']?>
			What do you want to do?</h1><br>
			<a href="viewprofile.php">View Your Profile</a><br><br>
			<a href="issuecomp.php">Issue a complaint</a><br><br>
			<a href="booklend.php">Lend a Book</a><br><br>
			<a href="currentlylent.php">View Currently Lent Books</a><br><br>
                <a href="Borrowbook.php">Borrow a Book</a><br><br>
                <a href="currentlyborrowed.php">View Currently Borrowed Books</a><br><br>
			<a href="updateprofile.php">Update Profile</a><br><br>
			<a href="updatepin.php">Change Password</a><br><br>
        </div>
        
		</center>
	</body>
</html>