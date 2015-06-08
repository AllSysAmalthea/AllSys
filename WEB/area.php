<!DOCTYPE html>
<html5>
<?php
	$game="XXX灾区";
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
}
.mid{
    margin-top:10px;
    padding-top:10px;
    height:300px;
    border-top:solid;
}
.tablesize{
    width:33%;
    float:left;
    border-right:dotted;
    border-left:dotted;
    border-width:1px;
}
.linebreak{
    
}
</style><style id="custom" type="text/css"></style>
<title><?php echo $game; ?></title>
<link href="code.css" rel="stylesheet" />
<script src="code.js"></script>
<script>
var newsarray = new Array();
var now = 0;
var newsn = 0;
function interval()
{
	document.getElementById("slides").innerHTML = newsarray[now];
    now = (now+1)%newsn;
	setTimeout("interval()",15000);
}
</script>
</head>

<body onload="interval()">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
   	
	<div id="fbody">
        <div class="container top">
        <?php
            require("dbconnect.php");
            $ano = 0;
            $result = mysql_query("select * from news where ANO = '$ano'");
            //$newsarray = new Array();
            $newsn = 0;
            $now = 0;
            $output = '<marquee height="200" weight="771" direction="up" scrollamount="2" onmouseout="this.start()" onmouseover="this.stop()">';
            while($row = mysql_fetch_array($result)){  
                $newsarray[$newsn] = "<p>新闻日期：".$row['date']."</p><p>新闻通讯员：".$row['Author']."</p><p>".$row['NEWS']."</p>";
                echo "<script>newsarray[newsn] = '".$newsarray[$newsn]."';</script>";
                $newsn++;
                echo "<script>newsn = ".$newsn.";</script>";
            }
            $output .='<span id="slides"></span></marquee>';
            echo $output;
        ?>
		
        </div>
        <div class="container mid">
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>物资名称</td><td>数量（国际单位）</td></tr>
                </thead>
                <tbody id="list">
                <?php
                    $shno = 0;
                    $result = mysql_query("select * from supplies");
                    $suoutput = "";
                    while($row = mysql_fetch_array($result)){  
                        $suoutput .= "<tr><td>".$row['Suname']."</td><td>".$row['Suamount']."</td></tr>";
                    }
                    echo $suoutput;
                ?>
                </tbody>
            </table>
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>庇护所</td><td>位置</td><td>人口</td><td>物资</td></tr>
                </thead>
                <tbody id="list">
                <?php
                    $ano = 0;
                    $result = mysql_query("select * from shelter where Ano = '$ano'");
                    $shoutput = "";
                
                    while($row = mysql_fetch_array($result)){  
                        $shno = $row['Shno'];
                        $shoutput .= "<tr><td><a href=query.php?sid=".$shno.">".$row['SHname']."</a></td><td>".$row['SHaddress']."</td><td>".$row['Shnow']."/".$row['Shlimit']."</td><td>正常</td></tr>";
                    }
                    echo $shoutput;
                ?>
                </tbody>
            </table>
            <table class="table-striped table tablesize">
                <thead>
                    <tr><td>失踪者</td><td>失踪者信息A</td><td>失踪者信息B</td></tr>
                </thead>
                <tbody id="list">
                <?php
                    $shno = 0;
                    $result = mysql_query("select * from victim");
                    $voutput = "";
                    while($row = mysql_fetch_array($result)){ 
                        $userid = $row['ID'];
                        $name = mysql_query("select Name from citizen where ID = '$userid';");
                        $name = mysql_fetch_array($name)[0];
                        $voutput .= "<tr><td><a href='query.php?id=".$userid."'>".$row['ID']."</a></td><td>".$name."</td><td>".$row['Vstatus']."</td></tr>";
                    }
                    echo $voutput;
                ?>
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
