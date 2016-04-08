<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';

if ($id=='') exit('Error: 参数错误！');
$query=mysql_query('select * from '.$language.'_news where n_id='.$id,$conn);
if (mysql_num_rows($query)==0) Msg('','news.php');
$row=mysql_fetch_array($query);
$n_class=$row['n_class'];
$n_title=$row['n_title'];
$n_content=$row['n_content'];
$n_date=$row['n_date'];
$site_name=$n_title.' - '.$site_name;
$site_keyword=$n_title.' - '.$site_keyword;
$site_description=$n_title.' - '.$site_description;
if ($row['k_name']!='') $site_name=$row['k_name'];
if ($row['k_keyword']!='') $site_keyword=$row['k_keyword'];
if ($row['k_description']!='') $site_description=$row['k_description'];
$cid=$n_class;
$class_name=RsField('select n_name from '.$language.'_news_class where n_id='.$n_class);
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
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
		<div id="left"><?php require 'left.php'?></div>
		<div id="right">
			<?php
			$str='';
			$str.='<p id="title"><strong>'.$class_name.'</strong>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;<a href="news.php">新闻动态</a>&nbsp;>&nbsp;<a href="news.php?cid='.$n_class.'">'.$class_name.'</a></p>';
            $str.='<h1 id="news_title">'. $n_title.'</h1>';
			$str.='<p id="news_info">发布日期：'.$n_date.'</p>';
            $str.=' <div id="showtext" style="width:680px;"><div class="editorc">'.$n_content.'</div></div>';
			$str.='<div id="prenext">';
			$cid=$_GET['cid'];
			if ($cid!=''){
				if (!is_numeric($cid)) $cid='';
			}
			if ($cid!='') $pn_sql='n_class='.$cid.' and ';
			$pre_id=RsField("select n_id from ".$language."_news where ".$pn_sql."n_date>'$n_date' order by n_date,n_id desc limit 0,1");
			$next_id=RsField("select n_id from ".$language."_news where ".$pn_sql."n_date<'$n_date' order by n_date desc,n_id desc limit 0,1");
			if ($language=='cn'){
				if ($pre_id==''){
					$str.='<p><strong>上一篇：</strong>没有了</p>';
				}
				else{
					$str.='<p><strong>上一篇：</strong><a href="news_detail.php?id='.$pre_id.'&cid='.$cid.'&page='.$page.'">'.RsField('select n_title from '.$language.'_news where n_id='.$pre_id).'</a></p>';
				}
				if ($next_id==''){
					$str.='<p><strong>下一篇：</strong>没有了</p>';
				}
				else{
					$str.='<p><strong>下一篇：</strong><a href="news_detail.php?id='.$next_id.'&cid='.$cid.'&page='.$page.'">'.RsField('select n_title from '.$language.'_news where n_id='.$next_id).'</a></p>';
				}
				$str.='<a href="news.php?cid='.$cid.'&page='.$page.'" id="prenext_back"><strong>&lt;- 返回列表</strong></a>';
			}
			else{
				if ($pre_id==''){
					$str.='<p><strong>Prev:</strong> </p>';
				}
				else{
					$str.='<p><strong>Prev:</strong> <a href="news_detail.php?id='.$pre_id.'&cid='.$cid.'&page='.$page.'">'.RsField('select n_title from '.$language.'_news where n_id='.$pre_id).'</a></p>';
				}
				if ($next_id==''){
					$str.='<p><strong>Next:</strong> </p>';
				}
				else{
					$str.='<p><strong>Next:</strong> <a href="news_detail.php?id='.$next_id.'&cid='.$cid.'&page='.$page.'">'.RsField('select n_title from '.$language.'_news where n_id='.$next_id).'</a></p>';
				}
				$str.='<a href="news.php?cid='.$cid.'&page='.$page.'" id="prenext_back"><strong>&lt;- Back</strong></a>';
			}
			$str.='</div>';
			
			echo $str;
			?>
		</div>
		<div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>