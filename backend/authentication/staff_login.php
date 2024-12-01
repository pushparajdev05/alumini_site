<?php
session_start();
//
$_SESSION["login"] = "staff";
header("location: /alumini_site/staff.php?page=4");
die();
?>