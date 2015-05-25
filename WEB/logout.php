<?php
	//require("dbconnect.php");
	session_start();
	$_SESSION["user"]="";
	echo "<script>location.href='index.php';</script>";
?>