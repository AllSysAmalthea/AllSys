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
			width:5%;
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
                    <div class="leftpic"><img src='./static/images/slide1.jpg'/></div>
                    <div class="rightcontent">
                    <p class="detail">　6月1日21时28分左右，载有456名游客和船员的“东方之星”客轮，
    在长江湖北监利段翻沉，船长张顺文逃生获救。
　　张顺文从滔滔江水中捡回一条命，却陷入舆论漩涡。有人疑惑：面对狂风暴雨恶劣天气，为何不选择抛锚而是连夜前进？
　　连日来，澎湃新闻（www.thepaper.cn）走访了张顺文多名亲友、原同事，试图勾勒出张顺文的人生拼图、船舶生涯。
    张的入门师傅告诉澎湃新闻，张顺文17岁入行时是从收听天气预报起步的；30年前（1985年6月），22岁的张初次掌舵轮船时，
    曾在距“东方之星”沉船水域2公里处，遇险。
　　30年前，张顺文驾船曾在“东方之星”翻沉水域遇险
　　自6月2日一早得知“东方之星”客轮翻沉的消息，76岁的重庆居民彭万渝（化名），几乎每天从早到晚都锁定电视新闻频道，
    关注救援和打捞沉船情况。这，已是第7天。</p>
                    <a href="area.php" class="detail">Enter Area<img class="size" src='./static/image/enter.png' /></a>
                    </div>
				</div>
			</li>
			<li class="span12">
				<div class="thumbnail">
                    <p class="name">灾区2</p><a class="pull-right">Enter>>></a>
                    <div class="leftpic"><img src='./static/images/slide1.jpg'/></div>
                    <div class="rightcontent">
                    <p class="detail">　6月1日21时28分左右，载有456名游客和船员的“东方之星”客轮，
    在长江湖北监利段翻沉，船长张顺文逃生获救。
　　张顺文从滔滔江水中捡回一条命，却陷入舆论漩涡。有人疑惑：面对狂风暴雨恶劣天气，为何不选择抛锚而是连夜前进？
　　连日来，澎湃新闻（www.thepaper.cn）走访了张顺文多名亲友、原同事，试图勾勒出张顺文的人生拼图、船舶生涯。
    张的入门师傅告诉澎湃新闻，张顺文17岁入行时是从收听天气预报起步的；30年前（1985年6月），22岁的张初次掌舵轮船时，
    曾在距“东方之星”沉船水域2公里处，遇险。
　　30年前，张顺文驾船曾在“东方之星”翻沉水域遇险
　　自6月2日一早得知“东方之星”客轮翻沉的消息，76岁的重庆居民彭万渝（化名），几乎每天从早到晚都锁定电视新闻频道，
    关注救援和打捞沉船情况。这，已是第7天。</p>
                    <a href="area.php" class="detail">Enter Area<img class="size" src='./static/image/enter.png' /></a>
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
