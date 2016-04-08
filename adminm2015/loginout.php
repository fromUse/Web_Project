<?php
session_start();
$_SESSION['admin_user']='';
$_SESSION['admin_time']='';
header('Location: login.php');
exit();
?>