<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '重置密码 - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $a_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $a_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<link rel="stylesheet" href="css/user.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript">
function CheckForgets(ObjForm){
	if (ObjForm.u_pass.value==""){
		alert("请输入新密码！");
		ObjForm.u_pass.focus();
		return false;
	}
	var Reg=/^\w{5,30}$/;
	if (!Reg.test(ObjForm.u_pass.value)){
		alert("请正确输入密码(由5-30个字符“A-Z,a-z,0-9,下划线”组成)，不能输入特殊字符！");
		ObjForm.u_pass.value="";
		ObjForm.u_pass.focus();
		return false;
	}
	if (ObjForm.u_pass.value!=ObjForm.u_pass2.value){
		alert("确认密码错误！");
		ObjForm.u_pass2.focus();
		return false;
	}
}
</script>
</head>
<body>
<?php
$user_id=intval($_GET['user_id']);
$code=$_GET['code'];

if ($_POST['act']=='forgets'){
	$u_pass=md5(ReStra($_POST['u_pass']));
	$u_user_id=RsField("select u_id from user where u_id=$user_id and u_pass_code='$code'");
	if ($u_user_id==''){
		Msg('账号不存在！','Back');
	}
	else {
		mysql_query("update user set u_pass='$u_pass',u_pass_code='' where u_id=$u_user_id");
		Msg('重置密码成功！','login.php');
	}
}
?>
<div id="main">
	<?php require 'header.php';?>
    <div id="content">
		<div id="forget_blk">
		<div id="forget">
			<p id="forget_title">重置密码</p>
			<?php
			$str='';
			if ($user_id==''){
				$str.='<p id="forget_err">非法的请求！</p>';
			}
			elseif ($code==''){
				$str.='<p id="forget_err">非法的请求！</p>';
			}
			elseif (RsField("select u_id from user where u_id=$user_id and u_pass_code='$code'")==''){
				$str.='<p id="forget_err">参数错误！</p>';
			}
			else{
				$str.='<div id="forget_tbe">
				<form id="form1" method="post" action="forgets.php?user_id='.$user_id.'&code='.$code.'" onsubmit="return CheckForgets(this)">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">
				  <tr>
					<td width="13%" align="right"><strong>新&nbsp;&nbsp;密&nbsp;&nbsp;码：</strong></td>
					<td width="87%"><input type="password" name="u_pass" class="inputtext" size="40" maxlength="30" /></td>
				  </tr>
				  <tr>
					<td align="right"><strong>确认密码：</strong></td>
					<td><input type="password" name="u_pass2" class="inputtext" size="40" maxlength="30" /></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><br /><input type="submit" name="submit" value="修改密码" class="reg_button" /></td>
				  </tr>
				</table>
				<input type="hidden" name="act" value="forgets" />
				</form>
				</div>';
			}
			echo $str;
			?>
		</div>
		</div>
	</div>
	<?php require 'footer.php'?>
</div>
</body>
</html>