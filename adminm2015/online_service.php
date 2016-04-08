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
<script src="inc/function.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php
$o_class=ReStra($_POST['o_class']);
$o_order=ReStra($_POST['o_order']);
$o_name=ReStra($_POST['o_name']);
$o_number=ReStra($_POST['o_number']);

switch($act){
case 'add';
	$sql="insert into ".$language."_online_service(o_class,o_order,o_name,o_number) values($o_class,$o_order,'$o_name','$o_number')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
case 'modify';
	$sql="update ".$language."_online_service set o_class=$o_class,o_order=o_order,o_name='$o_name',o_number='$o_number' where o_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
case 'delete';
	$sql='delete from '.$language.'_online_service where o_id='.$id;
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
case 'soc';
	$sql='update '.$language.'_config set s_soc='.$_GET['socval'].' where s_id=1';
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
}
$site_soc=RsField('select s_soc from '.$language.'_config where s_id=1');
?>
<div id="container">
	<p style="margin-bottom:5px;"><strong>浮动开关：</strong><select id="s_soc" onchange="location.href='online_service.php?act=soc&socval='+this.value"><option value="1">开</option><option value="0">关</option></select>&nbsp;<span style="color:#ff0000;">(<?php if ($site_soc==0){echo '浮动开关已关闭，前台已隐藏客服';}else{echo '浮动开关已打开，前台正常显示';} ?>)</span>
	<script type="text/javascript">$("s_soc").value="<?php echo $site_soc ?>";</script></p>
	<?php
	if ($meter==1){
	$query=mysql_query('select * from '.$language.'_online_service where o_id='.$id);
	$row=mysql_fetch_array($query);
	?>
    <div class="edit">
      <h1>޸浮动客服管理</h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>" onsubmit="return CheckOL(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
            <td class="edit_title">客服类型：</td>
            <td><select name="o_class">
			<option value="1">QQ</option>
			<option value="2">MSN</option>
			<option value="3">Skype</option>
			<option value="4">阿里旺旺</option>
			<option value="5">淘宝旺旺</option>
			</select><script type="text/javascript">document.form1.o_class.value="<?php echo $row['o_class'] ?>";</script></td>
          </tr>
          <tr>
            <td class="edit_title">客服名称：</td>
            <td><input name="o_name" type="text" class="inputtext" value="<?php echo $row['o_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">客服账号：</td>
            <td><input name="o_number" type="text" class="inputtext" value="<?php echo $row['o_number'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">客服排序：</td>
            <td><input name="o_order" type="text" class="inputtext" value="<?php echo $row['o_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="history.back();" /></td>
          </tr>
        </table>
      </form>
    </div>
	<?php
	}
	else{
	?>
	<div class="view">
		<h1>浮动客服管理</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="20%">客服类型</td>
            	<td width="25%">客服名称</td>
            	<td width="25%">客服账号</td>
				<td width="15%">客服排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$col=1;
			$str='';
			$query=mysql_query('select * from '.$language.'_online_service order by o_order,o_id');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.="<tr onmouseover=\"this.className='view_trover';\" onmouseout=\"this.className='view_trout';\">";
				switch($row['o_class']){
				case 1:
					$str.='<td>QQ</td>';
					break;
				case 2:
					$str.='<td>MSN</td>';
					break;
				case 3:
					$str.='<td>Skype</td>';
					break;
				case 4:
					$str.='<td>阿里旺旺</td>';
					break;
				case 5:
					$str.='<td>淘宝旺旺</td>';
					break;
				}					
				$str.="<td>{$row['o_name']}</td>";
				$str.="<td>{$row['o_number']}</td>";
				$str.='<td style="padding:2px 0px;"><div class="inputorder" id="inputorder_'.$row['o_id'].'" contenteditable="true" onblur="Order(\'online_service\','.$row['o_id'].')">'.$row['o_order'].'</div></td>';
				$str.="<td><a href=\"?meter=1&id={$row['o_id']}\">修改</a> | <a href=\"?act=delete&id={$row['o_id']}\" onclick=\"return ConfirmDel();\">删除</a></td>";
				$str.="</tr>";
				$col++;
			}
			}
			echo $str;
			?>
		</table>
	</div><br />
    <div class="edit">
      <h1>&nbsp;</h1>
      <form method="post" action="?act=add" onsubmit="return CheckOL(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
            <td class="edit_title">客服类型：</td>
            <td><select name="o_class">
			<option value="">请选择</option>
			<option value="1">QQ</option>
			<option value="2">MSN</option>
			<option value="3">Skype</option>
			<option value="4">阿里旺旺</option>
			<option value="5">淘宝旺旺</option>
			</select></td>
          </tr>
          <tr>
            <td class="edit_title">客服名称：</td>
            <td><input name="o_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">客服账号：</td>
            <td><input name="o_number" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">客服排序：</td>
            <td><input name="o_order" type="text" class="inputtext" value="<?php echo $col ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 添加 " class="button" /></td>
          </tr>
        </table>
      </form>
    </div>
    <?php } ?>
</div>
</body>
</html>