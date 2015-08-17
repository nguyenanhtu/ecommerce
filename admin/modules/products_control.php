<?php
include('categories_model.php'); 
include('products_model.php');
	class pro_control 
	{
	function show_all($page)
	{
    $prod = new Product();
    $dataonepage = $prod->show_all_prod($page);
	$nums_page = $prod->num_page;
	$cat = new Category();
	$datacat = $cat->show_cats();
	include('products_view.php');
	}
	
	function show_detail($pid)
	{
		$prod = new Product();
		$results = $prod->show_one_prod($pid);
		include('details_product_view.php');
	}
	}
?>