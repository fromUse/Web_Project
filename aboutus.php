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
<link href="jquery/lightbox2.51/css/lightbox.css" rel="stylesheet" />
<script src="jquery/lightbox2.51/js/jquery-1.7.2.min.js"></script>
<script src="jquery/lightbox2.51/js/lightbox.js"></script>
</head>
<body>
<?php
if ($id=='') $id=RsField('select a_id from '.$language.'_aboutus order by a_order,a_id limit 0,1');
$query=mysql_query('select * from '.$language.'_aboutus where a_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	$a_class=$row['a_class'];
	$a_name=$row['a_name'];
	$a_content=$row['a_content'];
}
?>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
    	<div id="left"><?php require 'left.php'?></div>
        <div id="right">
            <?php
			$str='';
			$str.='<p id="title"><strong>'.$a_name.'</strong><span>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;<a href="aboutus.php">关于我们</a>&nbsp;>&nbsp;'.$a_name.'</span></p>';
			if ($a_class!='' && $a_class<98){
				$page_size=9;
				$page_sql='select * from '.$language.'_about_image where a_class='.$a_class.' order by a_order,a_id';
				$page_count=GetPageCount($page_size,$page_sql);
				if ($page>$page_count) $page=$page_count;
				$page_number=($page-1)*$page_size;
				$query=mysql_query($page_sql." limit $page_number,$page_size",$conn);
				if (mysql_num_rows($query)==0){
					$str.=NoData();
				}
				else{
					$str.='<div id="about_image_blk">';
					$str.='<div id="about_image">';
					while($row=mysql_fetch_array($query)){
						$str.='<dl>';
						$str.='<dt><a href="'.$row['a_image'].'" rel="lightbox[roadtrip]" title="'.$row['a_name'].'"><img src="'.$row['a_thumb'].'" /></a></dt>';
						$str.='<dd><a href="'.$row['a_image'].'" title="" target="_blank">'.$row['a_name'].'</a></dd>';
						$str.='</dl>';
					}
					$str.='<div class="clear"></div>';
					$str.='</div>';
					$str.='</div>';
					$str.='<div id="news_page">'.ShowPage3($page,$page_count,$language).'</div>';
				}
            }
			else {
				$str.='<div id="showtext"><div class="editorc">'.$a_content.'</div></div>';
			}
            echo $str;
			?>
        </div>
        <div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>