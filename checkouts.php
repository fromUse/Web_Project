<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '订单号：'.$_GET['code'].' - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $class_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $class_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_cn.css" type="text/css" />
<link rel="stylesheet" href="css/cart.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript">
function Pay(ObjForm){
	var Bid=$2("addcart_bg");
	var Nid=$2("addcart");
	Bid.style.width=document.documentElement.clientWidth+"px";
	Bid.style.height=document.documentElement.scrollHeight+"px";
	Bid.style.display="block";
	Nid.style.display="block";
	ObjForm.submit();
}
</script>
</head>
<body>
<div id="main">
	<?php
	require 'header.php';
	$str='';
    $str.='<div id="content">';
	$query=mysql_query("select * from orders where o_code='{$_GET['code']}'");
	if (mysql_num_rows($query)==0){
		$str.='<p class="nodata">未知的错误</p>';
	}
	else {
		$row=mysql_fetch_array($query);
		switch($row['o_payment']){
		case 1:
			$o_payment='银行汇款/转帐';
			break;
		case 2:
			$o_payment='货到付款';
			break;
		case 3:
			$o_payment='支付宝';
			break;
		}
		switch($row['o_shipment']){
		case 1:
			$o_shipment='顺丰速运';
			break;
		case 2:
			$o_shipment='圆通快递';
			break;
		case 3:
			$o_shipment='EMS快递';
			break;
		case 4:
			$o_shipment='宅急送';
			break;
		}
		$str.='<div id="checkouts_blk">';
		if ($row['o_status']==0 ){
			$str.='<h1>您的订单已提交成功！</h1>';
		}
		else {
			if ($row['o_payment']==2){
				$str.='<h1>您的订单已提交成功！</h1>';
			}
			else {
				$str.='<h1>您的订单付款成功！</h1>';
			}
		}
		$str.='<div id="checkouts">订&nbsp;&nbsp;单&nbsp;&nbsp;号：<span><strong>'.$row['o_code'].'</strong></span>&nbsp;&nbsp;(您牢记此号，以便您享受本网站提供的相关服务)<br />应付金额：<span class="price" >￥<strong>'.$row['o_amount'].'</strong></span><br />付款方式：<span>'.$o_payment.'</span>';
		if ($row['o_status']==0 && $row['o_payment']==3){
			$str.='<form name="alipayment" action="alipay_yuyang/alipayapi.php" method="post" target="_blank">
				<input type="hidden" name="o_code" value="'.$row['o_code'].'" />
				<input type="hidden" name="o_subject" value="鱼羊美厨订单号：'.$row['o_code'].'" />
				<input type="hidden" name="o_amount" value="'.$row['o_amount'].'" />
				<input type="hidden" name="o_name" value="'.$row['o_name'].'" />
				<input type="hidden" name="o_tel" value="'.$row['o_tel'].'" />
				<input type="hidden" name="o_phone" value="'.$row['o_tel'].'" />
				<input type="hidden" name="o_zip" value="'.$row['o_post'].'" />
				<input type="hidden" name="o_address" value="'.$row['o_city'].' '.$row['o_address'].'" />
				<input type="button" name="button" class="checkouts_button" value="立即前往支付宝付款" onclick="Pay(this.form)" />
			</form>';
		}
		else {
			if ($row['o_payment']==3) $str.='<br />付款状态：<strong>已付款</strong>';
		}
		$str.='<p id="checkouts_ts">温馨提示：请保持手机（电话）畅通，本网客服将尽快与您确认订单，祝您购物愉快！</p>';
		$str.='</div>';
	}
	$str.='</div>';
	if ($row['o_payment']==3){
		$str.='<div id="addcart_bg" style="position:absolute; top:0px; left:0px; z-index:998; display:none; width:100%; height:100%;"></div>
		<div id="addcart" style="display:none;">
			<p id="addcart_title">在线支付</p>
			<div id="addcart_contents">
				<div id="addcart_content">
					<p id="addcart_carts">支付过程中，请不要关闭窗口！</p>
					<div id="addcart_button"><input type="button" class="button2" value="支付失败" onclick="DisDiv(\'addcart_bg\',0);DisDiv(\'addcart\',0);" />&nbsp;&nbsp;<input type="button" class="button2" value="支付完成" onclick="location.reload()" /></div>
				</div>
			</div>
		</div>';
	}
	echo $str;
	
	require 'footer.php';
	?>
</div>
</body>
</html>