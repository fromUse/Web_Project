<?php
require 'conn.php';
require 'config.php';
if ($site_soc==1){
	$str="";
	$str.="function QQ(){\n";
	$str.="var Div=document.createElement('div');\n";
	$str.="Div.id='qq_online';\n";
	$str.="Div.style.position='absolute';\n";
	$str.="Div.style.right='0px';\n";
	$str.="Div.style.top='200px';\n";
	$str.="var Html='';\n";
	$str.="Html+='<div id=\"qq_online_top\"><img src=\"images/qq_close.gif\" onclick=\"$2(\'qq_online\').style.display=\'none\';\" title=\"关闭\" />Online Service</div>';\n";
	$str.="Html+='<div id=\"qq_online_list\">';\n";
	$query=mysql_query('select * from '.$language.'_online_service order by o_order,o_id');
	if (mysql_num_rows($query)>0){
	while($row=mysql_fetch_array($query)){
		switch($row['o_class']){
		case 1:
			$str.="Html+='<p><img src=\"images/qq.jpg\"><a href=\"http://wpa.qq.com/msgrd?v=3&uin={$row['o_number']}&site={$row['o_name']}&menu=yes\" target=\"_blank\">{$row['o_name']}</a></p>';\n";
			break;
		case 2:
			$str.="Html+='<p><img src=\"images/msn.jpg\" /><a href=\"msnim:chat?contact={$row['o_number']}\" target=\"_blank\">{$row['o_name']}</a></p>';\n";
			break;
		case 3:
			$str.="Html+='<p><img src=\"images/skype.jpg\" /><a href=\"skype:{$row['o_number']}?chat\" target=\"_blank\">{$row['o_name']}</a></p>';\n";
			break;
		case 4:
			$str.="Html+='<p><img src=\"images/wang.jpg\" /><a href=\"http://amos.im.alisoft.com/msg.aw?v=2&uid={$row['o_number']}&site=cnalichn&s=4\" target=\"_blank\">{$row['o_name']}</a></p>';\n";
			break;
		case 5:
			$str.="Html+='<p><img src=\"images/wang.jpg\" /><a href=\"http://amos.im.alisoft.com/msg.aw?v=2&uid={$row['o_number']}&site=cntaobao&s=4\" target=\"_blank\">{$row['o_name']}</a></p>';\n";
			break;
		}
	}
	}
	$str.="Html+='</div>';\n";
	$str.="Html+='<p id=\"qq_online_bottom\"></p>';\n";
	$str.="Div.innerHTML=Html;\n";
	$str.="document.body.appendChild(Div);\n";
	$str.="FloatDiv('qq_online',200);\n";
	$str.="}\n";
	$str.="if (document.all){\n";
	$str.="window.attachEvent('onload',QQ)\n";
	$str.="}else{\n";
	$str.="window.addEventListener('load',QQ,false);\n";
	$str.="}";
	echo $str;
}
?>
