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
	mysql_query('delete from message where m_id='.$id);
	Msg('','Referer');
	break;
case 'deletes';
	DeleteDatas('delete from message where m_id');
	break;
}
?>
<div id="container">
	<div class="view">
		<h1>留言管理</h1>
		<form name="form1" id="form1" method="post" action="?act=deletes<?php echo "&page=$page" ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="10%">ID号</td>
				<td width="45%">主题</td>
                <td width="15%">姓名</td>
                <td width="15%">留言时间</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$page_size=15;
			$page_sql='select m_id,m_name,m_title,m_date from message order by m_id desc';
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['m_id'].'" align="absmiddle" />&nbsp;'.$row['m_id'].'</td>';
					$str.='<td>'.$row['m_title'].'</td>';
					$str.='<td>'.$row['m_name'].'</td>';
					$str.='<td>'.date('Y-m-d',strtotime($row['m_date'])).'</td>';
					$str.='<td><a href="message_detail.php?page='.$page.'&id='.$row['m_id'].'">详细</a> | <a href="?act=delete&id='.$row['m_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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