<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<?php
$row_num = $_GET['row'];
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

		// window.onload=function () {
		//
		// 	var obj=document.getElementById("table").getElementsByTagName("button");
		// 	//var input=getClassName("table","input");
		//
		// 	for(var i=0;i<obj.length;i++){
		// 		obj[i].ondblclick=function (){
		// 			var add = document.createElement("input");
		// 			add.type="text";
		// 			add.value=this.innerHTML;
		// 			add.onblur=function () {
		// 				this.parentNode.innerHTML=this.value;
		// 			}
		// 			this.innerHTML="";
		// 			this.appendChild(add);
		// 		}
		// 	}
		// }

		<?php if ($row_num != "") echo 'alert('.$row_num.')'?>

		function edit(x) {
			var sub_id = "sub_bt" + x
			var edit_id = "edit_bt" + x
			var cel_id = "cel_bt" + x

			var s_seat_num = "s_seat_num" + x
			var s_exam_id = "s_exam_id" + x
			var s_exam_num = "s_exam_num" + x
			var s_exam_subject = "s_exam_subject" + x
			var s_exam_room = "s_exam_room" + x
			var s_exam_venue = "s_exam_venue" + x
			var s_exam_date = "s_exam_date" + x

			var u_seat_num = "u_seat_num" + x
			var u_exam_id = "u_exam_id" + x
			var u_exam_num = "u_exam_num" + x
			var u_exam_subject = "u_exam_subject" + x
			var u_exam_room = "u_exam_room" + x
			var u_exam_venue = "u_exam_venue" + x
			var u_exam_date = "u_exam_date" + x

			tagMode(sub_id, false);
			showTag(cel_id);
			hiddenTag(edit_id);

			showTag(s_seat_num);
			hiddenTag(u_seat_num);

			showTag(s_exam_num);
			hiddenTag(u_exam_num);

			showTag(s_exam_date);
			hiddenTag(u_exam_date);

			showTag(s_exam_room);
			hiddenTag(u_exam_room);

			showTag(s_exam_venue);
			hiddenTag(u_exam_venue);

			showTag(s_exam_subject);
			hiddenTag(u_exam_subject);

			showTag(s_exam_id);
			hiddenTag(u_exam_id);
		}

		function sub(x) {
			var sub_id = "sub_bt" + x
			var edit_id = "edit_bt" + x
			var cel_id = "cel_bt" + x

			var s_seat_num = "s_seat_num" + x
			var s_exam_id = "s_exam_id" + x
			var s_exam_num = "s_exam_num" + x
			var s_exam_subject = "s_exam_subject" + x
			var s_exam_room = "s_exam_room" + x
			var s_exam_venue = "s_exam_venue" + x
			var s_exam_date = "s_exam_date" + x

			var u_seat_num = "u_seat_num" + x
			var u_exam_id = "u_exam_id" + x
			var u_exam_num = "u_exam_num" + x
			var u_exam_subject = "u_exam_subject" + x
			var u_exam_room = "u_exam_room" + x
			var u_exam_venue = "u_exam_venue" + x
			var u_exam_date = "u_exam_date" + x

			tagMode(sub_id, true);
			// document.getElementById(sub_id).disabled = true;
			showTag(edit_id);
			hiddenTag(cel_id);

			hiddenTag(s_seat_num);
			showTag(u_seat_num);
			changeValue(u_seat_num, s_seat_num)

			hiddenTag(s_exam_num);
			showTag(u_exam_num);
			changeValue(u_exam_num, s_exam_num)

			hiddenTag(s_exam_date);
			showTag(u_exam_date);
			changeValue(u_exam_date, s_exam_date)

			hiddenTag(s_exam_room);
			showTag(u_exam_room);
			changeValue(u_exam_room, s_exam_room)

			hiddenTag(s_exam_venue);
			showTag(u_exam_venue);
			changeValue(u_exam_venue, s_exam_venue)

			hiddenTag(s_exam_subject);
			showTag(u_exam_subject);
			changeValue(u_exam_subject, s_exam_subject)

			hiddenTag(s_exam_id);
			showTag(u_exam_id);
			changeValue(u_exam_id, s_exam_id)
		}

		function cancel(x) {
			var sub_id = "sub_bt" + x
			var edit_id = "edit_bt" + x
			var cel_id = "cel_bt" + x

			var s_seat_num = "s_seat_num" + x
			var s_exam_id = "s_exam_id" + x
			var s_exam_num = "s_exam_num" + x
			var s_exam_subject = "s_exam_subject" + x
			var s_exam_room = "s_exam_room" + x
			var s_exam_venue = "s_exam_venue" + x
			var s_exam_date = "s_exam_date" + x

			var u_seat_num = "u_seat_num" + x
			var u_exam_id = "u_exam_id" + x
			var u_exam_num = "u_exam_num" + x
			var u_exam_subject = "u_exam_subject" + x
			var u_exam_room = "u_exam_room" + x
			var u_exam_venue = "u_exam_venue" + x
			var u_exam_date = "u_exam_date" + x

			tagMode(sub_id, true);
			hiddenTag(cel_id);
			showTag(edit_id);

			hiddenTag(s_seat_num);
			showTag(u_seat_num);

			hiddenTag(s_exam_num);
			showTag(u_exam_num);

			hiddenTag(s_exam_date);
			showTag(u_exam_date);

			hiddenTag(s_exam_room);
			showTag(u_exam_room);

			hiddenTag(s_exam_venue);
			showTag(u_exam_venue);

			hiddenTag(s_exam_subject);
			showTag(u_exam_subject);

			hiddenTag(s_exam_id);
			showTag(u_exam_id);
		}

		function hiddenTag(id) {
			document.getElementById(id).style = "display: none";
		}

		function showTag(id) {
			document.getElementById(id).style = "display: true";
		}

		function tagMode(id, bool) {
			document.getElementById(id).disabled = bool;
		}

		function changeValue(id1, id2) {
			// document.getElementById(id2).value = document.getElementById(id1).innerHTML;
			document.getElementById(id1).innerHTML = document.getElementById(id2).value;
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

		<!-- <form name="form1" method="post" action="user_kaochang.php?act=modok"> -->
			<table width="100%" border="0" id="table" cellpadding="0" cellspacing="0">
				<tr class="v_title">
					<td width="8%">编辑</td>
					<!-- <td width="10%">毕业学校</td> -->
					<!-- <td width="5%">用户名</td> -->
					<td width="10%">姓名</td>
					<!-- <td width="3%">性别</td> -->
					<td width="10%">考生号</td>
					<td width="6%">序号</td>
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
					$page_sql='select * from examination_room order by id desc ';
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
					$i = 0;
					while($row=mysql_fetch_array($query)){
						$i++;

						// $str . = "<form id=\"row$i\" name=\"row$i\" action=\".\" method=\"post\">";
						$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
						// $str.='<td>'.$row['u_id'].'</td>';
						// $str.= "<form id=\"row$i\" name=\"row$i\" action=\"user_kaochang.php?row=$i\">";
						$str.= "
							<td><form id=\"row$i\" name=\"row$i\" action=\"user_kaochang.php\">
							<input type=\"hidden\" name=\"row\" value=\"$i\">
							<button id=\"edit_bt$i\" name=\"edit_bt$i\" type=\"button\" onclick=\"edit($i)\" style=\"display: true\">修改</button>
							<input id=\"cel_bt$i\" name=\"cel_bt$i\" type=\"button\" onclick=\"cancel($i)\" style=\"display: none\" value=\"取消\">
							<input id=\"sub_bt$i\" name=\"sub_bt$i\" type=\"submit\" disabled  value=\"提交\">";
						// $str.='<td></td>';

						$str.= '<td><input style="border: 0; display: none" id="s_name' . $i . '" name="s_name'. $i .'" size=6 value=' . $row['s_name'] . '><span id="u_name'.$i.'" name="u_name'.$i.'" style="display: true">'. $row['s_name'].'</span></td>';

						// $str.='<td>'.$row['u_name'].'</td>';
						// switch ($row['u_sex']) {
						// 	case 1:
						// 		$str .= '<td>男</td>'; break;
						// 	case 2:
						// 		$str .= '<td>女</td>'; break;
						// 	default:
						// 		$str .= '<td></td>';
						// }
						$str.= '<td><input style="border: 0; display: none" id="s_school_num' . $i . '" name="s_school_num'. $i .'" size=6 value=' . $row['s_school_num'] . '><span id="u_school_num'.$i.'" name="u_school_num'.$i.'" style="display: true">'. $row['s_school_num'].'</span></td>';

						// $str.='<td>'.$row['u_zj_num'].'</td>';
						// $str.='<td>'.$row['u_vocational'].'</td>';
						// $str.='<td>'.$row['u_applyfor'].'</td>';
						$str.= '<td><input size="1" maxlength="2" style="border: 0; display: none" id="s_exam_id' . $i . '" name="s_exam_id'. $i .'" size=6 value="' . $row['s_exam_id'] . '"><span id="u_exam_id'.$i.'" name="u_exam_id'.$i.'" style="display: true">'. $row['s_exam_id'].'</span></td>';
						$str.= '<td><input size="10" style="border: 0; display: none" id="s_exam_subject' . $i . '" name="s_exam_subject'. $i .'" size=6 value=' . $row['s_exam_subject'] . '><span id="u_exam_subject'.$i.'" name="u_exam_subject'.$i.'" style="display: true">'. $row['s_exam_subject'].'</span></td>';
						$str.= '<td><input style="border: 0; display: none" id="s_exam_venue' . $i . '" name="s_exam_venue'. $i .'" size=6 value=' . $row['s_exam_venue'] . '><span id="u_exam_venue'.$i.'" name="u_exam_venue'.$i.'" style="display: true">'. $row['s_exam_venue'].'</span></td>';
						$str.= '<td><input style="border: 0; display: none" id="s_exam_num' . $i . '" name="s_exam_num'. $i .'" size=6 value=' . $row['s_exam_num'] . '><span id="u_exam_num'.$i.'" name="u_exam_num'.$i.'" style="display: true">'. $row['s_exam_num'].'</span></td>';
						$str.= '<td><input size="1" maxlength="2" style="border: 0; display: none" id="s_seat_num' . $i . '" name="s_seat_num'. $i .'" size=6 value=' . $row['s_seat_num'] . '><span id="u_seat_num'.$i.'" name="u_seat_num'.$i.'" style="display: true">'. $row['s_seat_num'].'</span></td>';
						$str.= '<td><input style="border: 0; display: none" id="s_exam_room' . $i . '" name="s_exam_room'. $i .'" size=6 value=' . $row['s_exam_room'] . '><span id="u_exam_room'.$i.'" name="u_exam_room'.$i.'" style="display: true">'. $row['s_exam_room'].'</span></td>';
						$str.= '<td><input style="border: 0; display: none" id="s_exam_date' . $i . '" name="s_exam_date'. $i .'" size=6 value=' . $row['s_exam_date'] . '><span id="u_exam_date'.$i.'" name="u_exam_date'.$i.'" style="display: true">'. $row['s_exam_date'].'</span></form></td>';
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
		<!-- </form> -->
		<?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>
