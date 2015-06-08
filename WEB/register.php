<!DOCTYPE html>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Create new User</title>
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
<link href="./static/bootstrap/body.css" rel="stylesheet">
<link href="./static/bootstrap/login.css" rel="stylesheet">
<script type="text/javascript" src="./static/js/jquery.js"></script>
<script type="text/javascript">
	function checkuser(){
		var _user = $("#user").val();
		if (_user == ""){
			$("#userinfo").css({'color':'red'}).html('Please input ID');
		}else{
			$("#userinfo").css({'color':'red'}).html('');
		}
	}
	function checkpass(){
		var _pass = $("#pass").val();
		if (_pass == ""){
			$("#passinfo").css({'color':'red'}).html('Please input password');
		}else{
			$("#passinfo").css({'color':'red'}).html('');
		}
	}
	function checkName(){
		var _code = $("#name").val();
		if (_code == ""){
			$("#codeinfo").css({'color':'red'}).html('Please input your name');
		}else{
			$("#codeinfo").css({'color':'red'}).html('');
		}
	}
	function checkpass2(){
		var _pass = $("#pass").val();
		var _pass2 = $("#pass2").val();
		if (_pass2 == ""){
			$("#pass2info").css({'color':'red'}).html('Please input password again');
		}else if (_pass != _pass2){
			$("#pass2info").css({'color':'red'}).html('The two passwords do not match');
		}else{
			$("#pass2info").css({'color':'red'}).html('');
		}
	}
</script> 
<?php
function ck_reg($userid,$pass1,$pass2,$name){
    return "";
}
if (isset($_POST['submit'])){
	$userid = $_POST["user"];
	$userid = mysql_real_escape_string($userid);
	$password = $_POST["pass"];
	$password = mysql_real_escape_string($password);
	$password2 = $_POST["pass2"];
	$password2 = mysql_real_escape_string($password2);
	$name = $_POST["name"];
	$name = mysql_real_escape_string($name);
	$sex = $_POST["sex"];
	$sex = mysql_real_escape_string($sex);
    $home = $_POST["home"];
	$home = mysql_real_escape_string($home);
    $bloodtype = $_POST["bloodtype"];
	$bloodtype = mysql_real_escape_string($bloodtype);
    $height = $_POST["height"];
	$height = mysql_real_escape_string($height);
    $weight = $_POST["weight"];
	$weight = mysql_real_escape_string($weight);
    $edu = $_POST["edu"];
	$edu = mysql_real_escape_string($edu);
    
    
    // race and other info
	
    $_ans=ck_reg($userid,$password,$password2,$name);
	if ($_ans == ""){
        require("dbconnect.php");
		$repeat = mysql_query("SELECT count(*) from citizen where ID = '$userid'");
        $repeat = mysql_fetch_array($repeat);
        //echo "<script>alert('$repeat[0]');</script>";

		if ($repeat[0] == '0'){
			$result=mysql_query("insert into citizen(ID,Name,Pass,Sex,Race,Home,Bloodtype,Ano,Level) value('$userid','$name','$password','$sex',NULL,NULL,'$bloodtype',0,0);")  or die("Query failed:" .mysql_error());
			$rs = mysql_query("insert into volunteer(ID,Vostatus,Voheight,Voweight,Voedu) value('$userid',1,'$height','$weight','$edu');")  or die("Query failed:" .mysql_error());		
            if ($result && $rs){
				session_start();
				$_SESSION['user']=$userid;
                $_SESSION['name']=$name;
				echo "<script>location.href='index.php';</script>";
			}else echo "<script>alert('Failed!');</script>";
		}else echo "<script>alert('UserID already exist!');</script>";
		mysql_close();
	}else {
		echo "<script>alert('".$_ans."');</script>";
    }
}
?>
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<div id="fbody"><ul class="thumbnails">
		<div class="thumbnail span8 formdiv"><form id="form" action="" method="post" enctype="multipart/form-data" class="form-signin"><table>
			<thead><h2 class="form-signin-heading">Create new User</h2></thead>
			<tbody>
				<tr>
					<td>ID*</td>
					<td><input type="text" class="input-block-level" placeholder="ID" id="user" name="user" onblur="checkuser()"></td>
					<td class="text-left" id="userinfo" name="userinfo"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="input-block-level" placeholder="Password" id="pass" name="pass" onblur="checkpass()"></td>
					<td class="text-left" id="passinfo"></td>
				</tr>
				<tr>
					<td>Comfirm</td>
					<td><input type="password" class="input-block-level" placeholder="Confirm Password" id="pass2" name="pass2" onblur="checkpass2()"></td>
					<td class="text-left" id="pass2info"></td>
				</tr>	
				<tr>
					<td>Name</td>
					<td><input type="text" class="input-block-level" placeholder="Your Name" id="name" name="name" onblur="checkName()"></td>
					<td class="text-left" id="codeinfo"></td>
				</tr>			
				<tr>
					<td>Sex</td>
					<td><input type="text" class="input-block-level" placeholder="Sex 0-man,1-woman" id="sex" name="sex"></td>
				</tr>
				<tr>
					<td>Home</td>
					<td><input type="text" class="input-block-level" placeholder="home address" id="home" name="home"></td>
				</tr>
				<tr>
					<td>BloodType</td>
					<td><input type="text" class="input-block-level" placeholder="A/B/AB/O" id="bloodtype" name="bloodtype"></td>
				</tr>
                <tr>
					<td>身高</td>
					<td><input type="text" class="input-block-level" placeholder="身高 cm" id="height" name="height"></td>
				</tr>
                <tr>
					<td>体重</td>
					<td><input type="text" class="input-block-level" placeholder="体重 kg" id="weight" name="weight"></td>
				</tr>
                <tr>
					<td>教育状况</td>
					<td><input type="text" class="input-block-level" placeholder="教育状况" id="edu" name="edu"></td>
				</tr>
				<tr>
					<td></td>
					<td class="text-center"><input class="btn btn-large btn-primary" type="submit" id="submit" name ="submit" style="width:50%" value ="Register" /></td>
				</tr> 
			
			</tbody>
        </table></form></div>
		<div id ="inform" class="thumbnail span3 alert alert-success">
			<p>通知：</p>
			<p>*暂不对外开放注册！只能凭邀请码注册。2014.4.5</p>
			<p>*人工智能课邀请码均为学号，且注意username与学号保持一致！2014.5.12</p>
			<p>*如果注册出现问题，请联系metisai#126.com。2014.5.12</p>
		</div>
    </ul></div>
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>


</html5>
