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
	mysql_query('delete from '.$language.'_news where n_id='.$id);
	Msg('','Referer');
	break;
case 'deletes';
	DeleteDatas('delete from '.$language.'_news where n_id');
	break;
case 'index';
	mysql_query('update '.$language.'_news set n_index=1 where n_id='.$id);
	Msg('','Referer');
	break;
case 'unindex';
	mysql_query('update '.$language.'_news set n_index=0 where n_id='.$id);
	Msg('','Referer');
	break;
}
/*
$query=mysql_query('select * from '.$language.'_news order by n_id');
if (mysql_num_rows($query)>0){
	$col=8;
	while($row=mysql_fetch_array($query)){
		mysql_query("update ".$language."_news set n_date='2014-08-16 $col:00:00' where n_id=".$row['n_id']);
		$col++;
	}
}
*/
?>
<div id="container">
	<?php
	$str='';
	$str.='分类查看：<select id="n_class" onchange="ChangeClass(this.value);"><option value="">请选择</option>';
	$query=mysql_query('select * from '.$language.'_news_class where n_sid=0 order by n_order,n_id');
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		$str.='<option value="'.$row['n_id'].'">'.$row['n_name'].'</option>';
	}
	}
	$str.='</select>';
	if ($meter!=''){
		$str.='<script type="text/javascript">$("n_class").value="'.$meter.'";</script>';
	}
	$str.='&nbsp;&nbsp;';
	if ($indexs==1){
		$str.='<a href="news.php" style="color:#ff0000; font-weight:bold;">首页显示</a>';
		$sqls=' where n_index=1';
	}
	else {
		$str.='<a href="news.php?indexs=1">首页显示</a>';
	}
	$str.='&nbsp;&nbsp;';
	echo $str;
	?>
	<input type="text" id="search_key" class="search_input" size="30" value="<?php echo  $search_key ?>" />&nbsp;<input type="button" name="button" class="search_button" value="搜 索" onclick="location.href='?search_key='+$('search_key').value" />
	<div class="view" style="margin-top:5px;">
		<h1>新闻管理</h1>
		<form name="form1" id="form1" method="post" action="?act=deletes&<?php echo $urls ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="8%">ID号</td>
                <td width="15%">新闻分类</td>
				<td width="40%">新闻标题</td>
				<td width="10%">首页显示</td>
                <td width="15%">发布时间</td>
				<td width="12%">操作</td>
        	</tr>
			<?php
			if ($meter==''){
				$page_sql='select n_id,n_class,n_index,n_title,n_date from '.$language.'_news'.$sqls.' order by n_date desc,n_id desc';
			}
			else {
				$page_sql='select n_id,n_class,n_index,n_title,n_date from '.$language.'_news where n_class='.$meter.' order by n_date desc,n_id desc';
			}
			if ($search_key!='') $page_sql="select n_id,n_class,n_index,n_title,n_date from ".$language."_news where n_title like '%{$search_key}%' order by n_date desc,n_id desc";
			$page_size=15;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['n_id'].'" align="absmiddle" />&nbsp;'.$row['n_id'].'</td>';
					$str.='<td>'.RsField('select n_name from '.$language.'_news_class where n_id='.$row['n_class']).'</td>';
					$str.='<td>'.$row['n_title'].'</td>';
					$str.='<td>';if($row['n_index']==1){$str.='<span style="color:#ff0000;">是</span> <a href="?act=unindex&id='.$row['n_id'].'">(取消)</a>';}else{$str.='否 <a href="?act=index&id='.$row['n_id'].'">(显示)</a>';}$str.='</td>';
					$str.='<td>'.date('Y-m-d',strtotime($row['n_date'])).'</td>';
					$str.='<td><a href="news_modify.php?'.$urls.'&id='.$row['n_id'].'">修改</a> | <a href="?act=delete&id='.$row['n_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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