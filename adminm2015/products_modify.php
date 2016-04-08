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
<script type="text/javascript" src="../fy_ckeditor/ckeditor.js"></script>
<script src="laydate/laydate.js"></script>
</head>
<body>
<?php
 
if ($act=='modify'){
	$p_class=ReStra($_POST['p_class']);
	$p_order=ReStra($_POST['p_order']);
	$p_price=ReStra($_POST['p_price']);
	$p_name=ReStra($_POST['p_name']);
	$p_desc=ReStra($_POST['p_desc']);
	$p_content=ReStra($_POST['p_content']);
	$p_date=ReStra($_POST['p_date']);
	$p_date1=ReStra($_POST['p_date1']);
	$qianzui=ReStra($_POST['qianzui']);
	$weishu=ReStra($_POST['weishu']);
	$new_qianzui=ReStra($_POST['new_qianzui']);
	
	 
	$sql="update ".$language."_products set 
	p_class=$p_class,
	p_order=$p_order,
	p_price=$p_price,
	p_name='$p_name',
	qianzui='$qianzui',
	weishu='$weishu',
	new_qianzui='$new_qianzui',
	p_desc='$p_desc',
	p_content='$p_content',
	p_date='$p_date',
	p_date1='$p_date1'
	
	 where p_id=$id";
 
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','products.php?'.$urls);
}
$query=mysql_query('select * from '.$language.'_products where p_id='.$id,$conn);
$row=mysql_fetch_array($query);
?>
<div id="container">
  <div class="edit">
      <h1>考试科目管理</h1>
      <form name="form1" method="post" action="?act=modify&<?php echo $urls.'&id='.$id ?>" onsubmit="return CheckProducts(this);">
        <table id="protbe" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">考证分类：</td>
            <td><select name="p_class"><?php
			$str='';
			$query2=mysql_query('select * from '.$language.'_products_class where p_sid=0 and p_tid=0 order by p_order,p_id');
			if(mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				$str.='<option value="'.$row2['p_id'].'">'.$row2['p_name'].'</option>';
			}
			}
			echo $str;
			?></select></td>
          </tr>
          <tr>
            <td class="edit_title">考试名称：</td>
            <td><input name="p_name" type="text" class="inputtext" value="<?php echo $row['p_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">上次准考证前缀：</td>
            <td><input name="qianzui" type="text" class="inputtext" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" size="50" value="<?php echo $row['qianzui'] ?>" maxlength="50" />只能输入数字</td>
          </tr>
          <tr>
            <td class="edit_title">本次准考证前缀：</td>
            <td><input name="new_qianzui" type="text" class="inputtext" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" size="50" value="<?php echo $row['new_qianzui'] ?>" maxlength="50" />只能输入数字</td>
          </tr>
           <tr>
            <td class="edit_title">前缀位数：</td>
            <td><input name="weishu" type="text" class="inputtext" size="50" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  value="<?php echo $row['weishu'] ?>" maxlength="50" />只能输入数字</td>
          </tr>
           <tr>
            <td class="edit_title">考试费用：</td>
            <td><input name="p_price" type="text" class="inputtext" value="<?php echo $row['p_price'] ?>" size="50" maxlength="50" /></td>
          </tr>
           <tr>
            <td class="edit_title">报名截止时间：</td>
            <td> 
          <div class="demo2">   <input placeholder="请输入日期" class="laydate-icon" id="start" name="p_date1" value="<?php echo $row['p_date1'] ?>" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></div></td>
          </tr>
		  <tr>
            <td class="edit_title">考试时间：</td>
            <td> 
           <div class="demo2">  <input placeholder="请输入日期" class="laydate-icon" id="end" name="p_date" value="<?php echo $row['p_date'] ?>" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></div></td>
          </tr>
		  <tr>
            <td class="edit_title">考试要求：</td>
            <td><textarea name="p_desc" style="padding:5px; width:99%; height:100px; line-height:16px;"><?php echo $row['p_desc'] ?></textarea></td>
		  </tr>
          <tr>
            <td class="edit_title">排序：</td>
            <td><input name="p_order" type="text" class="inputtext" value="<?php echo $row['p_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td class="edit_title">描述：</td>
            <td><div class="edit_contents"><textarea name="p_content" class="ckeditor"><?php echo $row['p_content'] ?></textarea></div></td>
		  </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="location.href='products.php?<?php echo $urls ?>'" /></td>
          </tr>
        </table>
    </form>
	<script type="text/javascript">
	document.form1.p_class.value="<?php echo $row['p_class'] ?>";
 
	</script>
    <script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#demo'});//绑定元素
}();
//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);
//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
    }
});
//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>
    </div>
</div>
</body>
</html>