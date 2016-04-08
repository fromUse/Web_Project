<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '找回密码 - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $a_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $a_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<link rel="stylesheet" href="css/user.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript">
function CheckForget(ObjForm){
	var Reg=/^[a-zA-Z0-9@_.-]{5,30}$/;
	if (ObjForm.u_user.value==""){
		alert("请输入用户名或邮箱！");
		ObjForm.u_user.focus();
		return false;
	}
	if (!Reg.test(ObjForm.u_user.value)){
		alert("非法的用户名或邮箱！");
		ObjForm.u_user.value="";
		ObjForm.u_user.focus();
		return false;
	}
}
</script>
</head>
<body>
<div id="main">
	<?php require 'header.php'; ?>
	<div id="forget_blk">
	<div id="forget">
			<p id="forget_title">找回密码</p>
			<?php
			$u_user=ReStra($_POST['u_user']);
			if ($u_user!=''){
				$query=mysql_query("select * from user where u_user='$u_user' or u_email='$u_user'");
				if (mysql_num_rows($query)==0){
					Msg('您输入的用户名或邮箱不存在！','Back');
				}
				else{
					$row=mysql_fetch_array($query);
					$u_user_id=$row['u_id'];
					$pass_codes=explode(',','Q,W,E,R,T,Y,U,I,O,P,A,S,D,F,G,H,J,K,L,Z,X,C,V,B,N,M,0,1,2,3,4,5,6,7,8,9');
					$pass_codes_count=count($pass_codes);
					for($i=1;$i<=10;$i++){
						$pass_code.=$pass_codes[mt_rand(0,$pass_codes_count)];
					}
					mysql_query("update user set u_pass_code='$pass_code' where u_id=$u_user_id");
					$j_subject='【汕尾职业技术学院等级考试】账号密码重置 - (本邮件由系统自动发出，请勿直接回复)';
					$j_content='亲爱的('.$row['u_user'].')，您好！<br /><br />';
					$j_content.='您正在申请重置账号密码，如非本人操作，请忽略此邮件。<br /><br />';
					$j_content.='立即重置密码，<a href="http//:219.129.166.12:9123/forgets.php?user_id='.$u_user_id.'&code='.$pass_code.'" target="_blank">请点击这里</a><br /><br />';
					$j_content.='如果上面的链接无法点击，您可以复制下面的地址，并粘帖到浏览器的地址栏中访问。<br />';
					$j_content.='http://219.129.166.12:9123/forgets.php?user_id='.$u_user_id.'&code='.$pass_code;

					include_once("smtp.class.php");
					$smtpserver = "smtp.163.com";//SMTP服务器
					$smtpserverport =25;//SMTP服务器端口
					$smtpusermail = "swzywyx@163.com";//SMTP服务器的用户邮箱
					$smtpuser = "swzywyx@163.com";//SMTP服务器的用户帐号
					$smtppass = "zy1234509876";//SMTP服务器的用户密码
					$smtpemailto = $row['u_email'];//发送给谁
					$mailsubject = $j_subject;//邮件主题
					$mailbody = $j_content;//邮件内容
					$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
					$smtp=new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
					$smtp->debug = false;//是否显示发送的调试信息
					if ($smtp->sendmail($smtpemailto, $smtpusermail, '汕尾职业技术学院等级考试', $mailsubject, $mailbody, $mailtype)){
						$str='<p style="padding:100px 0px; text-align:center; font-size:14px;">系统已经发送邮件到您的注册邮箱，请点击邮件的链接重置你的密码.<br /><br /><br /><br /><br /><br /><a href="./" class="a">返回首页</a></p>';
					}
					else {
						$str='<p style="padding:100px 0px; text-align:center; font-size:14px;">由于未知的原因，重置密码的邮件无法发出！<br /><br /><br /><br /><br /><br /><a href="forget.php" class="a">返回上页</a></p>';
					}
				}
			}
			else{
				$str='<div id="forget_tbe">
					<form id="form1" method="post" action="forget.php" onsubmit="return CheckForget(this)">
					<p>请输入您的用户名或邮箱</p>
					<p><input type="text" name="u_user" class="inputtext" size="50" maxlength="20" /></p>
					<p style="text-align:center;"><br /><input type="submit" name="submit" value="下一步" class="button2" /></p>
					</form>
				</div>';
			}
			echo $str;
			?>
	</div>
	</div>
	<?php require 'footer.php'?>
</div>
</body>
</html>