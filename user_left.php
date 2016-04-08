<?php
$str='';
$str.='<div class="user_left_menu">';
if (stripos($url,'user.php')!==false || stripos($url,'user_orders.php')!==false){
	$str.='<p class="user_left_over"><a href="user.php">报考记录</a></p>';
}
else{
	$str.='<p class="user_left_out"><a href="user.php">报考记录</a></p>';
}
 
 
$str.='</div>';
$str.='<div class="user_left_menu">';
 
if (stripos($url,'m_user_info.php')!==false){
	$str.='<p class="user_left_over"><a href="user_info.php">个人资料</a></p>';
}
else{
	$str.='<p class="m_user_info"><a href="user_info.php">个人资料</a></p>';
}
if (stripos($url,'user_pass.php')!==false){
	$str.='<p class="user_left_over"><a href="user_pass.php">修改密码</a></p>';
}
else{
	$str.='<p class="user_left_out"><a href="user_pass.php">修改密码</a></p>';
}
$str.='<p class="user_left_out"><a href="loginout.php">退出登录</a></p>';
$str.='</div>';

echo $str;
?>