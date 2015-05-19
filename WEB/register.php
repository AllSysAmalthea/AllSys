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
			$("#userinfo").css({'color':'red'}).html('Please input username');
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
	function checkcode(){
		var _code = $("#code").val();
		if (_code == ""){
			$("#codeinfo").css({'color':'red'}).html('Please input invitation code');
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
		require("dbconnect.php");
		function ck_reg($_username,$_pass,$_pass2,$_email)
		{
			$_ans="";
				if ($_username==""){ $_ans="Please input your username!"; return $_ans;}
				if ($_pass=="")    { $_ans="Please input your password!"; return $_ans; }
				if ($_pass!=$_pass2) {$_ans="The two passwords do not match!"; return $_ans;}
				if ($_email=="")   { $_ans="Please input your email address!"; return $_ans; }
				//if ($_sex=="")     { alert("Please choose your sex!"); return;}
		}
		if (isset($_POST['submit'])){
			$username = $_POST["user"];
			$username = mysql_real_escape_string($username);
			$password = $_POST["pass"];
			$password = mysql_real_escape_string($password);
			$password2 = $_POST["pass2"];
			$password2 = mysql_real_escape_string($password2);
			$email = $_POST["email"];
			$email = mysql_real_escape_string($email);
			$code = $_POST["code"];
			$code = mysql_real_escape_string($code);
			//账号，邀请码匹配
			if ($code != $username) {echo "<script>alert('username and invitation code do not match!');location.href='register.php';</script>"; return;}
			//
			//invitation code
			$code_ans = 0;
			/*
			$codefile = @file('/usr/local/apache/htdocs/code.txt');
			foreach($codefile as $line => $content){
				$content = substr($content , 0 , 9);
				if ($code == $content){
					$code_ans = true;
					break;
				} 
			}
			*/
			$code_sql = mysql_query("select * from invitationcode where code = '$code'") or die("Query failed:" .mysql_error());
			$code_sql_row = mysql_fetch_array($code_sql);
			if ($code_sql_row[1] == 0 && $code_sql_row[0] == $code){
				$code_ans = 2;
			}else if ($code_sql_row[1] > 0) $code_ans = 1;
			if($code_ans == 0){
				echo "<script>alert('Invitation code error!');location.href='register.php';</script>";
				return;  
			}
			if($code_ans == 1){
				echo "<script>alert('The invitation code is already in use!');location.href='register.php';</script>";
				return;  
			}
			//
			$_ans=ck_reg($username,$password,$password2,$email);
			if ($_ans == ""){
					require("dbconnect.php");
			
					$result=mysql_query("SELECT CHECK_USERNAME('$username')");
					$ans=mysql_fetch_array($result);
					
					if ($ans[0]=='N'){
						$result=mysql_query("call pSignup('$username','$password','$email');")  or die("Query failed:" .mysql_error());
						//成功后session保存、、
						//$result=mysql_query("insert into taccount(username,pass) value ('$username','$password')");
						if ($result){
							//change invitation code valid
							$chg_code_valid = mysql_query("update invitationcode set valid='1' where code = '$code'") or die("Query failed:" .mysql_error());
							//
							$rs = mysql_query("select * from taccount where username = '$username'");
							$row = mysql_fetch_array($rs);
							$count=mysql_query("select count(*) from tcompetition");
							for ($i = 1; $i<=$count; $i++){
								$path = "/usr/local/apache/htdocs/upload/".$i."/".$row[0];         //新建AI文件夹，$i为game的id，$ROW为userid
								if (!file_exists($path)){                                              //create
									mkdir($path,0777);
								}
							}
							session_start();
							$_SESSION['user']=$username;
							echo "<script>location.href='index.php';</script>";
						}else echo "<script>alert('Failed!');</script>";
					}else echo "<script>alert('Username already exist!');</script>";
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
					<td>Username</td>
					<td><input type="text" class="input-block-level" placeholder="Username" id="user" name="user" onblur="checkuser()"></td>
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
					<td>Invitation</td>
					<td><input type="text" class="input-block-level" placeholder="Invitation code" id="code" name="code" onblur="checkcode()"></td>
					<td class="text-left" id="codeinfo"></td>
				</tr>			
				<tr>
					<td>Email</td>
					<td><input type="text" class="input-block-level" placeholder="Email address" id="email" name="email"></td>
				</tr>
				
				<tr>
					<td>School</td>
					<td><input type="text" class="input-block-level" placeholder="Your School" id="school"></td>
				</tr>
				<tr>
					<td>Grade</td>
					<td><input type="text" class="input-block-level" placeholder="Grade" id="grade"></td>
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
