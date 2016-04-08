<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';

if ($id=='') exit('Error: 参数错误！');
$query=mysql_query('select * from '.$language.'_products2 where p_id='.$id,$conn);
if (mysql_num_rows($query)==0) Msg('','products2.php');
$row=mysql_fetch_array($query);
$p_class=$row['p_class'];
$p_order=$row['p_order'];
$p_name=$row['p_name'];
$p_price=$row['p_price'];
$p_nd=$row['p_nd'];
$p_time=$row['p_time'];
$p_desc=$row['p_desc'];
$p_image=$row['p_image'];
$p_file=$row['p_file'];
$p_video=$row['p_video'];
$p_content=$row['p_content'];
$p_content2=$row['p_content2'];
$site_name=$p_name.' - '.$site_name;
$site_keyword=$p_name.' - '.$site_keyword;
$site_description=$p_name.' - '.$site_description;
if ($row['k_name']!='') $site_name=$row['k_name'];
if ($row['k_keyword']!='') $site_keyword=$row['k_keyword'];
if ($row['k_description']!='') $site_description=$row['k_description'];
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
			$str.='<img src="'.$p_image.'" id="products_image" />';
			$str.='<div id="products_desc_box">';
            $str.='<h1 id="products_name">'.$p_name.'</h1>';
			$str.='<div id="products_ms">';
			$str.='<p>难度：';
			for($i=1;$i<=$p_nd;$i++){
				$str.='<img src="images/nandu.jpg" /> ';
			}
			$str.='</p>';
			$str.='<p>时间：'.$p_time.'</p>';
			$str.='<p>送达日期：5点前下单次日送达</p>';
			$str.='</div>';
			$str.='<p id="products_myf">17点前下单次日送达，满'.$site_postage_amount.'元免运费</p>';
			$str.='<p id="products_desc">'.HTMLEnCodes($p_desc).'</p>';
			if ($p_file!='') $str.='<p id="products_file"><a href="'.$p_file.'" class="a2" target="_blank">下载这个食谱的PDF文件</a></p>';
			$str.='<div id="products_prices" style="margin-top:15px; border-top:2px solid #f0f0f0;">';
			if ($user==''){
				$str.='<a href="login.php" id="products_button" style="color:#fff;">选择口味</a>';
			}
			else {
				$str.='<span id="products_button" onclick="Products2kw()">选择口味</span>';
			}
			$str.='</div>';
			$str.='</div>';
			$str.='<div class="clear"></div>';
			$str.='</div>';
			if ($p_video!=''){
				$str.='<p class="products_title">视频教学</p>';
				$str.='<div id="products_video"><embed src="'.$p_video.'" quality="high" width="700" height="430" allowFullScreen="true" wmode="transparent" type="application/x-shockwave-flash"></embed></div>';
			}
			$str.='<p class="products_title">食材配料</p>';
			$str.='<div class="products_content"><div class="editorc">'.$p_content2.'<br /><img src="images/t6.jpg" /></div></div>';
			$str.='<p class="products_title">制作方法与流程介绍</p>';
			$str.='<div class="products_content"><div class="editorc">'.$p_content.'</div></div>';
			$str.='<p class="products_title">&nbsp;</p>';
			$str.='<img src="images/t7.jpg" />';
			echo $str;
			?>
		</div>
		<div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
<div id="products2_sx_bg"></div>
<div id="products2_sx_win">
	<img src="images/close.jpg" id="products2_close" onclick="DisDiv('products2_sx_bg',0);DisDiv('products2_sx_win',0);" />
	<div class="products2_sx" id="products2_sx_p1">
		<p class="products2_sx_title">选择口味</p>
		<div class="products2_sx_box">
			<div class="products2_sx_list">
			<div class="products2_sx_lists">
			<?php
			$col=0;
			$str='';
			$query=mysql_query('select * from '.$language.'_products2_kw where p_class='.$id.' order by p_order,p_id desc');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<dl>';
				$str.='<dt><img src="'.$row['p_image'].'" /></dt>';
				$str.='<dd>';
				$str.='<strong class="products2_sx_name">'.$row['p_name'].'</strong>';
				$str.='<strong class="products2_sx_price">￥<span id="p1_price_'.$col.'">'.$row['p_price'].'</span></strong>';
				$str.='<div class="products2_sx_quantity">';
				$str.='<div class="quantity">';
				$str.='<span style="left:0px;" onclick="Products2Quantity(1,'.$col.',0)"></span>';
				$str.='<input type="text" id="p1_quantity_'.$col.'" value="0" maxlength="3" onkeyup="Products2Quantity(1,'.$col.',2)" />';
				$str.='<span style="right:0px;" onclick="Products2Quantity(1,'.$col.',1)"></span>';
				$str.='</div>';
				$str.='</div>';
				$str.='<span class="products2_sx_id" id="p1_id_'.$col.'">'.$row['p_id'].'</span>';
				$str.='</dd>';
				$str.='</dl>';
				$col++;
			}
			}
			$str.='<div class="clear" style="height:15px;"></div>';
			echo $str;
			?></div></div>
		</div>
		<?php if($col>0){?>
		<div class="products2_sx_button">合计：<strong>￥<span id="p1_total">0</span></strong><p><span onclick="Products2sx(2)">下一步</span></p></div>
		<?php }?>
	</div>
	<div class="products2_sx" id="products2_sx_p2" style="display:none;">
		<p class="products2_sx_title">选择肉菜</p>
		<div class="products2_sx_box">
			<div class="products2_sx_list">
			<div class="products2_sx_lists">
			<?php
			$col=0;
			$str='';
			$query=mysql_query('select * from '.$language.'_products2_rc where p_class='.$id.' order by p_order,p_id desc');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<dl>';
				$str.='<dt><img src="'.$row['p_image'].'" /></dt>';
				$str.='<dd>';
				$str.='<strong class="products2_sx_name">'.$row['p_name'].'</strong>';
				$str.='<strong class="products2_sx_price">￥<span id="p2_price_'.$col.'">'.$row['p_price'].'</span></strong>';
				$str.='<div class="products2_sx_quantity">';
				$str.='<div class="quantity">';
				$str.='<span style="left:0px;" onclick="Products2Quantity(2,'.$col.',0)"></span>';
				$str.='<input type="text" id="p2_quantity_'.$col.'" value="0" maxlength="3" onkeyup="Products2Quantity(2,'.$col.',2)" />';
				$str.='<span style="right:0px;" onclick="Products2Quantity(2,'.$col.',1)"></span>';
				$str.='</div>';
				$str.='</div>';
				$str.='<span class="products2_sx_id" id="p2_id_'.$col.'">'.$row['p_id'].'</span>';
				$str.='</dd>';
				$str.='</dl>';
				$col++;
			}
			}
			$str.='<div class="clear" style="height:15px;"></div>';
			echo $str;
			?></div></div>
		</div>
		<?php if($col>0){?>
		<div class="products2_sx_button">合计：<strong>￥<span id="p2_total">0</span></strong><p><span onclick="Products2sx(1)">上一步</span><span onclick="Products2sx(3)">下一步</span></p></div>
		<?php }?>
	</div>
	<div class="products2_sx" id="products2_sx_p3" style="display:none;">
		<p class="products2_sx_title">选择素菜</p>
		<div class="products2_sx_box">
			<div class="products2_sx_list">
			<div class="products2_sx_lists">
			<?php
			$col=0;
			$str='';
			$query=mysql_query('select * from '.$language.'_products2_sc where p_class='.$id.' order by p_order,p_id desc');
			if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<dl>';
				$str.='<dt><img src="'.$row['p_image'].'" /></dt>';
				$str.='<dd>';
				$str.='<strong class="products2_sx_name">'.$row['p_name'].'</strong>';
				$str.='<strong class="products2_sx_price">￥<span id="p3_price_'.$col.'">'.$row['p_price'].'</span></strong>';
				$str.='<div class="products2_sx_quantity">';
				$str.='<div class="quantity">';
				$str.='<span style="left:0px;" onclick="Products2Quantity(3,'.$col.',0)"></span>';
				$str.='<input type="text" id="p3_quantity_'.$col.'" value="0" maxlength="3" onkeyup="Products2Quantity(3,'.$col.',2)" />';
				$str.='<span style="right:0px;" onclick="Products2Quantity(3,'.$col.',1)"></span>';
				$str.='</div>';
				$str.='</div>';
				$str.='<span class="products2_sx_id" id="p3_id_'.$col.'">'.$row['p_id'].'</span>';
				$str.='</dd>';
				$str.='</dl>';
				$col++;
			}
			}
			$str.='<div class="clear" style="height:15px;"></div>';
			echo $str;
			?></div></div>
		</div>
		<?php if($col>0){?>
		<div class="products2_sx_button">合计：<strong>￥<span id="p3_total">0</span></strong><p><span onclick="Products2sx(2)">上一步</span><span onclick="AddCart2(<?php echo $id ?>)">加入购物车</span></p></div>
		<?php }?>
	</div>
</div>
</body>
</html>