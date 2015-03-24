<!DOCTYPE html>
<?php
////////////////////////////// head
	$view_title= "METIS";
?>

<html5>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title ?></title>
	<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="./static/bootstrap/body.css" rel="stylesheet">
	<style>
		.p_title{
			font-size:32px;
			font-weight:bold;
		}
		#header{
			background-image: url(./static/image/bg10.jpg);
			height:300px;
		}
		#header-title{
			padding:80px 30px 0px 0px;
			font-size:40px;
		}
		p{
			font-family:"Microsoft YaHei";
		}
		.thumbnail{border-radius:0px;}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	
   	<div id="indexbody">
		<div id="header">
			<img id="header-title"class="pull-right" src="./static/image/title.png">
		</div>
		
			
			<ul class="thumbnails">
				<li class="span13">
					<div class="thumbnail" style="background-color:white; padding:0px 50px 0px 50px">
						<br>
						<p class="p_title">Introduction</p>
						<p>&nbsp &nbsp &nbsp &nbsp众所周知，人工智能是计算机科学中一个重要的研究领域，也是普通大众最关注的计算机科学研究方向之一。但是，人工智能的实现过于复杂，这让很多想学习或了解人工智能的人们望而却步。并且，他们即使做出了一些人工智能的实现，也会因为没有可以与他人比较的机会而使自己实现AI的能力进步得很慢。为了改善这一状况，我们决定搭建一个基于 WEB 3.0 的AI开发评测平台，为对AI感兴趣的人提供一个使用简便的AI开发包，并为提供一个方便的网上评测平台，便于他们切磋技艺，提升能力。</p>
						<p>&nbsp &nbsp &nbsp &nbsp本平台除了为AI设计提供了开发与评测支持外，还允许一些有兴趣提供自己的AI开发包的人达成他们的愿望。我们将尽力提供一个用户友好的平台，让他们可以更加方便、舒适的进行AI的开发。同时，我们将会提供一个尽量开放的平台，让每一个用户从平台的使用者变成平台的建设者。当然，我们也要提供一个稳定而又安全的平台。我们使用比较稳定成熟的技术来做网页平台的底层支撑，并采用sandbox技术使评测的过程更安全，从而让整个平台健康发展。</p>
						
					</div>
				</li>
			</ul>
		
		
	</div>

    <div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>

</body>
</html5>
