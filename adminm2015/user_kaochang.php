<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<?php
$user_id=$_GET['id'];
if ($_GET['act']=='modok'){

	$u_school_id=ReStr($_POST['u_school_id']);
	$u_email=ReStr($_POST['u_email']);
	$u_user=ReStr($_POST['u_user']);
	$u_name=ReStr($_POST['u_name']);
	$u_name_old=ReStr($_POST['u_name_old']);
	$u_zk_num=ReStr($_POST['u_zk_num']);
	$u_czby_date=ReStr($_POST['u_czby_date']);
	$u_zj_num=ReStr($_POST['u_zj_num']);
	$u_birth=ReStr($_POST['u_birth']);
	$u_sex=ReStr($_POST['u_sex']);
	$u_image=ReStr($_POST['u_image']);
	$u_address_hk=ReStr($_POST['u_address_hk']);
	$u_address_city=ReStr($_POST['u_address_city']);
	$u_address_xian=ReStr($_POST['u_address_xian']);
	$u_huji=ReStr($_POST['u_huji']);
	$u_minzu=ReStr($_POST['u_minzu']);
	$u_zzmm=ReStr($_POST['u_zzmm']);
	$u_at_school=ReStr($_POST['u_at_school']);
	$u_vocational=ReStr($_POST['u_vocational']);
	$u_applyfor=ReStr($_POST['u_applyfor']);
	$u_tel=ReStr($_POST['u_tel']);
	$u_address=ReStra($_POST['u_address']);
	$u_addressee=ReStra($_POST['u_addressee']);
	$u_code=ReStra($_POST['u_code']);
	$u_skills=ReStra($_POST['u_skills']);
	$u_skills_grade=ReStra($_POST['u_skills_grade']);
	$u_match=ReStra($_POST['u_match']);
	$u_match_grade=ReStra($_POST['u_match_grade']);

	$u_resume1_date_star=ReStra($_POST['u_resume1_date_star']);
	$u_resume1_date_end=ReStra($_POST['u_resume1_date_end']);
	$u_resume1_content=ReStra($_POST['u_resume1_content']);
	$u_resume1_position=ReStra($_POST['u_resume1_position']);

	$u_resume2_date_star=ReStra($_POST['u_resume2_date_star']);
	$u_resume2_date_end=ReStra($_POST['u_resume2_date_end']);
	$u_resume2_content=ReStra($_POST['u_resume2_content']);
	$u_resume2_position=ReStra($_POST['u_resume2_position']);

	$u_resume3_date_star=ReStra($_POST['u_resume3_date_star']);
	$u_resume3_date_end=ReStra($_POST['u_resume3_date_end']);
	$u_resume3_content=ReStra($_POST['u_resume3_content']);
	$u_resume3_position=ReStra($_POST['u_resume3_position']);

	$u_members1_name=ReStra($_POST['u_members1_name']);
	$u_members1_relationship=ReStra($_POST['u_members1_relationship']);
	$u_members1_work=ReStra($_POST['u_members1_work']);
	$u_members1_chief=ReStra($_POST['u_members1_chief']);

	$u_members2_name=ReStra($_POST['u_members2_name']);
	$u_members2_relationship=ReStra($_POST['u_members2_relationship']);
	$u_members2_work=ReStra($_POST['u_members2_work']);
	$u_members2_chief=ReStra($_POST['u_members2_chief']);

	$u_members3_name=ReStra($_POST['u_members3_name']);
	$u_members3_relationship=ReStra($_POST['u_members3_relationship']);
	$u_members3_work=ReStra($_POST['u_members3_work']);
	$u_members3_chief=ReStra($_POST['u_members3_chief']);

	$sql="update user set
    u_school_id='$u_school_id',
	u_name='$u_name',
	u_name_old='$u_name_old',
	u_zk_num='$u_zk_num',
	u_czby_date='$u_czby_date',
	u_zj_num='$u_zj_num',
	u_birth='$u_birth',
	u_sex='$u_sex',
	u_address_hk='$u_address_hk',
	u_address_city='$u_address_city',
	u_address_xian='$u_address_xian',
	u_huji='$u_huji',
	u_minzu='$u_minzu',
	u_zzmm='$u_zzmm',
	u_at_school='$u_at_school',
	u_vocational='$u_vocational',
	u_applyfor='$u_applyfor',
	u_tel='$u_tel',
	u_address='$u_address',
	u_addressee='$u_addressee',
	u_code='$u_code',
	u_skills='$u_skills',
	u_skills_grade='$u_skills_grade',
	u_match='$u_match',
	u_match_grade='$u_match_grade',
	u_resume1_date_star='$u_resume1_date_star',
	u_resume1_date_end='$u_resume1_date_end',
	u_resume1_content='$u_resume1_content',
	u_resume1_position='$u_resume1_position',

	u_resume2_date_star='$u_resume2_date_star',
	u_resume2_date_end='$u_resume2_date_end',
	u_resume2_content='$u_resume2_content',
	u_resume2_position='$u_resume2_position',

	u_resume3_date_star='$u_resume3_date_star',
	u_resume3_date_end='$u_resume3_date_end',
	u_resume3_content='$u_resume3_content',
	u_resume3_position='$u_resume3_position',

	u_members1_name='$u_members1_name',
	u_members1_relationship='$u_members1_relationship',
	u_members1_work='$u_members1_work',
	u_members1_chief='$u_members1_chief',

	u_members2_name='$u_members2_name',
	u_members2_relationship='$u_members2_relationship',
	u_members2_work='$u_members2_work',
	u_members2_chief='$u_members2_chief',

	u_members3_name='$u_members3_name',
	u_members3_relationship='$u_members3_relationship',
	u_members3_work='$u_members3_work',
	u_members3_chief='$u_members3_chief'

	where u_id=$user_id";

	mysql_query($sql) or die(mysql_error($sql));
	Msg('','user_kaochang.php');

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/admin.css" type="text/css" />
	<script type="text/javascript" src="inc/function.js"></script>
	<script>

		window.onload=function () {

			var obj=document.getElementById("table").getElementsByTagName("td");
			//var input=getClassName("table","input");

			for(var i=16;i<obj.length;i++){
				obj[i].ondblclick=function (){
					var add = document.createElement("input");
					add.type="text";
					add.value=this.innerHTML;
					add.onblur=function () {
						this.parentNode.innerHTML=this.value;
					}
					this.innerHTML="";
					this.appendChild(add);
				}
			}
		}

	</script>
</head>
<body>
<?php
$u_type=$_GET['type'];
switch($act){
	case 'delete';
		mysql_query('delete from user where u_id='.$id);
		Msg('','Referer');
		break;
	case 'type';

		$sql='update user set u_type='.$_GET['u_type'].' where u_id='.$id;
		mysql_query($sql) or die(mysql_error($sql));
		Msg('','Referer');
		break;

}
?>
<div id="container">
	<div class="view">
				<h1>考场管理</h1>

		<form name="form1" method="post" action="user_kaochang.php?act=modok">
			<table width="100%" border="0" id="table" cellpadding="0" cellspacing="0">
				<tr class="v_title">
					<td width="6%">ID号</td>
					<!-- <td width="10%">毕业学校</td> -->
					<td width="6%">序号</td>
					<!-- <td width="5%">用户名</td> -->
					<td width="10%">姓名</td>
					<!-- <td width="3%">性别</td> -->
					<td width="10%">考生号</td>
					<!-- <td width="10%">身份证</td>
					<td width="10%">专业</td>
					<td width="10%">报考专业</td> -->
					<td width="20%">考核科目</td>
					<td width="10%">考场</td>
					<td width="10%">考场编号</td>
					<td width="6%">座位号</td>
					<td width="10%">考试教室</td>
					<td width="20%">考核时间</td>
				</tr>
				<?php
				$page_size=15;
				if ($_SESSION['admin_user'] == 'admin')
					$page_sql='select * from user where u_type=1 order by u_id desc ';
				else {
					$user = $_SESSION['admin_user'];
					$query=mysql_query("select * from admin where a_user='$user'");
					$row=mysql_fetch_array($query);
					$belong_school_id = $row['belong_school_id'];
					$page_sql = "select * from user where u_school_id=$belong_school_id and u_type=1 order by u_id desc where u_type=1";
				}
				$page_count=GetPageCount($page_size,$page_sql);
				if ($page>$page_count) $page=$page_count;
				$page_number=($page-1)*$page_size;
				$query=mysql_query($page_sql." limit $page_number,$page_size");
				if (mysql_num_rows($query)>0){
					$str='';
					while($row=mysql_fetch_array($query)){
						$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
						// $str.='<td>'.$row['u_id'].'</td>';
						$str.='<td>'.$row['u_at_school'].'</td>';
						// $str.='<td></td>';

						$str.='<td>'.$row['u_user'].'</td>';

						// $str.='<td>'.$row['u_name'].'</td>';
						switch ($row['u_sex']) {
							case 1:
								$str .= '<td>男</td>'; break;
							case 2:
								$str .= '<td>女</td>'; break;
							default:
								$str .= '<td></td>';
						}
						// $str.='<td>'.$row['u_zk_num'].'</td>';

						// $str.='<td>'.$row['u_zj_num'].'</td>';
						// $str.='<td>'.$row['u_vocational'].'</td>';
						$str.='<td>'.$row['u_applyfor'].'</td>';
						$str.='<td></td>';
						$str.='<td></td>';
						$str.='<td></td>';
						$str.='<td></td>';
						$str.='<td></td>';
						$str.='<td></td>';
						$str.='</tr>';
						$page_number++;
					}
					echo $str;
				}
				else {
					$page_show=false;
				}
				?>
			</table>
		</form>
		<?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>
