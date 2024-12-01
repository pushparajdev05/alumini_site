<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["from"]);
header("location: /alumini_site/index.php");
?>