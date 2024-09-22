<?php 
    include "../config.php";
	$action=$_POST["action"];
	$sql="delete from contributions where sno='{$action}'";
	if($con->query($sql)){
		echo true;
	}
	else
	{
		echo false;
	}
?>