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
 
<div id="container">
	 
	<div class="view" style="height:350px; overflow:auto">
		<h1>准考证号</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
				<td width="70%">准考证号</td>
				 
				<td width="15%">考生</td>
        	</tr>
			<?php
			$query=mysql_query('select * from dz_zkz  order by p_id');
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td>'.$row['p_number'].'</td>';
					 
					$str.='<td> '.$row['p_user'].'</td>';
					$str.='</tr>';
				}
				echo $str;
			}
			?>
		</table>
	</div> 
    
	 
</div>
</body>
</html>