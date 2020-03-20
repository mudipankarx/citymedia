<?php 
session_start();
unset($_SESSION["admin_id"]);
unset($_SESSION["uname"]);
header('Location: admin_login.php');
?>