<!DOCTYPE html>
<?php
	$flag =@$_GET['flag'];
	$flag = mysql_real_escape_string($flag);
/*
		$username= @$_POST['user'];
		$username = mysql_real_escape_string($username);
		$password= @$_POST['pass'];
		$password = mysql_real_escape_string($password);
		require("dbconnect.php");
	
		$result=mysql_query("SELECT chk_acc_info('$username','$password')");
		$ans=mysql_fetch_array($result);
		if ($ans[0] != 0)
		{
			session_start(); /////////////////need repair
			$_SESSION["user"] = $username;
			echo "<script>location.href='index.php';</script>";
		} else echo "<script>alert('Username or Password is wrong!');</script>";
        */
	if ($flag == 1){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>未处理志愿者申请：</td><td>3</td></tr>
                        <tr><td>当前申请编号：</td><td>1</td></tr>
                        <tr><td>申请者姓名：</td><td>徐栋</td></tr>
                        <tr><td>申请者ID</td><td>1234567890</td></tr>
                        <tr><td>体重</td><td>70</td></tr>
                        <tr><td>教育信息</td><td>嗯</td></tr>
                        <tr><td>当前地点</td><td>庇护所123</td></tr>
                        <tr><td>联系方式：</td><td>1234567</td></tr>
                        <tr><td>申请理由：</td><td>物资调度</td></tr>
                        <tr><td><a class="self-btn">通过</a><a class="self-btn">拒绝</a></td><td><a class="self-btn">prev</a><a class="self-btn">next</a></td></tr>
                    </tbody>
                    </table></form>';
	}else if ($flag == 2){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>新闻日期：</td><td><input type="text" class="input-block-level" placeholder="2015-01-01" id="date" name="date"></input></td></tr>
                        <tr><td>新闻图片：</td><td><input type="text" class="input-block-level" placeholder="url" id="pic" name="pic"></input></td></tr>
                        <tr><td>新闻作者：</td><td><input type="text" class="input-block-level" placeholder="swind" id="pic" name="pic"></input></td></tr>
                        <tr><td>新闻内容：</td><td><textarea class="textareasize"></textarea></td></tr>
                        <tr><td></td><td><a class="self-btn">发布</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 3){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>未处理任务申请：</td><td>3</td></tr>
                        <tr><td>当前申请编号：</td><td>1</td></tr>
                        <tr><td>申请者姓名：</td><td>徐栋</td></tr>
                        <tr><td>申请者ID</td><td>1234567890</td></tr>
                        <tr><td>任务名称</td><td>70</td></tr>
                        <tr><td>任务种类</td><td>嗯</td></tr>
                        <tr><td>任务地点</td><td>庇护所123</td></tr>
                        <tr><td>联系方式：</td><td>1234567</td></tr>
                        <tr><td>申请理由：</td><td>物资调度</td></tr>
                        <tr><td><a class="self-btn">通过</a><a class="self-btn">拒绝</a></td><td><a class="self-btn">prev</a><a class="self-btn">next</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 4){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>进行中任务数量：</td><td>3</td><td></td></tr>
                        <tr><td>任务1：</td><td>任务1名称</td><td>已完成任务，等待调回</td></tr>
                        <tr><td>任务2：</td><td>任务2名</td><td>正到达任务地点，等待开展任务</td></tr>
                        <tr><td><a class="self-btn">prev</a></td><td><a class="self-btn">tmp</a></td><td><a class="self-btn">next</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 5){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>任务名称：</td><td><input type="text" class="input-block-level" placeholder="不超过20字" id="task" name="task"></input></td></tr>
                        <tr><td>任务描述：</td><td><textarea class="taskareasize"></textarea></td></tr>
                        <tr><td>志愿者1：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>志愿者2：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>志愿者3：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>志愿者4：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>志愿者5：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td></td><td><a class="self-btn">发布</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 6){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>庇护所名称：</td><td><input type="text" class="input-block-level" placeholder="不超过20字" id="task" name="task"></input></td></tr>
                        <tr><td>庇护所地址：</td><td><input type="text" class="input-block-level" placeholder="不超过20字" id="addr" name="addr"></input></td></tr>
                        <tr><td>庇护所描述：</td><td><textarea class="taskareasize"></textarea></td></tr>
                        <tr><td>所在灾区：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>配置管理员：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        
                        <tr><td></td><td><a class="self-btn">发布</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 7){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>物资编号：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>起点：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>终点：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>数量（总数：1000）：</td><td><input type="text" class="input-block-level" placeholder="不超过上限" id="amount" name="amount"></input></td></tr>
                        <tr><td>志愿者1：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td>志愿者2：</td><td><select><option>1</option><option>2</option></select></td></tr>
                        <tr><td></td><td><a class="self-btn">发布</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 8){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>未处理物资捐赠：</td><td>3</td></tr>
                        <tr><td>当前编号：</td><td>1</td></tr>
                        <tr><td>捐赠者姓名：</td><td>徐栋</td></tr>
                        <tr><td>快递单号</td><td>1234567890</td></tr>
                        <tr><td>当前位置</td><td>70</td></tr>
                        <tr><td>目的地点</td><td>庇护所123</td></tr>
                        <tr><td>联系方式：</td><td>1234567</td></tr>
                        <tr><td><a class="self-btn">收货确认</a></td><td><a class="self-btn">prev</a><a class="self-btn">next</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 9){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>灾民身份证号码：</td><td><input type="text" class="input-block-level" placeholder="身份证号码" id="vID" name="vID"></input></td></tr>
                        <tr><td>灾民姓名：</td><td><input type="text" class="input-block-level" placeholder="姓名" id="vName" name="vName"></input></td></tr>
                        <tr><td>性别：</td><td><input type="text" class="input-block-level" placeholder="0-男，1-女" id="vSex" name="vSex"></input></td></tr>
                        <tr><td>民族：</td><td><input type="text" class="input-block-level" placeholder="民族" id="vRace" name="vRace"></input></td></tr>
                        <tr><td>籍贯：</td><td><input type="text" class="input-block-level" placeholder="籍贯（不超过40位）" id="vHome" name="vHome"></input></td></tr>
                        <tr><td>灾民血型：</td><td><input type="text" class="input-block-level" placeholder="0-O,1-A,2-B,3-AB" id="vBloodType" name="vBloodType"></input></td></tr>
                        <tr><td>灾民状态：</td><td><input type="text" class="input-block-level" placeholder="死亡/受伤/失踪/其他" id="vStatus" name="vStatus"></input></td></tr>
                        <tr><td>亲属及联系方式：</td><td><input type="text" class="input-block-level" placeholder="姓名，电话（不超过40位）" id="vFamily" name="vFamily"></input></td></tr>
                        <tr><td>事件发生时间：</td><td><input type="text" class="input-block-level" placeholder="2015-01-02" id="vTime" name="vTime"></input></td></tr>
                        <tr><td>事件发生地点：</td><td><input type="text" class="input-block-level" placeholder="失踪地点（不超过40位）" id="vPlace" name="vPlace"></input></td></tr>
                        <tr><td>受伤程度：</td><td><input type="text" class="input-block-level" placeholder="轻伤/重伤/痊愈" id="vInjury" name="vInjury"></input></td></tr>
                        <tr><td>就医医院：</td><td><input type="text" class="input-block-level" placeholder="医院名称及地址（不超过30位）" id="vHospital" name="vHospital"></input></td></tr>
                        <tr><td>备注：</td><td><input type="text" class="input-block-level" placeholder="其他任何信息（不超过100位）" id="vRemark" name="vRemark"></input></td></tr>
                        
                        <tr><td></td><td><input class="btn btn-big btn-primary" type="submit" id="submit9" name ="submit9" style="width:50%" value ="确认录入" /></td></tr>
                    </tbody>
                    </table></form>';
    }else $content = "";
?>
<?php 
if (isset($_POST['submit9'])){
    require_once("dbconnect.php");
	$vID = $_POST["vID"];
	$vID = mysql_real_escape_string($vID);
    $vName = $_POST["vName"];
	$vName = mysql_real_escape_string($vName);
    $vSex = $_POST["vSex"];
	$vSex = mysql_real_escape_string($vSex);
    $vRace = $_POST["vRace"];
	$vRace = mysql_real_escape_string($vRace);
    $vHome = $_POST["vHome"];
	$vHome = mysql_real_escape_string($vHome);
    $vBloodType = $_POST["vBloodType"];
	$vBloodType = mysql_real_escape_string($vBloodType);
    
    $vStatus = $_POST["vStatus"];
	$vStatus = mysql_real_escape_string($vStatus);
    $vFamily = $_POST["vFamily"];
	$vFamily = mysql_real_escape_string($vFamily);
    $vTime = $_POST["vTime"];
	$vTime = mysql_real_escape_string($vTime);
    $vPlace = $_POST["vPlace"];
	$vPlace = mysql_real_escape_string($vPlace);
    $vInjury = $_POST["vInjury"];
	$vInjury = mysql_real_escape_string($vInjury);
    $vHospital = $_POST["vHospital"];
    $vHospital = mysql_real_escape_string($vHospital);
    $vRemark = $_POST["vRemark"];
	$vRemark = mysql_real_escape_string($vRemark);

    $repeat=mysql_query("select count(*) from citizen where ID = '$vID';") or die("Query failed:" .mysql_error());
    $repeat=mysql_fetch_array($repeat);
    if ($repeat[0] != '0'){
        echo "<script>alert('数据库中已有此人信息！');</script>";
    }else{
        $result=mysql_query("insert into citizen(ID,Name,Pass,Sex,Race,Home,Bloodtype,Ano,Level) value('$vID','$vName',NULL,'$vSex','$vRace','$vHome','$vBloodType',0,0);")  or die("Query failed:" .mysql_error());
        if ($result){
            $result=mysql_query("insert into victim(ID,Vstatus,Vfamily,Vtime,Vplace,Injury,Vhospital,remark) value('$vID','$vStatus','$vFamily','$vTime','$vPlace','$vInjury','$vHospital','$vRemark');")  or die("Query failed:" .mysql_error());
            if ($result){
                echo "<script>alert('录入成功！');</script>";    
            }else{
                echo "<script>alert('插入信息发生错误B！');</script>";
            }
        }else{
            echo "<script>alert('插入信息发生错误A！');</script>";
        }
    }
    
}
?>
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
.textareasize{
    width:97%;
    height:250px;
}
.taskareasize{
    width:97%;
    height:80px;
}
.self-btn{
    width:40px;
    padding:8px 8px 8px 8px;
    border-radius:4px;
    margin-left:20px;
    margin-right:20px;
    background-color:#dcdcdc;
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
    height:650px;
    float:left;
    width:25%;
}
.rightarea{
    height:650px;
    margin-left:7px;
    float:left;
    width:72%;
}
.rightsubarea{
    height:470px;
    float:left;
    width:100%;
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
input[type='text']{
    margin:0;
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
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=1'>志愿者审核</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=2'>新闻发布</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=3'>任务请求队列</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=4'>任务进度</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=5'>新建任务</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=6'>添加庇护所</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=7'>物资调度</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=8'>物资确认</a></td></tr>
                        <tr><td>BID</td><td class="player"><a href='admin.php?flag=9'>灾民录入</a></td></tr>
                    </tbody>
                    </table>
				</div>

                <div class="thumbnail rightarea">
                    <p class="name">管理面板</p>
                    <div id="content" class = "rightsubarea">
                    <?php echo $content; ?>
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
