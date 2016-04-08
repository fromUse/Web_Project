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
	$sql='delete from '.$language.'_aboutus where a_id='.$id;
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
}
?>
<div id="container">
	<div class="view">
		<h1>关于我们</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="35%">子栏目类型</td>
            	<td width="35%">子栏目名称</td>
            	<td width="15%">子栏目排序</td>
				<td width="15%">操作</td>
        	</tr>
			<?php
			$str='';
			$query=mysql_query('select a_id,a_order,a_class,a_name from '.$language.'_aboutus order by a_order,a_id');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
				$str.='<td>';
				switch($row['a_class']){
				case 1:
					$str.='企业图片';
					break;
				case 2:
					$str.='企业荣誉';
					break;
				case 98:
					$str.='自定义链接';
					break;
				case 99:
					$str.='自定义内容';
					break;
				}
				$str.='</td>';
				$str.='<td>'.$row['a_name'].'</td>';
				$str.='<td style="padding:2px 0px;"><div class="inputorder" id="inputorder_'.$row['a_id'].'" contenteditable="true" onblur="Order(\'aboutus\','.$row['a_id'].')">'.$row['a_order'].'</div></td>';
				$str.='<td><a href="aboutus_modify.php?id='.$row['a_id'].'">修改</a> | <a href="?act=delete&id='.$row['a_id'].'" onclick="return ConfirmDel();">删除</a></td>';
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