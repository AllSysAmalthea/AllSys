<!DOCTYPE html>
<?php
	//rank 数据库中gamename读取
	require("dbconnect.php");
	$game = 0;
	$gamename[0]="Othello";
	$update = mysql_query("select * from tcompetition where CID = 1");
?>
<html5>
<head>
		<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Ranking_Of_<?php echo $gamename[$game]; ?></title>
    <link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="./static/bootstrap/body.css" rel="stylesheet">
	<script type="text/javascript" src="./static/js/jquery.js"></script>
	<style>
		.size25{
			width:25%;
		}
	</style>
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<div id="fbody">
	<div id="container" class="container">
		<br><br><br>

		<center><h2>Ranking &nbsp;Of &nbsp;<?php echo $gamename[$game]; ?></h2></center>
		<!--
		<p class="pull-right">排名更新截止时间：2011-1-1<?php //echo $update_time;?></p>
		-->
		<table class="table table-striped">     
			<thead>
				<tr><th width="5%">NO.</th><th width="25%">AI@Player(ver)</th><th width="20%">Submit Date</th><th width="5%">Score</th><th width="40%">Information</th><th width="5%">Challenge</th></tr>
			</thead>
			<tbody id="list">
				<?php
					
					$perNumber = 3;
					$CID = @$_GET["CID"];
					//防注入
					$CID = mysql_real_escape_string($CID);
					
					if ($CID == "") echo"<script>alert('No game is selected!');</script>";
					//!!!!!!!
					if ($CID > 1) $CID = 1;
					$page = @$_GET["page"];
					$page = mysql_real_escape_string($page);
					if ($page == "") $page = 1;
					
					//$count=mysql_query("select count(*) from tprog where CID = '$CID'");
					
					$result = mysql_query("select * from tprog where CID = '$CID' and valid='1' order by score desc");
					$write=""; 
					$i = 1;
					while($row = mysql_fetch_array($result)){
						$rs = mysql_query("select * from taccount where UID = '$row[3]'");
						$r = mysql_fetch_array($rs);
						
						$write.="<tr><td>".$i."</td><td><a href='ai.php?PID=".$row[0]."'>".htmlspecialchars($row[7])."@".htmlspecialchars($r[1])."(".$row[2].")</a></td><td>".$row[4]."</td><td>".$row[6]."</td><td>".$row[9]."</td><td><a href='#'><img class='size25' src='./static/image/pk.png'></a></td></tr>";
						$i++;
					}
									
					echo $write;
					
		
					//输出数据
					//$write = "<tr><td>1</td><td><a>DC_Swind_13</a></td><td>2013-13-13 12:12:12</td><td>700</td><td>虐菜没得商量。。。</td><td><img src='../static/image/challenge.jpg'></td></tr>";
					//echo $write;
					
				?>
			</tbody>
		</table>

			<div class="pagination">
				<ul id="pagelist">
					<?php
						//输出页码
						/*
						$writepage = "";
						if ($page != 1) {
							$pre = $page -1 ;
							$writepage .= "<li class='prev previous_page'><a href='rank.php?page=".$pre."'>prepage</a></li>";
						}
						for ( $i = 1; $i <= $totalPage; $i++) {
							$writepage .="<li><a href='rank.php?page=".$i."'>".$i."</a></li>";
						}
						if ($page<$totalPage) {
							$next = $page +1;
							$writepage .="<li><a href='rank.php?page=".$next."'>nextpage</a></li>";
						}
						echo $writepage;
						*/
					?>
				</ul>
			</div>
	</div>
	</div>


	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>