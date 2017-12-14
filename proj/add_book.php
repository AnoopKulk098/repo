<?php
	session_start();

	$db = mysqli_connect('localhost','root','','hosteldatabase')
 	or die('Error connecting to MySQL server.');
	
	if(isset($_POST['submit']))
		echo "successful";
	$book_id=$_POST['book_id'];
	$branch=$_POST['branch'];
	$topic=$_POST['topic'];
	$title=$_POST['title'];
	$publisher=$_POST['publisher'];
	$availability=$_POST['availability'];
	$lender_usn=$_POST['lender_usn'];
	
	$select = "INSERT INTO books VALUES ('$book_id','$branch','$topic','$title','$publisher','$availability','$lender_usn')";
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
	<center><h1> Book record added successfully</h1></center>
	<center><h1> Book ID : <?php echo $book_id?></h1></center>
	<center><h1> Branch : <?php echo $branch?></h1></center>
    <center><h1> Topic:<?php echo $topic?></h1></center>
    <center><h1> Title :<?php echo $title?></h1></center>
    <center><h1> Publisher:<?php echo $publisher?></h1></center>
    <center><h1> Availability:<?php echo $availability?></h1></center>
    <center><h1> Lender USN :<?php echo $lender_usn?></h1></center>
	
</head>
<body>
	<br><br><br><br><br><br>
	<center><a href="home.html"><button>GO BACK TO HOME</button></a></center>
</body>
</html>