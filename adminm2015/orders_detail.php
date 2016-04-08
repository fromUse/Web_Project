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
<style type="text/css">
.edit td {
	line-height:20px;
}
</style>
</head>
<body>
<?php
switch($act){
case 'delivery':
	$o_delivery=ReStra($_POST['o_delivery']);
	mysql_query("update orders set o_status=2,o_delivery='$o_delivery' where o_id=$id");
	Msg('','Referer');
	break;
case 'delivery2';
	$o_delivery=ReStra($_POST['o_delivery']);
	mysql_query("update orders set o_delivery='$o_delivery' where o_id=$id");
	Msg('','Referer');
	break;
case 'delivery_pay1':
	$o_delivery=ReStra($_POST['o_delivery']);
	mysql_query("update orders set o_status=2,o_delivery='$o_delivery' where o_id=$id");
	Msg('','Referer');
	break;
case 'shq':
	mysql_query('update orders set o_status=3 where o_id='.$id);
	Msg('','Referer');
	break;
}
?>
<div id="container">
	<div class="edit">
    	<h1>订单管理</h1>
		<?php
        $query=mysql_query("select * from orders where o_id=".$id);
		$row=mysql_fetch_array($query);
        ?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
            <td class="edit_title">订 单 号：</td>
            <td><?php echo $row['o_code'] ?></td>
          </tr>
		  <tr>
            <td class="edit_title">订单金额：</td>
            <td>￥<?php echo $row['o_amount'] ?></td>
          </tr>
		  <tr>
            <td class="edit_title">订单时间：</td>
            <td><?php echo $row['o_date'] ?></td>
          </tr>
          <tr>
            <td class="edit_title">用 户 名：</td>
            <td><?php if ($row['o_user_id']==0){echo '匿名用户';}else{echo $row['o_user'];} ?></td>
          </tr>
		  <tr>
            <td class="edit_title">支付方式：</td>
            <td style="font-weight:bold;"><?php
			$str='';
			switch($row['o_payment']){
			case 1:
				$str.='银行汇款/转帐';
				if ($row['o_status']>0) $str.='<textarea name="o_paycode" style="padding:5px; width:98%; height:120px; color:#333;">'.$row['o_paycode'].'</textarea>';
				break;
			case 2:
				$str.='货到付款';
				break;
			case 3:
				$str.='支付宝';
				break;
			case 4:
				$str.='网银在线';
				break;
			}
			
			echo $str;
			?>
			</td>
          </tr>
		  <!--
		  <tr>
            <td class="edit_title">配送方式：</td>
            <td style="font-weight:bold;"><?php
			$str='';
			switch($row['o_shipment']){
			case 1:
				$str.='顺丰速运';
				break;
			case 2:
				$str.='圆通快递';
				break;
			case 3:
				$str.='EMS快递';
				break;
			case 4:
				$str.='宅急送';
				break;
			}
			
			echo $str;
			?>
			</td>
          </tr>
		  -->
		  <tr>
            <td class="edit_title">订单状态：</td>
            <td style="font-weight:bold;"><?php
			$str='';
			switch($row['o_status']){
			case 0:
				$str.='未支付';
				break;
			case 1:
				$str.='等待发货';
				if ($row['o_payment']==1){
					$str.='<form name="form1" method="post" action="?act=delivery_pay1&meter='.$meter.'&id='.$id.'&code='.$row['o_code'].'&user_id='.$row['o_user_id'].'&page='.$page.'">
					<textarea name="o_delivery" style="padding:5px; width:98%; height:100px; color:#333; line-height:16px;" onfocus="if(this.value==\'请在这里输入快递单号等发货信息\')this.value=\'\'">请在这里输入快递单号等发货信息</textarea><br />
					<input name="button" type="button" value=" 确认已收到款并发货 " class="button" onclick="if(confirm(\'您要确认发货吗？\')){if(this.form.o_delivery.value==\'请在这里输入快递单号等发货信息\'){this.form.o_delivery.value=\'\'};this.form.submit();}" />
					</form>';
				}
				else {
					$str.='<form name="form1" method="post" action="?act=delivery&meter='.$meter.'&id='.$id.'&page='.$page.'">
					<textarea name="o_delivery" style="padding:5px; width:98%; height:100px; color:#333; line-height:16px;" onfocus="if(this.value==\'请在这里输入快递单号等发货信息\')this.value=\'\'">请在这里输入快递单号等发货信息</textarea><br />
					<input name="button" type="button" value=" 确认发货 " class="button" onclick="if(confirm(\'您要确认发货吗？\')){if(this.form.o_delivery.value==\'请在这里输入快递单号等发货信息\'){this.form.o_delivery.value=\'\'};this.form.submit();}" />
					</form>';
				}
				break;
			case 2:
				$str.='已发货，等待收货';
				$str.='&nbsp;&nbsp;<a href="?act=shq&meter='.$meter.'&id='.$id.'&code='.$row['o_code'].'&user_id='.$row['o_user_id'].'&page='.$page.'" onclick="return confirm(\'请确认已收到货！\');">确认用户已收货</a>';
				$str.='<form name="form1" method="post" action="?act=delivery2&meter='.$meter.'&id='.$id.'&page='.$page.'">
				<textarea name="o_delivery" style="padding:5px; width:98%; height:100px; color:#333; line-height:16px;" >'.$row['o_delivery'].'</textarea><br />
				<input name="button" type="button" value=" 修改发货信息 " class="button" onclick="this.form.submit()" />
				</form>';
				break;
			case 21:
				$str.='已收货，等待确认&nbsp;&nbsp;<a href="?act=shq&meter='.$meter.'&id='.$id.'&code='.$row['o_code'].'&user_id='.$row['o_user_id'].'&page='.$page.'" onclick="return confirm(\'请确认已收到货！\');">确认用户已收货</a>';
				$str.='<textarea name="o_delivery" style="padding:5px; width:98%; height:100px; color:#333; line-height:16px;">'.$row['o_delivery'].'</textarea>';
				break;
			case 3:
				$str.='交易结束';
				$str.='<textarea name="o_delivery" style="padding:5px; width:98%; height:100px; color:#333; line-height:16px;" >'.$row['o_delivery'].'</textarea>';
				break;
			}
			
			echo $str;
			?>
			</td>
          </tr>
          <tr>
		    <td class="edit_title" style="line-height:20px;"><strong>收货人信息</strong></td>
       		<td>&nbsp;</td>
          </tr>
          <tr>
            <td class="edit_title">收 货 人：</td>
            <td><?php echo $row['o_name'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td class="edit_title">联系电话：</td>
            <td><?php echo $row['o_tel'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td class="edit_title">邮政编码：</td>
            <td><?php echo $row['o_post'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">配送区域：</td>
            <td><?php echo $row['o_city'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td class="edit_title">详细地址：</td>
            <td><?php echo $row['o_address'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">备注内容：</td>
            <td><?php echo $row['o_content'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="button" value=" 返回 " class="button" onclick="location.href='orders.php?meter=<?php echo $meter ?>&page=<?php echo $page ?>'" /></td>
          </tr>
        </table><br />
		<div id="cart">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr id="cart_title">
					<td width="40%"><strong>商品名称</strong></td>
					<td width="20%"><strong>价格</strong></td>
					<td width="20%"><strong>数量</strong></td>
					<td width="20%"><strong>小计</strong></td>
				</tr>
				<?php
				$str='';
				$query=mysql_query("select * from orders_products where o_code='{$row['o_code']}' order by o_id");
				if (mysql_num_rows($query)>0){
				while($row=mysql_fetch_array($query)){
					$url='products_detail.php';
					if ($row['o_products_type']==2) $url='products2_detail.php';
					$str.='<tr>';
					$str.='<td style="line-height:18px;"><a href="../'.$url.'?id='.$row['o_products_id'].'" target="_blank">'.$row['o_products_name'].'</a></td>';
					$str.='<td >￥'.$row['o_products_price'].'</td>';
					$str.='<td>'.$row['o_products_quantity'].'</td>';
					$str.='<td>￥'.$row['o_products_price']*$row['o_products_quantity'].'</td>';
					$str.='</tr>';
					if ($row['o_products_type']==2){
						$str.='<tr>';
						$str.='<td colspan="4" style="text-align:left;line-height:20px; color:#666;">';
						$str.='<strong>口味：</strong>';
						$query2=mysql_query('select * from orders_products_kw where o_orders_id='.$row['o_id'].' and o_products2_type=1 order by o_id');
						if (mysql_num_rows($query2)>0){
						while($row2=mysql_fetch_array($query2)){
							$str.=$row2['o_products2_name'].'×'.$row2['o_products2_quantity'].'份&nbsp;&nbsp;';
						}
						}
						$str.='<br /><strong>肉菜：</strong>';
						$query2=mysql_query('select * from orders_products_kw where o_orders_id='.$row['o_id'].' and o_products2_type=2 order by o_id');
						if (mysql_num_rows($query2)>0){
						while($row2=mysql_fetch_array($query2)){
							$str.=$row2['o_products2_name'].'×'.$row2['o_products2_quantity'].'份&nbsp;&nbsp;';
						}
						}
						$str.='<br /><strong>素菜：</strong>';
						$query2=mysql_query('select * from orders_products_kw where o_orders_id='.$row['o_id'].' and o_products2_type=3 order by o_id');
						if (mysql_num_rows($query2)>0){
						while($row2=mysql_fetch_array($query2)){
							$str.=$row2['o_products2_name'].'×'.$row2['o_products2_quantity'].'份&nbsp;&nbsp;';
						}
						}
						$str.='</td>';
						$str.='</tr>';
					}
				}
				}
				echo $str;
				?>
			</table>
		</div>
		<br />
    </div>
</div>
</body>
</html>