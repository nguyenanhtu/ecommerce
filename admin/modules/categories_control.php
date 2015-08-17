<?php
	include('categories_model.php');
	class cat_control 
	{
	function show_all($page)
	{
    $cat = new Category();
    $dataonepage = $cat->show_all_cat($page);
	$nums_page = $cat->num_page;
	include('categories_view.php');
	}
	
	function show_detail($cid)
	{
		$cat = new Category();
		$results = $cat->show_one_cat($cid);
		include('details_category_view.php');
	}
	}
?>