<!doctype html>
<?php
	$flag =@$_GET['flag'];
	$flag = mysql_real_escape_string($flag);
	if ($flag == 1){
		$user= @$_POST['user'];
		$user = mysql_real_escape_string($user);
		$pass= @$_POST['pass'];
		$pass = mysql_real_escape_string($pass);
		require("dbconnect.php");
	
		$result=mysql_query("SELECT Name from citizen where ID = '$user' AND Pass = '$pass'");
		$ans=mysql_fetch_array($result);
        $name = $ans[0];
		if ($name != NULL)
		{
			session_start(); /////////////////need repair
			$_SESSION["user"] = $user;
            $_SESSION["name"] = $name;
			echo "<script>location.href='index.php';</script>";
		} else echo "<script>alert('Username or Password is wrong!');</script>";
	}
?>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login to Our AI</title>
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
			<thead><h2 class="form-signin-heading">Login to Our AI</h2></thead>
			<tbody>
				<tr>
					<td>ID</td>
					<td><input type="text" class="input-block-level" placeholder="ID" id="user" name="user" onblur="checkuser()"></td>
					<td class="text-left" id="userinfo"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="input-block-level" placeholder="Password" id="pass" name="pass" onblur="checkpass()"></td>
					<td class="text-left" id="passinfo"></td>
				</tr>
			
				<tr><td></td><td class="text-center"><input type="submit" class="btn btn-large btn-primary" value="LOGIN"></td></tr>
			
			</tbody>
        </table></form>
		</div>
		<div id ="inform" class="thumbnail span3 alert alert-success">
			<p>通知：</p>
			<p>平台处于测试阶段，难免会出现意料之外的问题，如果发现，请通知我们！邮件：metisai#126.com。谢谢大家！2014.4.5</p>
		</div>
    </ul></div>
	
	
		
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>

