<!DOCTYPE html>
<html5>
<head>
    <title>Back</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="./static/bootstrap/body.css" rel="stylesheet">
	<script type="text/javascript" src="./static/js/jquery.js"></script>
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<br><br><br><br><br>
	<div id="fbody"><div class="container row-fluid">
	<?php
		require("dbconnect.php");
		$machine = mysql_query("select * from machine");
		$row_machine = mysql_fetch_array($machine);
		$machine_n = $row_machine[0];
		//time
		$server_time = $row_machine[1];
		date_default_timezone_set(PRC);
		$server_cur_time = date("Y-m-d G:i:s");
		$server_cur_time = date("Y-m-d G:i:s",strtotime($server_cur_time)-12*60*60);
		//name
		$url = "11idname.txt";
		function gb2utf8($gbstr){
			if(function_exists('iconv'))
			{
				return @iconv('gbk','utf-8//ignore',$gbstr);
			}else{
				echo"mabi";
			}
		}
		$File=file($url);
		$row = count($File);
		$arr = array();
		for($index=0;$index<$row;$index++){
			$id = substr($File[$index],0,9);
			$name = gb2utf8(substr($File[$index],10,6));
			$arr[$id] = $name;
		}
		
		echo "<table><tr><td>Server time:</td><td>".$server_cur_time."</td></tr>";
		echo "<tr><td>Machine info update time:</td><td>".$server_time."</td></tr></table>";
		echo "<table class='table table-striped'><thead><tr><th>UID</th><th>Username</th><th>name</th><th>Email</th><th>AI数目监控</th><th>register time</th></tr></thead><tbody>";
		

		
		$users = mysql_query("select * from taccount");
		while($user_i = mysql_fetch_array($users)){
			echo "<tr><td>".$user_i[0]."</td><td>".$user_i[1]."</td><td>".$arr[$user_i[1]]."</td><td>".$user_i[3]."</td><td></td><td>".$user_i[4]."</td></tr>";
		}
		
		echo "</tbody></table>";
	?>
	</div></div>
</body>
</html5>