<!doctype html>
<?php
    //require_once('check_logined.php');
	$flag =@$_GET['flag'];
	$flag = mysql_real_escape_string($flag);
	if ($flag == 1){
		$sName= @$_POST['sName'];
		$sName = mysql_real_escape_string($sName);
		$sType= @$_POST['sType'];
		$sType = mysql_real_escape_string($sType);
		$sAmount= @$_POST['sAmount'];
		$sAmount = mysql_real_escape_string($sAmount);
		$sDest= @$_POST['sDest'];
		$sDest = mysql_real_escape_string($sDest);
		$trno= @$_POST['trno'];
		$trno = mysql_real_escape_string($trno);

		require("dbconnect.php");
		$userid = $_SESSION["user"];

		$result=mysql_query("insert into supplies(Suname,Sutype,Sustate,Suamount,Trno,ID) value('$sName','$sType',0,'$sAmount','$trno','$userid');")or die("Query failed:" .mysql_error());
		
        echo "<script>alert('$result');</script>";
        if ($result)
		{
			echo "<script>alert('提交成功！'); location.href='user.php';</script>";
		} else echo "<script>alert('提交失败!');</script>";
	}
?>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Donate</title>
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
<link href="./static/bootstrap/body.css" rel="stylesheet">
<link href="./static/bootstrap/login.css" rel="stylesheet">	
<script type="text/javascript" src="./static/js/jquery.js"></script>
<style>
table{
width:100%;
}
</style>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<div id="fbody"><ul class="thumbnails">
		<div class="thumbnail span8 formdiv">
		<form id="form" class="form-signin" method="post" action="donate.php?flag=1" enctype="multipart/form-data"><table> 
			<thead><h2 class="form-signin-heading">填写捐赠信息</h2></thead>
			<tbody>
				<tr>
					<td>物资名称</td>
					<td><input type="text" class="input-block-level" placeholder="例如：牙刷" id="sName" name="sName"></td>
				</tr>
				<tr>
					<td>物资类型</td>
					<td><input type="text" class="input-block-level" placeholder="耐用品/消耗品" id="sType" name="sType"></td>
				</tr>
                <tr>
					<td>物资数量</td>
					<td><input type="text" class="input-block-level" placeholder="1000（个、KG、M等国际单位）" id="sAmount" name="sAmount"></td>
				</tr>
                <tr>
					<td>捐赠目的地</td>
					<td><input type="text" class="input-block-level" placeholder="目的地" id="sDest" name="sDest"></td>
				</tr>
                <tr>
					<td>捐赠单号</td>
					<td><input type="text" class="input-block-level" placeholder="快递的单号" id="trno" name="trno"></td>
				</tr>
				<tr><td></td><td class="text-center"><input type="submit" class="btn btn-large btn-primary" value="提交"></td></tr>
			
			</tbody>
        </table></form>
		</div>
		<div id ="inform" class="thumbnail span3 alert alert-success">
			<p>捐赠说明：</p>
			<p>所有捐赠物资通过XXX监管，将全部用于灾区重建、救助工作。在此代表XXX感谢各位！</p>
            <p>您可以在此登记捐赠信息，这使得您可以随时查看所捐赠物品的动态，如果您不填写此单，您将无法查阅捐赠的信息。</p>
            <p>如果出现问题，请联系amalthea@163.com</p>
		</div>
    </ul></div>
	
	<?php
function dealwith($array){
    $i = 1; 
    $j = $array[0];
    $bs = 0;
    $x = $array[($i + $j)/2];
    
    $rt = "";
while($i < $j){
    while($array[$i] < $x && $i < $array[0]){
        $bs--;
        $i++;
    }

    while($array[$j] > $x && $j > 1){
        $bs = $bs % 12;
         $j--;
    }

    if ($i == $j){
        $rt .= "write a row<br>";
    }
    
}
}


?>
		
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>

