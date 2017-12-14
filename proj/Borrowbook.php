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
                font-size: 24px;
            }
    </style>
    </head>
    <body>
        <center>
        <h2>Listing all available books:</h2>
        <?php
            session_start();
            $db=mysqli_connect('localhost','root','','hosteldatabase')
                or die('Error connecting to MySQL Server.');
            $borrower_usn=$_SESSION['login_id'];
            $sql="Select book_id,title,branch,topic,lender_usn,publisher from books where availability='y'";
            $result=$db->query($sql);
            if($result->num_rows>0)
            {   
                 echo '<table border=1>';
                 echo'<tr><td>book_id</td><td>title</td><td>branch</td><td>topic</td><td>publisher</td><td>len_usn</td></tr>';
                while($row=$result->fetch_assoc())
                {
                    $book_id=$row['book_id'];
                    $title=$row['title'];
                    $branch=$row['branch'];
                    $topic=$row['topic'];
                    $publisher=$row['publisher'];
                    $len_usn=$row['lender_usn'];
                    echo'<tr><td>'.$book_id.'</td><td>'.$title.'</td><td>'.$branch.'</td><td>'.$topic.'</td><td>'.$publisher.'</td><td>'.$len_usn.'</td></tr>';
                }
                echo '</table>';
            }
            else echo '0 results'
        ?>
        Enter The id of book you want to borrow:
        <form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="id" placeholder="book id">
                <input type="submit" name="borrow" value="Borrow">
        </form>
            <?php
                if(isset($_POST['borrow']))
                {
                    $borrower_usn=$_SESSION['login_id'];
                    $sql="select * from borrower";
                    $res=$db->query($sql);
                    $id=($res->num_rows);
                    $id++;
                     $book_id=$_POST['id'];
                    $sql="select lender_usn from books where book_id=$book_id";
                    $res=$db->query($sql);
                    $row=$res->fetch_assoc();
                    $lender_usn=$row['lender_usn'];
                    $borrow_date=date("Y-m-d");
                    $ret_date=date("Y-m-d");
                    $sql="Insert into borrower values($id,'$borrower_usn',$book_id,'$lender_usn','$borrow_date','$ret_date')";
                        if($db->query($sql))
                            echo 'Book Borrowed';
                    $sql="Update books set availability='n' where book_id=$book_id";
                    $db->query($sql);
                }
            ?>
        </center>
    </body>
</html>