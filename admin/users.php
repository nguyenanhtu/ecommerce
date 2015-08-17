<?php
	include('includes/header.html');
	include('modules/user_control.php');
	if(!isset($_GET['uid']))
	{
		if(!isset($_GET['page']))
		{
		$page = 1;
		}
		else
		{
		$page = $_GET['page'];
		}
		$user_cont = new user_control();
		$user_cont->show_all($page);
	}
	else
	{
		$uid = $_GET['uid'];
		$user_cont = new user_control();
		$user_cont->show_detail($uid);
	}
	
	include('includes/footer.html');
?>