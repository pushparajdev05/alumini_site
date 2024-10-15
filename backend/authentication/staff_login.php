<?php
session_start();
//
$_SESSION["staff"] = "staff";
header("location: /alumini_site/staff.php");
die();
?>