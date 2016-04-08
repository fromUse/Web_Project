<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '购物车 - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $class_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $class_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_cn.css" type="text/css" />
<link rel="stylesheet" href="css/cart.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript" src="inc/products.js"></script>
</head>
<body>
<?php
if ($user=='') Msg('','login.php');
switch($act){
case 'delete';
	$sql='delete from cart where c_id='.$id.' and c_user_id='.$user_id;
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','Referer');
	break;
case 'delete2';
	$sql='delete from cart where c_id='.$id.' and c_user_id='.$user_id;
	mysql_query($sql) or die(mysql_error($sql));
	$sql='delete from cart_kw where c_user_id='.$user_id.' and c_cart_id='.$id;
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','Referer');
	break;
case 'deletes';
	$query=mysql_query('select * from cart where c_user_id='.$user_id);
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		if ($row['c_products_type']==2){
			mysql_query('delete from cart_kw where c_cart_id='.$row['c_id']);
		}
	}
	}
	mysql_query('delete from cart where c_user_id='.$user_id);
	Msg('','Referer');
	break;
}
if ($_POST['act']=='addcart'){
	$id=$_POST['p_id'];
	$quantity=$_POST['p_quantity'];
	if (RsNum('select * from cart where c_user_id='.$user_id.' and c_products_id='.$id)==0){
		mysql_query("insert into cart(c_user,c_user_id,c_products_id,c_products_quantity) values('$user',$user_id,$id,$quantity)");
	}
	else {
		mysql_query("update cart set c_products_quantity=$quantity where c_user='$user' and c_products_id=$id");
	}
	Msg('','');
}
?>
<div id="main">
	<?php require 'header.php';?>
	<div id="content">
		<div id="cart">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr id="cart_title">
				<td width="30%" style="text-align:left;"><span style="padding-left:22px;"></span>等级考试名称</td>
				<td width="15%">&nbsp;</td>
				<td width="15%">价格</td>
				<td width="15%">&nbsp;</td>
				<td width="15%">小计</td>
				<td width="10%">&nbsp;</td>
		    </tr>
			<?php
			$str='';
			$col=0;
			$totalamount=0;
			$query=mysql_query("select * from cart where c_user_id='$user_id' order by c_id");
			if (mysql_num_rows($query)==0){
				$str.='<tr><td colspan="6" style="border:none;"><p class="nodata">您还没选择报名科目...</p></td></tr>';
			}
			else{
				while($row=mysql_fetch_array($query)){
					if ($row['c_products_type']==1){
						$query2=mysql_query('select p_id,p_class,p_name,p_image,p_thumb,p_price from '.$language.'_products where p_id='.$row['c_products_id']);
						if (mysql_num_rows($query2)>0){
							$row2=mysql_fetch_array($query2);
							$p_price=$row2['p_price'];
							$p_amount=$p_price*$row['c_products_quantity'];
							$totalamount=$totalamount+$p_amount;
							$str.='<tr>';
							$str.='<td><a href="products_detail.php?id='.$row2['p_id'].'" target="_blank"><img src="'.$row2['p_thumb'].'" width="60" /></a></td>';
							$str.='<td style="text-align:left; font-size:14px; line-height:18px;"><a href="products_detail.php?id='.$row2['p_id'].'" target="_blank">'.$row2['p_name'].'</a></td>';
							$str.='<td class="price">￥'.$p_price.'</td>';
							$str.='<td>  <input type="hidden" id="quantity_'.$col.'" value="'.$row['c_products_quantity'].'" maxlength="3" onkeyup="Quantity('.$row['c_id'].','.$col.','.$p_price.',2)" />  </td>';
							$str.='<td class="price">￥<span id="cart_amount_'.$col.'">'.$p_amount.'</span></td>';
							$str.='<td style="text-align:right;"><a href="?act=delete&id='.$row['c_id'].'" onclick="return confirm(\'您确认要删除该数据吗？\');"><img src="images/cart_delete.jpg" /></a></td>';
							$str.='</tr>';
							$col++;
						}
					}
					if ($row['c_products_type']==2){
						$query2=mysql_query('select p_id,p_class,p_name,p_image,p_thumb from '.$language.'_products2 where p_id='.$row['c_products_id']);
						if (mysql_num_rows($query2)>0){
							$row2=mysql_fetch_array($query2);
							$price2=0;
							$query3=mysql_query('select * from cart_kw where c_cart_id='.$row['c_id']);
							if (mysql_num_rows($query3)>0){
							while($row3=mysql_fetch_array($query3)){
								switch($row3['c_products2_type']){
								case 1:
									$sql_kw='kw';
									break;
								case 2:
									$sql_kw='rc';
									break;
								case 3:
									$sql_kw='sc';
									break;
								}
								$p_price2=RsField('select p_price from '.$language.'_products2_'.$sql_kw.' where p_id='.$row3['c_products2_id']);
								$price2=$price2+$row3['c_products2_quantity']*$p_price2;
							}
							}
							$p_price=$price2;
							$p_amount=$p_price*$row['c_products_quantity'];
							$totalamount=$totalamount+$p_amount;
							$str.='<tr>';
							$str.='<td style="border-bottom:none;"><a href="products2_detail.php?id='.$row2['p_id'].'" target="_blank"><img src="'.$row2['p_thumb'].'" width="60" /></a></td>';
							$str.='<td style="text-align:left; font-size:14px; line-height:18px; border-bottom:none;"><a href="products2_detail.php?id='.$row2['p_id'].'" target="_blank">'.$row2['p_name'].'</a></td>';
							$str.='<td style="border-bottom:none;" class="price">￥'.$p_price.'</td>';
							$str.='<td style="border-bottom:none;"><div class="quantity"><span style="left:0px;" onclick="Quantity('.$row['c_id'].','.$col.','.$p_price.',0)"></span><input type="text" id="quantity_'.$col.'" value="'.$row['c_products_quantity'].'" maxlength="3" onkeyup="Quantity('.$row['c_id'].','.$col.','.$p_price.',2)" /><span style="right:0px;" onclick="Quantity('.$row['c_id'].','.$col.','.$p_price.',1)"></span></div></td>';
							$str.='<td style="border-bottom:none;" class="price">￥<span id="cart_amount_'.$col.'">'.$p_amount.'</span></td>';
							$str.='<td style="text-align:right; border-bottom:none;"><a href="?act=delete2&id='.$row['c_id'].'" onclick="return confirm(\'您确认要删除该数据吗？\');"><img src="images/cart_delete.jpg" /></a></td>';
							$str.='</tr>';
							$str.='<tr>';
							$str.='<td style="padding-top:0px;">&nbsp;</td>';
							$str.='<td colspan="5" style="padding-top:0px; text-align:left;line-height:20px; color:#999;">';
							 
							$query3=mysql_query('select * from cart_kw where c_cart_id='.$row['c_id'].' and c_products2_type=1 order by c_id');
							if (mysql_num_rows($query3)>0){
							while($row3=mysql_fetch_array($query3)){
								$p_name=RsField('select p_name from '.$language.'_products2_kw where p_id='.$row3['c_products2_id']);
								$str.=$p_name.'×'.$row3['c_products2_quantity'].'份&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							}
							 
							$query3=mysql_query('select * from cart_kw where c_cart_id='.$row['c_id'].' and c_products2_type=2 order by c_id');
							if (mysql_num_rows($query3)>0){
							while($row3=mysql_fetch_array($query3)){
								$p_name=RsField('select p_name from '.$language.'_products2_rc where p_id='.$row3['c_products2_id']);
								$str.=$p_name.'×'.$row3['c_products2_quantity'].'份&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							}
							 
							$query3=mysql_query('select * from cart_kw where c_cart_id='.$row['c_id'].' and c_products2_type=3 order by c_id');
							if (mysql_num_rows($query3)>0){
							while($row3=mysql_fetch_array($query3)){
								$p_name=RsField('select p_name from '.$language.'_products2_sc where p_id='.$row3['c_products2_id']);
								$str.=$p_name.'×'.$row3['c_products2_quantity'].'份&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							}
							$str.='</td>';
							$str.='</tr>';
							$col++;
						}
					}
				}
			}
			echo $str;
			?>
		</table>
		</div>
		<?php
		$str='';
		$backurl=$_SERVER['HTTP_REFERER'];
		if ($backurl=='') $backurl='./';
		if (stripos($backurl,'user')!==false) $backurl='./';
		if ($totalamount==0){
			$str.='<p><input type="button" class="cart_button_back" value="继续购物" onclick="location.href=\''.$backurl.'\'" /></p>';
		}
		else {
			$str.='<p id="cart_total"><a href="?act=deletes" onclick="return confirm(\'您确认要清空购物车吗？\');">清空购物车</a>金额总计：<span class="price">￥<span id="cart_totalamount">'.$totalamount.'</span></span></p>';
			$str.='<p id="cart_button"><input type="button" class="cart_button_back" value="继续购物" onclick="location.href=\''.$backurl.'\'" /><input type="button" class="cart_button_back" value="立即结算" style="position:absolute; top:0px; right:0px;" onclick="location.href=\'checkout.php\'" /></p>';
		}
		echo $str;
		?>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>