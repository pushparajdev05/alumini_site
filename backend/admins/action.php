<?php
include "../config.php";
if(isset($_POST["admin_id"]))
{
    $admin = mysqli_real_escape_string($con,$_POST["admin_id"]);
    $pwd = mysqli_real_escape_string($con,$_POST["admin_pwd"]);
    $action = mysqli_real_escape_string($con,$_POST["id"]);
    if($action=='0')
    {
        try
        {
            $sql = "insert into admins values('{$admin}','{$pwd}')";
            if($con->query($sql))
            {
                echo 1;
            }
        }
        catch(Exception $e)
        {
                echo "The User is already existed ";
        }
    }
    else
    {
        $sql="select * from admins where id='{$admin}' and pwd='{$pwd}'";
            $res=$con->query($sql);
            // echo $res;
        if ($res->num_rows > 0) {
            $sql1 = "delete from admins where id='{$admin}' and pwd='{$pwd}'";
            try
            {
                if ($con->query($sql1)) {
                    echo 1;
                }
            }
            catch(Exception $e)
            {
                    echo "The Username is not deleted";
            }
        } else {
            echo "Enter correct Email and Password";
        }
       
    }
}
else
{
    echo "there is no admin_id variable";
}