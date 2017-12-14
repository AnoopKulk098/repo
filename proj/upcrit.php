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
            if($crdiff>15)
            {   
                $sql="update complaints set critical='y' where comp_id=$id";  
            }
            else 
             $sql="update complaints set critical='n' where comp_id=$id";
                $db->query($sql);
        }
    }

?>