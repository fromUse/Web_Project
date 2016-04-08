<?php
function CutStr($str, $width = 0, $end = '...', $x3 = 0) {   
	global $CFG; // 全局变量保存 x3 的值   
	if ($width <= 0 || $width >= strlen($str)) {   
		return $str;   
	}   
	$arr = str_split($str);   
	$len = count($arr);   
	$w = 0;   
	$width *= 10;   
	// 不同字节编码字符宽度系数   
	$x1 = 11;   // ASCII   
	$x2 = 16;   
	$x3 = $x3===0 ? ( $CFG['cf3']  > 0 ? $CFG['cf3']*10 : $x3 = 21 ) : $x3*10;   
	$x4 = $x3;   
	for ($i = 0; $i < $len; $i++) {   
		if ($w >= $width) {   
			$e = $end;   
			break;   
		}   
		$c = ord($arr[$i]);   
		if ($c <= 127) {   
			$w += $x1;   
		}   
		elseif ($c >= 192 && $c <= 223) { // 2字节头   
			$w += $x2;   
			$i += 1;   
		}   
		elseif ($c >= 224 && $c <= 239) { // 3字节头   
			$w += $x3;   
			$i += 2;   
		}   
		elseif ($c >= 240 && $c <= 247) { // 4字节头   
			$w += $x4;   
			$i += 3;   
		}   
	}   
	return implode('', array_slice($arr, 0, $i) ). $e;   
}

function ReStra($str) {
	if ($str=='') return $str;
	if (get_magic_quotes_gpc()==0){
		$str=addslashes($str);
	}
	return $str;
}

function ReStr($str) {
	if ($str=='') return $str;
	$str=htmlspecialchars($str,ENT_QUOTES);
	$str=str_replace(' ','&nbsp;',$str);
	$str=str_replace('\\','\\\\',$str);
	return $str;
}

function ReStr2($str) {
	if ($str=='') return $str;
	$str=str_replace('&','',$str);
	//$str=str_replace(' ','',$str);
	$str=str_replace("'",'',$str);
	$str=str_replace('"','',$str);
	$str=str_replace('<','',$str);
	$str=str_replace('>','',$str);
	return $str;
}

function HTMLEnCodes($str){
	if ($str=='') return $str;
	$str=htmlspecialchars($str,ENT_QUOTES);
	$str=str_replace(' ','&nbsp;',$str);
	$str=str_replace('\\','\\\\',$str);
	$str=str_replace(chr(13).chr(10),'<br />',$str);
	$str=str_replace(chr(13),'<br />',$str);
	$str=str_replace(chr(10),'<br />',$str);
	return $str;
}

function HTMLEnCodes_decode($str){
	if ($str=='') return $str;
	//$str=htmlspecialchars_decode($str,ENT_QUOTES);
	$str=str_replace('&nbsp;',' ',$str);
	$str=str_replace('<br />',chr(13).chr(10),$str);
	return $str;
}

function Msg($msg_str,$msg_url){
	if ($msg_str==''){
		switch($msg_url){
		case '':
			echo '<script language="javascript">location.href="'.$_SERVER['PHP_SELF'].'";</script>';
			exit();
			break;
		case 'PageUrl':
			echo '<script language="javascript">location.href="'.GetPageUrl('').'";</script>';
			exit();
		case 'Back':
			echo '<script language="javascript">history.back();</script>';
		case 'Close':
			echo '<script language="javascript">window.close();</script>';
		case 'Referer':
			echo '<script language="javascript">location.href="'.$_SERVER['HTTP_REFERER'].'";</script>';
			exit();
		default:
			echo '<script language="javascript">location.href="'.$msg_url.'";</script>';
			exit();
		}
	}
	else{
		switch($msg_url){
		case '':
			echo '<script language="javascript">alert("'.$msg_str.'");location.href="'.$_SERVER['PHP_SELF'].'";</script>';
			exit();
		case 'PageUrl':
			echo '<script language="javascript">alert("'.$msg_str.'");location.href="'.GetPageUrl('').'";</script>';
			exit();
		case 'Back':
			echo '<script language="javascript">alert("'.$msg_str.'");history.back();</script>';
		case 'Close':
			echo '<script language="javascript">alert("'.$msg_str.'");window.close();</script>';
		case 'Referer':
			echo '<script language="javascript">alert("'.$msg_str.'");location.href="'.$_SERVER['HTTP_REFERER'].'";</script>';
			exit();
		default:
			echo '<script language="javascript">alert("'.$msg_str.'");location.href="'.$msg_url.'";</script>';
			exit();
		}
	}
}

function GetPageUrl($val){
	if ($val==''){
		$remove_val='act';
	}
	else {
		$remove_val=$val;
	}
	$query_array=explode('&',$_SERVER['QUERY_STRING']);
	if (stripos($remove_val,'|')===false){
		foreach($query_array as $query_val){
			$query_val_arr=explode('=',$query_val);
			if (strtolower($query_val_arr[0])!=$remove_val){
				$re_val.=$query_val.'&';
			}
		}
	}
	else {
		$remove_val=explode('|',$remove_val);
		foreach($query_array as $query_val){
			$query_val_arr=explode('=',$query_val);
			$query_val_arrs=strtolower($query_val_arr[0]);
			switch(count($remove_val)){
			case 1:
				if ($query_val_arrs!=$remove_val[0]){
					$re_val.=$query_val.'&';
				}
				break;
			case 2:
				if ($query_val_arrs!=$remove_val[0] && $query_val_arrs!=$remove_val[1]){
					$re_val.=$query_val.'&';
				}
				break;
			case 3:
				if ($query_val_arrs!=$remove_val[0] && $query_val_arrs!=$remove_val[1] && $query_val_arrs!=$remove_val[2]){
					$re_val.=$query_val.'&';
				}
				break;
			case 4:
				if ($query_val_arrs!=$remove_val[0] && $query_val_arrs!=$remove_val[1] && $query_val_arrs!=$remove_val[2] && $query_val_arrs!=$remove_val[3]){
					$re_val.=$query_val.'&';
				}
				break;
			case 5:
				if ($query_val_arrs!=$remove_val[0] && $query_val_arrs!=$remove_val[1] && $query_val_arrs!=$remove_val[2] && $query_val_arrs!=$remove_val[3] && $query_val_arrs!=$remove_val[4]){
					$re_val.=$query_val.'&';
				}
				break;
			}
		}
	}
	$re_val=substr($re_val,0,strripos($re_val,"&"));
	if ($re_val!='') $re_val='?'.$re_val;
	
	return $_SERVER['PHP_SELF'].$re_val;
}

function GetPageUrl2($val){
	$re_val=GetPageUrl($val);
	if (stripos($re_val,'?')===false){
		$re_val.='?';
	}
	else {
		$re_val.='&';
	}
	return $re_val;
}

function isDate($date){
	if ($date=='') return false;
	$return_val=false;
	$date=explode(' ',$date);
	$date_str1=$date[0];
	if (stripos($date_str1,'年') && stripos($date_str1,'月')){
		$date_str1=str_replace('年','-',$date_str1);
		$date_str1=str_replace('月','-',$date_str1);
	}
	if (stripos($date_str1,'-')){
		$date_str1=explode('-',$date_str1);
		if (count($date_str1)<3) return false;
		$date_year=$date_str1[0];
		$date_month=$date_str1[1];
		$date_day=$date_str1[2];
		if (!is_numeric($date_year) || !is_numeric($date_month) || !is_numeric($date_day)) return false;
		if (strlen($date_year)!=4) return false;
		if ($date_month<1 || $date_month>12) return false;
		if ($date_day<1 || $date_day>31) return false;
		$return_val=true;
		if (count($date)>1){
			$date_str2=$date[1];
			$date_str2=explode(':',$date_str2);
			if (count($date_str2)<2) return false;
			$date_hours=$date_str2[0];
			$date_minute=$date_str2[1];
			if (!is_numeric($date_hours) || !is_numeric($date_minute)) return false;
			if ($date_hours<0 || $date_hours>24) return false;
			if ($date_minute<0 || $date_minute>59) return false;
			if (count($date_str2)==3){
				$date_seconds=$date_str2[2];
				if (!is_numeric($date_seconds)) return false;
				if ($date_seconds<0 || $date_seconds>59) return false;
			}
			$return_val=true;
		}
	}
	return $return_val;
}

function DeleteFile($file_path){
	$file_path=iconv('UTF-8','GB2312',$file_path);
	if(is_file($file_path)) unlink($file_path);
}

function GetPageCount($page_size,$page_sql){
	$page_dcount=RsNum($page_sql);
	if ($page_dcount>0){
		$page_count=(int)($page_dcount/$page_size);
		if (stripos($page_dcount/$page_size,".")){
			$page_count+=1;
		}
	}
	else {
		$page_count=1;
	}
	return $page_count;
}

function ShowPage3($page,$page_count,$language){
	switch($language){
	case 'cn':
		$pagestr_1='首页';
		$pagestr_2='上一页';
		$pagestr_3='下一页';
		$pagestr_4='尾页';
		$pagestr_5='跳转';
		$pagestr_6='请输入页码！';
		break;
	default:
		$pagestr_1='First';
		$pagestr_2='Prev';
		$pagestr_3='Next';
		$pagestr_4='Last';
		$pagestr_5='GO';
		$pagestr_6='Please enter page number!';
		break;
	}
	$page_url=GetPageUrl('page');
	if (stripos($page_url,'?')===false){
		$page_url.='?';
	}
	else {
		$page_url.='&';
	}
	$str='<div class="fypage_blk">';
	if ($page_count==1){
		$str.='<div class="fypage"><span class="fypage_disabled">'.$pagestr_1.'</span><span class="fypage_disabled">'.$pagestr_2.'</span><span class="fypage_current">1</span><span class="fypage_disabled">'.$pagestr_3.'</span><span class="fypage_disabled">'.$pagestr_4.'</span></div>';
	}
	else{
		$str.='<div class="fypage"><a href="'.$page_url.'page=1" class="fypage_str">'.$pagestr_1.'</a>';
		if ($page<=1){
			$str.='<a href="'.$page_url.'page=1" class="fypage_str">'.$pagestr_2.'</a>';
		}
		else{
			$str.='<a href="'.$page_url.'page='.($page-1).'" class="fypage_str">'.$pagestr_2.'</a>';
		}
		if ($page_count<=15){
			for($i=1;$i<=$page_count;$i++){
				if ($page==$i){
					$str.='<span class="fypage_current">'.$i.'</span>';
				}
				else{
					$str.='<a href="'.$page_url.'page='.$i.'">'.$i.'</a>';
				}
			}
		}
		else{
			if ($page_count-$page<=11){
				for($i=$page_count-12;$i<=$page_count;$i++){
					if ($page==$i){
						$str.='<span class="fypage_current">'.$i.'</span>';
					}
					else{
						$str.='<a href="'.$page_url.'page='.$i.'">'.$i.'</a>';
					}
				}
			}
			else{
				if ($page<10){
					for($i=1;$i<=10;$i++){
						if ($i==$page){
							$str.='<span class="fypage_current">'.$i.'</span>';
						}
						else{
							$str.='<a href="'.$page_url.'page='.$i.'">'.$i.'</a>';
						}
					}
				}
				if ($page % 10==0){
					for($i=$page-1;$i<=($page/10+1)*10;$i++){
						if ($i==$page_count-2) break;
						if ($i==$page){
							$str.='<span class="fypage_current">'.$i.'</span>';
						}
						else{
							$str.='<a href="'.$page_url.'page='.$i.'">'.$i.'</a>';
						}
					}
				}
				if ($page>10 && $page<$page_count-2){
					$fpage=intval($page_count/10);
					for($i=1;$i<=$fpage;$i++){
						if ($page>$i*10 && $page<($i+1)*10){
							for($i2=$i*10-1;$i2<=($i+1)*10;$i2++){
								if ($page==$i2){
									$str.='<span class="fypage_current">'.$i2.'</span>';
								}
								else{
									$str.='<a href="'.$page_url.'page='.$i2.'">'.$i2.'</a>';
								}
							}
							break;
						}
					}
				}
				$str.='<strong class="fypage_sl">...</strong>';
				/*
				if ($page==$page_count-1){
					$str.='<span class="fypage_current">'.($page_count-1).'</span>';
				}
				else{
					$str.='<a href="'.$page_url.'&page='.($page_count-1).'">'.($page_count-1).'</a>';
				}
				*/
				if ($page==$page_count){
					$str.='<span class="fypage_current">'.$page_count.'</span>';
				}
				else{
					$str.='<a href="'.$page_url.'page='.$page_count.'">'.$page_count.'</a>';
				}
			}
		}
		if ($page==$page_count){
			$str.='<a href="'.$page_url.'page='.$page_count.'" class="fypage_str">'.$pagestr_3.'</a>';
		}
		else{
			$str.='<a href="'.$page_url.'page='.($page+1).'" class="fypage_str">'.$pagestr_3.'</a>';
		}
		$str.='<a href="'.$page_url.'page='.$page_count.'" class="fypage_str">'.$pagestr_4.'</a>';
		$str.='<div class="fypage_go"><input type="text" id="fypage_gov" maxlength="5" /><span id="fypage_gobtn" onclick="if($2(\'fypage_gov\').value==\'\' || isNaN($2(\'fypage_gov\').value)){alert(\''.$pagestr_6.'\');}else{location.href=\''.$page_url.'page=\'+$2(\'fypage_gov\').value}">'.$pagestr_5.'</span></div>';
		$str.='</div>';
	}
	$str.='</div>';
	
	return $str;
}
//========================================================================
//后台相关函数
//========================================================================
function ShowPage($page,$page_size,$page_sql){
	$page_dcount=RsNum($page_sql);
	$page_count=(int)($page_dcount/$page_size);
	if (stripos($page_dcount/$page_size,".")!==false){
		$page_count+=1;
	}
	if ($page>$page_count) $page=$page_count;
	$page_url=GetPageUrl('page');
	if (stripos($page_url,'?')===false){
		$page_url.='?';
	}
	else {
		$page_url.='&';
	}
	$str='';
	$str.='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none;">';
	$str.='<tr><td><input type="button" name="button" value="全选" class="button2" onClick="this.value=CheckboxAll();" /><input type="button" name="button" value="删除选定内容" class="button2" onClick="DelSelect();" /></td>';
	$str.='<td>';
	if ($page_count==1){
		$str.='首页　上一页　下一页　尾页';
	}
	else{
		if ($page==1){
			$str.='首页　上一页　<a href="'.$page_url.'page='.($page+1).'">下一页</a>　<a href="'.$page_url.'page='.$page_count.'">尾页</a>';
		}
		if ($page>1 && $page<$page_count){
			$str.='<a href="'.$page_url.'page=1">首页</a>　<a href="'.$page_url.'page='.($page-1).'">上一页</a>　<a href="'.$page_url.'page='.($page+1).'">下一页</a>　<a href="'.$page_url.'page='.$page_count.'">尾页</a>';
		}
		if ($page==$page_count){
			$str.='<a href="'.$page_url.'page=1">首页</a>　<a href="'.$page_url.'page='.($page-1).'">上一页</a>　下一页　尾页';
		}
	}
	$str.='　　页次：'.$page.'/'.$page_count.'　　共'.$page_dcount.'条记录</td>';
	$str.='<td><input type="text" id="page" name="page" class="inputjump" value="'.$page.'" size="5" maxlength="5" /><input name="button" type="button" class="button2" value="跳转" onclick="if($(\'page\').value==\'\' || isNaN($(\'page\').value)){alert(\'请输入正确的页码\');}else{if($(\'page\').value>'.$page_count.'){location.href=\''.$page_url.'&page='.$page_count.'\'}else{location.href=\''.$page_url.'&page=\'+$(\'page\').value;}};" /></td>';
	$str.='</tr></table>';
	
	return $str;
}

function ShowPage2($page,$page_size,$page_sql,$page_width){
	$page_dcount=RsNum($page_sql);
	$page_count=(int)($page_dcount/$page_size);
	if (stripos($page_dcount/$page_size,".")!==false){
		$page_count+=1;
	}
	if ($page>$page_count) $page=$page_count;
	$page_url=GetPageUrl('page');
	if (stripos($page_url,'?')===false){
		$page_url.='?';
	}
	else {
		$page_url.='&';
	}
	$str='';
	$str.='<table width="'. $page_width . '"border="0" cellspacing="0" cellpadding="0" style="border-top:none;">';
	$str.='<tr><td><input type="button" name="button" value="全选" class="button2" onClick="this.value=CheckboxAll();" /><input type="button" name="button" value="删除选定内容" class="button2" onClick="DelSelect();" /></td>';
	$str.='<td>';
	if ($page_count==1){
		$str.='首页　上一页　下一页　尾页';
	}
	else{
		if ($page==1){
			$str.='首页　上一页　<a href="'.$page_url.'page='.($page+1).'">下一页</a>　<a href="'.$page_url.'page='.$page_count.'">尾页</a>';
		}
		if ($page>1 && $page<$page_count){
			$str.='<a href="'.$page_url.'page=1">首页</a>　<a href="'.$page_url.'page='.($page-1).'">上一页</a>　<a href="'.$page_url.'page='.($page+1).'">下一页</a>　<a href="'.$page_url.'page='.$page_count.'">尾页</a>';
		}
		if ($page==$page_count){
			$str.='<a href="'.$page_url.'page=1">首页</a>　<a href="'.$page_url.'page='.($page-1).'">上一页</a>　下一页　尾页';
		}
	}
	$str.='　　页次：'.$page.'/'.$page_count.'　　共'.$page_dcount.'条记录</td>';
	$str.='<td><input type="text" id="page" name="page" class="inputjump" value="'.$page.'" size="5" maxlength="5" /><input name="button" type="button" class="button2" value="跳转" onclick="if($(\'page\').value==\'\' || isNaN($(\'page\').value)){alert(\'请输入正确的页码\');}else{if($(\'page\').value>'.$page_count.'){location.href=\''.$page_url.'&page='.$page_count.'\'}else{location.href=\''.$page_url.'&page=\'+$(\'page\').value;}};" /></td>';
	$str.='</tr></table>';

	return $str;
}

function DeleteDatas($sql){
	if (count($_POST['checkbox'])>0){
		$id_arr=implode(',',$_POST['checkbox']);
		mysql_query("$sql in ($id_arr)");
		Msg('删除数据成功！','Referer');
	}
}

function GetThumbPath($file_path){
	if ($file_path!=''){
		return 'thumbs/'.substr($file_path,strripos($file_path,"/")+1);
	}
}

function CreateThumbs($image_path,$thumb_width,$thumb_height,$thumb_pro,$thumb_path){
	$image_path='../'.$image_path;
	$thumb_path='../'.$thumb_path;
	$image_size=getimagesize($image_path);
	if ($thumb_pro==1){
		if ($image_size[0]>$thumb_width && $image_size[1]>$thumb_height){
			$image_width=$image_size[0]/$image_size[1]*$thumb_height;
			$image_height=$thumb_height;
			if ($image_width>$thumb_width){
				$image_width=$thumb_width;
				$image_height=$image_size[1]/$image_size[0]*$thumb_width;
			}
		}
		if ($image_size[0]<$thumb_width && $image_size[1]<$thumb_height){
			$image_width=$image_size[0];
			$image_height=$image_size[1];
		}
		elseif($image_size[0]==$thumb_width && $image_size[1]==$thumb_height){
			$image_width=$thumb_width;
			$image_height=$thumb_height;
		}
		elseif($image_size[0]>$thumb_width && $image_size[1]<=$thumb_height){
			$image_width=$thumb_width;
			$image_height=$image_size[1]/$image_size[0]*$thumb_width;
		}
		elseif($image_size[1]>$thumb_height && $image_size[0]<=$thumb_width){
			$image_width=$image_size[0]/$image_size[1]*$thumb_height;
			$image_height=$thumb_height;
		}
	}
	else {
		$image_width=$thumb_width;
		$image_height=$thumb_height;
	}
	switch($image_size[2]){
	case 1: //gif
		$image_path=imagecreatefromgif($image_path);
		break;
	case 2: //jpg
		$image_path=imagecreatefromjpeg($image_path);
		break;
	case 3: //png
		$image_path=imagecreatefrompng($image_path);
		imagesavealpha($image_path,true);
		break;
	case 6: //bmp
		break;
	}
	$image=imagecreatetruecolor($image_width,$image_height);
	if ($image_size[2]==3){
		imagealphablending($image,false);
		imagesavealpha($image,true);
	}
	else{
		$color=imagecolorallocate($image,255,255,255);
		imagefill($image,0,0,$color);
	}
	imagecopyresampled($image,$image_path,0,0,0,0,$image_width,$image_height,$image_size[0],$image_size[1]); 
	switch($image_size[2]){
	case 1: //gif
		imagegif($image,$thumb_path,80); 
		break;
	case 2: //jpg
		imagejpeg($image,$thumb_path,80); 
		break;
	case 3: //png
		imagepng($image,$thumb_path);
		break;
	case 6: //bmp
		break;
	}
	imagedestroy($image); 
}

?>