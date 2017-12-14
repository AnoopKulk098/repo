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
			<h1>Enter the complaint details:</h1>	
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<br/>
				Select the type of complaint:
				<fieldset id="ctype" name="ctype">
					<input type="radio" name="ctype" value="Plumbing">Plumbing</br>
					<input type="radio" name="ctype" value="Electrical">Electrical</br>
					<input type="radio" name="ctype" value="Hygiene">Hygiene</br>
					<input type="radio" name="ctype" value="Facilities">Facilities<br/>
					<input type="radio" name="ctype" value="Miscellaneous">Miscellaneous<br/>
				</fieldset>
				<br/><input type="checkbox" name="optional"><abbr title="Tick checkbox in case description is to be added">Optional Description of Complaint</abbr>
				<br/>Enter optional description of complaint:<br/>
				<input type="text-area" name="dscp" placeholder="details of complaint">
				<br/><input type="submit" name="Submit" value="Issue Complaint">
			</form>
			<?php
				session_start();
				$db = mysqli_connect('localhost','root','','hosteldatabase')
 				or die('Error connecting to MySQL server.');
				$login_id=$_SESSION['login_id'];
				if(isset($_POST['Submit']))
				{
					$issuer_id=$login_id;
					$sql="select * from complaints";
					$result=$db->query($sql);
					$comp_id=($result->num_rows);
					$comp_id=$comp_id+1;
					if(!isset($_POST['ctype']))
					{
						echo'<script type="text/javascript">location.href="issuecomp.php";</script>';
					}
					else
					{
						$type=$_POST['ctype'];
						$c_date=date("Y-m-d");
					
						$sql="Insert into complaints values($comp_id,'$issuer_id','$type','$c_date','n')";
						if($db->query($sql))
						{
							echo "complaint registered on $c_date";	
						}
						else echo "unsuccessful";
						if(isset($_POST['optional']))
						{
							$dscp=$_POST['dscp'];
							$sql="Insert into comp_details values($comp_id,'$issuer_id','$dscp')";
							if($db->query($sql))
							{
								echo 'optional description sent';
							}
						}
					}
				}
			?>
			</center>
	</body>
</html>	
	