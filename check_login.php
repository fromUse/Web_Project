<?php
if ($_POST['u_auto']==1) session_set_cookie_params(3600*24*365);
require 'conn.php';
require 'config.php';
require 'inc/function.php';

if ($_POST['act']=='login'){
	$u_user=ReStra($_POST['u_user']);
	$u_pass=ReStra($_POST['u_pass']);
	$query=mysql_query("select * from user where u_user='$u_user' or u_email='$u_user' or u_name='$u_user'");
	if (mysql_num_rows($query)==0){
		Msg('登录失败：该用户名或电子邮箱不存在！','Back');
	}
	else{
		$row=mysql_fetch_array($query);
		if ($row['u_pass']!=md5($u_pass)){
			Msg('登录失败：登录密码错误！','Back');
		}
		else{
			$user_ip=$_SERVER['REMOTE_ADDR'];
			$user_time=date('Y-m-d H:i:s');
			$_SESSION['fy_user']=$row['u_user'];
			$_SESSION['fy_user_id']=$row['u_id'];
			$_SESSION['fy_user_ip']=$user_ip;
			$_SESSION['fy_user_time']=$user_time;
			mysql_query("update user set u_ip='{$user_ip}',u_last_ip='{$row['u_ip']}',u_time='{$user_time}',u_last_time='{$row['u_time']}' where u_id={$row['u_id']}");
			if ($_POST['backurl']==''){
				Msg('','user.php');
			}
			else{
				$backurl=strtolower($_POST['backurl']);
				if (stripos($backurl,'checkouts')===false){
					Msg('',$backurl);
				}
				else {
					Msg('','./');
				}
			}
		}
	}
}
?>
