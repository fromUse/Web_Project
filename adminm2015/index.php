<?php
 

session_set_cookie_params(24*3600);
session_start();
if ($_SESSION['admin_user']=='') header("location:login.php");
//$page_sql = "select * from user where u_school_id=$belong_school_id order by u_id desc";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台管理系统</title>
<style type="text/css">
body {margin:0px; padding:0px; color:#000;}
a:link {color:#4769A9; text-decoration:none;}
a:visited {color:#4769A9; text-decoration:none;}
a:hover {color:#4769A9; text-decoration:underline;}
</style>
</head>
<body scroll="no" onResize="javascript:parent.carnoc.location.reload()">
<table border="0" cellPadding="0" cellSpacing="0" height="100%" width="100%">
  <tr>
    <td width="170" valign="top"><iframe frameBorder="0" id="carnoc" name="carnoc" scrolling="no" src="menu.php" style="width:170px; height:100%; visibility:inherit; z-index:2;"></iframe></td>
    <td style="width: 9pt; background:#A4B6D7">&nbsp;</td>
	<td height="100%" valign="top">
		<table style="margin-bottom:5px;" width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td height="25" style="background:url(../images/admin/titlebg.gif); font-size:12px;" align="center">&nbsp;</td>
		  </tr>
		</table>
		<iframe frameborder="0" id="main" name="main" scrolling="yes" src="site_config.php" style="width:100%; height:96%; visibility:inherit; z-index:1;"></iframe>
	</td>
  </tr>
</table>
</body>
</html>
