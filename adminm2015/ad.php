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
$a_order=ReStra($_POST['a_order']);
$a_title=ReStra($_POST['a_title']);
$a_image=ReStra($_POST['a_image']);
$a_url=ReStra($_POST['a_url']);

switch($act){
case 'add';
	$sql="insert into ".$language."_ad(a_class,a_order,a_title,a_image,a_url) values(1,$a_order,'$a_title','$a_image','$a_url')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
case 'modify';
	$sql="update ".$language."_ad set a_order=$a_order,a_title='$a_title',a_image='$a_image',a_url='$a_url' where a_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
case 'delete';
	$sql='delete from '.$language.'_ad where a_id='.$id;
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
	break;
}
?>
<div id="container">
	<?php
	if ($meter==1){
	$query=mysql_query('select * from '.$language.'_ad where a_id='.$id);
	$row=mysql_fetch_array($query);
	?>
    <div class="edit">
      <h1>޸首页Banner管理</h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>" onsubmit="return CheckAd(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">图片标题：</td>
            <td><input name="a_title" type="text" class="inputtext" value="<?php echo $row['a_title']?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">链接地址：</td>
            <td><input name="a_url" type="text" class="inputtext" value="<?php echo $row['a_url']?>" size="50" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">上传图片：</td>
            <td><input name="a_image" id="a_image" type="text" class="inputtext" value="<?php echo $row['a_image']?>" size="50" readonly="readonly" />&nbsp;(图片尺寸：1920*490)<iframe src="../upload_fy.php?file_type=0&file_id=a_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
          <tr>
            <td class="edit_title">图片排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo $row['a_order']?>" size="10" maxlength="10" /></td>
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
		<h1>首页Banner管理</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="35%">图片标题</td>
            	<td width="35%">图片预览</td>
            	<td width="15%">图片排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$col=1;
			$str='';
			$query=mysql_query('select * from '.$language.'_ad where a_class=1 order by a_order,a_id');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
				$str.='<td>'.$row['a_title'].'&nbsp;</td>';
				$str.='<td style="line-height:normal; font-size:0px;"><a href="../'.$row['a_image'].'" target="_blank"><img src="../'.$row['a_image'].'" style="margin:5px auto;" height="60" /></a></td>';
				$str.='<td><div class="inputorder" id="inputorder_'.$row['a_id'].'" contenteditable="true" onblur="Order(\'ad\','.$row['a_id'].')">'.$row['a_order'].'</div></td>';
				$str.='<td><a href="?meter=1&id='.$row['a_id'].'">修改</a> | <a href="?act=delete&id='.$row['a_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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
      <form name="form1" method="post" action="?act=add" onsubmit="return CheckAd(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">图片标题：</td>
            <td><input name="a_title" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">链接地址：</td>
            <td><input name="a_url" type="text" class="inputtext" size="50" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">上传图片：</td>
            <td><input name="a_image" id="a_image" type="text" class="inputtext" size="50" readonly="readonly" />&nbsp;(图片尺寸：1920*490)<iframe src="../upload_fy.php?file_type=0&file_id=a_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
          <tr>
            <td class="edit_title">图片排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo $col ?>" size="10" maxlength="10" /></td>
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