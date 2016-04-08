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
</head>
<body>
<?php

$actt=$_POST['actt'];
$shuliang=$_POST['shuliang'];

 if ($actt=='make'){
	 	 
	 $sql1="update dz_zkz set p_user=''";
	 mysql_query($sql1);	 
    $qwer='';
    $qqw='';
	$tttt=RsNum('select o_id from orders where o_status=1');
   FOR ($zkz = 1; $zkz <= $tttt; $zkz++) {
   $qwert= '2014'.sprintf("%05d",$zkz);		
	 // $qwert= '1501151'.sprintf("%05d",$zkz);
	
	   $queryqq=mysql_query("select * from dz_zkz where p_user='' or p_user is null order by p_id limit 0,1",$conn);
		if (mysql_num_rows($queryqq)>0){
			$rowqq=mysql_fetch_array($queryqq);
			$minid=$rowqq['p_id'];	
		}
	$sql="update dz_zkz set p_user='$qwert' where p_id='$minid'";
	mysql_query($sql);
	
	$qqw.= '1501151'.sprintf("%05d",$zkz).'<br>';
}

echo  $qqw;
 }
// $kaoshinum='1501151'.sprintf("%05d",RsNum('select o_id from orders where o_status=1')+1);
?>
<div ><form  action="?act=modify"  method="post" onsubmit="return Checkzkz(this);">
<input name="actt" value="make" type="hidden" />
<input name="shuliang" type="text" />
<input name="act" type="submit"  onclick="return Confirmmake();" value="生成"/>

</form></div>
</body>
</html>