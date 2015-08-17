<?php
	include('includes/header.html');
	include('modules/products_control.php');
	if(!isset($_GET['pid']))
	{
		if(!isset($_GET['page']))
		{
		$page = 1;
		}
		else
		{
		$page = $_GET['page'];
		}
		$pro_con = new pro_control();
		$pro_con->show_all($page);
	}
	else
	{
		$pid = $_GET['pid'];
		$pro_con = new pro_control();
		$pro_con->show_detail($pid);
	}
	
	include('includes/footer.html');
?>