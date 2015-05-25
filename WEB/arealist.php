<!DOCTYPE html>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>arealist</title>
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">
	<style type="text/css" rel="stylesheet">
		.detail{
			padding:0 0 0 20px;
		}
		.size{
			width:15%;
		}
		.size85{
			width:85%;
		}
        .leftpic{
			width:25%;
            height:100%;
            vertical-align:left;
            float:left;
		}
.rightcontent{
    width:70%;
    vertical-align:right;
    float:left;
}
.thumbnail{
    height:250px;
}
.new{
    float:right;
}

.row-fluid [class*="span"]{
    margin-left:0;
}
.name{
    width:90%;
    float:left;
}
	</style>
</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
   	
	<div id="fbody">
	<div class="container row-fluid">
		<br>
        <a class="new">新建灾区</a><br><br>
		<ul class="thumbnails">
			<li class="span12">
				<div class="thumbnail">
                    <p class="name">灾区1</p><a class="pull-right">Enter>>></a>
                    <div class="leftpic"><img src='./static/image/othello.jpg'/></div>
                    <div class="rightcontent">
                    <p class="detail">You can submit your program anytime.</p>
                    <a href="area.php" class="detail">Enter Game<img class="size" src='./static/image/enter.png' /></a>
                    </div>
				</div>
			</li>
			<li class="span12">
				<div class="thumbnail">
                    <p class="name">灾区2</p><a class="pull-right">Enter>>></a>
                    <div class="leftpic"><img src='./static/image/othello.jpg'/></div>
                    <div class="rightcontent">
                    <p class="detail">You can submit your program anytime.</p>
                    <a href="area.php" class="detail">Enter Game<img class="size" src='./static/image/enter.png' /></a>
                    </div>
				</div>
			</li>
		</ul>
    </div>
	</div>

	
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
	
</body>
</html5>
