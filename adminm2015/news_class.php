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
<script type="text/javascript" src="inc/function.js"></script>
</head>
<body>
<?php
$n_order=ReStra($_POST['n_order']);
$n_name=ReStra($_POST['n_name']);

switch($act){
case 'add';
	mysql_query("insert into ".$language."_news_class(n_order,n_name) values($n_order,'$n_name')");
	Msg('','');
	break;
case 'modify';
	mysql_query("update ".$language."_news_class set n_order=$n_order,n_name='$n_name' where n_id=$id");
	Msg('','');
	break;
case 'delete';
	mysql_query('delete from '.$language.'_news_class where n_id='.$id);
	mysql_query('delete from '.$language.'_news where n_class='.$id);
	Msg('','');
	break;
}
?>
<div id="container">
	<?php
	if ($meter==1){
	$query=mysql_query('select * from '.$language.'_news_class where n_id='.$id);
	$row=mysql_fetch_array($query);
	?>
    <div class="edit">
      <h1>新闻分类管理</h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>" onsubmit="return CheckNewsClass(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">分类名称：</td>
            <td><input name="n_name" type="text" class="inputtext" value="<?php echo $row['n_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">分类排序：</td>
            <td><input name="n_order" type="text" class="inputtext" value="<?php echo $row['n_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 修改 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="history.back();" /></td>
          </tr>
        </table>
      </form>
    </div>
	<?php
	}
	else{
	?>
	<div class="view">
		<h1>新闻分类管理</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
				<td width="70%">分类名称</td>
				<td width="15%">分类排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$col=1;
			$str='';
			$query=mysql_query('select * from '.$language.'_news_class order by n_order,n_id');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
				$str.='<td>'.$row['n_name'].'</td>';
				$str.='<td style="padding:2px 0px;"><div class="inputorder" id="inputorder_'.$row['n_id'].'" contenteditable="true" onblur="Order(\'news_class\','.$row['n_id'].')">'.$row['n_order'].'</div></td>';
				$str.='<td><a href="?meter=1&id='.$row['n_id'].'">修改</a> | <a href="?act=delete&id='.$row['n_id'].'" onclick="return ConfirmDel3();">删除</a></td>';
				$str.='</tr>';
				$col++;
			}
			}
			echo $str;
			?>
		</table>
	</div><br />
    <div class="edit">
      <h1>&nbsp;</h1>
      <form method="post" action="?act=add" onsubmit="return CheckNewsClass(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">分类名称：</td>
            <td><input name="n_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">分类排序：</td>
            <td><input name="n_order" type="text" class="inputtext" value="<?php echo $col ?>" size="10" maxlength="10" /></td>
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