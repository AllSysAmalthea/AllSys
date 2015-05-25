<!DOCTYPE html>
<html5>
<?php
	$game="XXX灾区";
	require("dbconnect.php");
	$CID =1;
?>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
<link href="./static/bootstrap/body.css" rel="stylesheet">
<style id="system" type="text/css">
.top{
    margin-top:10px;
    padding-top:10px;
    height:200px;
    border:solid;
}
.mid{
    margin-top:10px;
    padding-top:10px;
    height:300px;
    border:solid;
}
.tablesize{
    width:33%;
    float:left;
    border-right:solid;
}
</style><style id="custom" type="text/css"></style>
<title><?php echo $game; ?></title>
<link href="code.css" rel="stylesheet" />
<script src="code.js"></script>

</head>
	
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
   	
	<div id="fbody">
        <div class="container top">
            tmp
		
        </div>
        <div class="container mid">
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>物资名称</td><td></td></tr>
                </thead>
                <tbody id="list">
                    <tr><td>盒饭：</td><td>3</td></tr>
                    <tr><td>筷子（双）：</td><td>2</td></tr>
                    <tr><td>床位：</td><td>20</td></tr>
                    <tr><td>药品：</td><td>1312</td></tr>
                    <tr><td>牙刷：</td><td>23</td></tr>                
                    <tr><td><a class="self-btn">prev</a></td><td><a class="self-btn">next</a></td></tr>
                    </tbody>
            </table>
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>庇护所名称</td><td>人口</td><td>物资</td></tr>
                </thead>
                <tbody id="list">
                    <tr><td>庇护所A：</td><td>3</td><td>充足</td></tr>
                    <tr><td>庇护所B：</td><td>3</td><td>充足</td></tr>
                    <tr><td><a class="self-btn">prev</a></td><td><a class="self-btn">next</a></td><td></td></tr>
                    </tbody>
            </table>
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>失踪者</td><td>失踪者信息A</td><td>失踪者信息B</td></tr>
                </thead>
                <tbody id="list">
                    <tr><td>Swind：</td><td>3</td><td>充足</td></tr>
                    <tr><td>D.C.：</td><td>3</td><td>充足</td></tr>
                    <tr><td><a class="self-btn">prev</a></td><td><a class="self-btn">next</a></td><td></td></tr>
                    </tbody>
            </table>
        </div>
    </div>
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
	
</body>

</html5>
