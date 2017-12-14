<html>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<head>
        <style type="text/css">
        body{
            font-weight: bold;
            font-size: 32px;
            background-image: url("Solid-light-blue-wide-wallpaper.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
            color: black;
            
        }
        h1{
            color:black;
            font-size: 42px;
            font-weight: bold;
        }
    </style>
	</head>
	<body>
		<center>
			<h1>Login</h1>
			<form action="logincheck.php" method="POST">
				<br/>Login:
				<br/>ID :
				<input style="margin-right:190px" type="text" name="login_id" placeholder="Your USN">
				<br/>Password:
				<input style="margin-right:300px" type="password" name="pswd" placeholder="password">
				<br/><input type="submit" value="Login!">
			</form>
            <?php
                $db=mysqli_connect('localhost','root','','hosteldatabase')
	            or die('Error connecting to MySQL Server.');
                $sql="Select comp_id,comp_date,critical from complaints";
                $res=$db->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {   
                        $id=$row['comp_id'];
                        $tod=date("Y-m-d",time());
                        $todate=date_create($tod);
                        $issdate=$row['comp_date'];
                        $iss=date_create($issdate);
                        $crdiff=$todate->diff($iss)->format("%d");
                        $crdiffm=$todate->diff($iss)->format("%m");
                        if($crdiff>15||$crdiffm>1)
                        {   
                            $sql="update complaints set critical='y' where comp_id=$id";  
                        }
                        else 
                            $sql="update complaints set critical='n' where comp_id=$id";
                        $db->query($sql);
                    }
                }

            ?>
			
		</center>
	</body>
</html>