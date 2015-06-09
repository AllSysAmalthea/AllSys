<!DOCTYPE html>
<?php
	require_once('check_logined.php');
	if ($session_ans=="NO"){ 
		echo "<script>alert('You Do not have the permission!'); location.href='login.php';</script>";
	}
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
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data">
                    <table class="table">
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
                        <tr><td><a class="self-btn">通过</a>
                                <a class="self-btn">拒绝</a>
                            </td>
                            <td><a class="self-btn">prev</a><a class="self-btn">next</a></td>
                        </tr>
                    </tbody>
                    </table></form>';
	}else if ($flag == 2){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data">
                    <table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>新闻日期：</td>
                            <td><input type="text" class="input-block-level" placeholder="2015-01-01" id="date" name="date"></input>
                            </td>
                        </tr>
                        <tr><td>新闻图片：</td>
                            <td><input type="text" class="input-block-level" placeholder="url" id="pic" name="pic"></input>
                            </td>
                        </tr>
                        <tr><td>新闻作者：</td>
                            <td><input type="text" class="input-block-level" placeholder="swind" id="author" name="author"></input>
                            </td>
                        </tr>
                        <tr><td>新闻内容：</td><td><textarea class="textareasize" id="news" name="news"></textarea></td></tr>
                        <tr><td></td>
                <td><input class="btn btn-big btn-primary" type="submit" id="submit2" name ="submit2" style="width:50%" value ="新闻发布" /></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 3){
        require_once("dbconnect.php");
        $count = mysql_query("select count(*) from task where Tstatus = '0';");
        $count = mysql_fetch_array($count)[0];
        $now = @$_GET['i'];
        if (!($now>-1 && $now<$count)) $now = 0;
        $next = $now+1;
        //echo "<script>alert('$now');</script>";
        $rs = mysql_query("select * from task where Tstatus = '0' limit $now,$next;");
        if ($next >= $count) $next = 0;
        $prev = $now-1;
        if ($prev<0) $prev = 0;
        $rs = mysql_fetch_array($rs);
        
        $vol = mysql_query("select * from volunteer where Vostatus = '2';");
        $selectlist = "<option value='-1'>未选择</option>";
        while($row = mysql_fetch_array($vol)){
            $id = $row['ID'];
            $voname = mysql_query("select Name from citizen where ID = '$id';");
            $voname = mysql_fetch_array($voname)[0];
            $selectlist .= "<option value =".$row['Vono'].">".$voname."</option>";
        }
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead></thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>未处理任务申请：</td><td>'.$count.'</td></tr>
                        <tr><td>当前申请编号：</td>
                            <td><input type="text" class="input-block-level" id="tno" name="tno" value="'.$rs['Tno'].'"></input>
                            </td></tr>
                        
                        <tr><td>任务名称：</td><td>'.$rs['Tname'].'</td></tr>
                        <tr><td>申请理由：</td><td>'.$rs['Tremark'].'</td></tr>
                        <tr><td>志愿者1：</td><td><select id="v1" name="v1">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者2：</td><td><select id="v2" name="v2">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者3：</td><td><select id="v3" name="v3">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者4：</td><td><select id="v4" name="v4">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者5：</td><td><select id="v5" name="v5">'.$selectlist.'</select></td></tr>
                        <tr><td>
                            <input class="btn btn-big btn-primary tt" type="submit" id="submit31" name ="submit31" value ="通过"/>
                            <input class="btn btn-big btn-primary tt" type="submit" id="submit32" name ="submit32" value ="拒绝"/>
                        </td><td>
                            <a class="self-btn" href="admin.php?flag=3&i='.$prev.'">prev</a>
                                <a class="self-btn" href="admin.php?flag=3&i='.$next.'">next</a>
                        </td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 4){
        require_once("dbconnect.php");
        $count = mysql_query("select count(*) from task where Tstatus = '1';");    
        $count = mysql_fetch_array($count)[0];
        $now = @$_GET['i'];
        if (!($now>-1 && $now<$count)) $now = 0;
        $next = $now+10;
        //echo "<script>alert('$now');</script>";
        $rs = mysql_query("select * from task where Tstatus = '1' limit $now,$next;");
        if ($next >= $count) $next = 0;
        $prev = $now-1;
        if ($prev<0) $prev = 0;

        $tasklist = "";
        while($row = mysql_fetch_array($rs)){
            $tno = $row['Tno'];
            $vonum = mysql_query("select count(*) from vo_t where Tno = '$tno';");
            $vonum = mysql_fetch_array($vonum)[0];
            $tasklist .= "<tr><td>".$row['Tname']."</td><td>".$vonum."名志愿者</td><td>".$row['Tremark']."</td></tr>";
        }
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead></thead>
                    <tbody id="list">
                        <tr bgcolor="#DCDCDC"><td>进行中任务数量：</td><td>'.$count.'</td><td></td></tr>
                        '.$tasklist.'
                        <tr><td><a class="self-btn">prev</a></td><td><a class="self-btn">tmp</a>
                        </td><td><a class="self-btn">next</a></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 5){
        require_once("dbconnect.php");
        $vol = mysql_query("select * from volunteer where Vostatus = '2';");
        $selectlist = "<option value='-1'>未选择</option>";
        while($row = mysql_fetch_array($vol)){
            $id = $row['ID'];
            $voname = mysql_query("select Name from citizen where ID = '$id';");
            $voname = mysql_fetch_array($voname)[0];
            $selectlist .= "<option value =".$row['Vono'].">".$voname."</option>";
        }
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead></thead>
                    <tbody id="list">
                        <tr><td>任务名称：</td>
                            <td><input type="text" class="input-block-level" placeholder="不超过20字" id="task" name="task">
                                </input></td></tr>
                        <tr><td>任务描述：</td><td><textarea id="taskremark" name="taskremark" class="taskareasize">
                            </textarea></td></tr>
                        <tr><td>志愿者1：</td><td><select id="v1" name="v1">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者2：</td><td><select id="v2" name="v2">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者3：</td><td><select id="v3" name="v3">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者4：</td><td><select id="v4" name="v4">'.$selectlist.'</select></td></tr>
                        <tr><td>志愿者5：</td><td><select id="v5" name="v5">'.$selectlist.'</select></td></tr>
                        <tr><td></td><td><input class="btn btn-big btn-primary tt" type="submit" id="submit5" name ="submit5" value ="提交任务"/></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 6){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>庇护所名称：</td>
                            <td><input type="text" class="input-block-level" placeholder="不超过20字" id="shname" name="shname"></input></td></tr>
                        <tr><td>庇护所地址：</td>
                            <td><input type="text" class="input-block-level" placeholder="不超过40字" id="addr" name="addr"></input></td></tr>
                        <tr><td>庇护所描述：</td>
                            <td><textarea id ="shremark" name ="shremark" class="taskareasize"></textarea></td></tr>
                        <tr><td>当前灾民数量：</td>
                            <td><input type="text" class="input-block-level" placeholder="不超过20字" id="num" name="num"></input></td></tr>
                        <tr><td>灾民容纳上限：</td>
                            <td><input type="text" class="input-block-level" placeholder="不超过20字" id="max" name="max"></input></td></tr>
                        <tr><td>经度：</td>
                            <td><input type="text" class="input-block-level" placeholder="经度" id="locationX" name="locationX"></input></td></tr>
                        <tr><td>纬度：</td>
                            <td><input type="text" class="input-block-level" placeholder="纬度" id="locationY" name="locationY"></input></td></tr>
                        <tr><td></td><td>
                            <input class="btn btn-big btn-primary" type="submit" id="submit6" name ="submit6" style="width:50%" value ="确认添加" /></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 7){
        require_once("dbconnect.php");
        $ano = 0;
        $selectlist = "";
        $rt = mysql_query("select * from shelter where Ano = '$ano';");
        while($row = mysql_fetch_array($rt)){
            $shno = $row['Shno'];
            $shname = $row['SHname'];
            $selectlist .= "<option value =".$shno.">".$shname."</option>";
        }
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead></thead>
                    <tbody id="list">
                        <tr><td>物资名称：</td>
                            <td><input type="text" class="input-block-level" placeholder="物资名称" id="suName" name="suName"></input></td></tr>
                        <tr><td>支出数量：</td>
                            <td><input type="text" class="input-block-level" placeholder="支出数量" id="suAmount" name="suAmount"></input></td></tr>
                        <tr><td>支出地点：</td>
                            <td><select id="suShno" name="suShno">'.$selectlist.'</select></td></tr>
                        <tr><td></td><td>
                            <input class="btn btn-big btn-primary" type="submit" id="submit7" name ="submit7" style="width:50%" value ="支出提交" /></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 8){
	require_once("dbconnect.php");
        $ano = 0;
        $selectlist = "";
        $rt = mysql_query("select * from shelter where Ano = '$ano';");
        while($row = mysql_fetch_array($rt)){
            $shno = $row['Shno'];
            $shname = $row['SHname'];
            $selectlist .= "<option value =".$shno.">".$shname."</option>";
        }
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead></thead>
                    <tbody id="list">
                        <tr><td>物资名称：</td>
                            <td><input type="text" class="input-block-level" placeholder="物资名称" id="suName" name="suName"></input></td></tr>
                        <tr><td>物资种类：</td><td>
                            <select id="suType" name="suType">
                                <option value="1">1消耗品</option>
                                <option value="2">2耐用品</option>
                            </select></td></tr>
                        <tr><td>物资数量：</td><td>
                            <input type="text" class="input-block-level" placeholder="物资数量（国际标准单位）" id="suAmount" name="suAmount">
                        </input></td></tr>
                        <tr><td>接收地点：</td><td>
                            <select id="suShno" name="suShno">'.$selectlist.'</select></td></tr>
                        <tr><td>备注：</td><td>
                            <input type="text" class="input-block-level" placeholder="其他信息" id="suRemark" name="suRemark"></input></td></tr>
                        <tr><td></td><td>
                            <input class="btn btn-big btn-primary" type="submit" id="submit8" name ="submit8" style="width:50%" value ="确认收货" /></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 9){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>灾民身份证号码：</td>
                            <td><input type="text" class="input-block-level" placeholder="身份证号码" id="vID" name="vID"></input></td></tr>
                        <tr><td>灾民姓名：</td><td>
                            <input type="text" class="input-block-level" placeholder="姓名" id="vName" name="vName"></input></td></tr>
                        <tr><td>性别：</td><td>
                            <input type="text" class="input-block-level" placeholder="0-男，1-女" id="vSex" name="vSex"></input></td></tr>
                        <tr><td>民族：</td><td>
                            <input type="text" class="input-block-level" placeholder="民族" id="vRace" name="vRace"></input></td></tr>
                        <tr><td>籍贯：</td><td>
                            <input type="text" class="input-block-level" placeholder="籍贯（不超过40位）" id="vHome" name="vHome"></input></td></tr>
                        <tr><td>灾民血型：</td><td>
                            <input type="text" class="input-block-level" placeholder="0-O,1-A,2-B,3-AB" id="vBloodType" name="vBloodType"></input></td></tr>
                        <tr><td>灾民状态：</td><td>
                            <input type="text" class="input-block-level" placeholder="死亡/受伤/失踪/其他" id="vStatus" name="vStatus"></input></td></tr>
                        <tr><td>亲属及联系方式：</td><td>
                            <input type="text" class="input-block-level" placeholder="姓名，电话（不超过40位）" id="vFamily" name="vFamily"></input></td></tr>
                        <tr><td>事件发生时间：</td><td>
                            <input type="text" class="input-block-level" placeholder="2015-01-02" id="vTime" name="vTime"></input></td></tr>
                        <tr><td>事件发生地点：</td><td>
                            <input type="text" class="input-block-level" placeholder="失踪地点（不超过40位）" id="vPlace" name="vPlace"></input></td></tr>
                        <tr><td>受伤程度：</td><td>
                            <input type="text" class="input-block-level" placeholder="轻伤/重伤/痊愈" id="vInjury" name="vInjury"></input></td></tr>
                        <tr><td>就医医院：</td><td>
                            <input type="text" class="input-block-level" placeholder="医院名称及地址（不超过30位）" id="vHospital" name="vHospital"></input></td></tr>
                        <tr><td>备注：</td><td>
                            <input type="text" class="input-block-level" placeholder="其他任何信息（不超过100位）" id="vRemark" name="vRemark"></input></td></tr>
                        
                        <tr><td></td><td>
                            <input class="btn btn-big btn-primary" type="submit" id="submit9" name ="submit9" style="width:50%" value ="确认录入" /></td></tr>
                    </tbody>
                    </table></form>';
    }else if ($flag == 10){
        $content = '<form id="form" action="" method="post" enctype="multipart/form-data"><table class="table">
                    <thead>
                        
                    </thead>
                    <tbody id="list">
                        <tr><td>灾民身份证号码：</td><td>
                            <input type="text" class="input-block-level" placeholder="身份证号码" id="vID" name="vID"></input></td></tr>

                        <tr><td>灾民姓名：</td><td>
                            <input type="text" class="input-block-level" placeholder="姓名" id="vName" name="vName"></input></td></tr>
                        <tr><td>性别：</td><td>
                            <input type="text" class="input-block-level" placeholder="0-男，1-女" id="vSex" name="vSex"></input></td></tr>
                        <tr><td>民族：</td><td>
                            <input type="text" class="input-block-level" placeholder="民族" id="vRace" name="vRace"></input></td></tr>

                        <tr><td>籍贯：</td><td>
                            <input type="text" class="input-block-level" placeholder="籍贯（不超过40位）" id="vHome" name="vHome"></input></td></tr>
                        <tr><td>灾民血型：</td><td>
                            <input type="text" class="input-block-level" placeholder="0-O,1-A,2-B,3-AB" id="vBloodType" name="vBloodType"></input></td></tr>

                        <tr><td>灾民状态：</td><td>
                            <input type="text" class="input-block-level" placeholder="死亡/受伤/失踪/其他" id="vStatus" name="vStatus"></input></td></tr>
                        <tr><td>亲属及联系方式：</td><td>
                            <input type="text" class="input-block-level" placeholder="姓名，电话（不超过40位）" id="vFamily" name="vFamily"></input></td></tr>
                        <tr><td>事件发生时间：</td><td>
                            <input type="text" class="input-block-level" placeholder="2015-01-02" id="vTime" name="vTime"></input></td></tr>

                        <tr><td>事件发生地点：</td><td>
                            <input type="text" class="input-block-level" placeholder="失踪地点（不超过40位）" id="vPlace" name="vPlace"></input></td></tr>
                        <tr><td>受伤程度：</td><td>
                            <input type="text" class="input-block-level" placeholder="轻伤/重伤/痊愈" id="vInjury" name="vInjury"></input></td></tr>

                        <tr><td>就医医院：</td><td>
                            <input type="text" class="input-block-level" placeholder="医院名称及地址（不超过30位）" id="vHospital" name="vHospital"></input></td></tr>
                        <tr><td>备注：</td><td>
                            <input type="text" class="input-block-level" placeholder="其他任何信息（不超过100位）" id="vRemark" name="vRemark"></input></td></tr>
                        
                        <tr><td></td><td><input class="btn btn-big btn-primary" type="submit" id="submit10" name ="submit10" style="width:50%" value ="确认修改" /></td></tr>

                    </tbody>
                    </table></form>';
    }else $content = "";
?>
<?php 
if (isset($_POST['submit10'])){
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
    if ($repeat[0] == '0'){
        echo "<script>alert('数据库中没有此人信息！');</script>";
    }else{
        $result=mysql_query("update citizen SET Name='$vName',Sex='$vSex',Race='$vRace', Home='$vHome',Bloodtype='$vBloodType',Ano='0',Level='0' where ID='$vID';")  or die("Query failed:" .mysql_error());
        if ($result){
            $result=mysql_query("update victim SET Vstatus='$vStatus',Vfamily='$vFamily', Vtime='$vTime',Vplace='$vPlace',Injury='$vInjury',Vhospital='$vHospital',remark='$vRemark' where ID='$vID';")  or die("Query failed:" .mysql_error());
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

if (isset($_POST['submit8'])){
    require_once("dbconnect.php");
	$suName = $_POST["suName"];
	$suName = mysql_real_escape_string($suName);
    $suType = $_POST["suType"];
	$suType = mysql_real_escape_string($suType);
    $suAmount = $_POST["suAmount"];
	$suAmount = mysql_real_escape_string($suAmount);
    $suRemark = $_POST["suRemark"];
	$suRemark = mysql_real_escape_string($suRemark);
    $suShno = $_POST["suShno"];
	$suShno = mysql_real_escape_string($suShno);
    //根据place，即庇护所名称 确定shno
    $shno = 0;
    $result=mysql_query("insert into supplies(Suname,Sutype,Sustate,Suamount,Suremark,Recvplace,Shno) value('$suName','$suType',1,'$suAmount','$suRemark','$suShno','$suShno');")  or die("Query failed:" .mysql_error());
    if ($result){
        echo "<script>alert('物资登记成功！');</script>";    
    }else{
        echo "<script>alert('物资登记失败！');</script>";
    } 
}

if (isset($_POST['submit7'])){
    require_once("dbconnect.php");
	$suName = $_POST["suName"];
	$suName = mysql_real_escape_string($suName);
    $suAmount = $_POST["suAmount"];
	$suAmount = mysql_real_escape_string($suAmount);
    $suShno = $_POST["suShno"];
	$suShno = mysql_real_escape_string($suShno);
    
    $result=mysql_query("update supplies SET Suamount = Suamount - '$suAmount' where Suname = '$suName' and Shno = '$suShno';")  or die("Query failed:" .mysql_error());
    if ($result){
        echo "<script>alert('物资支出登记成功！');</script>";    
    }else{
        echo "<script>alert('物资支出登记失败，请重新确定！');</script>";
    } 
}

if (isset($_POST['submit6'])){
    require_once("dbconnect.php");
	$name = $_POST["shname"];
	$name = mysql_real_escape_string($name);
    $addr = $_POST["addr"];
	$addr = mysql_real_escape_string($addr);
    $shremark = $_POST["shremark"];
	$shremark = mysql_real_escape_string($shremark);
    $num = $_POST["num"];
	$num = mysql_real_escape_string($num);
    $max = $_POST["max"];
	$max = mysql_real_escape_string($max);
    $locationX = $_POST["locationX"];
    $locationX = mysql_real_escape_string($locationX);
    $locationY = $_POST["locationY"];
    $locationY = mysql_real_escape_string($locationY);
    $ano = 0;
    $rs = mysql_query("select * from shelter where SHname = '$name'");
    $shno = mysql_fetch_array($rs);
    if ($shno != NULL){
        $shno = $shno['Shno'];
        $result=mysql_query("update shelter SET Ano='$ano',SHname='$name',SHaddress='$addr',Shnow='$num',Shlimit='$max',Shremark='$shremark',locationX='$locationX',locationY='$locationY' where Shno = '$shno';")  or die("Query failed:" .mysql_error());
        if ($result){
            echo "<script>alert('庇护所创建/更新成功！');</script>";    
        }else{
            echo "<script>alert('操作失败！');</script>";
        }

    }else{
        $result=mysql_query("insert into shelter(Ano,SHname,SHaddress,Shnow,Shlimit,Shremark,locationX,locationY) value('$ano','$name','$addr','$num','$max','$shremark','$locationX','$locationY');")  or die("Query failed:" .mysql_error());
        if ($result){
            echo "<script>alert('庇护所创建/更新成功！');</script>";    
        }else{
            echo "<script>alert('操作失败！');</script>";
        }
    }       
}

if (isset($_POST['submit5'])){
    require_once("dbconnect.php");
	$task = $_POST["task"];
	$task = mysql_real_escape_string($task);
    $taskremark = $_POST["taskremark"];
	$taskremark = mysql_real_escape_string($taskremark);
    $v1 = $_POST["v1"];
	$v1 = mysql_real_escape_string($v1);
    $v2 = $_POST["v2"];
	$v2 = mysql_real_escape_string($v2);
    $v3 = $_POST["v3"];
	$v3 = mysql_real_escape_string($v3);
    $v4 = $_POST["v4"];
	$v4 = mysql_real_escape_string($v4);
    $v5 = $_POST["v5"];
	$v5 = mysql_real_escape_string($v5);
    $count = mysql_query("select count(*) from task where Tname = '$task';");
    $count = mysql_fetch_array($count)[0];
    if ($count == '0'){
    $rs = mysql_query("insert into task(Tname,Tstatus,Tremark) value('$task',1,'$taskremark');");
    if ($rs){
        $result = mysql_query("select * from task where Tname = '$task';");
        $tno = mysql_fetch_array($result)['Tno'];
        if ($v1 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v1';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v1','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v2 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v2';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v2','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v3 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v3';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v3','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v4 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v4';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v4','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v5 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v5';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v5','$tno');")or die("Query failed:" .mysql_error());
        }
    }else echo "<script>alert('任务创建失败A');</script>";
    }else echo "<script>alert('此任务已存在，请重新创建新的任务');</script>";
    /*
    if ($shno != NULL){
        $shno = $shno['Shno'];
        $result=mysql_query("update shelter SET Ano='$ano',SHname='$name',SHaddress='$addr',Shnow='$num',Shlimit='$max',Shremark='$shremark' where Shno = '$shno';")  or die("Query failed:" .mysql_error());
        if ($result){
            echo "<script>alert('庇护所创建/更新成功！');</script>";    
        }else{
            echo "<script>alert('操作失败！');</script>";
        }

    }else{
        $result=mysql_query("insert into shelter(Ano,SHname,SHaddress,Shnow,Shlimit,Shremark) value('$ano','$name','$addr','$num','$max','$shremark');")  or die("Query failed:" .mysql_error());
        if ($result){
            echo "<script>alert('庇护所创建/更新成功！');</script>";    
        }else{
            echo "<script>alert('操作失败！');</script>";
        }
    } */      
}

if (isset($_POST['submit31'])){
    require_once("dbconnect.php");
	$tno = $_POST["tno"];
	$tno = mysql_real_escape_string($tno);
    $v1 = $_POST["v1"];
	$v1 = mysql_real_escape_string($v1);
    $v2 = $_POST["v2"];
	$v2 = mysql_real_escape_string($v2);
    $v3 = $_POST["v3"];
	$v3 = mysql_real_escape_string($v3);
    $v4 = $_POST["v4"];
	$v4 = mysql_real_escape_string($v4);
    $v5 = $_POST["v5"];
	$v5 = mysql_real_escape_string($v5);

    $rs=mysql_query("update task SET Tstatus = 1 where Tno = '$tno';")  or die("Query failed:" .mysql_error());
    if ($rs){
        if ($v1 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v1';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v1','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v2 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v2';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v2','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v3 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v3';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v3','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v4 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v4';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v4','$tno');")or die("Query failed:" .mysql_error());
        }
        if ($v5 >= 0){
            $result=mysql_query("update volunteer SET Vostatus = 3 where Vono = '$v5';")or die("Query failed:" .mysql_error());
            $result=mysql_query("insert into vo_t(Vono,Tno) value('$v5','$tno');")or die("Query failed:" .mysql_error());
        }
        echo "<script>alert('成功通过！');</script>";    
    }else{
        echo "<script>alert('通过任务失败！');</script>";
    }
    
    
}
if (isset($_POST['submit32'])){
    require_once("dbconnect.php");
	$tno = $_POST["tno"];
	$tno = mysql_real_escape_string($tno);

    $result=mysql_query("delete from task where Tno='$tno';")  or die("Query failed:" .mysql_error());
    if ($result){
        echo "<script>alert('成功删除任务请求！');</script>";    
    }else{
        echo "<script>alert('删除任务请求失败！');</script>";
    }
}

if (isset($_POST['submit2'])){
    require_once("dbconnect.php");
	$date = $_POST["date"];
	$date = mysql_real_escape_string($date);
    $author = $_POST["author"];
	$author = mysql_real_escape_string($author);
    $pic = $_POST["pic"];
	$pic = mysql_real_escape_string($pic);
    $news = $_POST["news"];
	$news = mysql_real_escape_string($news);


    $result=mysql_query("insert into news(SHNO,ANO,NEWS,date,Author,Pic) value(0,0,'$news','$date','$author','$pic');")  or die("Query failed:" .mysql_error());
    if ($result){
        echo "<script>alert('新闻发布成功！');</script>";    
    }else{
        echo "<script>alert('新闻发布失败！');</script>";
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
    width:100%;
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
p,select,textarea,input[type='text']{
    margin:0;
}
.tt{
    margin-left:20px;
}

</style>
<script>
var newsarray = new Array();
var now = 0;
var newsn = 0;
function interval()
{
	document.getElementById("slides").innerHTML = newsarray[now];
    now = (now+1)%newsn;
	setTimeout("interval()",3000);
}
</script>
</head>
	
<body onload="interval()">
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
                    <p class="name">灾区动态新闻</p><a class="pull-right">Enter>>></a>
                    <div class="rightcontent">
                    <?php
                        require("dbconnect.php");
                        $ano = 0;
                        $result = mysql_query("select * from news where ANO = '$ano'");
                        $newsn = 0;
                        $now = 0;
                        while($row = mysql_fetch_array($result)){  
                            $newsarray[$newsn] = "<p>日期：".$row['date']."&nbsp;&nbsp;&nbsp;通讯员：".$row['Author']."</p><p>".$row['NEWS']."</p>";
                            echo "<script>newsarray[newsn] = '".$newsarray[$newsn]."';</script>";
                            $newsn++;
                            echo "<script>newsn = ".$newsn.";</script>";
                        }
                        $output ='<span id="slides"></span>';
                        echo $output;
                    ?>
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
                        <tr><td>ID</td><td class="player"><a href='admin.php?flag=1'>管理项目</a></td></tr>
                        <tr><td>2</td><td class="player"><a href='admin.php?flag=2'>新闻发布</a></td></tr>
                        <tr><td>3</td><td class="player"><a href='admin.php?flag=3'>任务请求队列</a></td></tr>
                        <tr><td>4</td><td class="player"><a href='admin.php?flag=4'>任务进度</a></td></tr>
                        <tr><td>5</td><td class="player"><a href='admin.php?flag=5'>新建任务</a></td></tr>
                        <tr><td>6</td><td class="player"><a href='admin.php?flag=6'>添加/修改庇护所</a></td></tr>
                        <tr><td>7</td><td class="player"><a href='admin.php?flag=7'>物资支出</a></td></tr>
                        <tr><td>8</td><td class="player"><a href='admin.php?flag=8'>物资确认</a></td></tr>
                        <tr><td>9</td><td class="player"><a href='admin.php?flag=9'>灾民录入</a></td></tr>
                        <tr><td>10</td><td class="player"><a href='admin.php?flag=10'>灾民信息修改</a></td></tr>
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
<script>
	
function J() 
　　　　{ 
　　　　　var a, b; 
　　　　　a = new Array(0,1,2,3,4); 
　　　　　b = a.join("-");
　　　　　return(b);
　　　　}  

function SortDemo() 
　　　　{ 
　　　　　var a, l; 
　　　　　a = new Array("X" ,"y" ,"d", "Z", "v","m","r"); 
　　　　　l = a.sort(); 
　　　　　return(l); 
　　　　} 

function Date() 
　　　{ 
　　　　var d, s = "Today's date is: "; 
　　　　d = new Date(); 
　　　　s += (d.getMonth() + 1) + "/"; 
　　　　s += d.getDate() + "/"; 
　　　　s += d.getYear(); 
　　　　return(s); 
　　　} 

function DateDemo() 
　　　{ 
　　　　var d, day, x, s = "Today is: "; 
　　　　var x = new Array("Sunday", "Monday", "Tuesday"); 
　　　　var x = x.concat("Wednesday","Thursday", "Friday"); 
　　　　var x = x.concat("Saturday"); 
　　　　d = new Date(); 
　　　　day = d.getDay(); 
　　　　return(s += x[day]); 
　　　} 

function TimeDemo() 
　　　{ 
　　　　var d, s = "The current local time is: "; 
　　　　var c = ":"; 
　　　　d = new Date(); 
　　　　s += d.getHours() + c; 
　　　　s += d.getMinutes() + c; 
　　　　s += d.getSeconds() + c; 
　　　　s += d.getMilliseconds(); 
　　　　return(s); 
　　　} 

function GetTimeTest() 
　　　{ 
　　　　var d, s, t; 
　　　　var MinMilli = 1000 * 60; 
　　　　var HrMilli = MinMilli * 60; 
　　　　var DyMilli = HrMilli * 24; 
　　　　d = new Date(); 
　　　　t = d.getTime(); 
　　　　s = "It's been " 
　　　　
　　　　return(s); 
　　　} 
function TZDemo() 
　　　{ 
　　　　var d, tz, s = "The current local time is "; 
　　　　d = new Date(); 
　　　　tz = d.getTimezoneOffset(); 
　　　　if (tz < 0) 
　　　　s += tz / 60 + " hours before GMT"; 
　　　　else if (tz == 0) 
　　　　s += "GMT"; 
　　　　else 
　　　　s += tz / 60 + " hours after GMT"; 
　　　　return(s); 
　　　} 

function GetTimeTest(testdate) 
　　　{ 
　　　　var d, s, t; 
　　　　var MinMilli = 1000 * 60; 
　　　　var HrMilli = MinMilli * 60; 
　　　　var DyMilli = HrMilli * 24; 
　　　　d = new Date(); 
　　　　t = Date.parse(testdate); 
　　　　s = "There are " 
　　　　s += Math.round(Math.abs(t / DyMilli)) + " days " 
　　　　s += "between " + testdate + " and 1/1/70"; 
　　　　return(s); 
　　　} 

 function cutstr(str, len) {
        var temp,
            icount = 0,
            patrn = /[^\x00-\xff]/，
            strre = "";
        for (var i = 0; i < str.length; i++) {
            if (icount < len - 1) {
                temp = str.substr(i, 1);
                    if (patrn.exec(temp) == null) {
                       icount = icount + 1
                } else {
                    icount = icount + 2
                }
                strre += temp
                } else {
                break;
            }
        }
        return strre + "..."
    }
function ltrim(s)
{ 
return s.replace( /^(\s*|　*)/, ""); 
}
function rtrim(s){ 
	return s.replace( /(\s*|　*)$/, ""); 
}
	
	
    function HtmlEncode(text) {
        return text.replace(/&/g, '&').replace(/\"/g, '"').replace(/</g, '<').replace(/>/g, '>')
    }
	 function isDigit(value) {
        var patrn = /^[0-9]*$/;
        if (patrn.exec(value) == null || value == "") {
            return false
        } else {
            return true
        }
    }
	
	function appendscript(src, text, reload, charset) {
        var id = hash(src + text);
        if(!reload && in_array(id, evalscripts)) return;
        if(reload && $(id)) {
            $(id).parentNode.removeChild($(id));
        }

    
        evalscripts.push(id);
        var scriptNode = document.createElement("script");
        scriptNode.type = "text/javascript";
        scriptNode.id = id;
        scriptNode.charset = charset ? charset : (BROWSER.firefox ? document.characterSet : document.charset);
        try {
            if(src) {
                scriptNode.src = src;
                scriptNode.onloadDone = false;
                scriptNode.onload = function () {
                    scriptNode.onloadDone = true;
                    JSLOADED[src] = 1;
                 };
                 scriptNode.onreadystatechange = function () {
                     if((scriptNode.readyState == 'loaded' || scriptNode.readyState == 'complete') && !scriptNode.onloadDone) {
                        scriptNode.onloadDone = true;
                        JSLOADED[src] = 1;

                    }

                 };

            } else if(text){
                scriptNode.text = text;
            }
            document.getElementsByTagName('head')[0].appendChild(scriptNode);
        } catch(e) {}
    }
function setCookie(name, value, Hours) {
        var d = new Date();
        var offset = 8;
        var utc = d.getTime() + (d.getTimezoneOffset() * 60000);
        var nd = utc + (3600000 * offset);
        var exp = new Date(nd);
        exp.setTime(exp.getTime() + Hours * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";path=/;expires=" + exp.toGMTString() + ";domain=360doc.com;"
    }
	
	 function getCookie(name) {
        var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
        if (arr != null) return unescape(arr[2]);
        return null;

    }

	
	function setHomepage() {
        if (document.all) {
            document.body.style.behavior = 'url(#default#homepage)';
            document.body.setHomePage('http://w3cboy.com')
        } else if (window.sidebar) {
            if (window.netscape) {
                try {
                   netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect")
                } catch(e) {
                    alert("该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true")
                    }

            }

            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);

            prefs.setCharPref('browser.startup.homepage', 'http://w3cboy.com')

        }

    }
	
	 function LoadStyle(url) {
        try {
            document.createStyleSheet(url)
        } catch(e) {
            var cssLink = document.createElement('link');
            cssLink.rel = 'stylesheet';
            cssLink.type = 'text/css';
            cssLink.href = url;
            var head = document.getElementsByTagName('head')[0];
            head.appendChild(cssLink)
        }
		function $(id) {
        return !id ? null : document.getElementById(id);
    }
	function addEventSamp(obj,evt,fn){
        if(!oTarget){return;}
        if (obj.addEventListener) {
            obj.addEventListener(evt, fn, false);
        }else if(obj.attachEvent){
            obj.attachEvent('on'+evt,fn);
        }else{
            oTarget["on" + sEvtType] = fn;
        }

    }

function delEvt(obj,evt,fn){
        if(!obj){return;}
        if(obj.addEventListener){
            obj.addEventListener(evt,fn,false);
        }else if(oTarget.attachEvent){
            obj.attachEvent("on" + evt,fn);
        }else{
            obj["on" + evt] = fn;
        }

    }

function getUrlState(URL){
    var xmlhttp = new ActiveXObject("microsoft.xmlhttp");
    xmlhttp.Open("GET",URL, false); 
    try{ 
            xmlhttp.Send();
    }catch(e){
    }finally{
        var result = xmlhttp.responseText;
        if(result){
            if(xmlhttp.Status==200){
                return(true);
             }else{
                   return(false);
             }

         }else{

             return(false);

         }

    }

}

function compressCss (s) {//压缩代码
    s = s.replace(/\/\*(.|\n)*?\*\//g, ""); //删除注释
    s = s.replace(/\s*([\{\}\:\;\,])\s*/g, "$1");
    s = s.replace(/\,[\s\.\#\d]*\{/g, "{"); //容错处理
    s = s.replace(/;\s*;/g, ";"); //清除连续分号
    s = s.match(/^\s*(\S+(\s+\S+)*)\s*$/); //去掉首尾空白
    return (s == null) ? "" : s[1];
}

function isMobile(){

    if (typeof this._isMobile === 'boolean'){

        return this._isMobile;

    }
    var screenWidth = this.getScreenWidth();
    var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport ||rendererModel.runningExperiments.fixviewport;
    var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");
    if(!fixViewPortsExperiment){
        if(!this.isAppleMobileDevice()){
            screenWidth = screenWidth/window.devicePixelRatio;
        }
    }
    var isMobileScreenSize = screenWidth < 600;
    var isMobileUserAgent = false;
    this._isMobile = isMobileScreenSize && this.isTouchScreen();
    return this._isMobile;
}

function isAppleMobileDevice(){
    return (/iphone|ipod|ipad|Macintosh/i.test(navigator.userAgent.toLowerCase()));
}

function getInitZoom(){
    if(!this._initZoom){
        var screenWidth = Math.min(screen.height, screen.width);
        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
            screenWidth = screenWidth/window.devicePixelRatio;
        }
            this._initZoom = screenWidth /document.body.offsetWidth;
        }
    return this._initZoom;

}
function getZoom(){
    var screenWidth = (Math.abs(window.orientation) === 90) ? Math.max(screen.height, screen.width) : Math.min(screen.height, screen.width);
    if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
        screenWidth = screenWidth/window.devicePixelRatio;
    }
   var FixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;

    var FixViewPortsExperimentRunning = FixViewPortsExperiment && (FixViewPortsExperiment === "New" || FixViewPortsExperiment === "new");
    if(FixViewPortsExperimentRunning){
        return screenWidth / window.innerWidth;
    }else{

        return screenWidth / document.body.offsetWidth;

    }

}
function getScreenWidth(){
    var smallerSide = Math.min(screen.width, screen.height);
    var fixViewPortsExperiment = rendererModel.runningExperiments.FixViewport || rendererModel.runningExperiments.fixviewport;
    var fixViewPortsExperimentRunning = fixViewPortsExperiment && (fixViewPortsExperiment.toLowerCase() === "new");
    if(fixViewPortsExperiment){
        if(this.isAndroidMobileDevice() && !this.isNewChromeOnAndroid()){
            smallerSide = smallerSide/window.devicePixelRatio;
        }
    }
    return smallerSide;

}
    </script>
</body>
</html5>
