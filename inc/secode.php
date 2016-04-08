<?php  
session_start();
require 'secode_class.php'; 
$vcode = new YL_Security_Secoder();
$vcode->entry();
?> 