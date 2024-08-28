<?php 
	include "config.php";
	$sno=$_POST["sno"];
	$sql="delete from aluminis where sno='{$sno}'";
	if($con->query($sql)){
		echo true;
	}else{
		echo false;
	}
?>