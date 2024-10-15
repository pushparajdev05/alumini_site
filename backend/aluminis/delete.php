<?php 
    include "../config.php";
	$action=$_POST["action"];
	$sql="delete from aluminis where sno='{$action}'";
$sql1 = "select img_path from aluminis where sno='{$action}'";
$res=$con->query($sql1);
if ($res->num_rows > 0) {
	$row = $res->fetch_assoc();
	$target_img = "aluminis_img/". basename($row["img_path"]);

	if (file_exists($target_img)) {
		if (unlink($target_img)) {
			if ($con->query($sql)) {
				echo "1";
			} else {
				echo "0";
			}
		}
	} else {
		echo "image has not deleted from server " . $target_img;
	}
}
?>