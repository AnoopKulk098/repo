<?php
				session_start();
				$db=mysqli_connect('localhost','root','','hosteldatabase')
				or die('Error connecting to MySQL Server.');
				$login_id=$_POST['login_id'];
				$pass=$_POST['pswd'];
                if($login_id=="root"&&$pass==1221)
                    echo '<script type="text/javascript">location.href="home.html";</script>';
				$sql="Select usn from student where usn='$login_id' and pin=$pass";
				$result=$db->query($sql);
				if($result->num_rows>0){
                    
					   echo '<script type="text/javascript">location.href="studentoptions.php";</script>';}
				else
					echo 'cannot login'; 
				$_SESSION['login_id']=$login_id;
				
			?>