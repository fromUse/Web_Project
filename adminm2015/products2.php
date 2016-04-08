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
	$image_original=RsField_Array('select p_image,p_thumb,p_imagei,p_file from '.$language.'_products2 where p_id='.$id);
	mysql_query('delete from '.$language.'_products2 where p_id='.$id);
	DeleteFile('../'.$image_original[0]);
	DeleteFile('../'.$image_original[1]);
	DeleteFile('../'.$image_original[2]);
	DeleteFile('../'.$image_original[3]);
	$query=mysql_query('select * from '.$language.'_products2_kw where p_class='.$id);
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		DeleteFile('../'.$row['p_image']);
		mysql_query('delete from '.$language.'_products2_kw where p_id='.$row['p_id']);
	}
	}
	$query=mysql_query('select * from '.$language.'_products2_rc where p_class='.$id);
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		DeleteFile('../'.$row['p_image']);
		mysql_query('delete from '.$language.'_products2_rc where p_id='.$row['p_id']);
	}
	}
	$query=mysql_query('select * from '.$language.'_products2_sc where p_class='.$id);
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		DeleteFile('../'.$row['p_image']);
		mysql_query('delete from '.$language.'_products2_sc where p_id='.$row['p_id']);
	}
	}
	Msg('','Referer');
	break;
case 'deletes';
	if (count($_POST['checkbox'])>0){
		$id_arr=implode(',',$_POST['checkbox']);
		$query=mysql_query("select p_id,p_image,p_thumb,p_imagei,p_file from ".$language."_products2 where p_id in ($id_arr)");
		if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			mysql_query('delete from '.$language.'_products2 where p_id='.$row['p_id']);
			DeleteFile('../'.$row['p_image']);
			DeleteFile('../'.$row['p_thumb']);
			DeleteFile('../'.$row['p_imagei']);
			DeleteFile('../'.$row['p_file']);
			$query2=mysql_query('select * from '.$language.'_products2_kw where p_class='.$row['p_id']);
			if (mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				DeleteFile('../'.$row2['p_image']);
				mysql_query('delete from '.$language.'_products2_kw where p_id='.$row2['p_id']);
			}
			}
			$query2=mysql_query('select * from '.$language.'_products2_rc where p_class='.$row['p_id']);
			if (mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				DeleteFile('../'.$row2['p_image']);
				mysql_query('delete from '.$language.'_products2_rc where p_id='.$row2['p_id']);
			}
			}
			$query2=mysql_query('select * from '.$language.'_products2_sc where p_class='.$row['p_id']);
			if (mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				DeleteFile('../'.$row2['p_image']);
				mysql_query('delete from '.$language.'_products2_sc where p_id='.$row2['p_id']);
			}
			}
		}
		}
	}
	Msg('删除数据成功！','Referer');
	break;
case 'index';
	mysql_query('update '.$language.'_products2 set p_index=1 where p_id='.$id);
	Msg('','Referer');
	break;
case 'unindex';
	mysql_query('update '.$language.'_products2 set p_index=0 where p_id='.$id);
	Msg('','Referer');
	break;
case 'commend';
	mysql_query('update '.$language.'_products2 set p_commend=1 where p_id='.$id);
	Msg('','Referer');
	break;
case 'uncommend';
	mysql_query('update '.$language.'_products2 set p_commend=0 where p_id='.$id);
	Msg('','Referer');
	break;
}
?>
<div id="container">
	<input type="text" id="search_key" class="search_input" size="30" value="<?php echo  $search_key ?>" />
	<input type="button" name="button" class="search_button" value="搜 索" onclick="location.href='?search_key='+$('search_key').value" />
	<div class="view" style="margin-top:5px;">
		<h1>火锅大杂烩管理</h1>
		<form name="form1" id="form1" method="post" action="?act=deletes&<?php echo $urls ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="8%">ID号</td>
				<td width="15%">图片预览</td>
				<td width="45%">菜品名称</td>
				<td width="10%">菜品排序</td>
				<td width="22%">操作</td>
        	</tr>
			<?php
			if ($meter==''){
				$page_sql='select p_id,p_class,p_order,p_name,p_image,p_thumb from '.$language.'_products2 where 1=1'.$sqls.' order by p_order,p_id desc';
			}
			else {
				if ($meter2==''){
					$page_sql='select p_id,p_class,p_order,p_name,p_image,p_thumb from '.$language.'_products2 where p_class='.$meter.$sqls.' order by p_order,p_id desc';
				}
				else {
					$page_sql='select p_id,p_class,p_order,p_name,p_image,p_thumb from '.$language.'_products2 where p_subclass='.$meter2.' order by p_order,p_id desc';
				}
			}
			if ($search_key!='') $page_sql="select p_id,p_class,p_order,p_name,p_image,p_thumb from ".$language."_products2 where p_name like '%{$search_key}%' order by p_id desc";
			$page_size=10;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size",$conn);
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['p_id'].'" align="absmiddle" />&nbsp;'.$row['p_id'].'</td>';
					$str.='<td style="line-height:normal; font-size:0px;"><a href="../'.$row['p_image'].'" target="_blank"><img src="../'.$row['p_thumb'].'" height="40" style="margin:5px auto;" /></a></td>';
					$str.='<td>'.$row['p_name'].'</td>';
					$str.='<td><div class="inputorder" id="inputorder_'.$row['p_id'].'" contenteditable="true" onblur="Order(\'products2\','.$row['p_id'].')">'.$row['p_order'].'</div></td>';
					$str.='<td><a href="products2_kw.php?'.$urls.'&id='.$row['p_id'].'">口味</a> | <a href="products2_rc.php?'.$urls.'&id='.$row['p_id'].'">肉菜</a> | <a href="products2_sc.php?'.$urls.'&id='.$row['p_id'].'">素菜</a> | <a href="products2_modify.php?'.$urls.'&id='.$row['p_id'].'">修改</a> | <a href="?act=delete&id='.$row['p_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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
		<?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>