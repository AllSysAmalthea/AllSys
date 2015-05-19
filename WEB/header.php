<?php
	$session_ans="";
	require_once('check_logined.php');
	$cur_url= $_SERVER["PHP_SELF"];
	$_cur1 = "";
	$_cur2 = "";
	$_cur3 = "";
	$_cur4 = "";
	switch($cur_url){
		case "/index.php": $_cur1 = "active"; break;
		case "/games.php": $_cur2 = "active"; break;
		case "/submissions.php": $_cur3="active"; break;
		case "/about.php" :  $_cur4 = "active"; break;
	}
?>
<style>
	.header{
		padding-left:20px;
		min-width:630px;
	}
	.navbar .nav .pull-right{
		float:right;
	}
</style>
<div class="navbar-inner" >
	<div class="header">
		<a class="brand" href="index.php">Amalthea</a>
		<div class="nav-collapse collapse">
			<?php 
				if ($session_ans=="NO"){ 
					echo "
						<ul class='nav pull-right'>
							<li><a href='register.php'>Register</a></li>
							<li><a href='login.php'>Login</a></li>
						</ul>
					";
				}else{
					echo "
						<ul class='nav pull-right'>
							<li><a href='user.php'>".htmlspecialchars($session_ans)."</a></li>
							<li><a href='logout.php'>Logout</a></li>
						</ul>
					";
				}
			?>
				
			<ul class="nav">
				<li class="<?php echo $_cur1;?>"><a href="index.php">Home</a></li>
				<li class="<?php echo $_cur2;?>"><a href="arealist.php">AreaList</a></li>
				<li class="<?php echo $_cur3;?>"><a href="donate.php">Donate</a></li>
                <li class="<?php echo $_cur3;?>"><a href="query.php">Query</a></li>
                <li class="<?php echo $_cur3;?>"><a href="admin.php">Admin</a></li>
				<li class="<?php echo $_cur4;?>"><a href="about.php">About Amalthea</a></li>
			</ul>
		</div>
	</div>
</div>