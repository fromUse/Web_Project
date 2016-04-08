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
if($act=='delete'){
	mysql_query('delete from '.$language.'_service where s_id='.$id);
	Msg('','');
}
?>
<div id="container">
	<div class="view">
		<h1>服务中心</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="70%">子栏目名称</td>
            	<td width="15%">子栏目排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$str='';
			$query=mysql_query('select s_id,s_order,s_class,s_name from '.$language.'_service order by s_order,s_id');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
				$str.='<td>'.$row['s_name'].'</td>';
				$str.='<td style="padding:2px 0px;"><div class="inputorder" id="inputorder_'.$row['s_id'].'" contenteditable="true" onblur="Order(\'service\','.$row['s_id'].')">'.$row['s_order'].'</div></td>';
				$str.='<td><a href="service_modify.php?id='.$row['s_id'].'">修改</a> | <a href="?act=delete&id='.$row['s_id'].'" onclick="return ConfirmDel();">删除</a></td>';
				$str.='</tr>';
			}
			}
			echo $str;
			?>
		</table>
	</div>
</div>
</body>
</html>