<!doctype html>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>任务请求</title>
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
<link href="./static/bootstrap/body.css" rel="stylesheet">
<link href="./static/bootstrap/login.css" rel="stylesheet">	
<script type="text/javascript" src="./static/js/jquery.js"></script>
<style>
table{
    width:100%;
}
.content{
    width:69%;
}
textarea{
    float:left;
    width:100%;
}
</style>
</head>
<?php
if (isset($_POST['submit'])){
    $tName =@$_POST['tName'];
	$tName = mysql_real_escape_string($tName);
    $tRemark =@$_POST['tRemark'];
	$tRemark = mysql_real_escape_string($tRemark);

    if($tName != "" && $tRemark !=""){
        require_once("dbconnect.php");
        $rt = mysql_query("insert into task(Tname,Tstatus,Tremark) value('$tName',0,'$tRemark');")or die("Query failed:" .mysql_error());
        if ($rt){
            echo "<script>alert('提交成功，请等待审核！');</script>";
        }else echo "<script>alert('提交失败！');</script>";     
    }
}
?>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<?php require_once("header.php");?>
</div>
<div id="fbody"><ul class="thumbnails">
<div class="thumbnail span8 formdiv">
	<form id="form" class="form-signin" method="post" action="" enctype="multipart/form-data"><table> 
        <thead><h2 class="form-signin-heading">任务请求</h2></thead>
		<tbody>
			<tr>
				<td>任务名称</td>
				<td><input type="text" class="input-block-level" placeholder="任务名称" id="tName" name="tName"></td>
			</tr>
            <tr>
				<td>任务描述</td>
				<td><textarea placeholder="任务详细描述，包括任务的地点等" class="input-block-level" id="tRemark" name="tRemark"></textarea></td>    
            </tr>
            <tr>
                <td></td>
                <td class="text-center"><input type="submit" class="btn btn-big btn-primary" style="width:50%" value="提交" id="submit" name="submit"></td>
            </tr>        
			
		</tbody>
    </table></form>
</div>
<div id ="inform" class="thumbnail span3 alert alert-success">
	<p>任务请求：</p>
    <p>如果出现问题，请联系amalthea@163.com</p>
</div>
</ul></div>
	
	
		
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>

