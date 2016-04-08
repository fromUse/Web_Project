<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $site_keyword?>" />
<meta name="description" content="<?php echo $site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
</head>
<body>
<?php
if ($id=='') $id=RsField('select s_id from '.$language.'_service order by s_order,s_id limit 0,1');
$query=mysql_query('select * from '.$language.'_service where s_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	$s_name=$row['s_name'];
	$s_content=$row['s_content'];
}
?>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
    	<div id="left"><?php require 'left.php'?></div>
        <div id="right">
			<?php
			$str='';
			$str.='<p id="title"><strong>'.$s_name.'</strong>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;<a href="service.php">服务中心</a>&nbsp;>&nbsp;'.$s_name.'</p>';
			$str.='<div id="showtext"><div class="editorc">'.$s_content.'</div></div>';
			
			echo $str;
			?>
        </div>
        <div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>