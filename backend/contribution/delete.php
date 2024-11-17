<?php 
    include "../config.php";
	$action=$_POST["action"];
	$sql="delete from contributions where sno='{$action}'";
	if($con->query($sql)){
		echo 0;
	}
	else
	{
		echo "Something went wrong while deleting, the error is : ".$con->error;
	}
?>