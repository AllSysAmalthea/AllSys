<html>
<head>
<?php
	$BID  =  $_GET['BID'];
	$result = mysql_query("select * from tbattle where BID = '$BID'");
	$row = mysql_fetch_array($result);
	if ($row[7] != 5) echo json_encode("unsuccess");else {  						
		$rep_path = "/usr/local/apache/htdocs/replay/".$BID."/out.txt";
		$fp = fopen($rep_path,"r");
		$data=fread($fp,filesize($rep_path));
		fclose($fp);
		echo json_encode($data);
	}
	//echo $data;
?>
</head>
<body>
</body>
</html>