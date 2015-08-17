<?php
	include('includes/header.html');
	include('modules/order_control.php');
		if(!isset($_GET['page']))
		{
		$page = 1;
		}
		else
		{
		$page = $_GET['page'];
		}
		$order_cont = new order_control();
		$order_cont->show_all($page);
	
	include('includes/footer.html');
?>