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
	$image_original=RsField_Array('select p_image,p_thumb,p_imagei,p_file from '.$language.'_products where p_id='.$id);
	mysql_query('delete from '.$language.'_products where p_id='.$id);
	DeleteFile('../'.$image_original[0]);
	DeleteFile('../'.$image_original[1]);
	DeleteFile('../'.$image_original[2]);
	DeleteFile('../'.$image_original[3]);
	Msg('','Referer');
	break;
case 'deletes';
	if (count($_POST['checkbox'])>0){
		$id_arr=implode(',',$_POST['checkbox']);
		$query=mysql_query("select p_id,p_image,p_thumb,p_imagei,p_file from ".$language."_products where p_id in ($id_arr)");
		if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			mysql_query('delete from '.$language.'_products where p_id='.$row['p_id']);
			DeleteFile('../'.$row['p_image']);
			DeleteFile('../'.$row['p_thumb']);
			DeleteFile('../'.$row['p_imagei']);
			DeleteFile('../'.$row['p_file']);
		}
		}
	}
	Msg('删除数据成功！','Referer');
	break;
 
}
$commend=$_GET['commend'];
$hot=$_GET['hot'];
$new=$_GET['new'];
$urls.='&commend='.$commend.'&hot='.$hot.'&new='.$new;
?>
<div id="container">
	<input type="text" id="search_key" class="search_input" size="30" value="<?php echo  $search_key ?>" />
	<input type="button" name="button" class="search_button" value="搜 索" onclick="location.href='?search_key='+$('search_key').value" />
	<?php
	$str='';
	$str.='分类查看：<select id="p_class" onchange="ChangeClass(this.value);"><option value="">请选择</option>';
	$query=mysql_query('select * from '.$language.'_products_class where p_sid=0 and p_tid=0 order by p_order,p_id');
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
	}
	}
	$str.='</select>';
	if ($meter!=''){
		$str.='<script type="text/javascript">$("p_class").value="'.$meter.'";</script>';
	}
	$str.='&nbsp;&nbsp;';
	 
	 
	 
	echo $str;
	?>
	<div class="view" style="margin-top:5px;">
		<h1>等级考试管理</h1>
		<form name="form1" id="form1" method="post" action="?act=deletes&<?php echo $urls ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="8%">ID号</td>
				<td width="14%">等级考试分类</td>			
				<td width="20%">等级考试名称</td>
                <td width="20%">报名截止时间</td>
				<td width="20%">考试时间</td>
				<td width="6%">排序</td>
				<td width="12%">操作</td>
        	</tr>
			<?php
			if ($meter==''){
				$page_sql='select * from '.$language.'_products where 1=1'.$sqls.' order by p_id desc';
			}
			else {
				if ($meter2==''){
					$page_sql='select * from '.$language.'_products where p_class='.$meter.$sqls.' order by p_order,p_id desc';
				}
				else {
					$page_sql='select * from '.$language.'_products where p_subclass='.$meter2.' order by p_order,p_id desc';
				}
			}
			if ($search_key!='') $page_sql="select * from ".$language."_products where p_name like '%{$search_key}%' order by p_id desc";
			$page_size=10;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size",$conn);
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					if ($row['p_subclass']==0){
						$class_name=RsField('select p_name from '.$language.'_products_class where p_id='.$row['p_class']);
					}
					else {
						$class_name=RsField('select p_name from '.$language.'_products_class where p_id='.$row['p_subclass']);
					}
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['p_id'].'" align="absmiddle" />&nbsp;'.$row['p_id'].'</td>';
					$str.='<td>'.$class_name.'</td>';
					$str.='<td>'.$row['p_name'].' </td>';
					$str.='<td>'.$row['p_date1'].'&nbsp;</td>';
					$str.='<td>'.$row['p_date'].'</td>';
					//$str.='<td>';if($row['p_commend']==1){$str.='<span style="color:#ff0000;">是</span> <a href="?act=uncommend&id='.$row['p_id'].'">(取消)</a>';}else{$str.='否 <a href="?act=commend&id='.$row['p_id'].'">(显示)</a>';}$str.='</td>';
					//$str.='<td>';if($row['p_index']==1){$str.='<span style="color:#ff0000;">是</span> <a href="?act=unindex&id='.$row['p_id'].'">(取消)</a>';}else{$str.='否 <a href="?act=index&id='.$row['p_id'].'">(显示)</a>';}$str.='</td>';
					$str.='<td><div class="inputorder" id="inputorder_'.$row['p_id'].'" contenteditable="true" onblur="Order(\'products\','.$row['p_id'].')">'.$row['p_order'].'</div></td>';
					$str.='<td><a href="products_modify.php?'.$urls.'&id='.$row['p_id'].'">修改</a> | <a href="?act=delete&id='.$row['p_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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