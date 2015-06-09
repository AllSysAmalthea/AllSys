<html>
<head>
	<title>About METIS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">
	<style>
		.Info_left,.Info_right{
			width:430px;
			height:207px;
			float:left;
			border-radius:14px;
			padding:10px;
			margin-bottom:20px;
		}
		.Info_right{
			margin-left:16px;
		}
		.introduction{
			width:200px;
			float:left;
			padding:5px;
		}
		.centerimg{
			width:914px;
			height:280px;
			position:absolute;
			top:250px;
			z-index:555;
			background:url(back.png) no-repeat;
			vertical-align:middle;
			text-align:center;
			background-position: center; 
		}
		.about_title{
			text-align:center;
			height:60px;
		}
		img{border-radius:50px;}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>

   	<div id="fbody">
		<div class="container"><br>
			<!--<div class="centerimg"></div>-->
			<div class="about_title"><h2>开发者简介</h2></div>
			<div class="Info_left">
					<div class="span3">
						<img src="./static/image/kwc.png" width="220" />
					</div>
					<div class="introduction">
						<h3>开发者A</h3>
						<p>姓名.</p>
                        <p>性别</p>
                        <p>他是XXXX</p>
					</div>
			</div>
			<div class="Info_right">
					<div class="span3">
						<img src="./static/image/qcx.jpg" width="220" />
					</div>
					<div class="introduction">
						<h3>开发者B</h3>
						<p>人生赢家.人生赢家.人生赢家.人生赢家</p>
					</div>

			</div>	
			<div class="Info_left">
					<div class="span3">
						<img src="./static/image/xd.jpg" width="220" />
						
					</div>
					<div class="introduction">
						<h3>开发者C</h3>
						<p>Sex:unkown</p>
					</div>
			</div>
			<div class="Info_right">
					<div class="span3">
						<img src="./static/image/zlm.jpg" width="220" />	
					</div>
					<div class="introduction">
						<h3>开发者D</h3>
						<p>Sex:unkown</p>
					</div>
					
			</div>
		</div>
	</div>



    <div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>

</body>
</html>
