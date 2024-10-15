<?php
include "../config.php";
if(isset($_POST["admin_id"]))
{
    $admin = mysqli_real_escape_string($con,$_POST["admin_id"]);
    $action = mysqli_real_escape_string($con,$_POST["id"]);
    if($action=='0')
    {
        $sql = "insert into admins values('{$admin}')";
        if($con->query($sql))
        {
            echo "admin has added to firebase auth and admin database";
        }
        else{
            echo $con->error;
        }
    }
    else
    {
        $sql = "delete from admins where='{$admin}'";
        if($con->query($sql))
        {
            echo "admin has deleted from firebase auth and admin database";
        }
        else{
            echo "false";
        }
    }
}
else
{
    echo "there is no admin_id variable";
}