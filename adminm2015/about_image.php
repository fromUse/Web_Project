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
switch($act){
case 'delete';
	$image_original=RsField_Array('select a_image,a_thumb from '.$language.'_about_image where a_id='.$id);
	mysql_query('delete from '.$language.'_about_image where a_id='.$id);
	DeleteFile('../'.$image_original[0]);
	DeleteFile('../'.$image_original[1]);
	Msg('','Referer');
	break;
case 'deletes';
	if (count($_POST['checkbox'])>0){
		$id_arr=implode(',',$_POST['checkbox']);
		$query=mysql_query("select a_id,a_image,a_thumb from ".$language."_about_image where a_id in ($id_arr)");
		if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			mysql_query('delete from '.$language.'_about_image where a_id='.$row['a_id']);
			DeleteFile('../'.$row['a_image']);
			DeleteFile('../'.$row['a_thumb']);
		}
		}
	}
	Msg('删除数据成功！','Referer');
	break;
}
switch($meter){
case 1:
	$title='企业图片';
	break;
case 2:
	$title='企业荣誉';
	break;
}
?>
<div id="container">
	<div class="view">
		<h1><?php echo $title ?></h1>
		<form name="form1" method="post" action="?act=deletes<?php echo "&meter=$meter&page=&page" ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="10%">ID号</td>
				<td width="15%">图片预览</td>
                <td width="45%">图片名称</td>
				<td width="15%">图片排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$page_size=10;
			$page_count=GetPageCount($page_size,'select * from '.$language.'_about_image where a_class='.$meter);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query("select * from ".$language."_about_image where a_class=$meter order by a_order,a_id limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['a_id'].'" align="absmiddle" />&nbsp;'.$row['a_id'].'</td>';
					$str.='<td style="line-height:normal; font-size:0px;"><a href="../'.$row['a_image'].'" target="_blank"><img src="../'.$row['a_thumb'].'" height="40" style="margin:5px auto;" /></a></td>';
					$str.='<td>'.$row['a_name'].'</td>';
					$str.='<td><div class="inputorder" id="inputorder_'.$row['a_id'].'" contenteditable="true" onblur="Order(\'about_image\','.$row['a_id'].')">'.$row['a_order'].'</div></td>';
					$str.='<td><a href="about_image_modify.php?meter='.$meter.'&page='.$page.'&id='.$row['a_id'].'">修改</a> | <a href="?act=delete&id='.$row['a_id'].'" onclick="return ConfirmDel();">删除</a></td>';
					$str.='</tr>';
				}
				echo $str;
			}
			else {
				$page_show=false;
			}
			?>
		</table>
		</form>
        <?php if($page_show) echo ShowPage($page,$page_size,'select * from '.$language.'_about_image where a_class='.$meter); ?>
	</div>
</div>
</body>
</html>