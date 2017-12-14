<html>
	<head>
        <style type="text/css">
        body{
            font-size: 32px;
            background-image: url("Solid-light-blue-wide-wallpaper.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: black;
            
        }
        h2{
            color:black;
            font-size: 42px;
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
	<body>
		<center><h2>
            <div class="nav">
            
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="POST">
			Enter the old password:
			<input type="password" name="oldpin" placeholder="enter old pin">
			<br/>Enter the new password:
			<input type="password"  name="newpin" placeholder="enter new pin">
			<br/>Renter the new password:
			<input type="password" name="confirmpin" placeholder="re-enter new pin">
			<input type="submit" name="submit" value="go!">
			</form>
                </div>
			<?php	
				session_start();
				$db=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
				$var=$_SESSION['login_id'];
				if(isset($_POST['submit']))
				{	
					$oldpin=$_POST['oldpin'];
					$newpin=$_POST['newpin'];
					$confirmpin=$_POST['confirmpin'];
					$sql="Select pin from student where usn='$var'";
					$result=$db->query($sql);
					$row=$result->fetch_assoc();
					if($row['pin']==$oldpin)
					{	
						if($newpin==$confirmpin)
						{	
							$sql1="update student set pin=$newpin where usn='$var'";
							if($result=$db->query($sql1))
								echo 'successfully changed';
						}
						else{
							echo 'failure...pin reentered incorrectly';
						}
					}		
					else
					{
						echo 'old password entered incorrectly';
					}
					
				}	
			?>
		</h2></center>
	</body>
</html>