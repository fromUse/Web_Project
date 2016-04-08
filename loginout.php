<?php
session_start();
unset($_SESSION['fy_user'],$_SESSION['fy_user_id']);
setcookie('user_ip','',time()-1);
setcookie('user_time','',time()-1);
$url=strtolower($_SERVER['HTTP_REFERER']);
if (stripos($url,'user')===false && stripos($url,'checkouts')===false){
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
else {
	header('Location: ./');
}
exit();
?>