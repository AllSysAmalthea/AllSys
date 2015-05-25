<!doctype html>
<?php
	$flag =@$_GET['flag'];
	$flag = mysql_real_escape_string($flag);
	if ($flag == 1){
		$username= @$_POST['user'];
		$username = mysql_real_escape_string($username);
		$password= @$_POST['pass'];
		$password = mysql_real_escape_string($password);
		require("dbconnect.php");
	
		$result=mysql_query("SELECT chk_acc_info('$username','$password')");
		$ans=mysql_fetch_array($result);
		if ($ans[0] != 0)
		{
			session_start(); /////////////////need repair
			$_SESSION["user"] = $username;
			echo "<script>location.href='index.php';</script>";
		} else echo "<script>alert('Username or Password is wrong!');</script>";
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
<script>
	function checkuser(){
		var _user = $("#user").val();
		if (_user == ""){
			$("#userinfo").css({'color':'red'}).html('Please input username');
			//$("#userinfo").addClass("alert alert-warning").html('Please input username');
		}else{
			$("#userinfo").css({'color':'red'}).html('');
		}
	}
	function checkpass(){
		var _pass = $("#pass").val();
		if (_pass == ""){
			//$("#passinfo").addClass("alert alert-warning").html('Please input password');
			$("#passinfo").css({'color':'red'}).html('Please input password');
		}else{
			$("#passinfo").css({'color':'red'}).html('');
		}
	}
</script>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<div id="fbody"><ul class="thumbnails">
		<div class="thumbnail span8 formdiv">
		<form id="form" class="form-signin" method="post" action="login.php?flag=1" enctype="multipart/form-data"><table> 
			<thead><h2 class="form-signin-heading">灾区信息查询</h2></thead>
			<tbody>
				<tr>
					<td>查询人口状态</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
                    <td class="text-center"><input type="submit" class="btn btn-big btn-primary" value="查询"></td>
                    <td class="text-left" id="userinfo"></td>
				</tr>
				<tr>
					<td>查询庇护所</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
                    <td class="text-center"><input type="submit" class="btn btn-big btn-primary" value="查询"></td>
					<td class="text-left" id="userinfo"></td>
				</tr>
                <tr>
					<td>查询</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
                    <td class="text-center"><input type="submit" class="btn btn-big btn-primary" value="查询"></td>
					<td class="text-left" id="userinfo"></td>
				</tr>
                <tr>
					<td>捐赠单号</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
                    <td class="text-center"><input type="submit" class="btn btn-big btn-primary" value="查询"></td>
					<td class="text-left" id="userinfo"></td>
				</tr>
                <tr>
					<td>联系方式</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
                    <td class="text-center"><input type="submit" class="btn btn-big btn-primary" value="查询"></td>
					<td class="text-left" id="userinfo"></td>
				</tr>
			
			</tbody>
        </table></form>
		</div>
		<div id ="inform" class="thumbnail span3 alert alert-success">
			<p>查询系统使用说明：</p>
			<p>请规范使用系统，切勿攻击！</p>
            <p>如果出现问题，请联系amalthea@163.com</p>
		</div>
    </ul></div>
	
	
		
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>

