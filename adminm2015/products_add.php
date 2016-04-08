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
if ($act=='add'){
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
	
	$sql="insert into ".$language."_products(new_qianzui,weishu,qianzui,p_price,p_class,p_order,p_name,p_desc,p_content,p_date,p_date1) 
	values('$new_qianzui','$weishu','$qianzui','$p_price','$p_class',$p_order,'$p_name','$p_desc','$p_content','$p_date','$p_date1')";
	 
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加成功！','');
}
?>
<div id="container">
  <div class="edit">
      <h1>考试科目管理</h1>
      <form name="form1" method="post" action="?act=add" onsubmit="return CheckProducts(this);">
        <table id="protbe" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">考证分类：</td>
            <td><select name="p_class"><option value="">请选择</option><?php
			$str='';
			$query=mysql_query('select * from '.$language.'_products_class where p_sid=0 and p_tid=0 order by p_order,p_id');
			if(mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
			}
			}
			echo $str;
			?></select></td>
          </tr>
          <tr>
            <td class="edit_title">名称：</td>
            <td><input name="p_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
           <tr>
            <td class="edit_title">上次准考证前缀：</td>
            <td><input name="qianzui" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  class="inputtext" size="50" maxlength="50" />只能输入数字</td>
          </tr>
          <tr>
            <td class="edit_title">本次准考证前缀：</td>
            <td><input name="new_qianzui" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  class="inputtext" size="50" maxlength="50" />只能输入数字</td>
          </tr>
           <tr>
            <td class="edit_title">前缀位数：</td>
            <td><input name="weishu" type="text" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"  class="inputtext" size="50" maxlength="50" />只能输入数字</td>
          </tr>
           <tr>
            <td class="edit_title">报名费用：</td>
            <td><input name="p_price" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
           <tr>
            <td class="edit_title">报名截止时间：</td>
            <td>
          <div class="demo2"> 
           <input placeholder="请输入日期" class="inline laydate-icon" id="start" name="p_date1" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></div>
         </td>
          </tr>
		  <tr>
            <td class="edit_title">考试时间：</td>
            <td><div class="demo2">
            <input placeholder="请输入日期" class="inline laydate-icon" id="end" name="p_date" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></div>
         </td>
          </tr>
		  <tr>
            <td class="edit_title">考试要求：</td>
            <td><textarea name="p_desc" style="padding:5px; width:99%; height:100px; line-height:16px;"></textarea></td>
		  </tr>
          <tr>
            <td class="edit_title">排序：</td>
            <td><input name="p_order" type="text" class="inputtext" value="<?php echo RsNum('select p_id from '.$language.'_products')+1 ?>" size="10" maxlength="10" /></td>
          </tr>
   <!--       <tr>
            <td class="edit_title">Title：</td>
            <td><input name="k_name" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Keyword：</td>
            <td><input name="k_keyword" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Description：</td>
            <td><input name="k_description" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>-->
          <tr>
            <td class="edit_title">描述：</td>
            <td><div class="edit_contents"><textarea name="p_content" class="ckeditor"></textarea></div></td>
		  </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 添加 " class="button" /></td>
          </tr>
        </table>
    </form>
    <script>
!function(){
laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
laydate({elem: '#demo'});//绑定元素
}();
//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD  hh:mm:ss',
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
    format: 'YYYY-MM-DD  hh:mm:ss',
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