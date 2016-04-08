<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
if ($_POST['act']=='reg'){
	$u_user=ReStra($_POST['u_user']);
	$u_pass=ReStra($_POST['u_pass']); 
	$u_tel=ReStra($_POST['u_tel']);
	//if ($_POST['u_xy']=='') Msg('您没有勾选《会员注册协议》网站服务条款，无法注册会员！','Back');
	if (strtolower($_POST['u_code'])==$_SESSION['fycode']) Msg('验证码错误！','Back');
	if (RsNum("select u_user from user where u_user='$u_user'")==0){
		 	$u_pass=md5($u_pass);
			$u_date=date('Y-m-d H:i:s');
			$user_ip=$_SERVER['REMOTE_ADDR'];
			mysql_query("insert into user(u_user,u_pass,u_tel,u_ip,u_time,u_date) values('$u_user','$u_pass','$u_tel','$user_ip','$u_date','$u_date')");
			$user_id=mysql_insert_id();
			$_SESSION['fy_user']=$u_user;
			$_SESSION['fy_user_id']=$user_id;
			$_SESSION['fy_user_ip']=$user_ip;
			$_SESSION['fy_user_time']=$u_date;
			if ($_POST['backurl']==''){
				Msg('请先完善资料！','user.php');
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
	else{
		Msg('注册失败：该用户名已经被注册！','Back');
	}
}
?>
