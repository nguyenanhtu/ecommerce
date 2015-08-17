<?php
	include('includes/header.html');
	include('modules/categories_control.php');
	if(!isset($_GET['cid']))
	{
		if(!isset($_GET['page']))
		{
		$page = 1;
		}
		else
		{
		$page = $_GET['page'];
		}
		$cat_con = new cat_control();
		$cat_con->show_all($page);
	}
	else
	{
		$cid = $_GET['cid'];
		$cat_con = new cat_control();
		$cat_con->show_detail($cid);
	}
	
	include('includes/footer.html');
?>