<!DOCTYPE html>
<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>admin</title>
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
.toparea{
    height:150px;
    margin-bottom:10px;
}
.leftarea{
    height:500px;
    float:left;
    width:25%;
}
.rightarea{
    height:500px;
    margin-left:7px;
    float:left;
    width:72%;
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
				<div class="thumbnail toparea">
                    <p class="name">Header</p><a class="pull-right">Enter>>></a>
                    <div class="rightcontent">
                    <p class="detail">You can submit your program anytime.</p>
                    </div>
				</div>
			</li>
			<li class="span12">
				<div class="thumbnail leftarea">
                    <p class="name">管理菜单</p>
                    <table class="table table-striped">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>BID</td><td class="player"><a>志愿者审核</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>新闻发布</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>任务请求队列</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>任务进度</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>新建任务</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>添加庇护所</a></td></tr>
                        <tr><td>BID</td><td class="player"><a>物资调度</a></td></tr>
                    </tbody>
                    </table>
				</div>

                <div class="thumbnail rightarea">
                    <p class="name">管理面板</p>
                    
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
