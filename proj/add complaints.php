<?php
	session_start();

	$db = mysqli_connect('localhost','root','','hosteldatabase')
 	or die('Error connecting to MySQL server.');
	
	if(isset($_POST['submit']))
		echo "successful";
	$comp_id=$_POST['comp_id'];
	$type=$_POST['type'];
	$comp_date=$_POST['comp_date'];
	$critical=$_POST['critical'];
    $issuer_usn="Admin";
	$select = "INSERT INTO complaints VALUES ($comp_id,'$issuer_usn','$type','$comp_date','$critical')";
	$db->query($select);
?>

<html>
<head>
	<title>HOSTEL DATABASE</title>
	
	<style>
	body{
	
		background-image: url("dbms%20hostel.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
	     }
	</style>
	<center><h1> Complaint successfully registered</h1></center>
	<center><h1> Complaint ID : <?php echo $comp_id?></h1></center>
	<center><h1> Issuer USN : <?php echo $issuer_usn?></h1></center>
	<center><h1> Type : <?php echo $type?></h1></center>
    <center><h1> Complaint Date:<?php echo $comp_date?></h1></center>
    <center><h1> Critical :<?php echo $critical?></h1></center>
</head>
<body>
	<br><br><br><br><br><br>
	<center><a href="home.html"><button>GO BACK TO HOME</button></a></center>
</body>
</html>