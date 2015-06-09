<?php
	$PID = @$_GET["PID"];
	$PID = mysql_real_escape_string($PID);
	require("dbconnect.php");
	$view_title= "新闻标题";
    $row = 1;
	$result = mysql_query("select * from tprog where PID = '$PID'");
	$score = $row[6];
	$status = $row[5];
	$date = $row[4];
	$userid = $row[3];
	$ver = $row[2];
	$ver_name = htmlspecialchars($row[7]);
	$CID = $row[1];
	$progurl = $row[8];
	$rank = @$row[11];
	$result = mysql_query("select * from tcompetition where CID = '$CID'");
	$game = $row[7];
	$result = mysql_query("select * from taccount where UID = '$userid'");
	$username = htmlspecialchars($row[1]);
	$uid = $row[0];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<title><?php echo $view_title ?></title>
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<style>
		.size80{
			width:88%;
		}
	</style>
	<link href="./static/bootstrap/body.css" rel="stylesheet">
	<script type="text/javascript" src="./static/js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.codeshow2').hide();
			var count = 1;
			$('.codeshow1').click(function(){
				var codeshow1 = $(this);
				count = (count+1)%2;
				$('codeshow1:active').removeClass('active');
				codeshow1.addClass('active');
				if (count == 1) $(".codeshow2").slideUp('fast');else $(".codeshow2").slideToggle('fast');
				
			});
		});
	</script>
	<style>
		.codediv{
			margin-left:20px;
			width:830px;
			display:block;
			word-break: break-all;
			word-wrap: break-word;
			padding-left:30px;
		}
		.pull-center{
			margin-left:30px;
			margin-right:auto;
		}
		#list{
			float: top;
		}
		#ai_info{
			padding:0 30px 26px 30px;
			margin-left:20px;
		}
		.lspace{
			padding-left: 50px;
			font-size:16px;
			width:50%;
		}
		.size10{
			width:10%;
		}
		.size40{
			width:40%;
		}
		.size{ width: 40%;}
		.size2{ width: 17%;}
		.date{ width:148px;}
		.status{ width: 65px;}
		.player{ width: 80%;}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	
   	<div id="fbody"><div class="container">
		<br><br><br>
		<div class="span6 alert alert-info" id="ai_info">
			<h2><?php echo $ver_name; ?>
			<?php
			$UID = $uid;
			if ($session_ans !="NO"){
				$result = mysql_query("select * from taccount where username ='$session_ans'");
				$row = @mysql_fetch_array($result);
				$MY_UID = $row[0];
			}else $MY_UID = -1;
			if (($UID == $MY_UID)||($MY_UID == 11)){
				echo "<a class='btn btn-primary pull-right' href='upload/".$CID."/".$UID."/".$progurl."'>Download</a>";
			}
			?>
			</h2>
			<hr><br>
			<table>
			<tr><td class="lspace">*新闻标题: </td><td> <?php echo $ver; ?> </td></tr>
			<tr><td class="lspace">*通讯员: </td><td> 
                <a href='user.php?UID=<?php echo $uid;?>'><?php echo $username;?></a>
            </td></tr>
			<tr><td class="lspace">*地点: </td><td>Othello</td></tr>
			<tr><td class="lspace">*时间:</td><td><?php echo $date;?></td></tr>
			
			<tr><td class="lspace">*新闻状态:</td>
			<?php
				if ($status == 0) echo "<td style='color:red;'> 最新！</td></tr>";
				if ($status == 1) echo "<td style='color:red;'>  发布中！</td></tr>";
				if ($status == 2) echo "<td style='color:green;'>  发布成功！</td></tr>";
				if ($status == 10){
					if (($UID == $MY_UID)||($MY_UID == 11)) 
                        echo "<td style='color:red;'>  加载失败！<a href='upload/".$CID."/".$UID."/".$progurl.".txt'>点击查看发布信息</a></td></tr>";
                        else echo "<td style='color:red;'>  加载失败！</td></tr>";
				}
			?>
			</table>
		</div>
		<div class="span4 pull-right">
			<img class="size80" src="./static/image/othello16.png">
		</div>
		<?php
			/*
			$UID = $uid;
			if ($session_ans !="NO"){
				$result = mysql_query("select * from taccount where username ='$session_ans'");
				$row = mysql_fetch_array($result);
				$MY_UID = $row[0];
			}else $MY_UID = -1;
			if ($UID == $MY_UID){
				
				echo '<div class="span5 codediv alert alert-info codeshow1">显示新闻</div>';
				echo '<div class="span11 codediv alert alert-info codeshow2">';
				$codefile = @file('/usr/local/apache/htdocs/upload/1/'.$UID.'/'.$progurl.'');
				foreach($codefile as $line => $content){
					echo $content;
				} 
			
				echo '</div>';
			
			}
			*/
		?>
		<div class="span11 pull-center"><div id="list">
			<br>
			<table class="table table-striped">
				<center><h2>新闻内容</h2></center>
				<thead>
					<tr><td>更新次数</td><td>更新时间</td><td class="player">新闻内容</td></tr>
				</thead>
				<?php
					$result=mysql_query("select * from tbattle where (PID1 ='$PID' or PID2 = '$PID') and valid='1' order by BID asc");	
					//输出数据
					$write = "";
					$row = 1;
					while (0) {
						$write = "";
						$write .= "<tr><td>".$row[0]."</td><td>";
						$PID1 = $row[2];
						$PID2 = $row[3];
						
						$result_PID1=mysql_query("select * from tprog where PID = '$PID1'");
						$row_PID1 =mysql_fetch_array($result_PID1);
						$version_PID1 = $row_PID1[7];
						$UID1 = $row_PID1[3];
						$result_UID1=mysql_query("select * from taccount where UID ='$UID1'");
						$row_UID1 =mysql_fetch_array($result_UID1);
						$username1 = $row_UID1[1];
						
						
						$result_PID2=mysql_query("select * from tprog where PID = '$PID2'");
						$row_PID2 =mysql_fetch_array($result_PID2);
						$version_PID2 = $row_PID2[7];
						$UID2 = $row_PID2[3];
						$result_UID2=mysql_query("select * from taccount where UID ='$UID2'");
						$row_UID2 =mysql_fetch_array($result_UID2);
						$username2 = $row_UID2[1];
						
						if (($row[9] > $row[10])&&($PID1 == $PID)) 
							$write .="<a>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")<img class='size2' src='./static/image/win.png'></a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")</a></td><td>";
						if (($row[9] < $row[10])&&($PID2 == $PID))
							$write .="<a>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")</a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")<img class='size2' src='./static/image/win.png'></a></td><td>";
						if (($row[9] < $row[10])&&($PID1 == $PID)) 
							$write .="<a>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")<img class='size2' src='./static/image/lose.png'></a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")</a></td><td>";
						if (($row[9] > $row[10])&&($PID2 == $PID))
							$write .="<a>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")</a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")<img class='size2' src='./static/image/lose.png'></a></td><td>";
						
						if ($row[9] == $row[10]) 
							$write .="<a>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")</a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")</a></td><td>";
						
						$write .=$row[9].":".$row[10]."</td><td>";
						//game name
						/*
						$rs_game = mysql_query("select * from tcompetition where CID ='$row[1]'");
						$row_game = mysql_fetch_array($rs_game);
						$game = $row_game[7];
						$write = $write.$game."</td><td>".$row[4]."</td>";
						*/
						$write = $write.$row[4]."</td>";
						/*
						if ($row[7] == 0 ) $status = "<td style='color:green'>succeed"; //解析 status
						if ($row[7] == 1 ) $status = "<td style='color:red'>running";
						*/
						//switch ($row[7])
						if ($row[7] == 0) $status = "<td style='color:yellow'>发布失败"; 
						else if ($row[7] == 1 ) $status = "<td style='color:blue'>正在发布";
						else if ($row[7] == 3 ) $status="<td style='color:red'>发布异常";
						else if ($row[7] == 4 || $row[7] == 5 || $row[7] == 6) $status="<td style='color:green'>发布成功";
						else $status="<td style='color:red'>Undefined";
						$write = $write.$status."</td><td><a href='player.php?BID=".$row[0]."'><img class='size' src='./static/image/play.png'/></td></tr>";
						$writeall = $write.$writeall;
						
						/*
						$write .="<a href='ai.php?PID=".$PID1."'>".htmlspecialchars($version_PID1)."@".htmlspecialchars($username1)."(".htmlspecialchars($row_PID1[2]).")</a></td><td><a href='ai.php?PID=".$PID2."'>".htmlspecialchars($version_PID2)."@".htmlspecialchars($username2)."(".htmlspecialchars($row_PID2[2]).")</a></td><td>";
						$write .=$row[9].":".$row[10]."</td><td>"; 
						$write = $write.$game."</td><td>".$row[4]."</td>";
						if ($row[7] == 0) $status = "<td style='color:yellow'>未评测"; 
						else if ($row[7] == 1 ) $status = "<td style='color:blue'>正在评测";
						else if ($row[7] == 3 ) $status="<td style='color:red'>评测异常";
						else if ($row[7] == 4 || $row[7] == 5 || $row[7] == 6) $status="<td style='color:green'>评测成功";
						else $status="<td style='color:red'>Undefined";
						$write = $write.$status."</td><td><a href='player.php?BID=".$row[0]."'><img class='size40' src='./static/image/play.png'/></td></tr>";
						*/
					}
					echo @$writeall;	
				?>
			</table>
		</div></div>
	</div></div>

    <div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>

</body>
</html>
