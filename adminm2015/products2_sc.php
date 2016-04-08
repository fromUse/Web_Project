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
$ids=$_GET['ids'];
$p_order=$_POST['p_order'];
$p_name=$_POST['p_name'];
$p_price=$_POST['p_price'];
$p_image=$_POST['p_image'];
switch($act){
case 'add';
	mysql_query("insert into ".$language."_products2_sc(p_class,p_order,p_name,p_price,p_image) values($id,$p_order,'$p_name',$p_price,'$p_image')");
	Msg('','PageUrl');
	break;
case 'modify';
	$image_original=RsField('select p_image from '.$language.'_products2_sc where p_id='.$ids);
	mysql_query("update ".$language."_products2_sc set p_order=$p_order,p_name='$p_name',p_price=$p_price,p_image='$p_image' where p_id=$ids");
	if ($p_image!=$image_original) DeleteFile('../'.$image_original);
	Msg('','PageUrl');
	break;
case 'delete';
	$image_original=RsField('select p_image from '.$language.'_products2_sc where p_id='.$ids);
	mysql_query("delete from ".$language."_products2_sc where p_id=$ids");
	DeleteFile('../'.$image_original);
	Msg('','Referer');
	break;
}
?>
<div id="container">
	<?php
	echo '<p style="margin-bottom:5px;"><strong>菜品名称：</strong>'.RsField('select p_name from '.$language.'_products2 where p_id='.$id).'&nbsp;&nbsp;&nbsp;&nbsp;<a href="products2.php?'.$urls.'">返回上页</a></p>';
	if ($_GET['meters']==1){
	$query=mysql_query('select * from '.$language.'_products2_sc where p_id='.$ids,$conn);
	$row=mysql_fetch_array($query);
	?>
    <div class="edit">
      <h1>素菜管理</h1>
      <form name="form1" method="post" action="?act=modify&<?php echo $urls.'&id='.$id.'&ids='.$ids ?>" onsubmit="return CheckProducts2Image(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
            <td class="edit_title">名　　称：</td>
            <td><input name="p_name" type="text" class="inputtext" value="<?php echo $row['p_name'] ?>" size="50" maxlength="40" /></td>
          </tr>
          <tr>
            <td class="edit_title">图　　片：</td>
            <td><input name="p_image" id="p_image" type="text" class="inputtext" value="<?php echo $row['p_image'] ?>" size="50" readonly="readonly" />&nbsp;(图片尺寸：200*137)<iframe ID="UploadFiles" src="../upload_fy.php?file_type=0&file_id=p_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <tr>
            <td class="edit_title">价　　格：</td>
            <td><input name="p_price" type="text" class="inputtext" value="<?php echo $row['p_price'] ?>" size="20" maxlength="20" />&nbsp;(只能输入数字)</td>
          </tr>
          <tr>
            <td class="edit_title">颜色排序：</td>
            <td><input name="p_order" type="text" class="inputtext" value="<?php echo $row['p_order'] ?>" size="20" maxlength="10" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 修改 " class="button" />&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="history.back();" /></td>
          </tr>
        </table>
      </form>
    </div>
	<?php
	}
	else {
	?>
	<div class="view">
		<h1>素菜管理</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="8%">序号</td>
            	<td width="15%">图片</td>
				<td width="35%">名称</td>
				<td width="15%">价格</td>
				<td width="15%">排序</td>
				<td width="12%">操作</td>
        	</tr>
			<?php
			$col=1;
			$query=mysql_query('select * from '.$language.'_products2_sc where p_class='.$id.' order by p_order,p_id');
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td>'.$col.'</td>';
					$str.='<td><a href="../'.$row['p_image'].'" target="_blank"><img src="../'.$row['p_image'].'" height="40" style="margin:5px 0px;" /></a></td>';
					$str.='<td>'.$row['p_name'].'</td>';
					$str.='<td>'.$row['p_price'].'</td>';
					$str.='<td>'.$row['p_order'].'</td>';
					$str.='<td><a href="products2_sc.php?'.$urls.'&id='.$id.'&meters=1&ids='.$row['p_id'].'">修改</a> | <a href="?act=delete&ids='.$row['p_id'].'" onclick="return ConfirmDel();">删除</a></td>';
					$str.='</tr>';
					$col++;
				}
				echo $str;
			}
			?>
		</table>
	</div><br />
    <div class="edit">
      <h1>&nbsp;</h1>
      <form name="form1" method="post" action="?act=add&<?php echo $urls.'&id='.$id ?>" onsubmit="return CheckProducts2Image(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
            <td class="edit_title">名　　称：</td>
            <td><input name="p_name" type="text" class="inputtext" size="50" maxlength="40" /></td>
          </tr>
          <tr>
            <td class="edit_title">图　　片：</td>
            <td><input name="p_image" id="p_image" type="text" class="inputtext" size="50" readonly="readonly" />&nbsp;(图片尺寸：200*137)<iframe ID="UploadFiles" src="../upload_fy.php?file_type=0&file_id=p_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <tr>
            <td class="edit_title">价　　格：</td>
            <td><input name="p_price" type="text" class="inputtext" size="20" maxlength="20" />&nbsp;(只能输入数字)</td>
          </tr>
          <tr>
            <td class="edit_title">排　　序：</td>
            <td><input name="p_order" type="text" class="inputtext" value="<?php echo $col ?>" size="20" maxlength="10" /></td>
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