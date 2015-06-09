<!DOCTYPE html>
<?php
	$view_title= "Userspace";
	$CID = @$_GET["CID"];
	$CID = mysql_real_escape_string($CID);
	$UID = @$_GET["UID"];
	$UID = mysql_real_escape_string($UID);
	if ($CID == "") $CID = 1;
	if ($CID > 1) $CID = 1;
	require("dbconnect.php");
	
?>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title ?></title>
	<!-- <link href="./static/bootstrap/post_file.css" rel="stylesheet"> -->
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">
	<script type="text/javascript" src="./static/js/jquery.js"></script>
	<!-- <script type="text/javascript" src="./static/js/post_file2.js"></script> -->
	<style>
		.p_title{
			font-size:32px;
			font-weight:bold;
		}
		#list{
			line-height: 30px;
			margin: 0 auto;
		}
		
		#center_container {
			margin-top: 40px;
			background-color: white;
			width: 980px;
			border:#909090 1px solid;
			filter:progid:DXImageTransform.Microsoft.Shadow(color=#909090,direction=120,strength=4);/*ie*/
			-moz-box-shadow: 2px 2px 10px #909090;/*firefox*/
			-webkit-box-shadow: 2px 2px 10px #909090;/*safari或chrome*/
			box-shadow:2px 2px 10px #909090;/*opera或ie9*/
		}
		.size40{
			width:40%;
		}
		.size80{
			width:80%;
		}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	
	<div id="fbody">
		<div class="container">
			<br>
			<div  id="list" class="pagination">
				<ul id="pagelist">
					<?php
						if ($session_ans !="NO"){
							$result = mysql_query("select * from taccount where username ='$session_ans'");
							$row = @mysql_fetch_array($result);
							$MY_UID = $row[0];
						}else $MY_UID = -1;
						if ($UID == ""){
							if($session_ans == "NO") echo"<script>alert('未登录！');location.href='login.php';</script>";else
							{
								$UID = $MY_UID;
							}
						}
						
						////////check
						/*
						$Delete_pid = @$_GET["delete"];
						if ($MY_UID == $UID){
							//bug!!!!!!!!!!
							
							//$delete_res = mysql_query("insert into tprog where PID ='$Delete_pid' (valid) value ('0') ");
							$delete_res = mysql_query("UPDATE tprog SET valid = '0' WHERE PID = '$Delete_pid'")or die(mysql_error());;
							$delete_battle_res = mysql_query("UPDATE tbattle SET valid = '0' WHERE PID1='$Delete_pid' or PID2='$Delete_pid'")or die(mysql_error());;
							//echo "<script>alert(".$delete_res.");</script>";
						}
						*/
						////////check
						
						
						
						$writepage= "";
						//$count=mysql_query("select count(*) from tcompetition");
						//$rs=mysql_fetch_array($count);
						//$totalPage=$rs[0];   					
						//for ( $i = 1; $i < $totalPage; $i++) {
						//	if ($i == $CID) $writepage .="<li class='active'><a href='user.php?username=".$username."&CID=".$CID."'>".$gamename[$i]."</a></li>";
						//		else $writepage .="<li><a href='user.php?username=".$username."&CID=".$i."'>".$gamename[$i]."</a></li>";
						//}
						$i =1;
						$result = @mysql_query("select * from user");
						while($row = @mysql_fetch_array($result)){
							if ($i == $CID){
								$writepage.="<li class='active'><a href='user.php?UID=".$UID."&CID=".$i."'>".$row[7]."</a></li>";
								$cur_game = $row[7];
							}
							else $writepage .="<li><a href='user.php?UID=".$UID."&CID=".$i."'>".$row[7]."</a></li>";
							$i++;
						}
						echo $writepage;
						
					?>
				</ul>
			</div>
			<hr>
			
			<div id="ai_list" class="span12">
				<div class="span9 div_left" style="min-height:400px;">
					<table class="table table-striped">
						<thead>
							<caption><h1><?php echo @$cur_game;?></h1></caption>
						</thead>
						<tbody>
							<?php
								$write = "<tr><td>NO.</td><td>Task_Date</td><td>start</td>";
                                $write .="<td>end</td><td>状况</td><td>状态</td><td width='10%'></td><td>Detail</td>";
								//if ($UID == $MY_UID) $write.="<td>replace</td></tr>"; else $write.="</tr>";
								$write .="</tr>";
								$current_version_max = 0;
								//$result = mysql_query("select * from taccount where username = '$username'");
								//$row = mysql_fetch_array($result);
								//$userid = $row[0];
								
								$result = mysql_query("select * from tprog where UID = '$UID' and CID = '$CID'");
								$i = 1;
								$tprog_num = 0;
								$replace_list = array();$replace_list_name = array(); $valid_ai_n = 0;
								while ($row = @mysql_fetch_array($result)) {
									$tprog_num++;
									if ($row[10] == 0) continue;
									if ($row[2]>$current_version_max) $current_version_max = $row[2];
									$write .= "<tr><td>".$i."</td><td>".$row[4]."</td><td>".$row[2]."</td><td>".htmlspecialchars($row[7])."</td><td>".$row[11]."</td><td>".$row[6]."</td><td><img class='size40' src='./static/image/pk.png'/></td><td><a href='ai.php?PID=".$row[0]."'>>>></a></td>";
									//if ($UID == $MY_UID) $write.="<td><a class='icon-remove' href='user.php?delete=".$row[0]."'></a></td></tr>"; else $write.="</tr>";
									//if($UID == $MY_UID) $write .="<td><input type='radio' name='replace_id' value='".$row[0]."'/></td></tr>";else $write.="</tr>";
									$valid_ai_n++;
									$replace_list[$valid_ai_n] = $row[0];
									$replace_list_name[$valid_ai_n] = $row[7];
									$write.="</tr>";
									$i++;
								}
								echo $write;
								$ai_num_valid = $i - 1;
							?>
						</tbody>
					</table>
					
					<div class="div_left alert alert-warning">
						注意：user正在构建中
					</div>
				
				</div>
				
				<div class="span3 pull-right">
					<br><br><br>
					<img src="./static/image/othello16.png"/>
				</div>
				<div class="span3 pull-right">
					<!------------------------------------------------------------------------------------------->
					<br>
					
					
					<?php 
						if (isset($_POST['submit'])){
						$replace_ai_id = $_POST['replace_id'];
						//----------------check replace_ai_id------------------------------
						$id_right = false;
						if ($replace_ai_id == 0) $id_right = true; 
						else for($i = 1; $i<=$valid_ai_n; $i++) if($replace_ai_id == $replace_list[$i]) $id_right = true;
						if($id_right == false){
							echo "<script>alert('提交出现错误！');location.href='user.php?UID=".$UID."&CID=".$CID."';</script>";
						}else{
						//-----------------------------------------------------------------
						if (($ai_num_valid >= 2) && ($replace_ai_id == 0 || $replace_ai_id =="")) {
							echo "<script>alert('AI最多为2个！');location.href='user.php?UID=".$UID."&CID=".$CID."';</script>";
						}else{
							$uploaddir = "/usr/local/apache/htdocs/upload/".$CID."/".$UID."/"; //设置文件保存目录 注意包含/    

							//$type=array("txt");//设置允许上传文件的类型   
							//$patch="http://127.0.0.1/cr_downloadphp/upload/files/";//程序所在路径  
							$replace_ai_name_b =$_POST['replace_ai_name'];
							$replace_ai_declare_b = $_POST['replace_ai_declare'];
							
							
							$replace_ai_name = mysql_real_escape_string($replace_ai_name_b);
							$replace_ai_declare = mysql_real_escape_string($replace_ai_declare_b);
							
							
							$filename=$_FILES['_file']['name']; 
							$filetype=$_FILES["_file"]["type"];
							$filesize=$_FILES["_file"]["size"];
							
							$check_ans = "";
							if ($filename == "") $check_ans = "请输入文件！"; else
							if ($replace_ai_name == "") $check_ans = "请输入报告名字！";
							/*
							if (mb_strlen($replace_ai_name) > 5) $check_ans = "文件名字长度最多为5个中英字符！";
							if (mb_strlen($replace_ai_declare) > 20) $check_ans = "签名长度最多为20个中英字符！";
							echo "<script>alert(".$replace_ai_declare.");</script>";
							echo "<script>alert(".mb_strlen($replace_ai_declare_b).");</script>";
							*/
							if ($check_ans !=""){ echo "<script>alert('".$check_ans."'); location.href = 'user.php?UID =".$UID."&CID =".$CID.	"';</script>"; }else{
							
							
							
							$md5_filename = md5(substr($filename,0,strlen($filename)-4).time()).".txt";
							//echo $md5_filename;
							/*  //文件类型 大小
							if ($filetype != "text/plain" || $filesize>2000000){
								echo "<script>alert('只能上传txt文件且不大于2M！');</script>";
							}else
							*/
								if (file_exists($uploaddir.$md5_filename)){
										echo "<script>alert('file already exists!');</script>";						
									}else{
										if (($replace_ai_id != "")&&($replace_ai_id != 0)){
											$Delete_pid = $replace_ai_id;
											$delete_res = mysql_query("UPDATE tprog SET valid = '0' WHERE PID = '$Delete_pid'")or die(mysql_error());;
											$delete_battle_res = mysql_query("UPDATE tbattle SET valid = '0' WHERE PID1='$Delete_pid' or PID2='$Delete_pid'")or die(mysql_error());;
										}
										
										$upstatus = move_uploaded_file(
											$_FILES["_file"]["tmp_name"],
											$uploaddir.$md5_filename
										);
										if ($upstatus != false){
											$next_version = $tprog_num+1;
											$upload_result = mysql_query("insert into tprog(CID,UID,status_code,ver_name,url,declaration,version) value ('$CID','$UID','0','$replace_ai_name','$md5_filename','$replace_ai_declare','$next_version')");
											echo "<script>alert('upload succeed!');</script>";
										}else{
											echo "<script>alert('upload failed!');</scirpt>";
										}
										echo "<script>location.href='user.php?UID=".$UID."&CID=".$CID."';</script>";
									}
							}
						}}}
					?>
					<?php
						$write_file_form = '<p style="font-size:25px;">上传任务报告</p>
<form action="" method="post" enctype="multipart/form-data">	
					<div id="replace">';
					$write_file_form = $write_file_form."<select class='selectpicker' name='replace_id'><option value='0'>直接上传</option>";
					for ($i = 1; $i <= $valid_ai_n; $i++) 
						$write_file_form = $write_file_form."<option value='".$replace_list[$i]."'>替换NO.".$i.":".$replace_list_name[$i]."</option>";
					$write_file_form = $write_file_form.'</select><input type="text" id ="replace_ai_name" name ="replace_ai_name" class="input_box replace_ver" maxlength="5" placeholder="请输入任务名称">
					<input type="text" id ="replace_ai_declare" name ="replace_ai_declare" class="input_box replace_ver" maxlength="20" placeholder="输出备注">
					</div>
					<div id="file">
						<input type="file" name="_file" id="_file"/>
						<center><input class="btn btn-primary" style="margin-top:10px;"type="submit" name="submit" value="Submit"  /></center>
					</div>
					</form>';
						if ($UID == $MY_UID) echo $write_file_form;
					?>
				</div>
				
			</div>
		</div>
	</div>

    <div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>

</body>
</html5>
