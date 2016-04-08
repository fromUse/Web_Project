<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
<script language="javascript" type="text/javascript">
function CheckLogin(){
	var Name=document.getElementById("name");
	var Pass=document.getElementById("pass");
	var SafeCode=document.getElementById("safecode");
	var LoginForm=document.getElementById("loginform");
	
	if (Name.value==""){
		alert("请输入用户名！");
		Name.focus();
		return false;
	}
	if (Pass.value==""){
		alert("请输入密码！");
		Pass.focus();
		return false;
	}
	if (SafeCode.value==""){
		alert("请输入验证码！");
		SafeCode.focus();
		return false;
	}
	var Reg=/^\w{4}$/;
	if (!Reg.test(SafeCode.value)){
		alert("验证码错误！");
		SafeCode.focus();
		return false;
	}
}
</script>
</head>
<body>
<form id="loginform" method="post" action="check_login.php" onsubmit="return CheckLogin();">
<table id="login" cellspacing="0" cellpadding="0" width="600" align="center" border="0">
	<tr>
		<td colspan="2"><img height="126" src="../images/admin/admin_login1.gif" width="600" /></td>
    </tr>
    <tr>
		<td valign="top" width="508" background="../images/admin/admin_login2.gif">
			<table cellspacing="0" cellpadding="0" width="508" border="0">
			<tr>
		  		<td colspan="6" height="37">&nbsp;</td>
			</tr>
			<tr>
				<td width="75" rowspan="2">&nbsp;</td>
            	<td width="126"><font color="#043bc9">用户名：</font></td>
            	<td width="39" rowspan="2">&nbsp;</td>
            	<td width="131"><font color="#043bc9">密码：</font></td>
            	<td width="137"><font color="#043bc9">验证码：</font><img src="inc/code2.php" style="cursor:pointer; vertical-align:middle;" title="点击更换图片" onclick="this.src='inc/code2.php?sj='+Math.random()" /></td>
			</tr>
			<tr>
            	<td><input id="name" size="15" maxlength="18" name="name" /></td>
            	<td><input id="pass" type="password" size="15" maxlength="18" name="pass" /></td>
            	<td><input id="safecode" size="10" maxlength="4" name="safecode" /></td>
			</tr>
			</table>
		</td>
		<td><input style="width:92px; height:126px;" name="submit" type="image" src="../images/admin/admin_login3.gif" /></td>
	</tr>
</table>
</form>

</body>
</html>