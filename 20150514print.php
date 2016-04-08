<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';

if ($user_id=='')  Msg('请登录之后进行操作！','index.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>&nbsp;</title>
<link rel=Stylesheet href=stylesheet.css>

 
<?php
if ($id=='')
 {  Msg('非法参数','back');
	}
$query=mysql_query('select * from user where u_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	 
	
	$u_name=$row['u_name'];
	$u_name_old=$row['u_name_old'];
	$u_zk_num=$row['u_zk_num'];
	$u_czby_date=$row['u_czby_date'];
	$u_zj_num=$row['u_zj_num'];
	$u_birth=$row['u_birth'];
 
	if ($row['u_sex']==1){	$u_sex='男';} elseif($row['u_sex']==2) {$u_sex='女';} else {$u_sex='QT';} 
			
	$u_image=$row['u_image'];
	$u_address_hk=$row['u_address_hk'];
	$u_address_city=$row['u_address_city'];
	$u_address_xian=$row['u_address_xian'];
		if($row['u_huji']==1) { $u_huji= '农村'; }   elseif ($row['u_huji']==0){ $u_huji= '城镇';} 
		
	$u_minzu= RsField('select  p_name as CstrField from dz_minzu where p_id='.$row['u_minzu']);
	 
		if($row['u_zzmm']==0) { $u_zzmm= '党员'; }  
				elseif ($row['u_zzmm']==1){ $u_zzmm= '团员';} 
				elseif ($row['u_zzmm']==2){ $u_zzmm= '其他';} 	
	$u_at_school=$row['u_at_school'];
	$u_vocational=$row['u_vocational'];
	$u_applyfor=$row['u_applyfor'];
	$u_tel=$row['u_tel'];
	$u_address=$row['u_address'];
	$u_addressee=$row['u_addressee'];
	$u_code=$row['u_code'];
	$u_skills=$row['u_skills'];
	$u_skills_grade=$row['u_skills_grade'];
	$u_match=$row['u_match'];
	$u_match_grade=$row['u_match_grade'];
	
	 if ($row['u_resume1_date_star']!='0000-00-00')  $u_resume1_date_star=$row['u_resume1_date_star'] ; 
	 if ($row['u_resume1_date_end']!='0000-00-00')  $u_resume1_date_end=$row['u_resume1_date_end'] ;
 
	$u_resume1_content=$row['u_resume1_content'];
	$u_resume1_position=$row['u_resume1_position'];
	
 
	if ($row['u_resume2_date_star']!='0000-00-00')  $u_resume2_date_star=$row['u_resume2_date_star'] ;
	if ($row['u_resume2_date_end']!='0000-00-00')  $u_resume2_date_end=$row['u_resume2_date_end'] ;
	$u_resume2_content=$row['u_resume2_content'];
	$u_resume2_position=$row['u_resume2_position'];
	
 
	if ($row['u_resume3_date_star']!='0000-00-00')  $u_resume3_date_star=$row['u_resume3_date_star'] ;
	if ($row['u_resume3_date_end']!='0000-00-00')  $u_resume3_date_end=$row['u_resume3_date_end'] ;
	$u_resume3_content=$row['u_resume3_content'];
	$u_resume3_position=$row['u_resume3_position'];
	
	$u_members1_name=$row['u_members1_name'];
	$u_members1_relationship=$row['u_members1_relationship'];
	$u_members1_work=$row['u_members1_work'];
	$u_members1_chief=$row['u_members1_chief'];
	
	$u_members2_name=$row['u_members2_name'];
	$u_members2_relationship=$row['u_members2_relationship'];
	$u_members2_work=$row['u_members2_work'];
	$u_members2_chief=$row['u_members2_chief'];
	
	$u_members3_name=$row['u_members3_name'];
	$u_members3_relationship=$row['u_members3_relationship'];
	$u_members3_work=$row['u_members3_work'];
	$u_members3_chief=$row['u_members3_chief'];
	
	 
	 
}
?>
</head>

<body>
<table width=727 border=1 align="center" cellpadding=0 cellspacing=1 style='border-collapse:
 collapse;table-layout:fixed;width:545pt'>
 <col class=xl83 width=51 style='mso-width-source:userset;mso-width-alt:1632;
 width:38pt'>
 <col class=xl83 width=102 style='mso-width-source:userset;mso-width-alt:3264;
 width:77pt'>
 <col class=xl83 width=51 style='mso-width-source:userset;mso-width-alt:1632;
 width:38pt'>
 <col class=xl83 width=84 style='mso-width-source:userset;mso-width-alt:2688;
 width:63pt'>
 <col class=xl83 width=56 style='mso-width-source:userset;mso-width-alt:1792;
 width:42pt'>
 <col class=xl83 width=95 style='mso-width-source:userset;mso-width-alt:3040;
 width:71pt'>
 <col class=xl83 width=56 style='mso-width-source:userset;mso-width-alt:1792;
 width:42pt'>
 <col class=xl83 width=104 style='mso-width-source:userset;mso-width-alt:3328;
 width:78pt'>
 <col class=xl83 width=48 style='mso-width-source:userset;mso-width-alt:1536;
 width:36pt'>
 <col class=xl83 width=80 style='mso-width-source:userset;mso-width-alt:2560;
 width:60pt'>
 <tr height=61 style='mso-height-source:userset;height:45.75pt'>
  <td colspan=10 height=61 class=xl109 width=727 style='height:45.75pt;border-right:1.0pt solid black;
  width:545pt'>汕尾职业技术学院2015年对口中职学校三二分段转段考核考生报名表</td>
 </tr>
 <tr height=36 style='mso-height-source:userset;height:27.0pt'>
  <td height=36 class=xl81 width=51 style='height:27.0pt;width:38pt'>考生姓名</td>
  <td class=xl80 width=102 style='border-left:none;width:77pt'>　<?php echo $u_name?></td>
  <td class=xl65 width=51 style='width:38pt'>曾用名</td>
  <td class=xl66 width=84 style='border-left:none;width:63pt'>　<?php echo $u_name_old?></td>
  <td class=xl65 width=56 style='border-left:none;width:42pt'>中考段考生号</td>
  <td class=xl66 width=95 style='border-left:none;width:71pt'>　<?php echo $u_zk_num?></td>
  <td class=xl84 width=56 style='border-left:none;width:42pt'>初中毕业年月</td>
  <td class=xl66 width=104 style='border-left:none;width:78pt'>　<?php echo $u_czby_date?></td>
  <td colspan=2 rowspan=4 class=xl117 width=128 style='border-right:1.0pt solid black;
  width:96pt'><IMG 
            id=xpxs border=0 alt="" src="./<?php echo $u_image?>" width=127 
            height=170></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl85 width=51 style='height:30.0pt;border-top:none;
  width:38pt'>身份<br>
    证号</td>
  <td colspan=3 class=xl110 width=237 style='border-left:none;width:178pt'>　<?php echo $u_zj_num?></td>
  <td class=xl67 width=56 style='border-top:none;border-left:none;width:42pt'>出生<br>
    年月</td>
  <td class=xl68 width=95 style='border-top:none;border-left:none;width:71pt'>　<?php echo $u_birth?></td>
  <td class=xl67 width=56 style='border-top:none;border-left:none;width:42pt'>性别</td>
  <td class=xl69 width=104 style='border-top:none;border-left:none;width:78pt'>　<?php echo $u_sex?></td>
 </tr>
 <tr height=53 style='mso-height-source:userset;height:39.75pt'>
  <td height=53 class=xl82 width=51 style='height:39.75pt;width:38pt'>户口所在地</td>
  <td class=xl70 width=102 style='border-top:none;border-left:none;width:77pt'>　<?php echo $u_address_city?></td>
  <td class=xl69 width=51 style='border-top:none;border-left:none;width:38pt'>市</td>
  <td colspan=2 class=xl70 width=140 style='border-left:none;width:105pt'>　<?php echo $u_address_xian?></td>
  <td class=xl86 width=95 style='border-top:none;border-left:none;width:71pt'>县(市、区)</td>
  <td class=xl67 width=56 style='border-top:none;border-left:none;width:42pt'>户籍类型</td>
  <td class=xl79 width=104 style='border-top:none;border-left:none;width:78pt'>　<?php echo $u_huji?></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl82 width=51 style='height:30.0pt;border-top:none;
  width:38pt'>民族</td>
  <td class=xl78 width=102 style='border-top:none;border-left:none;width:77pt'>　<?php echo $u_minzu?></td>
  <td class=xl67 width=51 style='border-top:none;width:38pt'>政治面貌</td>
  <td colspan=2 class=xl113 width=140 style='border-left:none;width:105pt'>　<?php echo $u_zzmm?></td>
  <td class=xl67 width=95 style='border-top:none;width:71pt'>现就读学校</td>
  <td colspan=2 class=xl115 width=160 style='border-right:.5pt solid black;
  border-left:none;width:120pt'>　<?php echo $u_at_school?></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl82 width=51 style='height:30.0pt;border-top:none;
  width:38pt'>中职<br>
    专业</td>
  <td colspan=2 class=xl70 width=153 style='border-left:none;width:115pt'>　<?php echo $u_vocational?></td>
  <td class=xl67 width=84 style='border-top:none;border-left:none;width:63pt'>报考专业</td>
  <td colspan=2 class=xl111 width=151 style='border-left:none;width:113pt'>　<?php echo $u_applyfor?></td>
  <td class=xl67 width=56 style='border-top:none;border-left:none;width:42pt'>联系<br>
    电话</td>
  <td colspan=3 class=xl121 width=232 style='border-right:1.0pt solid black;
  border-left:none;width:174pt'>　<?php echo $u_tel?></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl82 width=51 style='height:30.0pt;border-top:none;
  width:38pt'>通信<br>
    地址</td>
  <td colspan=5 class=xl70 width=388 style='border-left:none;width:291pt'>　<?php echo $u_address?></td>
  <td class=xl67 width=56 style='border-top:none;border-left:none;width:42pt'>收件人</td>
  <td class=xl71 width=104 style='border-top:none;border-left:none;width:78pt'>　<?php echo $u_addressee?></td>
  <td class=xl67 width=48 style='border-top:none;border-left:none;width:36pt'>邮政<br>
    编码</td>
  <td class=xl72 width=80 style='border-top:none;border-left:none;width:60pt'>　<?php echo $u_code?></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 height=40 class=xl124 width=153 style='border-right:.5pt solid black;
  height:30.0pt;width:115pt'>技能证书名称</td>
  <td colspan=6 class=xl127 width=446 style='border-left:none;width:334pt'>　<?php echo $u_skills?></td>
  <td class=xl73 width=48 style='border-left:none;width:36pt'>等级</td>
  <td class=xl74 width=80 style='border-left:none;width:60pt'>　<?php echo $u_skills_grade?></td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td colspan=2 height=40 class=xl124 width=153 style='border-right:.5pt solid black;
  height:30.0pt;width:115pt'>技能比赛名称</td>
  <td colspan=6 class=xl70 width=446 style='border-left:none;width:334pt'>　<?php echo $u_match?></td>
  <td class=xl67 width=48 style='border-top:none;border-left:none;width:36pt'>获奖等级</td>
  <td class=xl75 width=80 style='border-top:none;border-left:none;width:60pt'>　<?php echo $u_match_grade?></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td rowspan=4 height=132 class=xl108 width=51 style='height:99.8pt;
  width:38pt'>个人简历</td>
  <td colspan=2 class=xl73 width=153 style='border-left:none;width:115pt'>起至时间</td>
  <td colspan=6 class=xl73 width=443 style='border-left:none;width:332pt'>在何地、何单位学习</td>
  <td class=xl77 width=80 style='border-left:none;width:60pt'>担任职务</td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td colspan=2 height=33 class=xl70 width=153 style='height:24.95pt;
  border-left:none;width:115pt'>　<?php echo $u_resume1_date_star?>至<br><?php echo $u_resume1_date_end?></td>
  <td colspan=6 class=xl70 width=443 style='border-left:none;width:332pt'>　<?php echo $u_resume1_content?></td>
  <td class=xl75 width=80 style='border-top:none;border-left:none;width:60pt'>　<?php echo $u_resume1_position?></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td colspan=2 height=33 class=xl70 width=153 style='height:24.95pt;
  border-left:none;width:115pt'>　<?php echo $u_resume2_date_star?>至<br><?php echo $u_resume2_date_end?></td>
  <td colspan=6 class=xl70 width=443 style='border-left:none;width:332pt'>　<?php echo $u_resume2_content?></td>
  <td class=xl75 width=80 style='border-top:none;border-left:none;width:60pt'>　<?php echo $u_resume2_position?></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td colspan=2 height=33 class=xl70 width=153 style='height:24.95pt;
  border-left:none;width:115pt'>　<?php echo $u_resume3_date_star?>至<br><?php echo $u_resume3_date_end?></td>
  <td colspan=6 class=xl70 width=443 style='border-left:none;width:332pt'>　<?php echo $u_resume3_content?></td>
  <td class=xl75 width=80 style='border-top:none;border-left:none;width:60pt'>　<?php echo $u_resume3_position?></td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
  <td rowspan=4 height=137 class=xl81 width=51 style='border-bottom:1.0pt solid black;
  height:103.35pt;width:38pt'>主要家庭成员</td>
  <td class=xl65 width=102 style='border-left:none;width:77pt'>姓 名</td>
  <td class=xl65 width=51 style='border-left:none;width:38pt'>关 系</td>
  <td colspan=5 class=xl65 width=395 style='border-left:none;width:296pt'>单<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>位</td>
  <td colspan=2 class=xl130 width=128 style='border-right:1.0pt solid black;
  border-left:none;width:96pt'>职<span style='mso-spacerun:yes'>&nbsp;&nbsp;
  </span>务</td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td height=33 class=xl70 width=102 style='height:24.95pt;border-top:none;
  border-left:none;width:77pt'>　<?php echo $u_members1_name?></td>
  <td class=xl70 width=51 style='border-top:none;border-left:none;width:38pt'>　<?php echo $u_members1_relationship?></td>
  <td colspan=5 class=xl70 width=395 style='border-left:none;width:296pt'>　<?php echo $u_members1_work?></td>
  <td colspan=2 class=xl78 width=128 style='border-right:1.0pt solid black;
  border-left:none;width:96pt'>　<?php echo $u_members1_chief?></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td height=33 class=xl70 width=102 style='height:24.95pt;border-top:none;
  border-left:none;width:77pt'>　<?php echo $u_members2_name?></td>
  <td class=xl70 width=51 style='border-top:none;border-left:none;width:38pt'>　<?php echo $u_members2_relationship?></td>
  <td colspan=5 class=xl70 width=395 style='border-left:none;width:296pt'>　<?php echo $u_members2_work?></td>
  <td colspan=2 class=xl78 width=128 style='border-right:1.0pt solid black;
  border-left:none;width:96pt'>　<?php echo $u_members2_chief?></td>
 </tr>
 <tr height=33 style='mso-height-source:userset;height:24.95pt'>
  <td height=33 class=xl76 width=102 style='height:24.95pt;border-top:none;
  border-left:none;width:77pt'>　<?php echo $u_members3_name?></td>
  <td class=xl76 width=51 style='border-top:none;border-left:none;width:38pt'>　<?php echo $u_members3_relationship?></td>
  <td colspan=5 class=xl76 width=395 style='border-left:none;width:296pt'>　<?php echo $u_members3_work?></td>
  <td colspan=2 class=xl106 width=128 style='border-right:1.0pt solid black;
  border-left:none;width:96pt'>　<?php echo $u_members3_chief?></td>
 </tr>
 <tr height=75 style='mso-height-source:userset;height:56.25pt'>
  <td rowspan=2 height=113 class=xl89 width=51 style='height:84.75pt;
  border-top:none;width:38pt'>个人诚信承诺</td>
  <td colspan=9 rowspan=2 class=xl90 width=676 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;width:507pt'><span
  style='mso-spacerun:yes'>&nbsp;
  </span>本人已仔细阅读《汕尾职业技术学院2015年对口中职学校自主招生三二分段转段考核工作方案》，符合报名条件，现郑重承诺：一、报名所提供的个人信息真实、准确、完整，不弄虚作假，不伪造和使用假证明、假证书，如因个人信息错误、失真、缺失造成不良后果，责任由本人承担。二、自觉服从考场工作人员和监考老师的管理，自觉遵守考试纪律和考场规则，考试诚实守信，不违规，不作弊。<br><br>
    <span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span><font class="font10">考生签名：<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>年<span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp; </span>月<span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>日</font></td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
  <td rowspan=4 height=124 class=xl89 width=51 style='height:93.0pt;border-top:
  none;width:38pt'>考生所在学校意见</td>
  <td colspan=9 rowspan=4 class=xl96 width=676 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;width:507pt'><br>
    
    <span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>负 责 人：<br><br>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>联系电话：<br><br>
    <span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>二〇一<span style='mso-spacerun:yes'>&nbsp; </span>年<span
  style='mso-spacerun:yes'>&nbsp;&nbsp; </span>月<span
  style='mso-spacerun:yes'>&nbsp;&nbsp; </span>日（学校盖章）</td>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
 </tr>
 <tr height=26 style='mso-height-source:userset;height:19.5pt'>
 </tr>
 <tr height=46 style='mso-height-source:userset;height:34.5pt'>
 </tr>


</table>

<table align="center"  >

<tr height=107 style='mso-height-source:userset;border:0.0pt solid black;height:80.25pt'>
  <td colspan=10 height=107 class=xl87 width=727 style='height:80.25pt;border:0.0pt solid black;'>
备注：<font class="font14"> </font><font class="font9">1.推荐意见栏中，若中职学校或单位同意见推荐，请批注：情况属实，同意推荐。<br>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>2.寄送的纸质报名材料：三二分段转段考核报名表、有效期内的二代身份证正反面复印件、户口本户主页及本人页复印件、中考录取或入学名册复印件，上述材料（除均录取名册外）用A4纸打印或复印，由考生所在中职学校统一收集寄送到我院，凡在6月2日前前尚未送抵，则视为放弃报名资格。<br>
    <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>3.学院联系方式：0660-3386864，地址：广东省汕尾市城区文德路汕尾职业技术学院招生办公室。</font></td>
 </tr>

</table>


<style media="print">.Noprint { DISPLAY: none }</style>

<OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 width=0 
height=0 VIEWASTEXT></OBJECT>

<CENTER class=noprint><INPUT onclick=document.all.WebBrowser.ExecWB(6,1) value=打印 type=button> 
<INPUT onclick=document.all.WebBrowser.ExecWB(6,6) value=直接打印 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(8,1) value=页面设置 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(7,1) value=打印预览 type=button>&nbsp;<INPUT onclick=javascript:window.close() value=关闭窗口 type=button> 
<BR>
<strong>★★★要求：报名表全部内容打印在一张A4纸上，不能分页！！！</strong><BR>
操作说明：本打印功能需要允许使用ActiveX控件，如果不能打印，请使用菜单："文件"--&gt;"打印预览" 
<BR>
或者在网页上“右键”--&gt;“打印预览”，设置：一、纸张为“A4”，二、关闭页眉页脚，三、收缩到纸张大小。

</CENTER>

</body>
</html>