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
<?php if ($cid=='') $cid=RsField('select n_id from '.$language.'_news_class order by n_order,n_id limit 0,1')?>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
		<div id="left"><?php require 'left.php'?></div>
		<div id="right">
			<?php
			$str='';
			if ($cid==''){
				$str.='<p id="title"><strong>新闻动态</strong>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;新闻动态</p>';
				$page_sql='select n_id,n_class,n_title,n_date from '.$language.'_news order by n_date desc,n_id desc';
			}
			else{
				$class_name=RsField('select n_name from '.$language.'_news_class where n_id='.$cid);
				$str.='<p id="title"><strong>'.$class_name.'</strong>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;<a href="news.php">新闻动态</a>&nbsp;>&nbsp;'.$class_name.'</p>';
				$page_sql='select n_id,n_class,n_title,n_date from '.$language.'_news where n_class='.$cid.' order by n_date desc,n_id desc';
			}
			$page_size=12;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size",$conn);
			if (mysql_num_rows($query)==0){
				$str.=NoData();
			}
			else{
				if ($_GET['cid']!='') $cid=$_GET['cid'];
				$str.='<ul id="news">';
				while($row=mysql_fetch_array($query)){
					$str.='<li><span>'.date('Y-m-d',strtotime($row['n_date'])).'</span><a href="news_detail.php?id='.$row['n_id'].'&cid='.$cid.'&page='.$page.'">'.$row['n_title'].'</a></li>';
				}
				$str.='</ul>';
				$str.='<div id="news_page">'.ShowPage3($page,$page_count,$language).'</div>';
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