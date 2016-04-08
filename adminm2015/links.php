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
	mysql_query('delete from '.$language.'_links where l_id='.$id);
	Msg('','Referer');
	break;
case 'deletes';
	DeleteDatas('delete from '.$language.'_links where l_id');
	break;
}
?>
<div id="container">
	<div class="view">
		<h1>合作伙伴</h1>
        <form name="form1" id="form1" method="post" action="?act=deletes&<?php echo $urls ?>">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="10%">序号</td>
            	<td width="35%">链接名称</td>
            	<td width="40%">链接地址</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			if ($meter==1){
				$page_sql='select * from '.$language.'_links where l_class=1 order by l_id';
				$page_size=15;
			}
			else {
				$page_sql='select * from '.$language.'_links where l_class=2 order by l_id';
				$page_size=10;
			}
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td><input type="checkbox" name="checkbox[]" value="'.$row['l_id'].'" align="absmiddle" />&nbsp;'.($page_number+1).'</td>';
					if ($meter==1){
						$str.='<td>'.$row['l_name'].'</td>';
					}
					else {
						if (stripos($row['l_image'],'http://')!==false){
							$str.='<td style="line-height:normal; font-size:0px;"><img src="'.$row['l_image'].'" height="40" style="margin:5px 0px;" /></td>';
						}
						else {
							$str.='<td style="line-height:normal; font-size:0px;"><img src="../'.$row['l_image'].'" height="40" style="margin:5px 0px;" /></td>';
						}
					}
					$str.='<td><a href="http://'.str_replace('http://','',$row['l_url']).'" target="_blank">'.$row['l_url'].'</a></td>';
					$str.='<td><a href="links_modify.php?'.$urls.'&id='.$row['l_id'].'">修改</a> | <a href="?act=delete&id='.$row['l_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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
		</form>
        <?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>