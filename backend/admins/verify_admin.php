<?php
include "../config.php";
if (isset($_POST["admin_email"])) {
    $admin = mysqli_real_escape_string($con, $_POST["admin_email"]);
    $pwd = mysqli_real_escape_string($con, $_POST["admin_pwd"]);
        $sql="select * from admins where id='{$admin}' and pwd='{$pwd}'";
            $res=$con->query($sql);
            // echo $res;
            if ($res->num_rows > 0) {
                echo "1";
            }
            else{
                echo "0";
            }
}
?>