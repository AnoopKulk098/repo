<?php
	session_start();

	$db = mysqli_connect('localhost','root','','hosteldatabase')
 	or die('Error connecting to MySQL server.');
	
	if(isset($_POST['submit']))
		echo "successful";
	$name=$_POST['Name'];
	$usn=$_POST['usn'];
	$yr=$_POST['yr'];
	$branch=$_POST['branch'];
	$uno=$_POST['uno'];
	$roomno=$_POST['roomno'];
	$phoneno=$_POST['phoneno'];
	$pin=$_POST['pin'];
	
	$select = "INSERT INTO student VALUES ('$name','$usn','$yr','$branch','$uno','$roomno','$phoneno','$pin')";
	$db->query($select);
	
?>

<html>
<head>
	<title>HOSTEL DATABASE</title>
	<style type="text/css">

	h1{
		text-shadow: 2px 2px 2px black;
	}
	body{
		color: #8ebdbb;
		background-image: url("dbms%20hostel.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
	     }
	</style>
	<center><h1> student record added successfully</h1></center>
	<center><h1> Student NAME : <?php echo $name?></h1></center>
	<center><h1> Student USN : <?php echo $usn?></h1></center>
    <center><h1> Student YEAR:<?php echo $yr?></h1></center>
    <center><h1> Student BRANCH :<?php echo $branch?></h1></center>
    <center><h1> Student UNIT NO:<?php echo $uno?></h1></center>
    <center><h1> Student ROOM NO:<?php echo $roomno?></h1></center>
    <center><h1> Student PHONE NO :<?php echo $phoneno?></h1></center>
	
</head>
<body>
	<br><br><br><br><br><br>
	<center><a href="home.html"><button>GO BACK TO HOME</button></a></center>
</body>
</html>