<?php
include('user_model.php');
	class user_control 
	{
	function show_all($page)
	{
    $user = new User();
    $dataonepage = $user->show_all_user($page);
	$nums_page = $user->num_page;
	include('user_view.php');
	}
	
	function show_detail($uid)
	{
		$user = new User();
		$results = $user->show_one_user($uid);
		include('details_user_view.php');
	}
	}
?>