<?php
session_start();
//
$_SESSION["login"] = "admin";
header("location: /alumini_site/admin.php?page=3");
die();
?>