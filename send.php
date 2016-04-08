<?php 
session_start(); 
header('Content-type: text/html;charset=UTF-8');
require ('conn.php');
require ('inc/function.php');
require ("smtp.class.php");
$str='';
if ($_POST['act']=='feedback'){
	if (strtolower($_POST['f_code'])!=$_SESSION['fycode']) Msg('验证码错误！','Back');
	
	$f_name=ReStr($_POST['f_name']);
	$f_tel=ReStr($_POST['f_tel']);
	$f_fax=ReStr($_POST['f_fax']);
	$f_email=ReStr($_POST['f_email']);
	$f_company=ReStr($_POST['f_company']);
	$f_address=ReStr($_POST['f_address']);
	$f_title=ReStr($_POST['f_title']);
	$f_content=HTMLEnCodes($_POST['f_content']);
	$f_date=date('Y-m-d H:i:s');
	$sql="insert into message(m_name,m_tel,m_fax,m_email,m_company,m_address,m_title,m_content,m_date) values('$f_name','$f_tel','$f_fax','$f_email','$f_company','$f_address','$f_title','$f_content','$f_date')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('发送留言成功!','contact.php');
	/*
	$str.='<br />联 系 人：'.$f_name;
	$str.='<br />联系电话：'.$f_tel;
	$str.='<br />传真号码：'.$f_fax;
	$str.='<br />电子邮箱：'.$f_email;
	$str.='<br />公司名称：'.$f_company;
	$str.='<br />联系地址：'.$f_address;
	$str.='<br />留言内容：<br />'.$f_content;
	
	$query=mysql_query('select * from '.$language.'_config where s_id=1');
	$row=mysql_fetch_array($query);
	if ($row['s_se_smtp']=='' || $row['s_se_email']=='' || $row['s_se_pass']=='' || $row['s_email']=='') Msg('邮件参数配置错误，发送失败！','Back');

	$se_smtp='smtp.163.com'; //SMTP服务器
	$se_port=25;//SMTP服务器端口
	$se_from='as35575695@163.com';//SMTP服务器的用户邮箱
	$se_user='as35575695@163.com';//SMTP服务器的用户帐号
	$se_pass='sinimadaohao';//SMTP服务器的用户密码
	$se_to=$row['s_email'];//发送给谁
	$se_subject=$_POST['f_title'];//邮件主题
	$se_body=$str;//邮件内容
	$se_type="HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	$smtp=new smtp($se_smtp,$se_port,true,$se_user,$se_pass);
	$smtp->debug=false;//是否显示发送的调试信息
	if ($smtp->sendmail($se_to,$se_from,$row['s_se_name'],$se_subject,$se_body,$se_type)){
		Msg('留言发送成功！','feedback.php');
	}
	else {
		Msg('留言发送失败！','feedback.php');
	}
	*/
}
?>