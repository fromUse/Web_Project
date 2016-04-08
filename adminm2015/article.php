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
	mysql_query('delete from '.$language.'_article where a_id='.$id);
	Msg('','Referer');
	break;
case 'deletes';
	DeleteDatas('delete from '.$language.'_article where a_id');
	break;
}
/*
$query=mysql_query('select * from '.$language.'_article order by a_id');
if (mysql_num_rows($query)>0){
	$col=1;
	while($row=mysql_fetch_array($query)){
		mysql_query("update ".$language."_article set a_date='2014-08-16 $col:00:00' where a_id=".$row['a_id']);
		$col++;
	}
}
*/
?>
<div id="container">
	<?php
	$str='';
	$str.='分类查看：<select id="a_class" onchange="ChangeClass(this.value);"><option value="">请选择</option>';
	$query=mysql_query('select * from '.$language.'_article_class order by a_order,a_id');
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		$str.='<option value="'.$row['a_id'].'">'.$row['a_name'].'</option>';
	}
	}
	$str.='</select>';
	if ($meter!=''){
		$str.='<script type="text/javascript">$("a_class").value="'.$meter.'";</script>';
	}
	echo $str;
	?>
	<input type="text" id="search_key" class="search_input" size="30" value="<?php echo  $search_key ?>" />&nbsp;<input type="button" name="button" class="search_button" value="搜 索" onclick="location.href='?search_key='+$('search_key').value" />
	<div class="view" style="margin-top:5px;">
		<h1>文章管理</h1>
		<form name="form1" id="form1" method="post" action="?act=deletes&<?php echo $urls ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="8%">ID号</td>
                <td width="15%">文章分类</td>
				<td width="50%">文章标题</td>
                <td width="15%">发布时间</td>
				<td width="12%">操作</td>
        	</tr>
			<?php
			if ($meter==''){
				$page_sql='select a_id,a_class,a_title,a_date from '.$language.'_article order by a_date desc,a_id desc';
			}
			else {
				$page_sql='select a_id,a_class,a_title,a_date from '.$language.'_article where a_class='.$meter.' order by a_date desc,a_id desc';
			}
			if ($search_key!='') $page_sql="select a_id,a_class,a_title,a_date from ".$language."_article where a_title like '%{$search_key}%' order by a_date desc,a_id desc";
			$page_size=15;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['a_id'].'" align="absmiddle" />&nbsp;'.$row['a_id'].'</td>';
					$str.='<td>'.RsField('select a_name from '.$language.'_article_class where a_id='.$row['a_class']).'</td>';
					$str.='<td>'.$row['a_title'].'</td>';
					$str.='<td>'.date('Y-m-d',strtotime($row['a_date'])).'</td>';
					$str.='<td><a href="article_modify.php?'.$urls.'&id='.$row['a_id'].'">修改</a> | <a href="?act=delete&id='.$row['a_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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