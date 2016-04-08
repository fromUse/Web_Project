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
<STYLE type=text/css>
BODY {
	MARGIN-TOP: 0px; MARGIN-LEFT: 0px
}
body,td,th {
	font-family: Verdana, Arial, "宋体";
}
BODY {
	FONT-FAMILY: "Verdana", "Arial", "宋体"; FONT-SIZE: 75%
}
TD {
	LINE-HEIGHT: 15pt; FONT-SIZE: 11pt
}
P {
	LINE-HEIGHT: 18pt; FONT-SIZE: 9pt
}
LI {
	LINE-HEIGHT: 18pt; FONT-SIZE: 9pt
}
BigFont {
	FONT-SIZE: 11pt
}
SELECT.smallselsect {
	COLOR: rgb(0,0,128); FONT-SIZE: 10pt
}
INPUT.smallInput {
	BORDER-BOTTOM-COLOR: #000000; LINE-HEIGHT: normal; BORDER-RIGHT-WIDTH: 1px; BACKGROUND-COLOR: #ffffff; FONT-VARIANT: normal; FONT-STYLE: normal; BORDER-TOP-COLOR: black; BORDER-TOP-WIDTH: 1px; BORDER-BOTTOM-WIDTH: 1px; HEIGHT: 18px; COLOR: #000000; BORDER-RIGHT-COLOR: #000000; FONT-SIZE: 9pt; BORDER-LEFT-COLOR: black; BORDER-LEFT-WIDTH: 1px; FONT-WEIGHT: normal
}
TEXTAREA.smallarea {
	LINE-HEIGHT: 18pt; BACKGROUND-COLOR: white; COLOR: rgb(0,0,128); FONT-SIZE: 9pt
}
INPUT.buttonface {
	BORDER-BOTTOM-COLOR: #000000; LINE-HEIGHT: normal; BORDER-RIGHT-WIDTH: 1px; BACKGROUND-COLOR: #ffffff; FONT-VARIANT: normal; FONT-STYLE: normal; BORDER-TOP-COLOR: black; BORDER-TOP-WIDTH: 1px; BORDER-BOTTOM-WIDTH: 1px; HEIGHT: 18px; COLOR: #000000; BORDER-RIGHT-COLOR: #000000; FONT-SIZE: 9pt; BORDER-LEFT-COLOR: black; BORDER-LEFT-WIDTH: 1px; FONT-WEIGHT: normal
}
A {
	COLOR: navy; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff0000; TEXT-DECORATION: underline
}
.unnamed5 {
	BORDER-BOTTOM-COLOR: #000000; LINE-HEIGHT: normal; BORDER-RIGHT-WIDTH: 1px; BACKGROUND-COLOR: #ffffff; FONT-VARIANT: normal; FONT-STYLE: normal; BORDER-TOP-COLOR: black; BORDER-TOP-WIDTH: 1px; BORDER-BOTTOM-WIDTH: 1px; HEIGHT: 18px; COLOR: #000000; BORDER-RIGHT-COLOR: #000000; FONT-SIZE: 9pt; BORDER-LEFT-COLOR: black; BORDER-LEFT-WIDTH: 1px; FONT-WEIGHT: normal
}
TD.cls3 {
	BORDER-BOTTOM: #ffb811 2px solid
}

</STYLE>
<?php
if ($id=='')
 {  Msg('非法参数','back');
	}
$query=mysql_query('select * from orders where o_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	$dj=RsField('select p_name from dz_dengji where p_id='.$row['o_dengji']);
	$lb=RsField('select p_name from dz_leibie where p_id='.$row['o_leibie']);
	
	$laskzh=$row['old_zkz'];
	$zkz=$row['o_code'];
		$query2=mysql_query('select * from user where u_id='.$row['o_user'],$conn);
		 if (mysql_num_rows($query2)>0){
		$row2=mysql_fetch_array($query2);
		
			$xm=$row2['u_name'];
			$pic=$row2['u_thumb_image'];
			$zj=$row2['u_zj_num'];
			$gzdw=$row2['u_work'];
			$tel=$row2['u_tel'];
			$u_birth=$row2['u_birth'];
			$stu_num=$row2['u_stu_num'];
			$dizhi= $row2['u_address'];
			$yb=$row2['u_code'];
			if ($row2['u_sex']==1){$sex='男';}
			elseif ($row2['u_sex']==2){$sex='女';}
			else{$sex='QT';}

			$xl=RsField('select p_name from dz_xueli where p_id='.$row2['u_xueli']);
			$mz=RsField('select p_name from dz_minzu where p_id='.$row2['u_minzu']);

				
			   if($row2['u_zhicheng']==1) { $zc= '高级'; }  
				elseif ($row2['u_zhicheng']==2){ $zc= '中级';} 
				elseif ($row2['u_zhicheng']==3){ $zc= '初级';}
				elseif ($row2['u_zhicheng']==4){ $zc= '其他';}
                                elseif ($row2['u_zhicheng']==0){ $zc= '其他';}

	
				if($row2['u_zzmm']==0) { $u_zzmm= '党员'; }  
				elseif($row2['u_zzmm']==1){ $u_zzmm= '团员';} 
				elseif($row2['u_zzmm']==2){ $u_zzmm= '其他';} 
				else { $u_zzmm= 'QT';}

				 


			$zy=RsField('select p_name from dz_zhiye where p_id='.$row2['u_zhiye']);
			if($row2['u_huji']==1) { $hj= '农村'; }  
			elseif ($row2['u_huji']==0){ $hj= '城镇';} 
			 
		 }
}
?>
<META name=GENERATOR content="MSHTML 9.00.8112.16592"></HEAD>
<BODY>
<CENTER>
<FORM method=post name=pic action="">
<TABLE border=0 cellSpacing=0 cellPadding=0 width=750>
  <TBODY>
  <TR>
    <TD height=55 vAlign=middle 
  align=center><STRONG>全国英语等级考试报名信息表</STRONG></TD></TR>
  <TR>
    <TD height=244>
      <TABLE class=unnamed2 border=1 cellSpacing=0 borderColorLight=#000000 
      borderColorDark=#ffffff cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD height=40 width="10%" align=right>姓名:</TD>
          <TD width="22%" align=center><?php echo $xm?></TD>
          <TD width="15%" align=right>身份证号:</TD>
          <TD width="23%" align=center><?php echo $zj?></TD>
          <TD vAlign=top rowSpan=7 colSpan=2>
            <P style="TEXT-ALIGN: center; LINE-HEIGHT: 28pt" align=center><IMG 
            id=xpxs border=0 alt="" src="/<?php echo $pic?>" width=144 
            height=192> <BR><SPAN 
            style="FONT-FAMILY: 仿宋_GB2312; FONT-SIZE: 12pt">照片</SPAN></P></TD></TR>
        <TR>
          <TD height=40 width="11%" align=right>军人证件:</TD>
          <TD width="23%" align=center>&nbsp; </TD>
          <TD width="11%" align=right>户籍:</TD>
          <TD width="23%" align=center><?php echo $hj?> &nbsp;</TD></TR>
        <TR>
          <TD height=40 align=right>性别:</TD>
          <TD align=center><?php echo $sex?></TD>
          <TD align=right>民族:</TD>
          <TD align=center><?php echo $mz?> </TD></TR>
        <TR>
          <TD height=55 align=right>出身年月:</TD>
          <TD align=center><?php echo substr($u_birth,0,10)?></TD>
          <TD align=right>文化程度:</TD>
          <TD align=center><?php echo $xl?></TD></TR>
        <TR>
          <TD height=40 width="11%" align=right>职称:</TD>
          <TD width="23%" align=center><?php echo $zc?>&nbsp;</TD>
          <TD width="11%" align=right>政治面貌:</TD>
          <TD width="23%" align=center><?php echo $u_zzmm?> </TD></TR>
        <TR>
          <TD height=53 align=right>职业类别:</TD>
          <TD align=center><?php echo $zy?> </TD>
          <TD align=right>报考等级:</TD>
          <TD align=center><?php echo $dj?> &nbsp;</TD></TR>
        <TR>
          <TD height=38 align=right>考试类别:</TD>
          <TD align=center><?php echo $lb?>&nbsp;</TD>
          <TD align=right>上次考<BR>准考证号:&nbsp;</TD>
          <TD align=center><?php echo $laskzh?>&nbsp;</TD></TR>
        <TR>
          <TD height=54 align=right>工作单位:</TD>
          <TD align=center><?php echo $gzdw?>&nbsp;</TD>
          <TD align=right>电话:</TD>
          <TD align=center><?php echo $tel?>&nbsp;</TD>
          <TD width="9%" align=right>学号:</TD>
          <TD width="21%" align=center><?php echo $stu_num?>&nbsp;</TD></TR>
        <TR>
          <TD height=50 align=right>通讯地址:</TD>
          <TD align=center><?php echo $dizhi?>&nbsp;</TD>
          <TD align=right>邮编:</TD>
          <TD align=center><?php echo $yb?>&nbsp;</TD>
          <TD align=right><FONT color=red>准考证：</FONT></TD>
          <TD style="COLOR: #ff0000; WORD-BREAK: break-all" 
            align=center><?php //echo $zkz?>&nbsp;</TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD height=49><STRONG><FONT 
      color=red>如果报名信息有误，请联系考点(0660-3386861)。祝你考试成功！</FONT></STRONG>&nbsp;</TD></TR></TBODY></TABLE></FORM>
<P align=center>
<STYLE media=print>.Noprint {
	DISPLAY: none
}
</STYLE>

<OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 width=0 
height=0 VIEWASTEXT></OBJECT>
<CENTER class=noprint><INPUT onclick=document.all.WebBrowser.ExecWB(6,1) value=打印 type=button> 
<INPUT onclick=document.all.WebBrowser.ExecWB(6,6) value=直接打印 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(8,1) value=页面设置 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(7,1) value=打印预览 type=button>&nbsp;<INPUT onclick=javascript:window.close() value=关闭窗口 type=button> 
<BR>说明：本打印功能需要允许使用ActiveX控件，如果不能打印，请使用菜单："文件"--&gt;"打印" 
</CENTER></CENTER></BODY></HTML>
