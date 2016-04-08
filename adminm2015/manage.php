<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/admin.css" type="text/css" />
<script src="inc/function.js" language="javascript"></script>
</head>
<body>
<?php
$user=ReStra($_POST['a_user']);
$pass=md5(ReStra($_POST['a_pass']));

switch ($act){
case 'add':
	$query=mysql_query("select a_id from admin where a_user='$user'",$conn);
	if (mysql_num_rows($query)==0){
		mysql_query("insert into admin(a_user,a_pass) values('$user','$pass')",$conn);
		Msg('','');
	}
	else {
		Msg('该管理员已经存在！','Back');
	}
	break;
case 'modifys':
	mysql_query("update admin set a_pass='$pass' where a_id=$id",$conn);
	Msg('修改管理员密码成功！','');
	break;
case 'delete':
	$query=mysql_query('select a_user from admin where a_id='.$id,$conn);
	$row=mysql_fetch_array($query);
	if (strtolower($row['a_user'])=='admin'){
		Msg('该管理员无法删除！','');
	}
	else {
		mysql_query('delete from admin where a_id='.$id,$conn);
		Msg('','');
	}
	break;
}
?>
<div id="container">
	<div class="edit">
		<h1>管理员管理</h1>
		<?php
		if($act=='modify'){
		$query=mysql_query('select * from admin where a_id='.$id,$conn);
		$row=mysql_fetch_array($query);
		?>
        <form method="post" onsubmit="return CheckAdmin(this)" action="manage.php?act=modifys&id=<?php echo $id ?>" >	
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td class="edit_title">管理员帐号：</td>
                  <td><input name="a_user" type="text" class="inputtext" value="<?php echo $row['a_user']?>" size="40" maxlength="20" disabled="disabled"></td>
                </tr>
                <tr> 
                  <td class="edit_title">管理员密码：</td>
                  <td><input name="a_pass" type="password" class="inputpass" size="40" maxlength="20"><span class="ts">密码只能由5~20个字符(字母、数字、下划线)组成！</span></td>
                </tr>
                <tr> 
                  <td class="edit_title">确认密码：</td>
                  <td><input name="a_pass2" type="password" class="inputpass" size="40" maxlength="20"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
				  <td><input type="submit" value="修 改" name="modify" class="button">&nbsp;&nbsp;<input type="button" value="返 回" name="button" class="button" onclick="location.href='manage.php'"></td>
                </tr>
       	  </table>
        </form>
		<?php
		}
		else{
		?>
        <form method="post" onsubmit="return CheckAdmin(this)" action="manage.php?act=add" >	
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td class="edit_title">管理员帐号：</td>
                  <td><input name="a_user" type="text" class="inputtext" size="40" maxlength="20"><span class="ts">管理员账号和密码只能由5~20个字符(字母、数字、下划线)组成！</span></td>
                </tr>
                <tr> 
                  <td class="edit_title">管理员密码：</td>
                  <td><input name="a_pass" type="password" class="inputpass" size="40" maxlength="20"></td>
                </tr>
                <tr> 
                  <td class="edit_title">确认密码：</td>
                  <td><input name="a_pass2" type="password" class="inputpass" size="40" maxlength="20"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
				  <td><input type="submit" value="添 加" name="add" class="button"></td>
                </tr>
       	  </table>
        </form>
		<?php }?>
	</div>
	<br />
	<div class="view">
		<h1>管理员管理</h1>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr class="v_title">
				<td width="80%">管理员帐号</td>
				<td width="20%">操作</td>
			</tr>
			<?php
			$query=mysql_query('select * from admin order by a_id',$conn);
			if (mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td class="textcenter">'.$row['a_user'].'</td>';
					$str.='<td class="textcenter"><a href="?act=modify&id='.$row['a_id'].'">修改</a> | <a href="?act=delete&id='.$row['a_id'].'" onClick="return ConfirmDel();">删除</a></td>';
					$str.='</tr>';
				}
			}
			echo $str;
			?>
		</table>
	</div>
</div>
</body>
</html>