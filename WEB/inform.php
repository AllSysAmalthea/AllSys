<!DOCTYPE html>
<html5>
<?php
	$title="Inform of Amalthea";
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
	p {	
        margin:1em 0;	
        line-height:1.5em;
    }
	table {
        font-size:inherit;
        font:100%;	
        margin:1em;
    }
	table th{
        border-bottom:1px solid #bbb;
        padding:.2em 0 .2em 0;
    }
	table td{
        border-bottom:1px solid #ddd;
        padding:.2em 0 .2em 0;
    }
	input[type=text],input[type=password],input[type=image],textarea{
        font:99% helvetica,arial,freesans,sans-serif;
    }
	select,option{
        padding:0 .25em;
    }
    optgroup{
        margin-top:.5em;
    }
	pre,code{
        font:12px Monaco,"Courier New","DejaVu Sans Mono","Bitstream Vera Sans Mono",monospace;
    }
	pre {	
        margin:1em 0;	
        font-size:12px;
        background-color:#eee;	
        border:1px solid #ddd;
        padding:5px;	
        line-height:1.5em;	
        color:#444;
        overflow:auto;	
        -webkit-box-shadow:rgba(0,0,0,0.07) 0 1px 2px inset;	
        -webkit-border-radius:3px;	
        -moz-border-radius:3px;
        border-radius:3px;
    }
	pre code {	
        padding:0;	
        font-size:12px;	
        background-color:#eee;
            border:none;
        }
	code {
            font-size:12px;	
        background-color:#f8f8ff;	
        color:#444;
            padding:0 .2em;	
	border:1px solid #dedede;}
	img{
        border:0;
        max-width:100%;
    }
    abbr{
        border-bottom:none;
    }
	a{
    color:#4183c4;
        text-decoration:none;
    }
    a:hover{
        text-decoration:underline;}
	a code,a:link code,a:visited code{
        color:#4183c4;
    }
    h2,h3{margin:1em 0;}
	h1,h2,h3,h4,h5,h6{border:0;}
    h1{font-size:170%;
        border-top:4px solid #aaa;
        padding-top:.5em;margin-top:1.5em;}
	h1:first-child{margin-top:0;
        padding-top:.25em;
        border-top:none;
    }
	h2{font-size:150%;
        margin-top:1.5em;
        border-top:4px solid #e0e0e0;
        padding-top:.5em;
    }
    h3{margin-top:1em;}
	hr{border:1px solid #ddd;}
    ol{margin:1em 0 1em 2em;}
    .span7 ul li ,.span7 ol li{margin-top:.5em;margin-bottom:.5em;}
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
					<li><p>平台通知</p></li>
					<ul>
					<li>2015-06-8 13:28:51PM搭建完成...所有数据已清空</li>
					<li><STRIKE>通知:服务器将不定期更新维护</STRIKE>,将加强分布式节点鲁棒性及解决数据异常情况,届时将无法使用部分功能. 2015/6/2
					
					<li>Bug记录:2014/06/02</li>
					<li>平台处于测试阶段,可能仍存在各种缺陷,如果发现bug请及时通知我们,平台的完善离不开大家的反馈,谢谢. amalthea@163.com  2015/05/06</li>
					</ul>
					<li><p>关于Amalthea平台</p></li>
					<ul>
					<li style="color: red">平台说明：</li>
					
					<li>平台说明：</li>
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
