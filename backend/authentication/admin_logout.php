<?php
session_start();
unset($_SESSION["admin"]);
unset($_SESSION["from"]);
header("location: /alumini_site/index.php");
?>