<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/admin.css" type="text/css" />
<script src="inc/function.js" language="javascript"></script>
</head>
<body>
<?php
if ($act=='modify'){
	$pass=ReStra($_POST['a_pass']);
	//if CheckRegExpStr(UserPass,"^[\w-@.]{5,18}$")=false then
	//	Call Msg("密码只能由5~18个字符(字母、数字、下划线)组成!","Current")
	//end if
	$pass=md5($pass);
	mysql_query("update admin set a_pass='$pass' where a_user='{$_SESSION['admin_user']}'",$conn);
	Msg("修改密码成功！","");
}
?>
<div id="container">
	<div class="edit">
  		<h1>修改密码</h1>
        <form method="post" onsubmit="return CheckAdmin(this)" action="?act=modify" >	
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td class="edit_title">管理员帐号：</td>
                  <td><input name="a_user" type="text" class="inputtext" size="40" value="<?php echo $_SESSION['admin_user'] ?>" disabled="disabled" /></td>
                </tr>
                <tr> 
                  <td class="edit_title">管理员密码：</td>
                  <td><input name="a_pass" type="password" class="inputpass" size="40" maxlength="20" /><span class="ts">密码只能由5~18个字符(字母、数字、下划线)组成！</span></td>
                </tr>
                <tr> 
                  <td class="edit_title">确认密码：</td>
                  <td><input name="a_pass2" type="password" class="inputpass" size="40" maxlength="20" /></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
				  <td><input type="submit" value=" 保存 " name="submit" class="button"></td>
                </tr>
       	  </table>
        </form>
	</div>
</div>
</body>
</html>