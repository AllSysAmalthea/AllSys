<!doctype html>
<html5>
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>查询</title>
<link href="./static/bootstrap/bootstrap.css" rel="stylesheet">
<link href="./static/bootstrap/body.css" rel="stylesheet">
<link href="./static/bootstrap/login.css" rel="stylesheet">	
<script type="text/javascript" src="./static/js/jquery.js"></script>
<style>
table{
    width:100%;
}
.content{
    width:69%;
}
</style>
</head>
<?php
    //init flag
    $flag_l2 = 9777;
?>
<?php
if (isset($_POST['query1'])){
    $qID =@$_POST['qID'];
	$qID = mysql_real_escape_string($qID);
    if($qID != ""){
        require_once("dbconnect.php");
        $rt = mysql_query("SELECT * from citizen where ID = '$qID';")or die("Query failed:" .mysql_error());
        $result = mysql_fetch_array($rt);
        //echo "<script>alert('$result[1]');</script>";
        $ans1="";
        $ans1 = "姓名:".$result[1]."<br>";
        $ans1 .="性别：".$result[3]."<br>民族：";
        $ans1 .=$result[4]."<br>家庭住址：";
        $ans1 .=$result[5]."<br>血型：".$result[6];
        $ans1 .= "<br>所在灾区：".$result['Ano'];
    
        $rt = mysql_query("SELECT * from victim where ID = '$qID';")or die("Query failed:" .mysql_error());
        $result = mysql_fetch_array($rt);
        if ($result == NULL){
            $ans1 ="无此人信息！";
        }else{
            $ans1 .= "<br>当前状态：".$result[2]."<br>";
            $ans1 .= "家庭信息：".$result[3]."<br>";
            $ans1 .= "受伤/死亡时间：".$result[4]."<br>";
            $ans1 .= "受伤/死亡地点：".$result[5];
            $ans1 .= "<br>受伤程度：".$result['Injury']."<br>";
            $ans1 .= "所在医院：".$result['Vhospital'];
        }
    }else $ans1="";
    
}else if(isset($_POST['query2'])){
    $qShelter =@$_POST['qShelter'];
	$qShelter = mysql_real_escape_string($qShelter);
    if($qShelter != ""){
        require_once("dbconnect.php");
        $rt = mysql_query("SELECT * from shelter where SHname = '$qShelter';")or die("Query failed:" .mysql_error());
        $result = mysql_fetch_array($rt);
        //echo "<script>alert('$result[2]');</script>";
        $ans2 = "庇护所名称:".$result['SHname']."<br>";
        $ans2 .= "地址：".$result['SHaddress']."<br>";
        $ans2 .= "状态：".$result['SHstate'];
        $ans2 .= "<br>当前人口：".$result['Shnow']."<br>人口上限：".$result['Shlimit'];
        $ans2 .= "<br>其他信息：".$result['Shremark']."<br>物资信息：";
        $shno = $result[0];
        $rt = mysql_query("SELECT * from supplies where Shno = '$shno';")or die("Query failed:" .mysql_error());
        while($row = mysql_fetch_array($rt)){
            $ans2 .="<br>~物资名称：".$row['Suname']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数量：".$row['Suamount'];
        }
    }else $ans2="";
    
}else if(isset($_POST['query3'])){
    $qVolunteer =@$_POST['qVolunteer'];
	$qVolunteer = mysql_real_escape_string($qVolunteer);
    if($qVolunteer != ""){
        require_once("dbconnect.php");
        $rt = mysql_query("SELECT * from citizen where ID = '$qVolunteer';")or die("Query failed:" .mysql_error());
        $result = mysql_fetch_array($rt);
        //echo "<script>alert('$result[1]');</script>";
        $ans3="";
        $ans3 = "姓名:".$result[1]."<br>";
        $ans3 .= "性别：".$result[3]."<br>";
        $ans3 .= "民族：".$result[4]."<br>";
        $ans3 .= "家庭住址：".$result[5]."<br>血型：".$result[6];
        $ans3 .= "<br>所在灾区：".$result['Ano'];
    
        $rt = mysql_query("SELECT * from volunteer where ID = '$qVolunteer';")or die("Query failed:" .mysql_error());
        $result = mysql_fetch_array($rt);
        if ($result == NULL){
            $ans3 ="无此人信息！";
        }else{
            if ($result[2] == '1') $statuss = "未就绪";
            else if ($result[2] == '2') $statuss = "就绪";
            else if ($result[2] == '3') $statuss = "任务中";
            else if ($result[2] == '0') $statuss = "申请中";
            $ans3 .= "<br>当前状态：".$statuss."<br>";
            $ans3 .= "身高：".$result[3]."<br>体重：".$result[4]."<br>";
            $ans3 .= "经度：".$result['locationX']."<br>纬度：".$result['locationY'];
        }
    }else $ans3="";
    
}else{
$qID = @$_GET['id'];
$shno = @$_GET['sid'];
if ($qID !=""){
	$qID = mysql_real_escape_string($qID);
    require_once("dbconnect.php");
    $rt = mysql_query("SELECT * from citizen where ID = '$qID';")or die("Query failed:" .mysql_error());
    $result = mysql_fetch_array($rt);
    $ans1="";
    $ans1 = "姓名:".$result[1]."<br>性别：".$result[3]."<br>";
    $ans1 .="民族：".$result[4]."<br>";
    $ans1 .= "家庭住址：".$result[5]."<br>血型：".$result[6];
    $ans1 .= "<br>所在灾区：".$result['Ano'];
    
    $rt = mysql_query("SELECT * from victim where ID = '$qID';")or die("Query failed:" .mysql_error());
    $result = mysql_fetch_array($rt);
    if ($result == NULL){
        $ans1 ="无此人信息！";
    }else{
        $ans1 .= "<br>当前状态：".$result[2]."<br>";
        $ans1 .= "家庭信息：".$result[3]."<br>";
        $ans1 .= "受伤/死亡时间：".$result[4]."<br>受伤/死亡地点：".$result[5];
        $ans1 .= "<br>受伤程度：".$result['Injury']."<br>所在医院：".$result['Vhospital'];
    }
}
if ($shno !=""){
	$shno = mysql_real_escape_string($shno);
    require_once("dbconnect.php");
    $rt = mysql_query("SELECT * from shelter where Shno = '$shno';")or die("Query failed:" .mysql_error());
    $result = mysql_fetch_array($rt);
        //echo "<script>alert('$result[2]');</script>";
    $ans2 = "庇护所名称:".$result['SHname']."<br>";
    $ans2 .= "地址：".$result['SHaddress']."<br>状态：".$result['SHstate'];
    $ans2 .= "<br>当前人口：".$result['Shnow']."<br>人口上限：".$result['Shlimit'];
    $ans2 .= "<br>其他信息：".$result['Shremark']."<br>物资信息：";
    $shno = $result[0];
    $rt = mysql_query("SELECT * from supplies where Shno = '$shno';")or die("Query failed:" .mysql_error());
    while($row = mysql_fetch_array($rt)){
        $ans2 .="<br>~物资名称：".$row['Suname']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数量：".$row['Suamount'];
    }
}
}
?>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php require_once("header.php");?>
	</div>
	<div id="fbody"><ul class="thumbnails">
		<div class="thumbnail span8 formdiv">
		<form id="form" class="form-signin" method="post" action="" enctype="multipart/form-data"><table> 
			<thead><h2 class="form-signin-heading">灾区信息查询</h2></thead>
			<tbody>
				<tr>
					<td>查询人口状态</td>
					<td class="content"><input type="text" class="input-block-level" placeholder="ID" id="qID" name="qID"></td>
                    <td class="text-center">
                        <input type="submit" class="btn btn-big btn-primary" value="查询" id="query1" name="query1">
                    </td>
                    
				</tr>
                <tr>
                    <td></td><td class="text-left"><?php echo @$ans1;?></td><td></td>
                </tr>
				<tr>
					<td>查询庇护所</td>
					<td><input type="text" class="input-block-level" placeholder="庇护所名称" id="qShelter" name="qShelter"></td>
                    <td class="text-center">
                        <input type="submit" class="btn btn-big btn-primary" value="查询" id="query2" name="query2">
                    </td>
				</tr>
                <tr>
                    <td></td><td class="text-left"><?php echo @$ans2;?></td><td></td>
                </tr>
                <tr>
					<td>查询志愿者</td>
					<td><input type="text" class="input-block-level" placeholder="ID" id="qVolunteer" name="qVolunteer"></td>
                    <td class="text-center">
                        <input type="submit" class="btn btn-big btn-primary" value="查询" id="query3" name="query3">
                    </td>
				</tr>
                <tr>
			<td></td><td class="text-left"><?php echo @$ans3;?></td><td></td>
		</tr>
			
			</tbody>
        </table></form>
		</div>
		<div id ="inform" class="thumbnail span3 alert alert-success">
			<p>查询系统使用说明：</p>
			<p>请规范使用系统，切勿攻击！</p>
            <p>如果出现问题，请联系amalthea@163.com</p>
		</div>
    </ul></div>
	
	
	<?php

function dealwith($array){
    $i = 1; 
    $j = $array[0];
    $bs = 0;
    $x = $array[($i + $j)/2];
    
    $rt = "";
while($i < $j){
    while($array[$i] < $x && $i < $array[0]){
        $bs--;
        $i++;
    }

    while($array[$j] > $x && $j > 1){
        $bs = $bs % 12;
         $j--;
    }

    if ($i == $j){
        $rt .= "write a row<br>";
    }
    
}
}


        $check_l2 = $flag_l2;
        if ($check_l2 == 5){
            require_once("dbconnect.php");
            $rt = mysql_query("SELECT * from admin where Shno = '$shno';")or die("Query failed:" .mysql_error());
            $result = mysql_fetch_array($rt);

            //content 
            $content = "";
            $cc = "";
            for($i = 1; $i<$result[1]; $i++){
                $content .= "<input>".$cc."</input>";
                dealwith($result);
            }
        }

    ?>
	
	<div id="push"></div>
	<div id="footer">
		<?php require_once("footer.php");?>
    </div>
</body>
</html5>

