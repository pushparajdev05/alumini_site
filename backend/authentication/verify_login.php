<?php
include "../config.php";
if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $sql="select * from temp_staff where token='{$token}'";
    $res = $con->query($sql);
     if ($res->num_rows > 0)
     {           
        if($row = $res->fetch_assoc())
        {
            $staff_email = $row["email"];
            $staff_pwd = $row["pwd"];
            $sql3 = "delete from staff where email='{$staff_email}'";
            $con->query($sql3);
            $sql1 = "insert into staff(email,pwd) values('{$staff_email}','{$staff_pwd}')";
            if($con->query($sql1))
            {
                $sql2 = "delete from temp_staff where token='{$token}'";
                $con->query($sql2);
                echo "Email successfully verified and staff has approved";
            }
        }

        
     }
     else{
        echo "the staff has already verified by administrator";
     }
 
}
else{
    echo "email verification has failed";
}
?>