<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '收货地址 - 会员中心 - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $a_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $a_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<link rel="stylesheet" href="css/user.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript">
function CheckUserAddress(ObjForm){
	if (ObjForm.u_name.value==""){
		alert("请输入收货人！");
		ObjForm.u_name.focus();
		return false;
	}
	if (ObjForm.u_tel.value==""){
		alert("请输入联系电话！");
		ObjForm.u_tel.focus();
		return false;
	}
	if (ObjForm.u_post.value==""){
		alert("请输入邮政编码！");
		ObjForm.u_post.focus();
		return false;
	}
	if (ObjForm.u_address.value==""){
		alert("请输入详细地址！");
		ObjForm.u_address.focus();
		return false;
	}
}
</script>
</head>
<body>
<?php
if ($user=='') Msg('','login.php');
$u_default=intval($_POST['u_default']);
$u_name=ReStr($_POST['u_name']);
$u_tel=ReStr($_POST['u_tel']);
$u_post=ReStr($_POST['u_post']);
$u_province=ReStr($_POST['u_province']);
$u_city=ReStr($_POST['u_city']);
$u_district=ReStr($_POST['u_district']);
$u_address=ReStr($_POST['u_address']);
switch($act){
case 'add':
	if ($u_default==1) mysql_query('update user_address set u_default=0');
	$sql="insert into user_address(u_user_id,u_default,u_name,u_tel,u_post,u_province,u_city,u_district,u_address) values($user_id,$u_default,'$u_name','$u_tel','$u_post',$u_province,$u_city,$u_district,'$u_address')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
case 'modifys':
	if ($u_default==1) mysql_query('update user_address set u_default=0');
	$sql="update user_address set u_default=$u_default,u_name='$u_name',u_tel='$u_tel',u_post='$u_post',u_province=$u_province,u_city=$u_city,u_district=$u_district,u_address='$u_address' where u_id=$id and u_user_id=$user_id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
case 'delete':
	mysql_query('delete from user_address where u_id='.$id.' and u_user_id='.$user_id);
	Msg('','');
case 'default':
	mysql_query('update user_address set u_default=0');
	mysql_query('update user_address set u_default=1 where u_id='.$id.' and u_user_id='.$user_id);
	Msg('','');
}
?>
<div id="main">
	<?php require 'header.php';?>
    <div id="content">
    	<div id="user_left"><?php require 'user_left.php' ?></div>
        <div id="user_right">
			<p id="user_title">收货地址</p>
			<?php if($act!='modify'){?>
			<div id="user_address">
				<div class="user_tbe">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				    <tr class="user_tbe_title">
						<td width="8%">序号</td>
						<td width="10%">收货人</td>
						<td width="15%">联系电话</td>
						<td width="10%">邮政编码</td>
						<td width="34%">详细地址</td>
						<td width="10%">默认地址</td>
						<td width="13%">操作</td>
				    </tr>
					<?php
					$str='';
					$query=mysql_query('select * from user_address where u_user_id='.$user_id.' order by u_id');
					if (mysql_num_rows($query)==0){
						$str.='<tr><td colspan="7"><p class="nodata">您目前还没有添加收货地址...</p></td></tr>';
					}
					else{
						$col=1;
						while($row=mysql_fetch_array($query)){
							$str.='<tr>';
							$str.='<td>'.$col.'</td>';
							$str.='<td>'.$row['u_name'].'</td>';
							$str.='<td>'.$row['u_tel'].'</td>';
							$str.='<td>'.$row['u_post'].'</td>';
							$str.='<td>'.$row['u_address'].'</td>';
							$str.='<td style="color:#ff0000;">';
							if ($row['u_default']==1){
								$str.='默认地址';
							}
							else {
								$str.='<a href="?act=default&id='.$row['u_id'].'">设为默认</a>';
							}
							$str.='</td>';
							$str.='<td><a href="?act=modify&id='.$row['u_id'].'" class="a">修改</a> | <a href="?act=delete&id='.$row['u_id'].'" class="a" onclick="return confirm(\'您确认要删除该数据吗？\');">删除</a></td>';
							$str.='</tr>';
							$col++;
						}
					}
					echo $str;
					?>
				</table>
				</div>
			</div>
			<?php } ?>
			<div class="reg">
				<?php
				if ($act=='modify'){
				$query=mysql_query('select * from user_address where u_id='.$id.' and u_user_id='.$user_id);
				$row=mysql_fetch_array($query);
				?>
				<form name="form1" method="post" action="user_address.php?act=modifys&id=<?php echo $id ?>" onsubmit="return CheckUserAddress(this);">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="10%">&nbsp;</td>
					<td width="90%"><input type="checkbox" name="u_default" value="1" style="vertical-align:middle;"<?php if($row['u_default']==1) echo' checked="checked"'; ?> /> 设为默认地址</td>
				  </tr>
				  <tr>
					<td align="right">收&nbsp;&nbsp;货&nbsp;&nbsp;人：</td>
					<td><input type="text" name="u_name" class="inputtext" value="<?php echo $row['u_name'] ?>" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">联系电话：</td>
					<td><input type="text" name="u_tel" class="inputtext" value="<?php echo $row['u_tel'] ?>" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">邮政编码：</td>
					<td><input type="text" name="u_post" class="inputtext" value="<?php echo $row['u_post'] ?>" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">配送区域：</td>
					<td><?php
					$str='';
					$str.='<select name="u_province" onchange="dz_City(this.value)">';
					$str.='<option value="0">请选择</option>';
					$query2=mysql_query('select * from dz_province order by p_id');
					while($row2=mysql_fetch_array($query2)){
						$str.='<option value="'.$row2['p_id'].'">'.$row2['p_name'].'</option>';
					}
					$str.='</select>';
					$str.='<span id="u_city"><select name="u_city" onchange="dz_District(this.value)"><option value="0">请选择</option>';
					if ($row['u_city']>0){
					$query2=mysql_query('select * from dz_city where c_pid='.$row['u_province'].' order by c_id');
					while($row2=mysql_fetch_array($query2)){
						$str.='<option value="'.$row2['c_id'].'">'.$row2['c_name'].'</option>';
					}
					}
					$str.='</select></span>';
					$str.='<span id="u_district"><select name="u_district"><option value="0">请选择</option>';
					if ($row['u_district']>0){
					$query2=mysql_query('select * from dz_district where d_cid='.$row['u_city'].' order by d_id');
					while($row2=mysql_fetch_array($query2)){
						$str.='<option value="'.$row2['d_id'].'">'.$row2['d_name'].'</option>';
					}
					}
					$str.='</select></span>';
					echo $str;
					?></td>
				  </tr>
				  <tr>
					<td align="right">详细地址：</td>
					<td><input type="text" name="u_address" class="inputtext" value="<?php echo $row['u_address'] ?>" size="80" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><br /><input type="submit" name="button" class="button" value="修 改" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="button" value="返 回" class="button" onclick="location.href='user_address.php'" /></td>
				  </tr>
				</table>
				</form>
				<script type="text/javascript">
				document.form1.u_province.value="<?php echo $row['u_province'] ?>";
				document.form1.u_city.value="<?php echo $row['u_city'] ?>";
				document.form1.u_district.value="<?php echo $row['u_district'] ?>";
				</script>
				<?php }else{ ?>
				<form name="form1" method="post" action="user_address.php?act=add" onsubmit="return CheckUserAddress(this);">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="10%">&nbsp;</td>
					<td width="90%"><input type="checkbox" name="u_default" value="1" style="vertical-align:middle;" /> 设为默认地址</td>
				  </tr>
				  <tr>
					<td align="right">收&nbsp;&nbsp;货&nbsp;&nbsp;人：</td>
					<td><input type="text" name="u_name" class="inputtext" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">联系电话：</td>
					<td><input type="text" name="u_tel" class="inputtext" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">邮政编码：</td>
					<td><input type="text" name="u_post" class="inputtext" size="50" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td align="right">配送区域：</td>
					<td><?php
					$str='';
					$str.='<select name="u_province" onchange="dz_City(this.value)">';
					$str.='<option value="0">请选择</option>';
					$query=mysql_query('select * from dz_province order by p_id');
					while($row=mysql_fetch_array($query)){
						$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
					}
					$str.='</select><span id="u_city"><select name="u_city"><option value="0">请选择</option></select></span><span id="u_district"><select name="u_district"><option value="0">请选择</option></select></span>';
					echo $str;
					?></td>
				  </tr>
				  <tr>
					<td align="right">详细地址：</td>
					<td><input type="text" name="u_address" class="inputtext" size="100" maxlength="50" /></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><br /><input type="submit" name="button" class="button" value="添 加" /></td>
				  </tr>
				</table>
				</form>
				<?php } ?>
           	</div>
		</div>
    	<div class="clear"></div>
	</div>
     <?php require 'footer.php'?>
</div>
</body>
</html>