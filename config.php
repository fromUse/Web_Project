<?php
session_start();
header('Content-type: text/html;charset=UTF-8');




function RsField($rs_sql){
	$rs_query=mysql_query($rs_sql);
	if (mysql_num_rows($rs_query)>0){
		$rs_row=mysql_fetch_row($rs_query);
		return $rs_row[0];
	}
	else {
		return '';
	}
}

function RsNum($rs_sql){
	$rs_query=mysql_query($rs_sql);
	return mysql_num_rows($rs_query);
}
function RsField_Array($rs_sql){
	$rs_query=mysql_query($rs_sql);
	if (mysql_num_rows($rs_query)>0){
		$rs_row=mysql_fetch_row($rs_query);
		return $rs_row;
	}
	else {
		return '';
	}
}
function NoData(){
	return '<p class="nodata">暂时没有该数据信息，请等待添加...</p>';
}

$user=$_SESSION['fy_user'];
$user_id=$_SESSION['fy_user_id'];
$query=mysql_query('select * from '.$language.'_config where s_id=1');
$row=mysql_fetch_array($query);
$site_name=$row['s_name'];
$site_domain=$row['s_domain'];
$site_keyword=$row['s_keyword'];
$site_description=$row['s_description'];
$site_copyright=$row['s_copyright'];
$site_tel=$row['s_tel'];
$site_tdc=$row['s_tdc'];
$site_weibo=$row['s_weibo'];
$site_tqq=$row['s_tqq'];
$site_postage_amount=$row['s_postage_amount'];
$site_soc=$row['s_soc'];
$site_soc2=$row['s_soc2'];
$site_soc2_code=$row['s_soc2_code'];
$site_stat=$row['s_stat'];
$site_stat_code=$row['s_stat_code'];
$id=$_GET['id'];
$cid=$_GET['cid'];
$act=$_GET['act'];
$page=$_GET['page'];
if ($id!=''){
if (!is_numeric($id)){
	echo '参数错误！';
	exit();
}
}
if ($cid!=''){
if (!is_numeric($cid)){
	echo '参数错误！';
	exit();
}
}
if ($page!=''){
if (!is_numeric($page)){
	$page=1;
}
}
$page_show=true;
if ($page<=0){
	$page=1;
}

$uid=0;
$url=strtolower($_SERVER['SCRIPT_NAME']);

if (stripos($url,"index.php")!==false) $uid=1;
if (stripos($url,"products")!==false) $uid=2;
if (stripos($url,"philosophy")!==false) $uid=3;
if (stripos($url,"contact")!==false) $uid=4;

if ($uid>=1 && $uid<=4){
	$query=mysql_query('select * from '.$language.'_keywords where k_id='.$uid);
	$row=mysql_fetch_array($query);
	if ($row['k_name']!='') $site_name=$row['k_name'];
	if ($row['k_keyword']!='') $site_keyword=$row['k_keyword'];
	if ($row['k_description']!='') $site_description=$row['k_description'];
}
?>