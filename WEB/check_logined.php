<?php
	session_start();
	if (@$_SESSION["user"]!="")
	{
		$session_ans= $_SESSION['name'];
	}
	else 
	{
		$session_ans= "NO";
	}
?>