<?php
include('order_model.php');
	class order_control 
	{
	function show_all($page)
	{
    $order = new Order();
    $dataonepage = $order->show_all_order($page);
	$nums_page = $order->num_page;
	include('order_view.php');
	}
	}
?>