<!DOCTYPE html>
<html5>
<?php
	$title="Inform of METIS";
	require("dbconnect.php");
	$CID =1;
?>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style id="system" type="text/css">
	.container2{
		padding-left:30px;
		padding-right:30px;
	}
	#ranklist{
		width:270px;
		table-layout:fixed;
	}
	#pic{
		margin-left:20px;
	}
	#managediv,#rankdiv{
		margin-left:20px;
	}
	.first{width:10%;}
	.second{width:75%;}
	.third{width:15%;}
	.size80{
		width:80%;
	}
	.text-center{
		text-align:center;
	}
	.inform{
		margin-bottom:20px;
	}
	.managebtn{
		text-align:center;
	}
	p {	margin:1em 0;	line-height:1.5em;}
	table {	font-size:inherit;	font:100%;	margin:1em;}
	table th{border-bottom:1px solid #bbb;padding:.2em 0 .2em 0;}
	table td{border-bottom:1px solid #ddd;padding:.2em 0 .2em 0;}
	input[type=text],input[type=password],input[type=image],textarea{font:99% helvetica,arial,freesans,sans-serif;}
	select,option{padding:0 .25em;}optgroup{margin-top:.5em;}
	pre,code{font:12px Monaco,"Courier New","DejaVu Sans Mono","Bitstream Vera Sans Mono",monospace;}
	pre {	margin:1em 0;	font-size:12px;	background-color:#eee;	border:1px solid #ddd;	padding:5px;	
	line-height:1.5em;	color:#444;	overflow:auto;	-webkit-box-shadow:rgba(0,0,0,0.07) 0 1px 2px inset;	
	-webkit-border-radius:3px;	-moz-border-radius:3px;border-radius:3px;}
	pre code {	padding:0;	font-size:12px;	background-color:#eee;	border:none;}
	code {	font-size:12px;	background-color:#f8f8ff;	color:#444;	padding:0 .2em;	
	border:1px solid #dedede;}
	img{border:0;max-width:100%;}abbr{border-bottom:none;}
	a{color:#4183c4;text-decoration:none;}a:hover{text-decoration:underline;}
	a code,a:link code,a:visited code{color:#4183c4;}h2,h3{margin:1em 0;}
	h1,h2,h3,h4,h5,h6{border:0;}h1{font-size:170%;border-top:4px solid #aaa;padding-top:.5em;margin-top:1.5em;}
	h1:first-child{margin-top:0;padding-top:.25em;border-top:none;}
	h2{font-size:150%;margin-top:1.5em;border-top:4px solid #e0e0e0;padding-top:.5em;}h3{margin-top:1em;}
	hr{border:1px solid #ddd;}ol{margin:1em 0 1em 2em;}.span7 ul li ,.span7 ol li{margin-top:.5em;margin-bottom:.5em;}
	blockquote{margin:1em 0;border-left:5px solid #ddd;padding-left:.6em;color:#555;}
	dt{font-weight:bold;margin-left:1em;}
</style><style id="custom" type="text/css"></style>
<title><?php echo $title; ?></title>
<link href="code.css" rel="stylesheet" />
<script src="code.js"></script>
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet"><link href="./static/bootstrap/body.css" rel="stylesheet">
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
   	
	<div id="fbody"><div class="container">
			<br><br><br>	
		<div class="container2">
			<h2><?php echo $title; ?></h2><br>
			<div class="thumbnail alert alert-success">
				<ul>
					<li><p>关于METIS平台</p></li>
					<ul>
					<li>2014-06-21 3:28:51AM维护完成...所有对战已重置</li>
					<li><STRIKE>通知:6.20日晚11点服务器将进行更新维护</STRIKE>,将加强分布式节点鲁棒性及解决评测异常情况,届时将无法上传程序. 2014/6/20
					
					<li>Bug:平台的评测节点偶尔出现挂掉的情况,已重启,原因排查中...2014/06/02</li>
					<li>平台处于测试阶段,可能仍存在各种缺陷,如果发现bug请及时通知我们,平台的完善离不开大家的反馈,谢谢. metisai@126.com  2014/04/06</li>
					</ul>
					<li><p>关于Othello</p></li>
					<ul>
					<li style="color: red">本次实验将于6月30日晚上8点截止,届时平台将关闭提交并开始封闭评测.请记得提交两个AI至本平台,以及其他材料至<a href="http://cs.nju.edu.cn/lim/courses/AI/AI.htm">课程ftp</a>.不接受邮件和滞后的提交. 2014/06/28</li>
					<li>由于ddl将近,提交人数猛增,已部署了更多的评测节点,但仍很难较快看到全部评测结果,大家可以根据部分对战来不断微调AI,并提交一份较"稳定"的版本,在一段时间后获得稳定版本的全部对战情况. 2014/06/27</li>
					<li>UPD:由于部分同学输出调试文件过大,导致占满服务器硬盘而无法访问, 目前服务器将定期删除超过<STRIKE>10MB</STRIKE> 5MB的调试信息文件. 2014/6/14</li>
					<li>UPD:修正了AI名字为中文时的bug;增加了编译失败的FQA.增加了空闲时随机挑选AI进行对战的功能.增加了对get_time()使用方法的解释. 2014/06/07
					<li>评测节点已经部署好8台;PK策略改为随机挑选4个玩家分别先后手对战8场.大家可以在DDL前尽量优化自己的策略,使得在最终PK时效果较好;已支持上传2个AI. Hava Fun~ 2014/06/04</li>
					<li style="color:red">UPD:已支持查看输出的调试信息，具体见"其他细节"部分 2014/06/04</li>
					<li>UPD: 播放器已支持分数显示以及错误侦测功能.请大家调整自己的程序尽量不要出现超时等错误. 2014/06/04</li>
					<li style="color:red">注意: 请检查处理好超时问题！！在播放器中可以看到你是否超时及超时的次数! 你可以使用get_time()函数来处理卡时问题.2014/06/03</li>
								
					<li style="color:red">注意: 使用搜索为了避免超时，请使用get_time()函数来处理卡时问题！！log中的runtime error=3就是超时被kill掉.2014/06/03</li>
					<li>UPD:修正了string s的取值. 2014/06/01</li>
					</ul>
				
				</ul>
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
