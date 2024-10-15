<?php
session_start();
unset($_SESSION["staff"]);
unset($_SESSION["from"]);
header("location: /alumini_site/index.php");
?>