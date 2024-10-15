<?php
session_start();
//
$_SESSION["admin"] = "admin";
header("location: /alumini_site/admin.php");
die();
?>