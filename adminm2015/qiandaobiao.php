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
$u_type=$_GET['type'];
switch($act){
case 'delete';
	mysql_query('delete from kaochang where k_id='.$id);
	Msg('','Referer');
	break; 
}
?>
<div id="container">
	<div class="view">
		<h1>签到表打印---考试编排（试室）</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">         	
				
                <td width="15%">试室名称</td> 
				<td width="15%">操作</td>
        	</tr>
			<?php
			$page_size=100;
			$page_sql='select distinct k_kaoshibianpai,k_kaoshibianpaiid from kaochang order by k_kaoshibianpai';
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td>'.$row['k_kaoshibianpai'].'&nbsp;</td>';				
					$str.='<td><a href="qdb_daying.php?id='.$row['k_kaoshibianpaiid'].'" target="_blank">打印</a> ';
					//$str.='| <a href="?act=delete&id='.$row['k_id'].'" onclick="return ConfirmDel();">删除</a></td>';//
					$str.='</tr>';
					$page_number++;
				}
				echo $str;
			}
			else {
				$page_show=false;
			}
			?>
		</table> 
		<?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>