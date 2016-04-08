<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';

if ($id=='') exit('Error: 参数错误！');
$query=mysql_query('select * from '.$language.'_products where p_id='.$id,$conn);
if (mysql_num_rows($query)==0) Msg('','products.php');
$row=mysql_fetch_array($query);
$p_class=$row['p_class'];
$p_order=$row['p_order'];
$p_name=$row['p_name'];
$p_price=$row['p_price']; 
$p_date1=$row['p_date1'];
$p_date=$row['p_date'];
$p_desc=$row['p_desc'];
 
$p_content=$row['p_content'];
 
 
$cid=$p_class;
$sid=$p_subclass;
$class_name=RsField('select p_name from '.$language.'_products_class where p_id='.$p_class);
$search_key=ReStr2($_GET['search_key']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $site_keyword?>" />
<meta name="description" content="<?php echo $site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<link rel="stylesheet" href="css/products.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript" src="inc/products.js"></script>
</head>
<body>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
		<div id="left"><?php require 'left.php'?></div>
		<div id="right">
			<?php
			$str='';
			$str.='<div id="products_show">';
			 
			$str.='<div id="products_desc_box">';
            $str.='<h1 id="products_name">'.$p_name.'</h1>';
			$str.='<div id="products_ms">';
			 
			$str.='<p>报名截止时间：'.$p_date1.'</p>';
			$str.='<p>考试时间：'.$p_date.'</p>';
			 
			$str.='</div>';
			 
			$str.='<p id="products_desc">'.HTMLEnCodes($p_desc).'</p>';
			 
			$str.='<div id="products_price"><span class="price"><strong>￥'.$p_price.'</strong> / </span>人';
			 
			$str.=' <input type="text" name="p_quantity" id="p_quantity_val" value="1" maxlength="3" /> ';
			$str.='</div>';
			$str.='<div id="products_prices">';
			$str.='总计：<span class="price"><strong>￥<span id="p_prices">'.$p_price.'.00</span></strong></span>';
			if ($user==''){
				$str.='<a href="login.php" id="products_button" style="color:#fff;">加入购物车</a>';
			}
			else {
				$str.='<span id="products_button" onclick="AddCart('.$id.')">加入购物车</span>';
			}
			$str.='</div>';
			$str.='</div>';
			$str.='<div class="clear"></div>';
			$str.='</div>';
			 
			 
		 
			$str.='<p class="products_title">描述</p>';
			$str.='<div class="products_content"><div class="editorc">'.$p_content.'</div></div>';
			 
			 
			echo $str;
			?>
		</div>
		<div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>